const fs = require('fs');

const curated = JSON.parse(fs.readFileSync('c:/KINGLAB/import-tools/arco-50-final-curated.json', 'utf8'));

// Generate PHP Product Array
const phpProducts = [];
for (const [cat, items] of Object.entries(curated)) {
    items.forEach((item, i) => {
        const id = `arco-${cat}-${i+1}`;
        phpProducts.push({
            id: id,
            category: cat,
            photo: `arco/${item.file}`,
            item_code: item.item_code,
            title: item.title,
            standard: item.standard,
            material: item.material,
            tagline: item.tagline,
            description: item.description,
            highlights: item.highlights,
            specs_table: item.specs_table
        });
    });
}

console.log(`Generated ${phpProducts.length} PHP products.`);

// Now let's format the PHP array string
function formatPhpArray(prods) {
    let out = "$arco_products = array(\n";
    let currentCat = '';
    prods.forEach(p => {
        if (p.category !== currentCat) {
            currentCat = p.category;
            out += `\n    // =========================================================================\n`;
            out += `    // ${currentCat.toUpperCase()} (10 Produk dengan Foto Asli ARCO)\n`;
            out += `    // =========================================================================\n`;
        }
        out += "    array(\n";
        out += `        'id'          => '${p.id}',\n`;
        out += `        'category'    => '${p.category}',\n`;
        out += `        'photo'       => '${p.photo}',\n`;
        out += `        'item_code'   => '${p.item_code}',\n`;
        out += `        'title'       => '${p.title.replace(/'/g, "\\'")}',\n`;
        out += `        'standard'    => '${p.standard.replace(/'/g, "\\'")}',\n`;
        out += `        'material'    => '${p.material.replace(/'/g, "\\'")}',\n`;
        out += `        'tagline'     => '${p.tagline.replace(/'/g, "\\'")}',\n`;
        out += `        'description' => '${p.description.replace(/'/g, "\\'")}',\n`;
        out += `        'highlights'  => array('${p.highlights.map(h => h.replace(/'/g, "\\'")).join("', '")}'),\n`;
        out += `        'specs_table' => '${p.specs_table.replace(/'/g, "\\'")}'\n`;
        out += "    ),\n";
    });
    out += ");\n";
    return out;
}

// Update template-parts/arco-equipment-showcase.php
const phpFilePath = 'c:/KINGLAB/template-parts/arco-equipment-showcase.php';
let phpContent = fs.readFileSync(phpFilePath, 'utf8');

// Replace $arco_products array definition
const arrayStart = phpContent.indexOf('$arco_products = array(');
const arrayEnd = phpContent.indexOf('?>\n\n<div class="arco-showcase-wrapper">');

if (arrayStart !== -1 && arrayEnd !== -1) {
    const formattedPhp = formatPhpArray(phpProducts);
    phpContent = phpContent.substring(0, arrayStart) + formattedPhp + phpContent.substring(arrayEnd);
    console.log('Replaced PHP $arco_products array successfully.');
} else {
    console.error('Could not locate $arco_products in PHP file!');
}

