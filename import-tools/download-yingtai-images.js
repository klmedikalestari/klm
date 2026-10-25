const https = require('https');
const fs = require('fs');
const path = require('path');

const targetDir = path.join(__dirname, '../assets/images/yingtai');
if (!fs.existsSync(targetDir)) {
    fs.mkdirSync(targetDir, { recursive: true });
}

const items = [
    { name: 'cdl7m.png', url: 'https://iororwxhqkmrlo5p.ldycdn.com/cloud/lmBplKiolqSRrjiiprqpio/CDL7M-640-640.png' },
    { name: 'gl10.png', url: 'https://iororwxhqkmrlo5p.ldycdn.com/cloud/lqBplKiolqSRrjiimrjrin/GL10-640-640.png' },
    { name: 'tdl5m.png', url: 'https://iororwxhqkmrlo5p.ldycdn.com/cloud/liBplKiolqSRrjiimrljio/TDL5M-640-640.png' },
    { name: 'tgl16.png', url: 'https://iororwxhqkmrlo5p.ldycdn.com/cloud/lkBplKiolqSRrjiimrojio/TGL16-640-640.png' },
    { name: 'td5.png', url: 'https://iororwxhqkmrlo5p.ldycdn.com/cloud/llBplKiolqSRrjiimrokio/TD5-640-640.png' },
    { name: 'tg16.png', url: 'https://iororwxhqkmrlo5p.ldycdn.com/cloud/loBplKiolqSRrjiimrpkio/TG16-640-640.png' },
    { name: 'tg20.png', url: 'https://iororwxhqkmrlo5p.ldycdn.com/cloud/lmBplKiolqSRrjiimrrlin/TG20-640-640.png' },
    { name: 'td4a.png', url: 'https://iororwxhqkmrlo5p.ldycdn.com/cloud/liBplKiolqSRrjiimrjlio/TD4A-640-640.png' },
    { name: 'txk4.png', url: 'https://iororwxhqkmrlo5p.ldycdn.com/cloud/lpBplKiolqSRklmornmriq/TXK4-guanmen-640-640.png' },
    { name: 'dl8m.png', url: 'https://iororwxhqkmrlo5p.ldycdn.com/cloud/lnBplKiolqSRjljprpkoiq/zhengmiankaimen-640-640.png' },
    { name: 'gl21m.jpg', url: 'https://iororwxhqkmrlo5p.ldycdn.com/cloud/lpBplKiolqSRrjlilpioio/GL21M-640-640.jpg' },
    { name: 'gl25m.jpg', url: 'https://iororwxhqkmrlo5p.ldycdn.com/cloud/lkBplKiolqSRilkirnmpiq/59260629597201c3ab1c6ce51ded731-640-640.jpg' },
    { name: 'gl12.png', url: 'https://iororwxhqkmrlo5p.ldycdn.com/cloud/lqBplKiolqSRqkkjopjliq/GL12-640-640.png' },
    { name: 'td6c.jpg', url: 'https://iororwxhqkmrlo5p.ldycdn.com/cloud/poBplKiolqSRpljjiipliq/weixintupian_20260713165840_1533_58-640-640.jpg' },
    { name: 'tg20b.jpg', url: 'https://iororwxhqkmrlo5p.ldycdn.com/cloud/prBplKiolqSRpllilmlrip/TG20B-640-640.jpg' },
    { name: 'minil12g.jpg', url: 'https://iororwxhqkmrlo5p.ldycdn.com/cloud/llBplKiolqSRrlpnqoooip/daishuxianfuben-640-640.jpg' },
    { name: 'sd33.png', url: 'https://iororwxhqkmrlo5p.ldycdn.com/cloud/ljBplKiolqSRrlnojkrrio/1-640-640.png' }
];

async function download(item) {
    const dest = path.join(targetDir, item.name);
    return new Promise((resolve, reject) => {
        const file = fs.createWriteStream(dest);
        https.get(item.url, { headers: { 'User-Agent': 'Mozilla/5.0' } }, (response) => {
            if (response.statusCode >= 300 && response.statusCode < 400 && response.headers.location) {
                https.get(response.headers.location, (res2) => {
                    res2.pipe(file);
                    file.on('finish', () => { file.close(); resolve(item.name); });
                }).on('error', reject);
            } else if (response.statusCode === 200) {
                response.pipe(file);
                file.on('finish', () => { file.close(); resolve(item.name); });
            } else {
                reject(new Error(`Failed with status ${response.statusCode}`));
            }
        }).on('error', reject);
    });
}

(async () => {
    for (const it of items) {
        try {
            await download(it);
            console.log(`Downloaded ${it.name}`);
        } catch (err) {
            console.error(`Error downloading ${it.name}:`, err.message);
        }
    }
    console.log('All downloads completed!');
})();
