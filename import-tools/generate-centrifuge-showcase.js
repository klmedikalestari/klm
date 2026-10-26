const fs = require('fs');
const path = require('path');

const data = JSON.parse(fs.readFileSync('c:/KINGLAB/import-tools/yingtai-centrifuge-curated.json', 'utf8'));
const categories = data.categories;
const products = data.products;

// Generate PHP Template
function generatePhpTemplate() {
    let php = `<?php
/**
 * Showcase Template Part for Brand: Yingtai Instrument (Centrifuge)
 * Changsha Yingtai Instrument Co., Ltd (cn-centrifuge.com)
 * 
 * @package Kinglab_Medika_Lestari_Theme
 */

$theme_uri = get_template_directory_uri();
$clean_phone = preg_replace('/[^0-9]/', '', get_theme_mod('contact_whatsapp', '6281211174724'));
if (empty($clean_phone)) {
    $clean_phone = '6281211174724';
}

// Brochure PDF URL (Default brochure or contact if not set)
$brochure_pdf_url = file_exists(get_template_directory() . '/assets/pdf/BROSUR YINGTAI CENTRIFUGE.pdf')
    ? $theme_uri . '/assets/pdf/BROSUR YINGTAI CENTRIFUGE.pdf'
    : 'https://api.whatsapp.com/send/?phone=' . $clean_phone . '&text=' . rawurlencode('Halo PT Kinglab Medika Lestari, saya ingin meminta E-Katalog & Brosur Lengkap Yingtai Centrifuge. Terima kasih.') . '&type=phone_number&app_absent=0';

// Enqueue styles
wp_enqueue_style('yingtai-centrifuge-showcase', $theme_uri . '/assets/css/centrifuge-showcase.css', array('Kinglab_Medika_Lestari-style'), '1.0.0');

// Categories Definition
$yingtai_categories = array(
`;

    for (const [slug, cat] of Object.entries(categories)) {
        php += `    '${slug}' => array(
        'name'        => '${cat.name.replace(/'/g, "\\'")}',
        'short_name'  => '${cat.short_name.replace(/'/g, "\\'")}',
        'tag_class'   => '${cat.tag_class}',
        'icon'        => '${cat.icon}',
        'description' => '${cat.description.replace(/'/g, "\\'")}'
    ),
`;
    }
    php += `);

// 20 Curated Products
$yingtai_products = array(
`;

    let currentCat = '';
    products.forEach(p => {
        if (p.category !== currentCat) {
            currentCat = p.category;
            php += `\n    // -------------------------------------------------------------------------\n`;
            php += `    // Kategori: ${categories[currentCat].name}\n`;
            php += `    // -------------------------------------------------------------------------\n`;
        }
        php += `    array(
        'id'          => '${p.id}',
        'category'    => '${p.category}',
        'photo'       => '${p.photo}',
        'item_code'   => '${p.item_code}',
        'title'       => '${p.title.replace(/'/g, "\\'")}',
        'standard'    => '${p.standard.replace(/'/g, "\\'")}',
        'material'    => '${p.material.replace(/'/g, "\\'")}',
        'tagline'     => '${p.tagline.replace(/'/g, "\\'")}',
        'description' => '${p.description.replace(/'/g, "\\'")}',
        'highlights'  => array('${p.highlights.map(h => h.replace(/'/g, "\\'")).join("', '")}'),
        'specs_table' => '${p.specs_table.replace(/'/g, "\\'")}'
    ),
`;
    });

    php += `);
?>

<div class="yingtai-showcase-wrapper">

    <!-- 1. HERO SECTION -->
    <section class="yingtai-hero-section">
        <div class="yingtai-container">
            <!-- SEO Breadcrumb Schema (JSON-LD) -->
            <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "name": "Home",
                        "item": "<?php echo esc_url(home_url('/')); ?>"
                    },
                    {
                        "@type": "ListItem",
                        "position": 2,
                        "name": "Products",
                        "item": "<?php echo esc_url(home_url('/products/')); ?>"
                    },
                    {
                        "@type": "ListItem",
                        "position": 3,
                        "name": "Yingtai Centrifuge",
                        "item": "<?php echo esc_url(get_permalink()); ?>"
                    }
                ]
            }
            </script>

            <!-- Breadcrumb (Visually hidden for clean UI, preserved in DOM for SEO) -->
            <nav class="yingtai-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="separator">/</span>
                <a href="<?php echo esc_url(home_url('/products/')); ?>">Products</a>
                <span class="separator">/</span>
                <span class="current">Yingtai Centrifuge</span>
            </nav>

            <div class="yingtai-hero-content">
                <div class="yingtai-hero-logo">
                    <img src="<?php echo esc_url($theme_uri . '/assets/images/yingtai-logo.png'); ?>" alt="Yingtai Instrument Logo" width="310" height="78" loading="eager" />
                </div>
                
                <div class="yingtai-badge">
                    <i class="fas fa-certificate"></i>
                    <span>Official Distributor Indonesia • PT Kinglab Medika Lestari</span>
                </div>
                
                <h1 class="yingtai-hero-title">
                    Professional Medical &amp; Laboratory <span>Centrifuge Systems</span>
                </h1>
                
                <p class="yingtai-hero-desc">
                    Rangkaian sentrifus canggih <strong>Changsha Yingtai Instrument Co., Ltd (cn-centrifuge.com)</strong> berstandar medis internasional <strong>CE, ISO 13485 &amp; FDA</strong>. Menghadirkan teknologi motor inverter tanpa sikat (brushless), kendali digital presisi mikrokomputer, kompresor pendingin ramah lingkungan, dan fitur pengamanan otomatis terlengkap. Siap memenuhi kebutuhan bank darah rumah sakit, laboratorium klinis, riset biologi molekuler, dan industri biofarmasi di Indonesia melalui <strong>PT Kinglab Medika Lestari</strong>.
                </p>

                <!-- 4 Value Pillars -->
                <div class="yingtai-pillars-grid">
                    <div class="yingtai-pillar-item">
                        <div class="yingtai-pillar-icon"><i class="fas fa-gauge-high"></i></div>
                        <h4 class="yingtai-pillar-title">Motor Inverter Bebas Karbon</h4>
                        <p class="yingtai-pillar-text">Penggerak frekuensi variabel direct-drive bebas perawatan dengan akselerasi halus &amp; stabil.</p>
                    </div>
                    <div class="yingtai-pillar-item">
                        <div class="yingtai-pillar-icon"><i class="fas fa-snowflake"></i></div>
                        <h4 class="yingtai-pillar-title">Kontrol Suhu Presisi -20°C</h4>
                        <p class="yingtai-pillar-text">Kompresor Eropa bebas CFC menjaga viabilitas sel darah, plasma, protein, dan asam nukleat.</p>
                    </div>
                    <div class="yingtai-pillar-item">
                        <div class="yingtai-pillar-icon"><i class="fas fa-shield-virus"></i></div>
                        <h4 class="yingtai-pillar-title">Sertifikasi Medis ISO 13485 &amp; CE</h4>
                        <p class="yingtai-pillar-text">Kepatuhan standar alat kesehatan internasional dengan sistem kunci pintu elektronik &amp; proteksi imbalance.</p>
                    </div>
                    <div class="yingtai-pillar-item">
                        <div class="yingtai-pillar-icon"><i class="fas fa-boxes-packing"></i></div>
                        <h4 class="yingtai-pillar-title">Garansi Resmi &amp; Sparepart Asli</h4>
                        <p class="yingtai-pillar-text">Dukungan teknisi bersertifikasi, instalasi, kalibrasi metrologi, dan purna jual resmi PT Kinglab Medika Lestari.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. CATEGORY VISUAL TILES -->
    <section class="yingtai-category-tiles-section">
        <div class="yingtai-container">
            <div class="yingtai-tiles-header">
                <h3>Jelajahi Berdasarkan Kategori Sentrifus</h3>
                <p>Pilih kategori sentrifus untuk melihat unit unggulan atau konsultasikan spesifikasi dengan tim ahli kami.</p>
            </div>

            <div class="yingtai-category-tiles-grid">
                <?php foreach ($yingtai_categories as $slug => $cat) : ?>
                    <a href="#cat-<?php echo esc_attr($slug); ?>" class="yingtai-cat-tile" data-cat="<?php echo esc_attr($slug); ?>">
                        <div class="yingtai-tile-thumb">
                            <img src="<?php echo esc_url($theme_uri . '/assets/images/' . $cat['icon']); ?>" alt="<?php echo esc_attr($cat['name']); ?>" width="52" height="52" loading="lazy" />
                        </div>
                        <div class="yingtai-tile-info">
                            <h4 class="yingtai-tile-name"><?php echo esc_html($cat['short_name']); ?></h4>
                            <span class="yingtai-tile-count">Lihat Produk Unggulan</span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 3. STICKY FILTER NAVIGATION -->
    <div class="yingtai-nav-wrapper" id="yingtai-sticky-nav">
        <div class="yingtai-container">
            <div class="yingtai-filter-tabs" role="tablist" aria-label="Filter Kategori Sentrifus">
                <button class="yingtai-filter-btn active" data-filter="all" type="button">
                    <i class="fas fa-th-large"></i> Semua Kategori
                </button>
                <?php foreach ($yingtai_categories as $slug => $cat) : ?>
                    <button class="yingtai-filter-btn" data-filter="<?php echo esc_attr($slug); ?>" type="button">
                        <?php echo esc_html($cat['short_name']); ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- 4. PRODUCT SHOWCASE SECTION -->
    <section class="yingtai-showcase-section">
        <div class="yingtai-container">

            <?php 
            foreach ($yingtai_categories as $cat_slug => $cat_meta) : 
                $cat_products = array_filter($yingtai_products, function($p) use ($cat_slug) {
                    return $p['category'] === $cat_slug;
                });
            ?>
                <!-- Category Section Header Anchor -->
                <div class="yingtai-section-category-header" id="cat-<?php echo esc_attr($cat_slug); ?>" data-category="<?php echo esc_attr($cat_slug); ?>">
                    <h2 class="yingtai-cat-header-title">
                        <?php echo esc_html($cat_meta['name']); ?>
                        <span class="yingtai-cat-header-badge <?php echo esc_attr($cat_meta['tag_class']); ?>">
                            Produk Pilihan
                        </span>
                    </h2>
                    <p class="yingtai-cat-header-desc"><?php echo esc_html($cat_meta['description']); ?></p>
                </div>

                <!-- Products Grid -->
                <div class="yingtai-products-grid" data-category-group="<?php echo esc_attr($cat_slug); ?>">
                    <?php foreach ($cat_products as $prod) : 
                        $wa_text = sprintf(
                            'Halo PT Kinglab Medika Lestari, saya tertarik dengan informasi spesifikasi dan penawaran harga produk Sentrifus Yingtai: %s (Model: %s, Kategori: %s). Mohon bantuan penawaran resminya. Terima kasih.',
                            $prod['title'],
                            $prod['item_code'],
                            $cat_meta['name']
                        );
                        $wa_link = 'https://api.whatsapp.com/send/?phone=' . $clean_phone . '&text=' . rawurlencode($wa_text) . '&type=phone_number&app_absent=0';
                    ?>
                        <article class="yingtai-product-card" id="<?php echo esc_attr($prod['id']); ?>" data-category="<?php echo esc_attr($prod['category']); ?>">
                            <!-- Card Header Bar -->
                            <div class="yingtai-card-header-bar">
                                <span class="yingtai-card-item-code">
                                    <i class="fas fa-barcode"></i> <?php echo esc_html($prod['item_code']); ?>
                                </span>
                                <span class="yingtai-card-tag <?php echo esc_attr($cat_meta['tag_class']); ?>">
                                    <?php echo esc_html($cat_meta['short_name']); ?>
                                </span>
                            </div>

                            <!-- Card Body with Visual Photo & Info Columns -->
                            <div class="yingtai-card-body">
                                <!-- Photo Column -->
                                <div class="yingtai-card-visual-col">
                                    <div class="yingtai-card-img-frame">
                                        <img src="<?php echo esc_url($theme_uri . '/assets/images/' . $prod['photo']); ?>" 
                                             alt="<?php echo esc_attr($prod['title']); ?>" 
                                             loading="lazy" 
                                             onerror="this.src='<?php echo esc_url($theme_uri . '/assets/images/' . $cat_meta['icon']); ?>';" />
                                    </div>
                                    <span class="yingtai-img-badge"><i class="fas fa-check-circle"></i> Original Yingtai</span>
                                </div>

                                <!-- Info Column -->
                                <div class="yingtai-card-info-col">
                                    <div class="yingtai-card-main-info">
                                        <h3 class="yingtai-product-title"><?php echo esc_html($prod['title']); ?></h3>
                                        
                                        <div class="yingtai-product-standard">
                                            <i class="fas fa-certificate"></i>
                                            <span><?php echo esc_html($prod['standard']); ?></span>
                                        </div>
                                        
                                        <p class="yingtai-product-desc"><?php echo esc_html($prod['description']); ?></p>

                                        <!-- Key Spec Highlights -->
                                        <div class="yingtai-spec-badges">
                                            <?php foreach ($prod['highlights'] as $highlight) : ?>
                                                <span class="yingtai-spec-badge">
                                                    <i class="fas fa-check-circle"></i> <?php echo esc_html($highlight); ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="yingtai-card-actions">
                                        <a href="<?php echo esc_url($wa_link); ?>" class="yingtai-btn-wa" target="_blank" rel="noopener noreferrer">
                                            <i class="fab fa-whatsapp"></i> Penawaran
                                        </a>

                                        <button type="button" class="yingtai-btn-spec-modal" 
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
                        </article>
                    <?php endforeach; ?>
                </div>

            <?php endforeach; ?>

        </div>
    </section>

    <!-- 5. DOWNLOAD BROCHURE / FULL CATALOG SECTION -->
    <section class="yingtai-brochure-section" id="yingtai-brochure-section">
        <div class="yingtai-container">
            <div class="yingtai-brochure-grid">
                <div class="yingtai-brochure-text">
                    <div class="yingtai-badge" style="background:rgba(255,255,255,0.15); color:#ffffff; border-color:rgba(255,255,255,0.3);">
                        <i class="fas fa-book-open" style="color:#38bdf8;"></i>
                        <span>E-Katalog Resmi Yingtai</span>
                    </div>
                    <h2>Unduh Brosur &amp; Katalog Lengkap Yingtai Centrifuge</h2>
                    <p>
                        Dapatkan spesifikasi lengkap untuk seluruh lini sentrifus meja, sentrifus lantai berpendingin, bank darah, kartu gel transfusi, hingga sentrifus ultra high-speed 25.000 RPM. Dilengkapi tabel kompatibilitas rotor, adaptor tabung, dan panduan teknis laboratorium.
                    </p>

                    <ul class="yingtai-brochure-features">
                        <li><i class="fas fa-check-circle"></i> Lini Lengkap Sentrifus Berpendingin Kapasitas Besar</li>
                        <li><i class="fas fa-check-circle"></i> Sentrifus Kecepatan Tinggi Meja &amp; Mikro</li>
                        <li><i class="fas fa-check-circle"></i> Sentrifus Khusus Bank Darah 12–16 Kantong Darah</li>
                        <li><i class="fas fa-check-circle"></i> Sentrifus Kartu Gel TXK4 &amp; Pencuci Sel Darah</li>
                        <li><i class="fas fa-check-circle"></i> Sentrifus PRP / CGF Klinis Kedokteran Regeneratif</li>
                        <li><i class="fas fa-check-circle"></i> Tabel RCF, Kapasitas Tabung &amp; Aksesoris Rotor</li>
                    </ul>
                </div>

                <div class="yingtai-brochure-card">
                    <div class="yingtai-brochure-icon">
                        <i class="fas fa-file-lines fa-file-alt"></i>
                    </div>
                    <h4>Katalog Lengkap Yingtai Centrifuge</h4>
                    <div class="yingtai-brochure-meta">
                        <span>Format: <strong>PDF Resmi</strong></span> •
                        <span>Bahasa: <strong>Indonesia &amp; English</strong></span>
                    </div>

                    <a href="<?php echo esc_url($brochure_pdf_url); ?>" class="yingtai-btn-download-pdf" target="_blank" rel="noopener noreferrer">
                        <i class="fas fa-download"></i> Unduh Katalog PDF
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. KINGLAB DISTRIBUTOR VALUE & ASSURANCE -->
    <section class="yingtai-support-section">
        <div class="yingtai-container">
            <div class="yingtai-section-header">
                <div class="yingtai-badge">
                    <i class="fas fa-handshake"></i>
                    <span>Komitmen Kualitas &amp; Layanan</span>
                </div>
                <h2 class="yingtai-section-title">Mengapa Memilih Sentrifus Yingtai Melalui PT Kinglab Medika Lestari?</h2>
                <p class="yingtai-section-desc">
                    Sebagai distributor alat kesehatan dan laboratorium berizin resmi IDAK &amp; CDAKB di Indonesia, kami menjamin keaslian unit, keandalan purna jual, dan kenyamanan operasional instrumen Anda:
                </p>
            </div>

            <div class="yingtai-support-grid">
                <div class="yingtai-support-card">
                    <div class="yingtai-support-icon"><i class="fas fa-certificate"></i></div>
                    <h3 class="yingtai-support-title">100% Unit Baru &amp; Bergaransi</h3>
                    <p class="yingtai-support-desc">Produk original langsung dari pabrik Changsha Yingtai Instrument dengan sertifikat mutu dan garansi resmi.</p>
                </div>

                <div class="yingtai-support-card">
                    <div class="yingtai-support-icon"><i class="fas fa-screwdriver-wrench"></i></div>
                    <h3 class="yingtai-support-title">Instalasi &amp; Uji Fungsi Tim Ahli</h3>
                    <p class="yingtai-support-desc">Layanan instalasi di lokasi, pelatihan operasional bagi pengguna laboratorium, serta verifikasi kalibrasi RPM &amp; suhu.</p>
                </div>

                <div class="yingtai-support-card">
                    <div class="yingtai-support-icon"><i class="fas fa-cubes-stacked"></i></div>
                    <h3 class="yingtai-support-title">Ketersediaan Sparepart &amp; Rotor</h3>
                    <p class="yingtai-support-desc">Dukungan ketersediaan rotor tambahan, adaptor tabung vacutainer/falcon, dan suku cadang asli siap suplai berkesinambungan.</p>
                </div>

                <div class="yingtai-support-card">
                    <div class="yingtai-support-icon"><i class="fas fa-headset"></i></div>
                    <h3 class="yingtai-support-title">Layanan Purna Jual Responsif</h3>
                    <p class="yingtai-support-desc">Layanan teknis tanggap cepat untuk perawatan berkala, maintenance preventif, dan konsultasi teknis kapan pun dibutuhkan.</p>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- 7. TECHNICAL SPECIFICATIONS MODAL POPUP -->
<div class="yingtai-modal" id="yingtaiSpecModal" aria-hidden="true" role="dialog">
    <div class="yingtai-modal-dialog">
        <div class="yingtai-modal-header">
            <div>
                <h3 class="yingtai-modal-title" id="yingtaiModalTitle">Spesifikasi Teknis</h3>
                <span class="yingtai-modal-subtitle" id="yingtaiModalSubtitle">Standar Mutu Medis</span>
            </div>
            <button type="button" class="yingtai-modal-close" id="yingtaiModalClose" aria-label="Tutup Modal">&times;</button>
        </div>

        <div class="yingtai-modal-body">
            <table class="yingtai-spec-table">
                <tbody id="yingtaiModalTableBody">
                    <!-- Dynamic Table Rows Injected via JS -->
                </tbody>
            </table>
        </div>

        <div class="yingtai-modal-footer">
            <a href="#" class="yingtai-btn-wa" id="yingtaiModalWaBtn" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-whatsapp"></i> Minta Penawaran Resmi
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Sticky Navigation & Category Filtering
    var filterBtns = document.querySelectorAll('.yingtai-filter-btn');
    var catHeaders = document.querySelectorAll('.yingtai-section-category-header');
    var catGroups = document.querySelectorAll('.yingtai-products-grid');
    var catTiles = document.querySelectorAll('.yingtai-cat-tile');

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
                header.style.display = '';
            } else {
                header.style.display = 'none';
            }
        });

        catGroups.forEach(function(group) {
            var cat = group.getAttribute('data-category-group');
            if (filter === 'all' || cat === filter) {
                group.style.display = '';
            } else {
                group.style.display = 'none';
            }
        });
    }

    function smoothScrollTo(targetElem) {
        if (!targetElem) return;
        var headerEl = document.getElementById('site-header');
        var stickyNav = document.getElementById('yingtai-sticky-nav');
        var headerH = headerEl ? headerEl.offsetHeight : (window.innerWidth <= 768 ? 68 : 118);
        var navH = stickyNav ? stickyNav.offsetHeight : 54;
        var totalOffset = headerH + navH + 16;
        var elemPosition = targetElem.getBoundingClientRect().top + window.pageYOffset;
        window.scrollTo({
            top: Math.max(0, elemPosition - totalOffset),
            behavior: 'smooth'
        });
    }

    filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var filter = this.getAttribute('data-filter');
            applyFilter(filter);
            if (filter !== 'all') {
                var targetHeader = document.querySelector('.yingtai-section-category-header[data-category="' + filter + '"]');
                if (targetHeader) {
                    smoothScrollTo(targetHeader);
                }
            }
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
                    smoothScrollTo(targetElem);
                }
            }
        });
    });

    // 3. Technical Specs Modal
    var modal = document.getElementById('yingtaiSpecModal');
    var modalClose = document.getElementById('yingtaiModalClose');
    var modalTitle = document.getElementById('yingtaiModalTitle');
    var modalSubtitle = document.getElementById('yingtaiModalSubtitle');
    var modalTableBody = document.getElementById('yingtaiModalTableBody');
    var modalWaBtn = document.getElementById('yingtaiModalWaBtn');
    var specBtns = document.querySelectorAll('.yingtai-btn-spec-modal[data-specs]');

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
`;
    return php;
}

