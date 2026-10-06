/**
 * Scitek Product Scraper
 * 
 * Reads produk.xlsx, scrapes product images and descriptions from Scitek website,
 * and outputs products-data.json + downloaded images.
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

// Ensure images directory exists
if (!fs.existsSync(IMAGES_DIR)) {
    fs.mkdirSync(IMAGES_DIR, { recursive: true });
}

/**
 * Read products from Excel file
 */
function readExcel() {
    const wb = XLSX.readFile(EXCEL_PATH);
    const ws = wb.Sheets[wb.SheetNames[0]];
    const range = XLSX.utils.decode_range(ws['!ref']);

    const products = [];
    let currentKlasifikasi = '';
    let currentNamaBarang = '';

    for (let r = 1; r <= range.e.r; r++) {
        const cC = ws[XLSX.utils.encode_cell({ r, c: 2 })];
        const cD = ws[XLSX.utils.encode_cell({ r, c: 3 })];
        const cE = ws[XLSX.utils.encode_cell({ r, c: 4 })];
        const cF = ws[XLSX.utils.encode_cell({ r, c: 5 })];

        if (cC && cC.v && cC.v !== 'Klasifikasi') currentKlasifikasi = cC.v.trim();
        if (cD && cD.v && cD.v !== 'Nama Barang') currentNamaBarang = cD.v.trim();

        if (cE && cE.v && cE.v !== 'Type') {
            const link = cE.l ? cE.l.Target : null;
            products.push({
                klasifikasi: currentKlasifikasi,
                namaBarang: currentNamaBarang,
                type: cE.v.trim(),
                model: cF ? String(cF.v).trim() : '',
                scitekUrl: link,
                imageUrl: null,
                localImage: null,
                description: ''
            });
        }
    }

    return products;
}

/**
 * Fetch a URL and return the HTML content
 */
function fetchUrl(url) {
    return new Promise((resolve, reject) => {
        const parsedUrl = new URL(url);
        const client = parsedUrl.protocol === 'https:' ? https : http;

        const req = client.get(url, {
            headers: {
                'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                'Accept-Language': 'en-US,en;q=0.5'
            },
            timeout: 15000
        }, (res) => {
            // Handle redirects
            if (res.statusCode >= 300 && res.statusCode < 400 && res.headers.location) {
                fetchUrl(res.headers.location).then(resolve).catch(reject);
                return;
            }

            let data = '';
            res.on('data', chunk => data += chunk);
            res.on('end', () => resolve(data));
        });

        req.on('error', reject);
        req.on('timeout', () => { req.destroy(); reject(new Error('Timeout')); });
    });
}

/**
 * Download an image to the images directory
 */
function downloadImage(url, filename) {
    return new Promise((resolve, reject) => {
        // Fix protocol-relative URLs
        if (url.startsWith('//')) url = 'https:' + url;

        const parsedUrl = new URL(url);
        const client = parsedUrl.protocol === 'https:' ? https : http;

        const filePath = path.join(IMAGES_DIR, filename);

        const req = client.get(url, {
            headers: {
                'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'Accept': 'image/*,*/*;q=0.8'
            },
            timeout: 30000
        }, (res) => {
            // Handle redirects
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
            fileStream.on('finish', () => {
                fileStream.close();
                resolve(filePath);
            });
            fileStream.on('error', reject);
        });

        req.on('error', reject);
        req.on('timeout', () => { req.destroy(); reject(new Error('Timeout')); });
    });
}

/**
 * Extract og:image and meta description from HTML
 */
function extractMetaData(html) {
    const result = { imageUrl: null, description: '' };

    // Extract og:image
    const ogImageMatch = html.match(/property=["']og:image["']\s+content=["']([^"']+)["']/i)
        || html.match(/content=["']([^"']+)["']\s+property=["']og:image["']/i);
    if (ogImageMatch) {
        result.imageUrl = ogImageMatch[1];
    }

    // Extract meta description
    const descMatch = html.match(/name=["']description["']\s+content=["']([^"']+)["']/i)
        || html.match(/content=["']([^"']+)["']\s+name=["']description["']/i);
    if (descMatch) {
        result.description = descMatch[1];
    }

    // Fallback: og:description
    if (!result.description) {
        const ogDescMatch = html.match(/property=["']og:description["']\s+content=["']([^"']+)["']/i)
            || html.match(/content=["']([^"']+)["']\s+property=["']og:description["']/i);
        if (ogDescMatch) {
            result.description = ogDescMatch[1];
        }
    }

    return result;
}

/**
 * Generate a safe filename from product type
 */
function safeFilename(str) {
    return str
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-+|-+$/g, '')
        .substring(0, 80);
}

/**
 * Sleep helper
 */
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

/**
 * Main scraping function
 */
async function main() {
    console.log('=== Scitek Product Scraper ===\n');

    // Step 1: Read Excel
    console.log('Step 1: Reading Excel file...');
    const products = readExcel();
    console.log(`  Found ${products.length} products\n`);

    // Step 2: Scrape each product page
    console.log('Step 2: Scraping Scitek product pages...\n');

    let successCount = 0;
    let failCount = 0;
    let imageDownloadCount = 0;

    for (let i = 0; i < products.length; i++) {
        const product = products[i];
        const progress = `[${i + 1}/${products.length}]`;

        if (!product.scitekUrl) {
            console.log(`${progress} SKIP (no link): ${product.type}`);
            failCount++;
            continue;
        }

        try {
            console.log(`${progress} Scraping: ${product.type}`);

            const html = await fetchUrl(product.scitekUrl);
            const meta = extractMetaData(html);

            product.imageUrl = meta.imageUrl;
            product.description = meta.description;

            // Download image if found
            if (meta.imageUrl) {
                const ext = path.extname(new URL(meta.imageUrl.startsWith('//') ? 'https:' + meta.imageUrl : meta.imageUrl).pathname) || '.jpg';
                const filename = safeFilename(product.type) + ext;
                product.localImage = filename;

                try {
                    await downloadImage(meta.imageUrl, filename);
                    imageDownloadCount++;
                    console.log(`  ✓ Image downloaded: ${filename}`);
                } catch (imgErr) {
                    console.log(`  ✗ Image download failed: ${imgErr.message}`);
                    product.localImage = null;
                }
            } else {
                console.log(`  ✗ No og:image found`);
            }

            successCount++;

            // Be polite: wait between requests
            await sleep(500);

        } catch (err) {
            console.log(`${progress} ERROR: ${product.type} - ${err.message}`);
            failCount++;
        }
    }

    // Step 3: Save results
    console.log('\n\nStep 3: Saving results...');
    fs.writeFileSync(OUTPUT_JSON, JSON.stringify(products, null, 2), 'utf8');

    console.log(`\n=== SUMMARY ===`);
    console.log(`Total products: ${products.length}`);
    console.log(`Successfully scraped: ${successCount}`);
    console.log(`Failed/skipped: ${failCount}`);
    console.log(`Images downloaded: ${imageDownloadCount}`);
    console.log(`\nOutput: ${OUTPUT_JSON}`);
    console.log(`Images: ${IMAGES_DIR}`);
}

main().catch(err => {
    console.error('Fatal error:', err);
    process.exit(1);
});
