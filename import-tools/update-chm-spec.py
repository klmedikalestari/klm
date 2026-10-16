import json

with open('c:/KINGLAB/import-tools/chm-products-data.json', 'r') as f:
    products = json.load(f)

# Define the HTML template for the table
def get_spec_html(rows):
    html = '<table class="spec-table" style="width:100%; border-collapse:collapse;">\n<tbody>\n'
    html += '<tr style="background:#f5f7fa;"><th style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Grade</th><th style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Filtration Speed</th><th style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Weight (g/m²)</th><th style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Thickness (µm)</th><th style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Retention Range (µm)</th><th style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Ash Content (%)</th></tr>\n'
    for i, row in enumerate(rows):
        bg = ' style="background:#f5f7fa;"' if i % 2 == 0 else ''
        html += f'<tr{bg}>'
        for col in row:
            html += f'<td style="padding:10px 15px; border:1px solid #e0e0e0;">{col}</td>'
        html += '</tr>\n'
    html += '</tbody>\n</table>'
    return html

# 1. Ashless Filter Paper for Quantitative Analysis
products[0]['specification'] = get_spec_html([
    ['F2045', 'Very Fast', '85', '210', '25-30', '<0.007'],
    ['F2041', 'Fast', '85', '190', '20-25', '<0.007'],
    ['F2043', 'Medium', '85', '180', '14-17', '<0.007'],
    ['F2040', 'Medium-Slow', '85', '170', '7-9', '<0.007'],
    ['F2044', 'Slow', '85', '160', '2-4', '<0.007'],
    ['F2042', 'Very Slow', '100', '160', '2-3', '<0.007']
])

# 2. Ashless Hardened Filter Paper for Quantitative Analysis
products[1]['specification'] = get_spec_html([
    ['F2141', 'Fast', '84', '170', '20-25', '<0.006'],
    ['F2140', 'Medium', '84', '160', '7-12', '<0.006'],
    ['F2142', 'Slow', '95', '150', '2-4', '<0.006']
])

# 3. Hardened Low Ash Filter Paper for Quantitative Analysis
products[2]['specification'] = get_spec_html([
    ['F2054', 'Fast', '90', '200', '20-25', '<0.015'],
    ['F2052', 'Medium-Fast', '90', '190', '7-8', '<0.015'],
    ['F2050', 'Slow', '90', '180', '2-3', '<0.015']
])

# 4. Ashless Hardened Filter Paper for Qualitative Analysis
products[3]['specification'] = get_spec_html([
    ['F1004', 'Very fast', '84', '190-230', '12-15', '<0.06'],
    ['F1007', 'Fast', '84', '190-230', '8-12', '<0.06'],
    ['F1001', 'Medium', '84', '160-190', '7-11', '<0.06'],
    ['F1002', 'Medium-Slow', '97', '190', '5-8', '<0.06'],
    ['F1003', 'Medium-Slow/Thick', '200', '320', '5-7', '<0.06'],
    ['F1006', 'Slow', '84', '140-160', '3-5', '<0.06'],
    ['F1005', 'Very Slow', '80', '170', '1-2', '<0.06']
])

# 5. General-Purpose Qualitative Filter Paper
products[4]['specification'] = get_spec_html([
    ['F1093', 'Very Fast', '80', '170', '43-48', '<0.1'],
    ['F1094', 'Very Fast', '65', '145', '6-9', '<0.1'],
    ['F1113', 'Extra-Fast/Thick', '160', '470', '60-68', '<0.1'],
    ['F1091', 'Very Fast/Crêped', '65', '160', '34-42', '<0.1'],
    ['F1096', 'Medium-Fast', '85', '180', '14-22', '<0.1'],
    ['F1095', 'Fast/Crêped', '90', '330', '26-34', '<0.1']
])

with open('c:/KINGLAB/import-tools/chm-products-data.json', 'w', encoding='utf-8') as f:
    json.dump(products, f, indent=2, ensure_ascii=False)