// Also update the card markup in template-parts/arco-equipment-showcase.php to include the visual column
const oldCardMarkup = `                        <article class="arco-product-card" id="<?php echo esc_attr($prod['id']); ?>" data-category="<?php echo esc_attr($prod['category']); ?>">
                            <!-- Card Header Bar -->
                            <div class="arco-card-header-bar">
                                <span class="arco-card-item-code">
                                    <i class="fas fa-barcode"></i> <?php echo esc_html($prod['item_code']); ?>
                                </span>
                                <span class="arco-card-tag <?php echo esc_attr($cat_meta['tag_class']); ?>">
                                    <?php echo esc_html($cat_meta['name']); ?>
                                </span>
                            </div>

                            <!-- Card Body -->
                            <div class="arco-card-body">
                                <div class="arco-card-main-info">
                                    <h3 class="arco-product-title"><?php echo esc_html($prod['title']); ?></h3>
                                    
                                    <div class="arco-product-standard">
                                        <i class="fas fa-certificate"></i>
                                        <span><?php echo esc_html($prod['standard']); ?> • <?php echo esc_html($prod['material']); ?></span>
                                    </div>
                                    
                                    <p class="arco-product-desc"><?php echo esc_html($prod['description']); ?></p>

                                    <!-- Key Spec Highlights -->
                                    <div class="arco-spec-badges">
                                        <?php foreach ($prod['highlights'] as $highlight) : ?>
                                            <span class="arco-spec-badge">
                                                <i class="fas fa-check-circle"></i> <?php echo esc_html($highlight); ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="arco-card-actions">
                                    <a href="<?php echo esc_url($wa_link); ?>" class="arco-btn-wa" target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-whatsapp"></i> Penawaran
                                    </a>

                                    <button type="button" class="arco-btn-spec-modal" 
                                            data-title="<?php echo esc_attr($prod['title']); ?>"
                                            data-code="<?php echo esc_attr($prod['item_code']); ?>"
                                            data-standard="<?php echo esc_attr($prod['standard'] . ' • ' . $prod['material']); ?>"
                                            data-specs="<?php echo esc_attr($prod['specs_table']); ?>"
                                            data-wa="<?php echo esc_attr($wa_link); ?>">
                                        <i class="fas fa-sliders-h"></i> Spesifikasi Teknis
                                    </button>
                                </div>
                            </div>
                        </article>`;

const newCardMarkup = `                        <article class="arco-product-card" id="<?php echo esc_attr($prod['id']); ?>" data-category="<?php echo esc_attr($prod['category']); ?>">
                            <!-- Card Header Bar -->
                            <div class="arco-card-header-bar">
                                <span class="arco-card-item-code">
                                    <i class="fas fa-barcode"></i> <?php echo esc_html($prod['item_code']); ?>
                                </span>
                                <span class="arco-card-tag <?php echo esc_attr($cat_meta['tag_class']); ?>">
                                    <?php echo esc_html($cat_meta['name']); ?>
                                </span>
                            </div>

                            <!-- Card Body with Visual Photo & Info Columns -->
                            <div class="arco-card-body">
                                <!-- Photo Column -->
                                <div class="arco-card-visual-col">
                                    <div class="arco-card-img-frame">
                                        <img src="<?php echo esc_url($theme_uri . '/assets/images/' . $prod['photo']); ?>" 
                                             alt="<?php echo esc_attr($prod['title']); ?>" 
                                             loading="lazy" 
                                             onerror="this.src='<?php echo esc_url($theme_uri . '/assets/images/' . $cat_meta['icon']); ?>';" />
                                    </div>
                                    <span class="arco-img-badge"><i class="fas fa-check-circle"></i> Original ARCO</span>
                                </div>

                                <!-- Info Column -->
                                <div class="arco-card-info-col">
                                    <div class="arco-card-main-info">
                                        <h3 class="arco-product-title"><?php echo esc_html($prod['title']); ?></h3>
                                        
                                        <div class="arco-product-standard">
                                            <i class="fas fa-certificate"></i>
                                            <span><?php echo esc_html($prod['standard']); ?> • <?php echo esc_html($prod['material']); ?></span>
                                        </div>
                                        
                                        <p class="arco-product-desc"><?php echo esc_html($prod['description']); ?></p>

                                        <!-- Key Spec Highlights -->
                                        <div class="arco-spec-badges">
                                            <?php foreach ($prod['highlights'] as $highlight) : ?>
                                                <span class="arco-spec-badge">
                                                    <i class="fas fa-check-circle"></i> <?php echo esc_html($highlight); ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="arco-card-actions">
                                        <a href="<?php echo esc_url($wa_link); ?>" class="arco-btn-wa" target="_blank" rel="noopener noreferrer">
                                            <i class="fab fa-whatsapp"></i> Penawaran
                                        </a>

                                        <button type="button" class="arco-btn-spec-modal" 
                                                data-title="<?php echo esc_attr($prod['title']); ?>"
                                                data-code="<?php echo esc_attr($prod['item_code']); ?>"
                                                data-standard="<?php echo esc_attr($prod['standard'] . ' • ' . $prod['material']); ?>"
                                                data-specs="<?php echo esc_attr($prod['specs_table']); ?>"
                                                data-wa="<?php echo esc_attr($wa_link); ?>">
                                            <i class="fas fa-sliders-h"></i> Spesifikasi Teknis
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </article>`;

