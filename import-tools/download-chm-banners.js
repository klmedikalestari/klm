const https = require('https');
const fs = require('fs');
const path = require('path');

const targetDir = 'assets/images/chm';
if (!fs.existsSync(targetDir)) {
  fs.mkdirSync(targetDir, { recursive: true });
}

function downloadFile(url, dest) {
  return new Promise((resolve, reject) => {
    https.get(url, {
      headers: {
        'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
      }
    }, (res) => {
      if (res.statusCode >= 300 && res.statusCode < 400 && res.headers.location) {
        let redirectUrl = res.headers.location;
        if (!redirectUrl.startsWith('http')) {
          redirectUrl = 'https://www.chmlab.com' + redirectUrl;
        }
        return resolve(downloadFile(redirectUrl, dest));
      }
      if (res.statusCode !== 200) {
        return reject(new Error(`Failed to download ${url}: status ${res.statusCode}`));
      }
      const fileStream = fs.createWriteStream(dest);
      res.pipe(fileStream);
      fileStream.on('finish', () => {
        fileStream.close();
        resolve(dest);
      });
      fileStream.on('error', reject);
    }).on('error', reject);
  });
}

const items = [
  { url: 'https://www.chmlab.com/files/products/categorias/1101/filtration_quantitative_filter_paper.jpg', file: 'assets/images/chm/prod-quantitative.jpg' },
  { url: 'https://www.chmlab.com/files/products/categorias/1104/glass_microfiber_filters.jpg', file: 'assets/images/chm/prod-glass-microfiber.jpg' },
  { url: 'https://www.chmlab.com/files/products/categorias/1111/membrane_filters.jpg', file: 'assets/images/chm/prod-membrane-filters.jpg' },
  { url: 'https://www.chmlab.com/files/products/categorias/1112/syringe_filters.jpg', file: 'assets/images/chm/prod-syringe-filters.jpg' },
  { url: 'https://www.chmlab.com/files/products/categorias/1121/lens_cleaning_tissue.jpg', file: 'assets/images/chm/prod-lens-cleaning.jpg' },
  { url: 'https://www.chmlab.com/files/products/categorias/1118/specimen_collection_cards.jpg', file: 'assets/images/chm/prod-dbs-cards.jpg' },
  { url: 'https://www.chmlab.com/files/products/categorias/1132/hplc_columns.jpg', file: 'assets/images/chm/prod-hplc-columns.jpg' },
  { url: 'https://www.chmlab.com/files/products/categorias/1134/vials_caps_septa.jpg', file: 'assets/images/chm/prod-vials-septa.jpg' },
  { url: 'https://www.chmlab.com/files/products/categorias/1139/plain_filter_paper.jpg', file: 'assets/images/chm/prod-plain-filter.jpg' }
];

async function run() {
  for (const item of items) {
    try {
      console.log('Downloading', item.url, '->', item.file);
      await downloadFile(item.url, item.file);
      console.log('OK:', item.file);
    } catch (e) {
      console.warn('Warning:', e.message);
    }
  }
}

run();
