const https = require('https');
const fs = require('fs');
const path = require('path');

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

const groups = [
  { slug: 'filtration', name: 'Filtration', color: '#e53935', img: 'https://www.chmlab.com/files/products/familias/1001/filtration.jpg' },
  { slug: 'microfiltration', name: 'Microfiltration', color: '#fb8c00', img: 'https://www.chmlab.com/files/products/familias/1002/microfiltration.jpg' },
  { slug: 'specialties', name: 'Specialities', color: '#fbc02d', img: 'https://www.chmlab.com/files/products/familias/1003/specialities.jpg' },
  { slug: 'chromatography', name: 'Chromatography', color: '#43a047', img: 'https://www.chmlab.com/files/products/familias/1004/1667160830cromatography.jpg' },
  { slug: 'industrial-filtration', name: 'Industrial Filtration', color: '#00acc1', img: 'https://www.chmlab.com/files/products/familias/1005/industrialfiltration.jpg' },
  { slug: 'capsule-filters', name: 'Capsule Filters', color: '#039be5', img: 'https://www.chmlab.com/files/products/familias/1006/capsulefilters.jpg' }
];

async function run() {
  const allData = [];

  for (const g of groups) {
    const url = 'https://www.chmlab.com/groups/' + g.slug;
    console.log('Fetching', url, '...');
    try {
      const html = await fetchUrl(url);
      fs.writeFileSync(`import-tools/chm-${g.slug}.html`, html, 'utf8');

      // Extract subfamilies/products
      // Pattern: <a href="https://www.chmlab.com/subfamilies/..." or /products/...
      const subRegex = /<a[^>]+href=["'](https:\/\/www\.chmlab\.com\/(?:subfamilies|categories|products)\/[^"']+)["'][^>]*>([\s\S]*?)<\/a>/gi;
      let m;
      const subLinks = [];
      while ((m = subRegex.exec(html)) !== null) {
        const link = m[1];
        const text = m[2].replace(/<[^>]+>/g, '').trim();
        if (text && !subLinks.some(s => s.link === link)) {
          subLinks.push({ link, text });
        }
      }

      // Also extract images in this page
      const imgRegex = /<img[^>]+src=["']([^"']+)["'][^>]*>/gi;
      let im;
      const images = [];
      while ((im = imgRegex.exec(html)) !== null) {
        const isrc = im[1];
        if (isrc.includes('/files/products/') || isrc.includes('subfamilias') || isrc.includes('categorias')) {
          if (!images.includes(isrc)) images.push(isrc);
        }
      }

      allData.push({
        group: g,
        subLinks,
        images
      });

      console.log(`Group ${g.name}: found ${subLinks.length} sublinks, ${images.length} product images`);
    } catch (err) {
      console.error('Error fetching', url, err.message);
    }
  }

  fs.writeFileSync('import-tools/chm-groups-extracted.json', JSON.stringify(allData, null, 2), 'utf8');
  console.log('Saved chm-groups-extracted.json');
}

run();
