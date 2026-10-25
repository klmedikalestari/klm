const fs = require('fs');

const groups = ['filtration', 'microfiltration', 'specialties', 'chromatography', 'industrial-filtration', 'capsule-filters'];

const result = {};

groups.forEach(g => {
  const file = 'import-tools/chm-' + g + '.html';
  if (!fs.existsSync(file)) return;
  const html = fs.readFileSync(file, 'utf8');

  const regex = /href=["'](https:\/\/www\.chmlab\.com\/shop\/[^"']+)["'][^>]*><span>([^<]+)<\/span>/gi;
  let m;
  const subs = [];
  while ((m = regex.exec(html)) !== null) {
    subs.push({ name: m[2].trim(), url: m[1] });
  }

  const descMatch = html.match(/class=["']content-description[^"']*["']>([\s\S]*?)<\/div>/i);
  const desc = descMatch ? descMatch[1].replace(/<[^>]+>/g, '').trim() : '';

  result[g] = {
    desc,
    subs
  };

  console.log('GROUP:', g, 'Subs count:', subs.length);
  subs.forEach(s => console.log('  -', s.name, '->', s.url));
  console.log('  Desc snippet:', desc.substring(0, 100));
  console.log('--------------------------------------------');
});

fs.writeFileSync('import-tools/chm-subcategories.json', JSON.stringify(result, null, 2), 'utf8');
