/**
 * Scitek Product Scraper V2 - Enhanced
 * 
 * Improved version that:
 * 1. Uses curl-like headers to bypass anti-bot
 * 2. Searches for multiple image patterns (preload, data-src, CDN links)
 * 3. Retries with different strategies
 * 4. Only re-scrapes products that don't have images yet
 */

const XLSX = require('xlsx');
const https = require('https');
const http = require('http');
const fs = require('fs');
const path = require('path');
const { URL } = require('url');

const EXCEL_PATH = path.join(__dirname, '..', 'produk.xlsx');
const OUTPUT_JSON = path.join(__dirname, 'products-data.json');
const IMAGES_DIR = path.join(__dirname, 'images');

if (!fs.existsSync(IMAGES_DIR)) {
    fs.mkdirSync(IMAGES_DIR, { recursive: true });
}

/**
 * Fetch URL with browser-like headers (more aggressive)
 */
function fetchUrl(url) {
    return new Promise((resolve, reject) => {
        if (url.startsWith('//')) url = 'https:' + url;
        const parsedUrl = new URL(url);
        const client = parsedUrl.protocol === 'https:' ? https : http;

        const options = {
            hostname: parsedUrl.hostname,
            port: parsedUrl.port,
            path: parsedUrl.pathname + parsedUrl.search,
            method: 'GET',
            headers: {
                'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36',
                'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8',
                'Accept-Language': 'en-US,en;q=0.9',
                'Accept-Encoding': 'identity',
                'Cache-Control': 'no-cache',
                'Pragma': 'no-cache',
                'Sec-Ch-Ua': '"Google Chrome";v="131", "Chromium";v="131", "Not_A Brand";v="24"',
                'Sec-Ch-Ua-Mobile': '?0',
                'Sec-Ch-Ua-Platform': '"Windows"',
                'Sec-Fetch-Dest': 'document',
                'Sec-Fetch-Mode': 'navigate',
                'Sec-Fetch-Site': 'none',
                'Sec-Fetch-User': '?1',
                'Upgrade-Insecure-Requests': '1',
                'Connection': 'keep-alive',
            },
            timeout: 20000
        };

        const req = client.request(options, (res) => {
            if (res.statusCode >= 300 && res.statusCode < 400 && res.headers.location) {
                fetchUrl(res.headers.location).then(resolve).catch(reject);
                return;
            }

            let data = '';
            res.on('data', chunk => data += chunk);
            res.on('end', () => resolve({ html: data, statusCode: res.statusCode }));
        });

        req.on('error', reject);
        req.on('timeout', () => { req.destroy(); reject(new Error('Timeout')); });
        req.end();
    });
}

/**
 * Download an image
 */
function downloadImage(url, filename) {
    return new Promise((resolve, reject) => {
        if (url.startsWith('//')) url = 'https:' + url;
        const parsedUrl = new URL(url);
        const client = parsedUrl.protocol === 'https:' ? https : http;

        const filePath = path.join(IMAGES_DIR, filename);

        const req = client.get(url, {
            headers: {
                'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'Accept': 'image/*,*/*;q=0.8',
                'Referer': 'https://www.scitekglobal.com/',
            },
            timeout: 30000
        }, (res) => {
            if (res.statusCode >= 300 && res.statusCode < 400 && res.headers.location) {
                downloadImage(res.headers.location, filename).then(resolve).catch(reject);
                return;
            }
            if (res.statusCode !== 200) {
                reject(new Error(`HTTP ${res.statusCode}`));
                return;
            }
            const fileStream = fs.createWriteStream(filePath);
            res.pipe(fileStream);
            fileStream.on('finish', () => { fileStream.close(); resolve(filePath); });
            fileStream.on('error', reject);
        });
        req.on('error', reject);
        req.on('timeout', () => { req.destroy(); reject(new Error('Timeout')); });
    });
}

/**
 * Extract image URL from HTML using multiple strategies
 */
