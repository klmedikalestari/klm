const https = require('https');
const fs = require('fs');

function fetchUrl(url) {
  return new Promise((resolve, reject) => {
    https.get(url, {
      headers: {
        'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
      }
    }, (res) => {
      if (res.statusCode >= 300 && res.statusCode < 400 && res.headers.location) {
        let redirectUrl = res.headers.location;
        if (!redirectUrl.startsWith('http')) {
          redirectUrl = 'https://www.chmlab.com' + redirectUrl;
        }
        return resolve(fetchUrl(redirectUrl));
      }
      let body = '';
      res.on('data', chunk => body += chunk);
      res.on('end', () => resolve(body));
    }).on('error', reject);
  });
}

async function run() {
  console.log('Fetching https://www.chmlab.com/ ...');
  const home = await fetchUrl('https://www.chmlab.com/');
  fs.writeFileSync('import-tools/chm-home.html', home, 'utf8');
  console.log('Saved home.html, size:', home.length);

  // Look for the 6 category blocks
  const groupRegex = /groups\/([a-zA-Z0-9-]+)/g;
  let match;
  const groups = new Set();
  while ((match = groupRegex.exec(home)) !== null) {
    groups.add(match[1]);
  }
  console.log('Detected groups:', Array.from(groups));

  // Extract images and cards on homepage
  const imgMatches = [...home.matchAll(/<img[^>]+src=["']([^"']+)["'][^>]*>/gi)];
  console.log('Total images found:', imgMatches.length);
  const relevantImgs = imgMatches.map(m => m[1]).filter(src => src.includes('group') || src.includes('product') || src.includes('home') || src.includes('img'));
  console.log('Sample images:', relevantImgs.slice(0, 20));
}

run().catch(console.error);