if (phpContent.includes('<!-- Card Body -->')) {
    phpContent = phpContent.replace(oldCardMarkup, newCardMarkup);
    console.log('Updated PHP product card markup with photo column.');
}

fs.writeFileSync(phpFilePath, phpContent, 'utf8');
console.log('Saved template-parts/arco-equipment-showcase.php successfully!');

// Now let's generate preview-arco-equipment.html with all 50 products and photos
function generatePreviewHtml(prods) {
    const categories = {
        glassware: { name: 'Glassware', icon: 'cat-glassware.svg', tag_class: 'tag-glassware', desc: 'Diproduksi dari kaca borosilikat 3.3 berstandar ISO 3819, DIN EN ISO 1042, dan ASTM E438 dengan ketahanan termal dan resistensi kimia tinggi.' },
        plasticware: { name: 'Plasticware', icon: 'cat-plasticware.svg', tag_class: 'tag-plasticware', desc: 'Terbuat dari polimer murni bebas kontaminasi, dapat disterilisasi autoklaf pada suhu 121°C, tahan benturan dan bahan kimia agresif.' },
        rubberware: { name: 'Rubberware', icon: 'cat-rubberware.svg', tag_class: 'tag-rubberware', desc: 'Karet alam elastis dan silikon food/medical grade tahan asam basa, memastikan kerapatan vakum dan keselamatan kerja laboratorium.' },
        metalware: { name: 'Metalware', icon: 'cat-metalware.svg', tag_class: 'tag-metalware', desc: 'Konstruksi Stainless Steel 304 dan cast iron die-cast anti karat dengan stabilitas beban tinggi untuk dudukan dan eksperimen lab.' },
        woodenware: { name: 'Woodenware', icon: 'cat-woodenware.svg', tag_class: 'tag-woodenware', desc: 'Kayu keras terawat tahan kelembapan dan sumbat gabus alami Grade A untuk penataan tabung reaksi dan perlengkapan kaca aman.' }
    };

    let html = `<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARCO Scientific® Laboratory Equipment Showcase | PT Kinglab Medika Lestari</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- Kinglab Base Style & ARCO Showcase Style -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/arco-showcase.css">
</head>
<body>

    <!-- Shared Header Placeholder -->
    <div id="header-placeholder"></div>

    <div class="arco-showcase-wrapper">

        <!-- 1. HERO SECTION -->
        <section class="arco-hero-section">
            <div class="arco-container">
                <!-- Breadcrumb -->
                <nav class="arco-breadcrumb" aria-label="Breadcrumb">
                    <a href="preview.html">Home</a>
                    <span class="separator">/</span>
                    <a href="preview-products.html">Products</a>
                    <span class="separator">/</span>
                    <span class="current">ARCO Scientific® Equipment</span>
                </nav>

                <div class="arco-hero-content">
                    <div class="arco-hero-logo">
                        <img src="assets/images/arco-logo.svg" alt="ARCO Scientific Logo" width="340" height="76" loading="eager" />
                    </div>
                    
                    <div class="arco-badge">
                        <i class="fas fa-certificate"></i>
                        <span>Official Distributor Indonesia • PT Kinglab Medika Lestari</span>
                    </div>
                    
                    <h1 class="arco-hero-title">
                        International Standard <span>Laboratory Glassware &amp; Equipment</span>
                    </h1>
                    
                    <p class="arco-hero-desc">
                        Lini produk <strong>ARCO Scientific®</strong> menghadirkan rangkaian perlengkapan laboratorium berstandar internasional (ISO, DIN, ASTM). Mulai dari <em>Glassware</em> kaca borosilikat 3.3 tahan suhu tinggi, <em>Plasticware</em> bebas kontaminasi autoclavable, <em>Rubberware</em> berpresisi kedap udara, <em>Metalware</em> stainless steel tugas berat, hingga <em>Woodenware</em> kayu keras terawat. Didukung jaminan kualitas resmi dan suplai terpercaya dari <strong>PT Kinglab Medika Lestari</strong>.
                    </p>

                    <!-- 4 Value Pillars -->
                    <div class="arco-pillars-grid">
                        <div class="arco-pillar-item">
                            <div class="arco-pillar-icon"><i class="fas fa-flask"></i></div>
                            <h4 class="arco-pillar-title">Kaca Borosilikat 3.3</h4>
                            <p class="arco-pillar-text">Koefisien muai termal rendah 3.3 x 10^-6 K^-1 tahan syok suhu ekstrem dan asam-basa kuat.</p>
                        </div>
                        <div class="arco-pillar-item">
                            <div class="arco-pillar-icon"><i class="fas fa-award"></i></div>
                            <h4 class="arco-pillar-title">Standar ISO / DIN / ASTM</h4>
                            <p class="arco-pillar-text">Tervalidasi standar ketelitian internasional Kelas A dengan batch certificate terpercaya.</p>
                        </div>
                        <div class="arco-pillar-item">
                            <div class="arco-pillar-icon"><i class="fas fa-shield-halved"></i></div>
                            <h4 class="arco-pillar-title">Daya Tahan &amp; Higienis</h4>
                            <p class="arco-pillar-text">Polypropylene autoclavable 121°C dan Stainless Steel 304 anti karat untuk keamanan lab.</p>
                        </div>
                        <div class="arco-pillar-item">
                            <div class="arco-pillar-icon"><i class="fas fa-box-open"></i></div>
                            <h4 class="arco-pillar-title">Stok Lengkap &amp; Siap Kirim</h4>
                            <p class="arco-pillar-text">Jaminan suplai berkelanjutan dengan perlindungan garansi resmi PT Kinglab Medika Lestari.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. CATEGORY VISUAL TILES (Matching User's Reference Banner) -->
        <section class="arco-category-tiles-section">
            <div class="arco-container">
                <div class="arco-tiles-header">
                    <h3>Jelajahi Berdasarkan Kategori Peralatan</h3>
                    <p>Pilih kategori untuk melihat produk unggulan atau unduh katalog lengkap untuk ribuan varian lainnya.</p>
                </div>

                <div class="arco-category-tiles-grid">
                    <a href="#cat-glassware" class="arco-cat-tile" data-cat="glassware">
                        <div class="arco-tile-thumb">
                            <img src="assets/images/cat-glassware.svg" alt="Glassware" width="52" height="52" loading="lazy" />
                        </div>
                        <div class="arco-tile-info">
                            <h4 class="arco-tile-name">Glassware</h4>
                            <span class="arco-tile-count">Koleksi Lengkap di PDF</span>
                        </div>
                    </a>

                    <a href="#cat-plasticware" class="arco-cat-tile" data-cat="plasticware">
                        <div class="arco-tile-thumb">
                            <img src="assets/images/cat-plasticware.svg" alt="Plasticware" width="52" height="52" loading="lazy" />
                        </div>
                        <div class="arco-tile-info">
                            <h4 class="arco-tile-name">Plasticware</h4>
                            <span class="arco-tile-count">Koleksi Lengkap di PDF</span>
                        </div>
                    </a>

                    <a href="#cat-rubberware" class="arco-cat-tile" data-cat="rubberware">
                        <div class="arco-tile-thumb">
                            <img src="assets/images/cat-rubberware.svg" alt="Rubberware" width="52" height="52" loading="lazy" />
                        </div>
                        <div class="arco-tile-info">
                            <h4 class="arco-tile-name">Rubberware</h4>
                            <span class="arco-tile-count">Koleksi Lengkap di PDF</span>
                        </div>
                    </a>

                    <a href="#cat-metalware" class="arco-cat-tile" data-cat="metalware">
                        <div class="arco-tile-thumb">
                            <img src="assets/images/cat-metalware.svg" alt="Metalware" width="52" height="52" loading="lazy" />
                        </div>
                        <div class="arco-tile-info">
                            <h4 class="arco-tile-name">Metalware</h4>
                            <span class="arco-tile-count">Koleksi Lengkap di PDF</span>
                        </div>
                    </a>

                    <a href="#cat-woodenware" class="arco-cat-tile" data-cat="woodenware">
                        <div class="arco-tile-thumb">
                            <img src="assets/images/cat-woodenware.svg" alt="Woodenware" width="52" height="52" loading="lazy" />
                        </div>
                        <div class="arco-tile-info">
                            <h4 class="arco-tile-name">Woodenware</h4>
                            <span class="arco-tile-count">Koleksi Lengkap di PDF</span>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- 3. STICKY FILTER NAVIGATION -->
        <div class="arco-nav-wrapper" id="arco-sticky-nav">
            <div class="arco-container">
                <div class="arco-filter-tabs" role="tablist" aria-label="Filter Kategori ARCO">
                    <button class="arco-filter-btn active" data-filter="all" type="button">
                        <i class="fas fa-th-large"></i> Semua Kategori
                    </button>
                    <button class="arco-filter-btn" data-filter="glassware" type="button">
                        Glassware
                    </button>
                    <button class="arco-filter-btn" data-filter="plasticware" type="button">
                        Plasticware
                    </button>
                    <button class="arco-filter-btn" data-filter="rubberware" type="button">
                        Rubberware
                    </button>
                    <button class="arco-filter-btn" data-filter="metalware" type="button">
                        Metalware
                    </button>
                    <button class="arco-filter-btn" data-filter="woodenware" type="button">
                        Woodenware
                    </button>
                </div>
            </div>
        </div>

        <!-- 4. PRODUCT SHOWCASE SECTION -->
        <section class="arco-showcase-section">
            <div class="arco-container">
`;

    // Loop categories
    for (const [catKey, catMeta] of Object.entries(categories)) {
        const catProds = prods.filter(p => p.category === catKey);

        html += `
                <!-- ======================================================= -->
                <!-- KATEGORI: ${catMeta.name.toUpperCase()} -->
                <!-- ======================================================= -->
                <div class="arco-section-category-header" id="cat-${catKey}" data-category="${catKey}">
                    <h2 class="arco-cat-header-title">
                        ${catMeta.name}
                        <span class="arco-cat-header-badge ${catMeta.tag_class}">Produk Unggulan</span>
                    </h2>
                    <p class="arco-cat-header-desc">${catMeta.desc}</p>
                </div>

                <div class="arco-products-grid" data-category-group="${catKey}">
`;

        catProds.forEach(prod => {
            const waText = encodeURIComponent(`Halo PT Kinglab Medika Lestari, saya tertarik dengan informasi spesifikasi dan penawaran harga produk ARCO: ${prod.title} (Kode: ${prod.item_code}, Kategori: ${catMeta.name}). Mohon bantuan penawaran resminya. Terima kasih.`);
            const waLink = `https://api.whatsapp.com/send/?phone=6281211174724&text=${waText}&type=phone_number&app_absent=0`;

            const highlightsHtml = prod.highlights.map(h => `<span class="arco-spec-badge"><i class="fas fa-check-circle"></i> ${h}</span>`).join('\n                                            ');

            html += `                    <!-- Card: ${prod.title} -->
                    <article class="arco-product-card" id="${prod.id}" data-category="${prod.category}">
                        <div class="arco-card-header-bar">
                            <span class="arco-card-item-code"><i class="fas fa-barcode"></i> ${prod.item_code}</span>
                            <span class="arco-card-tag ${catMeta.tag_class}">${catMeta.name}</span>
                        </div>
                        <div class="arco-card-body">
                            <!-- Visual Photo Column -->
                            <div class="arco-card-visual-col">
                                <div class="arco-card-img-frame">
                                    <img src="assets/images/${prod.photo}" 
                                         alt="${prod.title}" 
                                         loading="eager" 
                                         onerror="this.src='assets/images/${catMeta.icon}';" />
                                </div>
                                <span class="arco-img-badge"><i class="fas fa-check-circle"></i> Original ARCO</span>
                            </div>

                            <!-- Info Column -->
                            <div class="arco-card-info-col">
                                <div class="arco-card-main-info">
                                    <h3 class="arco-product-title">${prod.title}</h3>
                                    <div class="arco-product-standard">
                                        <i class="fas fa-certificate"></i>
                                        <span>${prod.standard} • ${prod.material}</span>
                                    </div>
                                    <p class="arco-product-desc">${prod.description}</p>
                                    <div class="arco-spec-badges">
                                        ${highlightsHtml}
                                    </div>
                                </div>
                                <div class="arco-card-actions">
                                    <a href="${waLink}" class="arco-btn-wa" target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-whatsapp"></i> Penawaran
                                    </a>
                                    <button type="button" class="arco-btn-spec-modal" 
                                            data-title="${prod.title}" 
                                            data-code="${prod.item_code}" 
                                            data-standard="${prod.standard} • ${prod.material}" 
                                            data-specs="${prod.specs_table.replace(/"/g, '&quot;')}" 
                                            data-wa="${waLink}">
                                        <i class="fas fa-sliders-h"></i> Spesifikasi Teknis
                                    </button>
                                </div>
                            </div>
                        </div>
                    </article>\n`;
        });

        html += `                </div>\n`;
    }

    html += `
            </div>
        </section>

        <!-- 5. DOWNLOAD BROCHURE / FULL CATALOG SECTION -->
        <section class="arco-brochure-section" id="arco-brochure-section">
            <div class="arco-container">
                <div class="arco-brochure-grid">
                    <div class="arco-brochure-text">
                        <div class="arco-badge" style="background:rgba(255,255,255,0.15); color:#ffffff; border-color:rgba(255,255,255,0.3);">
                            <i class="fas fa-book-open" style="color:#38bdf8;"></i>
                            <span>E-Katalog Lengkap Resmi</span>
                        </div>
                        <h2>Unduh Brosur &amp; Katalog Lengkap ARCO Scientific®</h2>
                        <p>
                            Rangkaian peralatan laboratorium ARCO mencakup ribuan varian kapasitas, ukuran sambungan asah (ground joints), ketahanan kimia, dan perlengkapan pelengkap. Unduh katalog PDF resmi kami untuk melihat daftar kode SKU lengkap, tabel toleransi metrologi, dan panduan teknis laboratorium.
                        </p>

                        <ul class="arco-brochure-features">
                            <li><i class="fas fa-check-circle"></i> Seluruh Lini Glassware Boro 3.3 (Volumetrik &amp; Destilasi)</li>
                            <li><i class="fas fa-check-circle"></i> Lini Lengkap Plasticware Autoclavable 121°C</li>
                            <li><i class="fas fa-check-circle"></i> Selang Silikon &amp; Karet Lab Tahan Kimia</li>
                            <li><i class="fas fa-check-circle"></i> Peralatan Logam SS 304, Statif, Klem &amp; Jack</li>
                            <li><i class="fas fa-check-circle"></i> Sumbat Gabus Alami Grade A &amp; Rak Tabung Kayu</li>
                            <li><i class="fas fa-check-circle"></i> Tabel Spesifikasi Metrologi &amp; Akurasi ISO / DIN</li>
                        </ul>

                    </div>

                    <div class="arco-brochure-card">
                        <div class="arco-brochure-icon">
                            <i class="fas fa-file-lines fa-file-alt"></i>
                        </div>
                        <h4>Katalog Lengkap ARCO Scientific</h4>
                        <div class="arco-brochure-meta">
                            <span>Format: <strong>PDF Resmi</strong></span> •
                            <span>Bahasa: <strong>Indonesia &amp; English</strong></span>
                        </div>

                        <a href="assets/pdf/BROSUR%20ARCO.pdf" class="arco-btn-download-pdf" download="BROSUR-ARCO-Scientific-Kinglab.pdf" id="arcoDownloadBtn" target="_blank" rel="noopener noreferrer">
                            <i class="fas fa-download"></i> Unduh Katalog PDF
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. KINGLAB DISTRIBUTOR VALUE & ASSURANCE -->
        <section class="arco-support-section">
            <div class="arco-container">
                <div class="arco-section-header">
                    <div class="arco-badge">
                        <i class="fas fa-handshake"></i>
                        <span>Komitmen Kualitas &amp; Layanan</span>
                    </div>
                    <h2 class="arco-section-title">Mengapa Memilih ARCO Melalui PT Kinglab Medika Lestari?</h2>
                    <p class="arco-section-desc">
                        Sebagai penyedia alat kesehatan dan laboratorium tepercaya di Indonesia, kami memastikan setiap produk ARCO yang Anda terima memiliki jaminan keaslian material dan pengemasan ekstra aman:
                    </p>
                </div>

                <div class="arco-support-grid">
                    <div class="arco-support-card">
                        <div class="arco-support-icon"><i class="fas fa-shield-virus"></i></div>
                        <h3 class="arco-support-title">100% Kaca Borosilikat Asli</h3>
                        <p class="arco-support-desc">Jaminan kaca borosilikat 3.3 asli bebas timbal dan tahan ekspansi termal tiba-tiba tanpa risiko retak getas.</p>
                    </div>
                    <div class="arco-support-card">
                        <div class="arco-support-icon"><i class="fas fa-truck-fast"></i></div>
                        <h3 class="arco-support-title">Pengemasan Ekstra Aman</h3>
                        <p class="arco-support-desc">Standar packing berlapis bubble wrap tebal dan peti kayu untuk pengiriman peralatan gelas ke seluruh penjuru Indonesia.</p>
                    </div>
                    <div class="arco-support-card">
                        <div class="arco-support-icon"><i class="fas fa-file-invoice"></i></div>
                        <h3 class="arco-support-title">Faktur Pajak &amp; Legalitas Resmi</h3>
                        <p class="arco-support-desc">Kelengkapan dokumen resmi untuk pengadaan instansi pemerintah, BUMN, universitas, dan laboratorium swasta.</p>
                    </div>
                    <div class="arco-support-card">
                        <div class="arco-support-icon"><i class="fas fa-headset"></i></div>
                        <h3 class="arco-support-title">Konsultasi Teknis Responsif</h3>
                        <p class="arco-support-desc">Tim spesialis produk kami siap membantu pemilihan spesifikasi ukuran peralatan yang paling sesuai kebutuhan riset Anda.</p>
                    </div>
                </div>

                <!-- Bottom CTA Banner -->
                <div class="arco-cta-banner">
                    <h3 class="arco-cta-title">Butuh Pengadaan Peralatan Laboratorium ARCO Skala Besar?</h3>
                    <p class="arco-cta-desc">
                        Diskusikan daftar kebutuhan alat gelas dan peralatan lab Anda bersama konsultan produk PT Kinglab Medika Lestari. Dapatkan penawaran harga kompetitif, potongan kuantitas, dan surat dukungan tender resmi.
                    </p>
                    <div class="arco-cta-btns">
                        <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20kami%20ingin%20konsultasi%20dan%20penawaran%20pengadaan%20peralatan%20laboratorium%20ARCO%20Scientific%20untuk%20fasilitas%20kami.&type=phone_number&app_absent=0" class="arco-cta-btn-wa" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-whatsapp"></i> Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- 7. INTERACTIVE SPECIFICATION MODAL -->
    <div class="arco-modal-overlay" id="arcoSpecModal" role="dialog" aria-modal="true" aria-hidden="true">
        <div class="arco-modal-container">
            <button type="button" class="arco-modal-close" id="arcoModalClose" aria-label="Tutup Dialog">
                <i class="fas fa-times"></i>
            </button>
            <div class="arco-modal-header">
                <h3 class="arco-modal-title" id="arcoModalTitle">Spesifikasi Teknis</h3>
                <p class="arco-modal-subtitle" id="arcoModalSubtitle"></p>
            </div>
            <div class="arco-modal-content">
                <table class="arco-modal-specs-table">
                    <tbody id="arcoModalTableBody">
                    </tbody>
                </table>
            </div>
            <div style="margin-top:24px; padding-top:16px; border-top:1px solid #e2e8f0; display:flex; justify-content:flex-end; gap:12px;">
                <a href="#" class="arco-btn-wa" id="arcoModalWaBtn" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-whatsapp"></i> Penawaran
                </a>
            </div>
        </div>
    </div>

    <!-- Shared Footer Placeholder -->
    <div id="footer-placeholder"></div>

    <!-- Scripts -->
    <script src="assets/js/theme-components.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // 1. Category Filtering
        var filterBtns = document.querySelectorAll('.arco-filter-btn');
        var catHeaders = document.querySelectorAll('.arco-section-category-header');
        var catGroups = document.querySelectorAll('.arco-products-grid');
        var catTiles = document.querySelectorAll('.arco-cat-tile');

        function applyFilter(filter) {
            filterBtns.forEach(function(b) {
                if (b.getAttribute('data-filter') === filter) {
                    b.classList.add('active');
                } else {
                    b.classList.remove('active');
                }
            });

            catTiles.forEach(function(tile) {
                if (tile.getAttribute('data-cat') === filter) {
                    tile.classList.add('active');
                } else {
                    tile.classList.remove('active');
                }
            });

            catHeaders.forEach(function(header) {
                var cat = header.getAttribute('data-category');
                if (filter === 'all' || cat === filter) {
                    header.style.display = 'flex';
                } else {
                    header.style.display = 'none';
                }
            });

            catGroups.forEach(function(group) {
                var cat = group.getAttribute('data-category-group');
                if (filter === 'all' || cat === filter) {
                    group.style.display = 'grid';
                } else {
                    group.style.display = 'none';
                }
            });
        }

        filterBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var filter = this.getAttribute('data-filter');
                applyFilter(filter);
            });
        });

        // 2. Category Tile Smooth Jump
        catTiles.forEach(function(tile) {
            tile.addEventListener('click', function(e) {
                var targetId = this.getAttribute('href');
                applyFilter('all');
                if (targetId && targetId.indexOf('#') === 0) {
                    var targetElem = document.querySelector(targetId);
                    if (targetElem) {
                        e.preventDefault();
                        targetElem.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
            });
        });

        // 3. Technical Specs Modal
        var modal = document.getElementById('arcoSpecModal');
        var modalClose = document.getElementById('arcoModalClose');
        var modalTitle = document.getElementById('arcoModalTitle');
        var modalSubtitle = document.getElementById('arcoModalSubtitle');
        var modalTableBody = document.getElementById('arcoModalTableBody');
        var modalWaBtn = document.getElementById('arcoModalWaBtn');
        var specBtns = document.querySelectorAll('.arco-btn-spec-modal[data-specs]');

        function closeModal() {
            modal.classList.remove('active');
            modal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }

        specBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var title = this.getAttribute('data-title');
                var code = this.getAttribute('data-code');
                var standard = this.getAttribute('data-standard');
                var specs = this.getAttribute('data-specs');
                var waLink = this.getAttribute('data-wa');

                modalTitle.textContent = title + ' (' + code + ')';
                modalSubtitle.textContent = standard;
                modalTableBody.innerHTML = specs;
                modalWaBtn.setAttribute('href', waLink);

                modal.classList.add('active');
                modal.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
            });
        });

        if (modalClose) {
            modalClose.addEventListener('click', closeModal);
        }

        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                closeModal();
            }
        });
    });
    </script>
</body>
</html>
`;
    return html;
}

const previewFilePath = 'c:/KINGLAB/preview-arco-equipment.html';
fs.writeFileSync(previewFilePath, generatePreviewHtml(phpProducts), 'utf8');
console.log('Saved preview-arco-equipment.html with real product photos!');