function extractImageUrl(html) {
    // Strategy 1: og:image meta tag (multiple formats)
    const ogPatterns = [
        /property=["']og:image["'][^>]*content=["']([^"']+)["']/i,
        /content=["']([^"']+)["'][^>]*property=["']og:image["']/i,
        /og:image["']\s*\/?\s*>\s*<meta\s+content=["']([^"']+)["']/i,
    ];
    for (const pattern of ogPatterns) {
        const match = html.match(pattern);
        if (match && match[1] && !match[1].includes('transparent.png')) return match[1];
    }

    // Strategy 2: preload image link
    const preloadMatch = html.match(/href=["']([^"']+\.(?:jpg|png|webp)[^"']*)["'][^>]*as=["']image["']/i)
        || html.match(/as=["']image["'][^>]*href=["']([^"']+\.(?:jpg|png|webp)[^"']*)["']/i);
    if (preloadMatch && !preloadMatch[1].includes('transparent.png')) return preloadMatch[1];

    // Strategy 3: CDN product images (ldycdn.com/cloud/) - get the largest one
    const cdnPattern = /(?:https?:)?\/\/[a-z]+\.ldycdn\.com\/cloud\/[^\s"'<>]+?(?:-800-800|-460-460)?\.(?:jpg|png|webp)/gi;
    const cdnMatches = html.match(cdnPattern);
    if (cdnMatches) {
        // Filter out logo and transparent images
        const productImages = cdnMatches.filter(url => 
            !url.includes('logo') && 
            !url.includes('transparent') && 
            !url.includes('favicon') &&
            !url.includes('banner')
        );
        if (productImages.length > 0) {
            // Prefer 800x800 or 460x460 versions
            const sized = productImages.find(u => u.includes('-800-800') || u.includes('-460-460'));
            return sized || productImages[0];
        }
    }

    // Strategy 4: data-src with CDN
    const dataSrcMatch = html.match(/data-src=["']((?:https?:)?\/\/[a-z]+\.ldycdn\.com\/cloud\/[^"']+\.(?:jpg|png|webp))/i);
    if (dataSrcMatch && !dataSrcMatch[1].includes('logo') && !dataSrcMatch[1].includes('transparent')) {
        return dataSrcMatch[1];
    }

    // Strategy 5: jqzoom/magnify image links
    const zoomMatch = html.match(/href=["']((?:https?:)?\/\/[a-z]+\.ldycdn\.com\/cloud\/[^"']+\.(?:jpg|png|webp))/i);
    if (zoomMatch && !zoomMatch[1].includes('logo') && !zoomMatch[1].includes('transparent')) {
        return zoomMatch[1];
    }

    return null;
}

/**
 * Extract description from HTML
 */
function extractDescription(html) {
    const patterns = [
        /name=["']description["'][^>]*content=["']([^"']+)["']/i,
        /content=["']([^"']+)["'][^>]*name=["']description["']/i,
        /property=["']og:description["'][^>]*content=["']([^"']+)["']/i,
        /content=["']([^"']+)["'][^>]*property=["']og:description["']/i,
    ];
    for (const pattern of patterns) {
        const match = html.match(pattern);
        if (match && match[1]) return match[1];
    }
    return '';
}

function safeFilename(str) {
    return str.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '').substring(0, 80);
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function main() {
    console.log('=== Scitek Product Scraper V2 (Enhanced) ===\n');

    // Load existing data
    let products;
    if (fs.existsSync(OUTPUT_JSON)) {
        console.log('Loading existing products-data.json...');
        products = JSON.parse(fs.readFileSync(OUTPUT_JSON, 'utf8'));
        const withImages = products.filter(p => p.localImage && fs.existsSync(path.join(IMAGES_DIR, p.localImage)));
        console.log(`Found ${products.length} products, ${withImages.length} already have images\n`);
    } else {
        console.log('No existing data found. Please run scraper.js first.');
        process.exit(1);
    }

    // Re-scrape products without images
    let newImages = 0;
    let retried = 0;
    let failed = 0;

    for (let i = 0; i < products.length; i++) {
        const product = products[i];
        const progress = `[${i + 1}/${products.length}]`;

        // Skip if already has an image
        if (product.localImage && fs.existsSync(path.join(IMAGES_DIR, product.localImage))) {
            continue;
        }

        if (!product.scitekUrl) {
            continue;
        }

        retried++;
        try {
            console.log(`${progress} Re-scraping: ${product.type}`);
            const { html, statusCode } = await fetchUrl(product.scitekUrl);

            if (statusCode === 404) {
                console.log(`  ✗ 404 Not Found`);
                failed++;
                await sleep(300);
                continue;
            }

            const imageUrl = extractImageUrl(html);
            const description = extractDescription(html);

            if (description && !product.description) {
                product.description = description;
            }

            if (imageUrl) {
                product.imageUrl = imageUrl;
                const cleanUrl = imageUrl.startsWith('//') ? 'https:' + imageUrl : imageUrl;
                const ext = path.extname(new URL(cleanUrl).pathname) || '.jpg';
                const filename = safeFilename(product.type) + ext;
                product.localImage = filename;

                try {
                    await downloadImage(imageUrl, filename);
                    newImages++;
                    console.log(`  ✓ NEW image: ${filename}`);
                } catch (imgErr) {
                    console.log(`  ✗ Download failed: ${imgErr.message}`);
                    product.localImage = null;
                    failed++;
                }
            } else {
                console.log(`  ✗ No image found (status: ${statusCode}, html: ${html.length} bytes)`);
                failed++;
            }

            await sleep(400);

        } catch (err) {
            console.log(`${progress} ERROR: ${err.message}`);
            failed++;
        }
    }

    // Save updated results
    fs.writeFileSync(OUTPUT_JSON, JSON.stringify(products, null, 2), 'utf8');

    // Count final stats
    const totalWithImages = products.filter(p => p.localImage && fs.existsSync(path.join(IMAGES_DIR, p.localImage))).length;
    const totalWithoutImages = products.length - totalWithImages;

    console.log(`\n=== V2 SUMMARY ===`);
    console.log(`Re-tried: ${retried}`);
    console.log(`New images downloaded: ${newImages}`);
    console.log(`Still failed: ${failed}`);
    console.log(`\nFINAL: ${totalWithImages}/${products.length} products have images`);
    console.log(`Missing images: ${totalWithoutImages}`);

    if (totalWithoutImages > 0) {
        console.log('\nProducts without images:');
        products.filter(p => !p.localImage || !fs.existsSync(path.join(IMAGES_DIR, p.localImage))).forEach(p => {
            console.log(`  - ${p.type} (${p.scitekUrl || 'no URL'})`);
        });
    }
}

main().catch(err => {
    console.error('Fatal error:', err);
    process.exit(1);
});
