// Test script to check what image patterns exist on Scitek pages
const https = require('https');

function fetchUrl(url) {
    return new Promise((resolve, reject) => {
        https.get(url, {
            headers: {
                'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            }
        }, (res) => {
            let data = '';
            res.on('data', chunk => data += chunk);
            res.on('end', () => resolve(data));
        }).on('error', reject);
    });
}

async function test() {
    // Test a page that failed
    const url = 'https://www.scitekglobal.com/horizontal-pressure-steam-autoclave.html';
    console.log('Fetching:', url);
    const html = await fetchUrl(url);
    console.log('HTML length:', html.length);

    // Pattern 1: og:image with content after
    const p1 = html.match(/property=["']og:image["']\s+content=["']([^"']+)["']/i);
    console.log('\nPattern 1 (property then content):', p1 ? p1[1] : 'NOT FOUND');

    // Pattern 2: content before property
    const p2 = html.match(/content=["']([^"']+)["']\s+property=["']og:image["']/i);
    console.log('Pattern 2 (content then property):', p2 ? p2[1] : 'NOT FOUND');

    // Pattern 3: preload image link
    const p3 = html.match(/href=["']([^"']+)["'][^>]*as=["']image["']/i);
    console.log('Pattern 3 (preload link):', p3 ? p3[1] : 'NOT FOUND');

    // Pattern 4: CDN image URLs
    const p4 = html.match(/(?:https?:)?\/\/[a-z]+\.ldycdn\.com\/cloud\/[^\s"'<>]+\.(?:jpg|png|webp)/gi);
    if (p4) {
        const unique = [...new Set(p4)];
        console.log('\nPattern 4 (CDN images) - found', unique.length, 'unique:');
        unique.slice(0, 15).forEach(u => console.log('  ', u));
    } else {
        console.log('\nPattern 4 (CDN images): NOT FOUND');
    }

    // Pattern 5: data-src images
    const p5 = html.match(/data-src=["']([^"']+\.(?:jpg|png|webp))/gi);
    if (p5) {
        console.log('\nPattern 5 (data-src):', p5.length, 'found');
        p5.slice(0, 5).forEach(u => console.log('  ', u));
    }

    // Pattern 6: og:image anywhere, more flexible
    const p6 = html.match(/og:image["'][^>]*content=["']([^"']+)["']/i);
    console.log('\nPattern 6 (flexible og:image):', p6 ? p6[1] : 'NOT FOUND');

    // Look for the actual meta tag around og:image
    const idx = html.indexOf('og:image');
    if (idx !== -1) {
        console.log('\n=== RAW HTML around og:image ===');
        console.log(html.substring(Math.max(0, idx - 100), idx + 200));
    } else {
        console.log('\n"og:image" string NOT found in HTML at all');
    }
}

test().catch(console.error);
