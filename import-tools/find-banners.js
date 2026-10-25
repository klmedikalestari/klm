const fs = require('fs');

const files = fs.readdirSync('import-tools').filter(f => f.startsWith('shop-') && f.endsWith('.html'));

const banners = [];

files.forEach(f => {
  const html = fs.readFileSync('import-tools/' + f, 'utf8');
  const matches = [...html.matchAll(/style=["']background-image:\s*url\(['"]([^'"]+)['"]\)/gi)];
  matches.forEach(m => {
    const url = m[1];
    if (!banners.includes(url)) banners.push(url);
  });
});

console.log('Found category banners:', banners.length);
banners.forEach(b => console.log('Banner:', b));
