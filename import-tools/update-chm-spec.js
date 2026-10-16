const fs = require('fs');

const data = fs.readFileSync('chm-products-data.json', 'utf8');
let products = JSON.parse(data);

function getSpecHtml(rows) {
    let html = '<table class="spec-table" style="width:100%; border-collapse:collapse;">\n<tbody>\n';
    html += '<tr style="background:#f5f7fa;"><th style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Grade</th><th style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Filtration Speed</th><th style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Weight (g/m²)</th><th style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Thickness (µm)</th><th style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Retention Range (µm)</th><th style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Ash Content (%)</th></tr>\n';
    rows.forEach((row, i) => {
        let bg = (i % 2 === 0) ? ' style="background:#f5f7fa;"' : '';
        html += `<tr${bg}>`;
        row.forEach(col => {
            html += `<td style="padding:10px 15px; border:1px solid #e0e0e0;">${col}</td>`;
        });
        html += '</tr>\n';
    });
    html += '</tbody>\n</table>';
    return html;
}

// 1. Ashless Filter Paper for Quantitative Analysis
products[0].specification = getSpecHtml([
    ['F2045', 'Very Fast', '85', '210', '25-30', '&lt;0.007'],
    ['F2041', 'Fast', '85', '190', '20-25', '&lt;0.007'],
    ['F2043', 'Medium', '85', '180', '14-17', '&lt;0.007'],
    ['F2040', 'Medium-Slow', '85', '170', '7-9', '&lt;0.007'],
    ['F2044', 'Slow', '85', '160', '2-4', '&lt;0.007'],
    ['F2042', 'Very Slow', '100', '160', '2-3', '&lt;0.007']
]);

// 2. Ashless Hardened Filter Paper for Quantitative Analysis
products[1].specification = getSpecHtml([
    ['F2141', 'Fast', '84', '170', '20-25', '&lt;0.006'],
    ['F2140', 'Medium', '84', '160', '7-12', '&lt;0.006'],
    ['F2142', 'Slow', '95', '150', '2-4', '&lt;0.006']
]);

// 3. Hardened Low Ash Filter Paper for Quantitative Analysis
products[2].specification = getSpecHtml([
    ['F2054', 'Fast', '90', '200', '20-25', '&lt;0.015'],
    ['F2052', 'Medium-Fast', '90', '190', '7-8', '&lt;0.015'],
    ['F2050', 'Slow', '90', '180', '2-3', '&lt;0.015']
]);

// 4. Ashless Hardened Filter Paper for Qualitative Analysis
products[3].specification = getSpecHtml([
    ['F1004', 'Very fast', '84', '190-230', '12-15', '&lt;0.06'],
    ['F1007', 'Fast', '84', '190-230', '8-12', '&lt;0.06'],
    ['F1001', 'Medium', '84', '160-190', '7-11', '&lt;0.06'],
    ['F1002', 'Medium-Slow', '97', '190', '5-8', '&lt;0.06'],
    ['F1003', 'Medium-Slow/Thick', '200', '320', '5-7', '&lt;0.06'],
    ['F1006', 'Slow', '84', '140-160', '3-5', '&lt;0.06'],
    ['F1005', 'Very Slow', '80', '170', '1-2', '&lt;0.06']
]);

// 5. General-Purpose Qualitative Filter Paper
products[4].specification = getSpecHtml([
    ['F1093', 'Very Fast', '80', '170', '43-48', '&lt;0.1'],
    ['F1094', 'Very Fast', '65', '145', '6-9', '&lt;0.1'],
    ['F1113', 'Extra-Fast/Thick', '160', '470', '60-68', '&lt;0.1'],
    ['F1091', 'Very Fast/Crêped', '65', '160', '34-42', '&lt;0.1'],
    ['F1096', 'Medium-Fast', '85', '180', '14-22', '&lt;0.1'],
    ['F1095', 'Fast/Crêped', '90', '330', '26-34', '&lt;0.1']
]);

fs.writeFileSync('chm-products-data.json', JSON.stringify(products, null, 2), 'utf8');