// Generate Static Preview HTML
function generatePreviewHtml() {
    const cleanPhone = '6281211174724';
    const brochureUrl = 'https://api.whatsapp.com/send/?phone=' + cleanPhone + '&text=' + encodeURIComponent('Halo PT Kinglab Medika Lestari, saya ingin meminta E-Katalog & Brosur Lengkap Yingtai Centrifuge. Terima kasih.') + '&type=phone_number&app_absent=0';

    let html = `<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yingtai Centrifuge - Medical & Laboratory Showcase | PT Kinglab Medika Lestari</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- Kinglab Base Style & Yingtai Centrifuge Showcase Style -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/centrifuge-showcase.css">
</head>
<body>

    <!-- Shared Header Placeholder -->
    <div id="header-placeholder"></div>

    <div class="yingtai-showcase-wrapper">

        <!-- 1. HERO SECTION -->
        <section class="yingtai-hero-section">
            <div class="yingtai-container">
                <!-- SEO Breadcrumb Schema (JSON-LD) -->
                <script type="application/ld+json">
                {
                    "@context": "https://schema.org",
                    "@type": "BreadcrumbList",
                    "itemListElement": [
                        {
                            "@type": "ListItem",
                            "position": 1,
                            "name": "Home",
                            "item": "preview.html"
                        },
                        {
                            "@type": "ListItem",
                            "position": 2,
                            "name": "Products",
                            "item": "preview-products.html"
                        },
                        {
                            "@type": "ListItem",
                            "position": 3,
                            "name": "Yingtai Centrifuge"
                        }
                    ]
                }
                </script>

                <!-- Breadcrumb (Visually hidden for clean UI, preserved in DOM for SEO) -->
                <nav class="yingtai-breadcrumb" aria-label="Breadcrumb">
                    <a href="preview.html">Home</a>
                    <span class="separator">/</span>
                    <a href="preview-products.html">Products</a>
                    <span class="separator">/</span>
                    <span class="current">Yingtai Centrifuge</span>
                </nav>

                <div class="yingtai-hero-content">
                    <div class="yingtai-hero-logo">
                        <img src="assets/images/yingtai-logo.png" alt="Yingtai Instrument Logo" width="310" height="78" loading="eager" />
                    </div>
                    
                    <div class="yingtai-badge">
                        <i class="fas fa-certificate"></i>
                        <span>Official Distributor Indonesia • PT Kinglab Medika Lestari</span>
                    </div>
                    
                    <h1 class="yingtai-hero-title">
                        Professional Medical &amp; Laboratory <span>Centrifuge Systems</span>
                    </h1>
                    
                    <p class="yingtai-hero-desc">
                        Rangkaian sentrifus canggih <strong>Changsha Yingtai Instrument Co., Ltd (cn-centrifuge.com)</strong> berstandar medis internasional <strong>CE, ISO 13485 &amp; FDA</strong>. Menghadirkan teknologi motor inverter tanpa sikat (brushless), kendali digital presisi mikrokomputer, kompresor pendingin ramah lingkungan, dan fitur pengamanan otomatis terlengkap. Siap memenuhi kebutuhan bank darah rumah sakit, laboratorium klinis, riset biologi molekuler, dan industri biofarmasi di Indonesia melalui <strong>PT Kinglab Medika Lestari</strong>.
                    </p>

                    <!-- 4 Value Pillars -->
                    <div class="yingtai-pillars-grid">
                        <div class="yingtai-pillar-item">
                            <div class="yingtai-pillar-icon"><i class="fas fa-gauge-high"></i></div>
                            <h4 class="yingtai-pillar-title">Motor Inverter Bebas Karbon</h4>
                            <p class="yingtai-pillar-text">Penggerak frekuensi variabel direct-drive bebas perawatan dengan akselerasi halus &amp; stabil.</p>
                        </div>
                        <div class="yingtai-pillar-item">
                            <div class="yingtai-pillar-icon"><i class="fas fa-snowflake"></i></div>
                            <h4 class="yingtai-pillar-title">Kontrol Suhu Presisi -20°C</h4>
                            <p class="yingtai-pillar-text">Kompresor Eropa bebas CFC menjaga viabilitas sel darah, plasma, protein, dan asam nukleat.</p>
                        </div>
                        <div class="yingtai-pillar-item">
                            <div class="yingtai-pillar-icon"><i class="fas fa-shield-virus"></i></div>
                            <h4 class="yingtai-pillar-title">Sertifikasi Medis ISO 13485 &amp; CE</h4>
                            <p class="yingtai-pillar-text">Kepatuhan standar alat kesehatan internasional dengan sistem kunci pintu elektronik &amp; proteksi imbalance.</p>
                        </div>
                        <div class="yingtai-pillar-item">
                            <div class="yingtai-pillar-icon"><i class="fas fa-boxes-packing"></i></div>
                            <h4 class="yingtai-pillar-title">Garansi Resmi &amp; Sparepart Asli</h4>
                            <p class="yingtai-pillar-text">Dukungan teknisi bersertifikasi, instalasi, kalibrasi metrologi, dan purna jual resmi PT Kinglab Medika Lestari.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. CATEGORY VISUAL TILES -->
        <section class="yingtai-category-tiles-section">
            <div class="yingtai-container">
                <div class="yingtai-tiles-header">
                    <h3>Jelajahi Berdasarkan Kategori Sentrifus</h3>
                    <p>Pilih kategori sentrifus untuk melihat unit unggulan atau konsultasikan spesifikasi dengan tim ahli kami.</p>
                </div>

                <div class="yingtai-category-tiles-grid">
`;

    for (const [slug, cat] of Object.entries(categories)) {
        html += `                    <a href="#cat-${slug}" class="yingtai-cat-tile" data-cat="${slug}">
                        <div class="yingtai-tile-thumb">
                            <img src="assets/images/${cat.icon}" alt="${cat.name}" width="52" height="52" loading="lazy" />
                        </div>
                        <div class="yingtai-tile-info">
                            <h4 class="yingtai-tile-name">${cat.short_name}</h4>
                            <span class="yingtai-tile-count">Lihat Produk Unggulan</span>
                        </div>
                    </a>
`;
    }

    html += `                </div>
            </div>
        </section>

        <!-- 3. STICKY FILTER NAVIGATION -->
        <div class="yingtai-nav-wrapper" id="yingtai-sticky-nav">
            <div class="yingtai-container">
                <div class="yingtai-filter-tabs" role="tablist" aria-label="Filter Kategori Sentrifus">
                    <button class="yingtai-filter-btn active" data-filter="all" type="button">
                        <i class="fas fa-th-large"></i> Semua Kategori
                    </button>
`;

    for (const [slug, cat] of Object.entries(categories)) {
        html += `                    <button class="yingtai-filter-btn" data-filter="${slug}" type="button">
                        ${cat.short_name}
                    </button>
`;
    }

    html += `                </div>
            </div>
        </div>

        <!-- 4. PRODUCT SHOWCASE SECTION -->
        <section class="yingtai-showcase-section">
            <div class="yingtai-container">
`;

    for (const [cat_slug, cat_meta] of Object.entries(categories)) {
        const cat_prods = products.filter(p => p.category === cat_slug);
        html += `
                <!-- Category Section Header Anchor -->
                <div class="yingtai-section-category-header" id="cat-${cat_slug}" data-category="${cat_slug}">
                    <h2 class="yingtai-cat-header-title">
                        ${cat_meta.name}
                        <span class="yingtai-cat-header-badge ${cat_meta.tag_class}">
                            Produk Pilihan
                        </span>
                    </h2>
                    <p class="yingtai-cat-header-desc">${cat_meta.description}</p>
                </div>

                <!-- Products Grid -->
                <div class="yingtai-products-grid" data-category-group="${cat_slug}">
`;

        cat_prods.forEach(prod => {
            const waText = `Halo PT Kinglab Medika Lestari, saya tertarik dengan informasi spesifikasi dan penawaran harga produk Sentrifus Yingtai: ${prod.title} (Model: ${prod.item_code}, Kategori: ${cat_meta.name}). Mohon bantuan penawaran resminya. Terima kasih.`;
            const waLink = `https://api.whatsapp.com/send/?phone=${cleanPhone}&text=${encodeURIComponent(waText)}&type=phone_number&app_absent=0`;

            html += `                        <article class="yingtai-product-card" id="${prod.id}" data-category="${prod.category}">
                            <!-- Card Header Bar -->
                            <div class="yingtai-card-header-bar">
                                <span class="yingtai-card-item-code">
                                    <i class="fas fa-barcode"></i> ${prod.item_code}
                                </span>
                                <span class="yingtai-card-tag ${cat_meta.tag_class}">
                                    ${cat_meta.short_name}
                                </span>
                            </div>

                            <!-- Card Body with Visual Photo & Info Columns -->
                            <div class="yingtai-card-body">
                                <!-- Photo Column -->
                                <div class="yingtai-card-visual-col">
                                    <div class="yingtai-card-img-frame">
                                        <img src="assets/images/${prod.photo}" 
                                             alt="${prod.title}" 
                                             loading="lazy" 
                                             onerror="this.src='assets/images/${cat_meta.icon}';" />
                                    </div>
                                    <span class="yingtai-img-badge"><i class="fas fa-check-circle"></i> Original Yingtai</span>
                                </div>

                                <!-- Info Column -->
                                <div class="yingtai-card-info-col">
                                    <div class="yingtai-card-main-info">
                                        <h3 class="yingtai-product-title">${prod.title}</h3>
                                        
                                        <div class="yingtai-product-standard">
                                            <i class="fas fa-certificate"></i>
                                            <span>${prod.standard}</span>
                                        </div>
                                        
                                        <p class="yingtai-product-desc">${prod.description}</p>

                                        <!-- Key Spec Highlights -->
                                        <div class="yingtai-spec-badges">
`;
            prod.highlights.forEach(h => {
                html += `                                            <span class="yingtai-spec-badge">
                                                <i class="fas fa-check-circle"></i> ${h}
                                            </span>
`;
            });

            html += `                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="yingtai-card-actions">
                                        <a href="${waLink}" class="yingtai-btn-wa" target="_blank" rel="noopener noreferrer">
                                            <i class="fab fa-whatsapp"></i> Penawaran
                                        </a>

                                        <button type="button" class="yingtai-btn-spec-modal" 
                                                data-title="${prod.title.replace(/"/g, '&quot;')}"
                                                data-code="${prod.item_code}"
                                                data-standard="${prod.standard} • ${prod.material}"
                                                data-specs="${prod.specs_table.replace(/"/g, '&quot;')}"
                                                data-wa="${waLink}">
                                            <i class="fas fa-sliders-h"></i> Spesifikasi Teknis
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </article>
`;
        });

        html += `                </div>
`;
    }

    html += `            </div>
        </section>

        <!-- 5. DOWNLOAD BROCHURE / FULL CATALOG SECTION -->
        <section class="yingtai-brochure-section" id="yingtai-brochure-section">
            <div class="yingtai-container">
                <div class="yingtai-brochure-grid">
                    <div class="yingtai-brochure-text">
                        <div class="yingtai-badge" style="background:rgba(255,255,255,0.15); color:#ffffff; border-color:rgba(255,255,255,0.3);">
                            <i class="fas fa-book-open" style="color:#38bdf8;"></i>
                            <span>E-Katalog Resmi Yingtai</span>
                        </div>
                        <h2>Unduh Brosur &amp; Katalog Lengkap Yingtai Centrifuge</h2>
                        <p>
                            Dapatkan spesifikasi lengkap untuk seluruh lini sentrifus meja, sentrifus lantai berpendingin, bank darah, kartu gel transfusi, hingga sentrifus ultra high-speed 25.000 RPM. Dilengkapi tabel kompatibilitas rotor, adaptor tabung, dan panduan teknis laboratorium.
                        </p>

                        <ul class="yingtai-brochure-features">
                            <li><i class="fas fa-check-circle"></i> Lini Lengkap Sentrifus Berpendingin Kapasitas Besar</li>
                            <li><i class="fas fa-check-circle"></i> Sentrifus Kecepatan Tinggi Meja &amp; Mikro</li>
                            <li><i class="fas fa-check-circle"></i> Sentrifus Khusus Bank Darah 12–16 Kantong Darah</li>
                            <li><i class="fas fa-check-circle"></i> Sentrifus Kartu Gel TXK4 &amp; Pencuci Sel Darah</li>
                            <li><i class="fas fa-check-circle"></i> Sentrifus PRP / CGF Klinis Kedokteran Regeneratif</li>
                            <li><i class="fas fa-check-circle"></i> Tabel RCF, Kapasitas Tabung &amp; Aksesoris Rotor</li>
                        </ul>
                    </div>

                    <div class="yingtai-brochure-card">
                        <div class="yingtai-brochure-icon">
                            <i class="fas fa-file-lines fa-file-alt"></i>
                        </div>
                        <h4>Katalog Lengkap Yingtai Centrifuge</h4>
                        <div class="yingtai-brochure-meta">
                            <span>Format: <strong>PDF Resmi</strong></span> •
                            <span>Bahasa: <strong>Indonesia &amp; English</strong></span>
                        </div>

                        <a href="${brochureUrl}" class="yingtai-btn-download-pdf" target="_blank" rel="noopener noreferrer">
                            <i class="fas fa-download"></i> Unduh Katalog PDF
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. KINGLAB DISTRIBUTOR VALUE & ASSURANCE -->
        <section class="yingtai-support-section">
            <div class="yingtai-container">
                <div class="yingtai-section-header">
                    <div class="yingtai-badge">
                        <i class="fas fa-handshake"></i>
                        <span>Komitmen Kualitas &amp; Layanan</span>
                    </div>
                    <h2 class="yingtai-section-title">Mengapa Memilih Sentrifus Yingtai Melalui PT Kinglab Medika Lestari?</h2>
                    <p class="yingtai-section-desc">
                        Sebagai distributor alat kesehatan dan laboratorium berizin resmi IDAK &amp; CDAKB di Indonesia, kami menjamin keaslian unit, keandalan purna jual, dan kenyamanan operasional instrumen Anda:
                    </p>
                </div>

                <div class="yingtai-support-grid">
                    <div class="yingtai-support-card">
                        <div class="yingtai-support-icon"><i class="fas fa-certificate"></i></div>
                        <h3 class="yingtai-support-title">100% Unit Baru &amp; Bergaransi</h3>
                        <p class="yingtai-support-desc">Produk original langsung dari pabrik Changsha Yingtai Instrument dengan sertifikat mutu dan garansi resmi.</p>
                    </div>

                    <div class="yingtai-support-card">
                        <div class="yingtai-support-icon"><i class="fas fa-screwdriver-wrench"></i></div>
                        <h3 class="yingtai-support-title">Instalasi &amp; Uji Fungsi Tim Ahli</h3>
                        <p class="yingtai-support-desc">Layanan instalasi di lokasi, pelatihan operasional bagi pengguna laboratorium, serta verifikasi kalibrasi RPM &amp; suhu.</p>
                    </div>

                    <div class="yingtai-support-card">
                        <div class="yingtai-support-icon"><i class="fas fa-cubes-stacked"></i></div>
                        <h3 class="yingtai-support-title">Ketersediaan Sparepart &amp; Rotor</h3>
                        <p class="yingtai-support-desc">Dukungan ketersediaan rotor tambahan, adaptor tabung vacutainer/falcon, dan suku cadang asli siap suplai berkesinambungan.</p>
                    </div>

                    <div class="yingtai-support-card">
                        <div class="yingtai-support-icon"><i class="fas fa-headset"></i></div>
                        <h3 class="yingtai-support-title">Layanan Purna Jual Responsif</h3>
                        <p class="yingtai-support-desc">Layanan teknis tanggap cepat untuk perawatan berkala, maintenance preventif, dan konsultasi teknis kapan pun dibutuhkan.</p>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- 7. TECHNICAL SPECIFICATIONS MODAL POPUP -->
    <div class="yingtai-modal" id="yingtaiSpecModal" aria-hidden="true" role="dialog">
        <div class="yingtai-modal-dialog">
            <div class="yingtai-modal-header">
                <div>
                    <h3 class="yingtai-modal-title" id="yingtaiModalTitle">Spesifikasi Teknis</h3>
                    <span class="yingtai-modal-subtitle" id="yingtaiModalSubtitle">Standar Mutu Medis</span>
                </div>
                <button type="button" class="yingtai-modal-close" id="yingtaiModalClose" aria-label="Tutup Modal">&times;</button>
            </div>

            <div class="yingtai-modal-body">
                <table class="yingtai-spec-table">
                    <tbody id="yingtaiModalTableBody">
                        <!-- Dynamic Table Rows Injected via JS -->
                    </tbody>
                </table>
            </div>

            <div class="yingtai-modal-footer">
                <a href="#" class="yingtai-btn-wa" id="yingtaiModalWaBtn" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-whatsapp"></i> Minta Penawaran Resmi
                </a>
            </div>
        </div>
    </div>

    <!-- Shared Footer Placeholder -->
    <div id="footer-placeholder"></div>

    <!-- Theme Components (Shared Header & Footer) -->
    <script src="assets/js/theme-components.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // 1. Sticky Navigation & Category Filtering
        var filterBtns = document.querySelectorAll('.yingtai-filter-btn');
        var catHeaders = document.querySelectorAll('.yingtai-section-category-header');
        var catGroups = document.querySelectorAll('.yingtai-products-grid');
        var catTiles = document.querySelectorAll('.yingtai-cat-tile');

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
                    header.style.display = '';
                } else {
                    header.style.display = 'none';
                }
            });

            catGroups.forEach(function(group) {
                var cat = group.getAttribute('data-category-group');
                if (filter === 'all' || cat === filter) {
                    group.style.display = '';
                } else {
                    group.style.display = 'none';
                }
            });
        }

        function smoothScrollTo(targetElem) {
            if (!targetElem) return;
            var headerEl = document.getElementById('site-header');
            var stickyNav = document.getElementById('yingtai-sticky-nav');
            var headerH = headerEl ? headerEl.offsetHeight : (window.innerWidth <= 768 ? 68 : 118);
            var navH = stickyNav ? stickyNav.offsetHeight : 54;
            var totalOffset = headerH + navH + 16;
            var elemPosition = targetElem.getBoundingClientRect().top + window.pageYOffset;
            window.scrollTo({
                top: Math.max(0, elemPosition - totalOffset),
                behavior: 'smooth'
            });
        }

        filterBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var filter = this.getAttribute('data-filter');
                applyFilter(filter);
                if (filter !== 'all') {
                    var targetHeader = document.querySelector('.yingtai-section-category-header[data-category="' + filter + '"]');
                    if (targetHeader) {
                        smoothScrollTo(targetHeader);
                    }
                }
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
                        smoothScrollTo(targetElem);
                    }
                }
            });
        });

        // 3. Technical Specs Modal
        var modal = document.getElementById('yingtaiSpecModal');
        var modalClose = document.getElementById('yingtaiModalClose');
        var modalTitle = document.getElementById('yingtaiModalTitle');
        var modalSubtitle = document.getElementById('yingtaiModalSubtitle');
        var modalTableBody = document.getElementById('yingtaiModalTableBody');
        var modalWaBtn = document.getElementById('yingtaiModalWaBtn');
        var specBtns = document.querySelectorAll('.yingtai-btn-spec-modal[data-specs]');

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

// Write template-parts/yingtai-centrifuge-showcase.php
const phpOutput = generatePhpTemplate();
fs.writeFileSync('c:/KINGLAB/template-parts/yingtai-centrifuge-showcase.php', phpOutput, 'utf8');
console.log('Successfully written template-parts/yingtai-centrifuge-showcase.php');

// Write preview-yingtai-centrifuge.html
const previewOutput = generatePreviewHtml();
fs.writeFileSync('c:/KINGLAB/preview-yingtai-centrifuge.html', previewOutput, 'utf8');
console.log('Successfully written preview-yingtai-centrifuge.html');
