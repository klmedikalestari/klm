/**
 * Fix missing images by:
 * 1. Sharing images between duplicate products (same URL)
 * 2. Sharing images between similar products (same namaBarang)
 */
const fs = require('fs');
const path = require('path');

const OUTPUT_JSON = path.join(__dirname, 'products-data.json');
const IMAGES_DIR = path.join(__dirname, 'images');

const products = JSON.parse(fs.readFileSync(OUTPUT_JSON, 'utf8'));

let fixed = 0;

// Step 1: For products with same scitekUrl, share images
const urlToImage = {};
products.forEach(p => {
    if (p.localImage && fs.existsSync(path.join(IMAGES_DIR, p.localImage)) && p.scitekUrl) {
        urlToImage[p.scitekUrl] = p.localImage;
    }
});

products.forEach(p => {
    if (!p.localImage || !fs.existsSync(path.join(IMAGES_DIR, p.localImage))) {
        if (p.scitekUrl && urlToImage[p.scitekUrl]) {
            p.localImage = urlToImage[p.scitekUrl];
            console.log(`[URL match] ${p.type} → ${p.localImage}`);
            fixed++;
        }
    }
});

// Step 2: For remaining missing, try to match by namaBarang
const categoryImages = {};
products.forEach(p => {
    if (p.localImage && fs.existsSync(path.join(IMAGES_DIR, p.localImage)) && p.namaBarang) {
        if (!categoryImages[p.namaBarang]) {
            categoryImages[p.namaBarang] = p.localImage;
        }
    }
});

products.forEach(p => {
    if (!p.localImage || !fs.existsSync(path.join(IMAGES_DIR, p.localImage))) {
        if (p.namaBarang && categoryImages[p.namaBarang]) {
            p.localImage = categoryImages[p.namaBarang];
            console.log(`[Category match] ${p.type} → ${p.localImage} (from ${p.namaBarang})`);
            fixed++;
        }
    }
});

// Save
fs.writeFileSync(OUTPUT_JSON, JSON.stringify(products, null, 2), 'utf8');

const totalWithImages = products.filter(p => p.localImage && fs.existsSync(path.join(IMAGES_DIR, p.localImage))).length;
const stillMissing = products.filter(p => !p.localImage || !fs.existsSync(path.join(IMAGES_DIR, p.localImage)));

console.log(`\n=== FIX SUMMARY ===`);
console.log(`Fixed by sharing: ${fixed}`);
console.log(`FINAL: ${totalWithImages}/${products.length} products have images`);
console.log(`Still missing: ${stillMissing.length}`);

if (stillMissing.length > 0) {
    console.log('\nStill missing images:');
    stillMissing.forEach(p => console.log(`  - [${p.namaBarang}] ${p.type}`));
}
