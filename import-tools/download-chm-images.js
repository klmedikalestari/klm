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

const imagesToDownload = [
  { url: 'https://www.chmlab.com/img/logo.png', file: 'assets/images/chm/chm-logo.png' },
  { url: 'https://www.chmlab.com/img/logo-white.png', file: 'assets/images/chm/chm-logo-white.png' },
  { url: 'https://www.chmlab.com/img/logo-ISO-white.png', file: 'assets/images/chm/chm-iso.png' },
  { url: 'https://www.chmlab.com/files/products/familias/1001/filtration.jpg', file: 'assets/images/chm/cat-filtration.jpg' },
  { url: 'https://www.chmlab.com/files/products/familias/1002/microfiltration.jpg', file: 'assets/images/chm/cat-microfiltration.jpg' },
  { url: 'https://www.chmlab.com/files/products/familias/1003/specialities.jpg', file: 'assets/images/chm/cat-specialities.jpg' },
  { url: 'https://www.chmlab.com/files/products/familias/1004/1667160830cromatography.jpg', file: 'assets/images/chm/cat-chromatography.jpg' },
  { url: 'https://www.chmlab.com/files/products/familias/1005/industrialfiltration.jpg', file: 'assets/images/chm/cat-industrial-filtration.jpg' },
  { url: 'https://www.chmlab.com/files/products/familias/1006/capsulefilters.jpg', file: 'assets/images/chm/cat-capsule-filters.jpg' },
  // Product images if available
  { url: 'https://www.chmlab.com/files/products/familias/1001/filtration_1.jpg', file: 'assets/images/chm/filtration-1.jpg' },
  { url: 'https://www.chmlab.com/files/products/familias/1002/microfiltration_1.jpg', file: 'assets/images/chm/microfiltration-1.jpg' },
  { url: 'https://www.chmlab.com/files/products/familias/1003/specialities_1.jpg', file: 'assets/images/chm/specialities-1.jpg' }
];

async function run() {
  for (const item of imagesToDownload) {
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
