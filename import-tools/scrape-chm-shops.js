const https = require('https');
const fs = require('fs');

function fetchUrl(url) {
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
        return resolve(fetchUrl(redirectUrl));
      }
      let body = '';
      res.on('data', chunk => body += chunk);
      res.on('end', () => resolve(body));
    }).on('error', reject);
  });
}

const shopPages = [
  'https://www.chmlab.com/shop/filtration/quantitative-filter-paper',
  'https://www.chmlab.com/shop/filtration/qualitative-filter-paper',
  'https://www.chmlab.com/shop/filtration/glass-microfiber-filters',
  'https://www.chmlab.com/shop/microfiltration/membrane-filters',
  'https://www.chmlab.com/shop/microfiltration/syringe-filters',
  'https://www.chmlab.com/shop/specialties/lens-cleaning-tissue',
  'https://www.chmlab.com/shop/specialties/specimen-collection-cards',
  'https://www.chmlab.com/shop/chromatography/hplc-columns',
  'https://www.chmlab.com/shop/chromatography/vials-caps-and-septa',
  'https://www.chmlab.com/shop/industrial-filtration/plain-filter-paper',
  'https://www.chmlab.com/shop/product/tri-clamp-capsule-filter-capfil'
];

async function run() {
  for (const u of shopPages) {
    try {
      console.log('Fetching', u);
      const html = await fetchUrl(u);
      const name = u.split('/').pop();
      fs.writeFileSync(`import-tools/shop-${name}.html`, html, 'utf8');
      
      // Look for product images
      const imgMatches = [...html.matchAll(/src=["'](https:\/\/www\.chmlab\.com\/files\/products\/[^"']+)["']/gi)];
      console.log(`Page ${name}: found ${imgMatches.length} product images`);
      imgMatches.slice(0, 5).forEach(m => console.log('   Image:', m[1]));
    } catch (e) {
      console.error(e.message);
    }
  }
}

run();
