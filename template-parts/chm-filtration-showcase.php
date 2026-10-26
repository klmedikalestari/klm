<?php
/**
 * Template Part: CHMLAB Group Showcase
 * Brand: CHMLAB GROUP (Filtration, Microfiltration, Specialities, Chromatography, Industrial Filtration, Capsule Filters)
 * 
 * @package Kinglab_Medika_Lestari_Theme
 */

// Enqueue styles if not already enqueued
$chm_css_ver = file_exists(get_template_directory() . '/assets/css/chm-showcase.css')
    ? filemtime(get_template_directory() . '/assets/css/chm-showcase.css')
    : '1.2.0';
wp_enqueue_style('chm-showcase-style', get_template_directory_uri() . '/assets/css/chm-showcase.css', array('Kinglab_Medika_Lestari-style'), $chm_css_ver);
?>
    <div class="chm-showcase-wrapper">

        <!-- 1. HERO SECTION -->
        <section class="chm-hero-section">
            <div class="chm-container">
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
                            "name": "CHMLAB Group"
                        }
                    ]
                }
                </script>

                <!-- Breadcrumb (Visually hidden for clean UI, preserved in DOM for SEO) -->
                <nav class="chm-breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                    <span class="separator">/</span>
                    <a href="<?php echo esc_url(home_url('/products/')); ?>">Products</a>
                    <span class="separator">/</span>
                    <span class="current">CHMLAB Group</span>
                </nav>

                <div class="chm-hero-content">
                    <div class="chm-hero-logo">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/chm-logo.png" alt="CHMLAB GROUP Logo" width="220" height="52" loading="eager" />
                    </div>
                    
                    <div class="chm-badge">
                        <i class="fas fa-certificate"></i>
                        <span>Official Distributor Indonesia • PT Kinglab Medika Lestari</span>
                    </div>

                    <h1 class="chm-hero-title">
                        Advanced Filtration & <span>Microfiltration Systems</span>
                    </h1>

                    <p class="chm-hero-desc">
                        CHMLAB GROUP adalah produsen terkemuka asal Spanyol dengan pengalaman lebih dari 20 tahun dalam memproduksi media filtrasi laboratorium, mikrofiltrasi, kromatografi, dan filtrasi industri berkualitas tinggi berstandar ISO 9001:2015, GLP, dan GMP.
                    </p>

                    <!-- Stats Grid -->
                    <div class="chm-stats-grid">
                        <div class="chm-stat-item">
                            <span class="chm-stat-number">6</span>
                            <span class="chm-stat-label">Lini Filtrasi Utama</span>
                            <span class="chm-stat-sub">Dari kertas saring kualitatif hingga filter kapsul farmasi</span>
                        </div>
                        <div class="chm-stat-item">
                            <span class="chm-stat-number">5.000+</span>
                            <span class="chm-stat-label">Varian Produk</span>
                            <span class="chm-stat-sub">Spesifikasi terlengkap untuk riset dan industri</span>
                        </div>
                        <div class="chm-stat-item">
                            <span class="chm-stat-number">ISO 9001</span>
                            <span class="chm-stat-label">Sertifikasi Mutu</span>
                            <span class="chm-stat-sub">Diproduksi dengan kontrol kualitas presisi Eropa</span>
                        </div>
                        <div class="chm-stat-item">
                            <span class="chm-stat-number">80+</span>
                            <span class="chm-stat-label">Negara Tujuan Ekspor</span>
                            <span class="chm-stat-sub">Dipercaya laboratorium dan industri global</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. CATEGORY TILES OVERVIEW (SCREENSHOT REPLICATION - 6 KOTAK UTAMA) -->
        <section class="chm-categories-overview-section">
            <div class="chm-container">
                <div class="chm-section-header">
                    <span class="chm-section-badge">6 Lini Produk Utama</span>
                    <h2 class="chm-section-title">Portofolio Filtrasi & Separasi Lengkap</h2>
                    <p class="chm-section-subtitle">Solusi teruji laboratorium riset, kendali mutu industri pangan, bioteknologi, hingga pabrik farmasi.</p>
                </div>

                <div class="chm-tiles-grid">
                    <a href="#cat-filtration" class="chm-tile-card tile-filtration" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/cat-filtration.jpg');">
                        <div class="chm-tile-overlay"></div>
                        <div class="chm-tile-content">
                            <h3 class="chm-tile-title">Filtration</h3>
                            <span class="chm-tile-btn">
                                <span>Lihat Spesifikasi</span>
                                <i class="fas fa-arrow-down"></i>
                            </span>
                        </div>
                    </a>
                    <a href="#cat-microfiltration" class="chm-tile-card tile-microfiltration" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/cat-microfiltration.jpg');">
                        <div class="chm-tile-overlay"></div>
                        <div class="chm-tile-content">
                            <h3 class="chm-tile-title">Microfiltration</h3>
                            <span class="chm-tile-btn">
                                <span>Lihat Spesifikasi</span>
                                <i class="fas fa-arrow-down"></i>
                            </span>
                        </div>
                    </a>
                    <a href="#cat-specialities" class="chm-tile-card tile-specialties" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/cat-specialities.jpg');">
                        <div class="chm-tile-overlay"></div>
                        <div class="chm-tile-content">
                            <h3 class="chm-tile-title">Specialities</h3>
                            <span class="chm-tile-btn">
                                <span>Lihat Spesifikasi</span>
                                <i class="fas fa-arrow-down"></i>
                            </span>
                        </div>
                    </a>
                    <a href="#cat-chromatography" class="chm-tile-card tile-chromatography" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/cat-chromatography.jpg');">
                        <div class="chm-tile-overlay"></div>
                        <div class="chm-tile-content">
                            <h3 class="chm-tile-title">Chromatography</h3>
                            <span class="chm-tile-btn">
                                <span>Lihat Spesifikasi</span>
                                <i class="fas fa-arrow-down"></i>
                            </span>
                        </div>
                    </a>
                    <a href="#cat-industrial-filtration" class="chm-tile-card tile-industrial-filtration" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/cat-industrial-filtration.jpg');">
                        <div class="chm-tile-overlay"></div>
                        <div class="chm-tile-content">
                            <h3 class="chm-tile-title">Industrial Filtration</h3>
                            <span class="chm-tile-btn">
                                <span>Lihat Spesifikasi</span>
                                <i class="fas fa-arrow-down"></i>
                            </span>
                        </div>
                    </a>
                    <a href="#cat-capsule-filters" class="chm-tile-card tile-capsule-filters" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/cat-capsule-filters.jpg');">
                        <div class="chm-tile-overlay"></div>
                        <div class="chm-tile-content">
                            <h3 class="chm-tile-title">Capsule Filters</h3>
                            <span class="chm-tile-btn">
                                <span>Lihat Spesifikasi</span>
                                <i class="fas fa-arrow-down"></i>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- 3. STICKY FILTER NAVIGATION -->
        <div class="chm-sticky-nav-wrapper">
            <div class="chm-container">
                <nav class="chm-filter-nav" aria-label="Category Filter">
                    <a href="#all" class="chm-filter-btn active" data-target="all">
                        <i class="fas fa-th-large"></i> Semua Kategori
                    </a>
                    <a href="#cat-filtration" class="chm-filter-btn" data-target="cat-filtration">
                        <span class="dot-badge" style="background-color: #e53935;"></span>
                        Filtration
                    </a>
                    <a href="#cat-microfiltration" class="chm-filter-btn" data-target="cat-microfiltration">
                        <span class="dot-badge" style="background-color: #fb8c00;"></span>
                        Microfiltration
                    </a>
                    <a href="#cat-specialities" class="chm-filter-btn" data-target="cat-specialities">
                        <span class="dot-badge" style="background-color: #fbc02d;"></span>
                        Specialities
                    </a>
                    <a href="#cat-chromatography" class="chm-filter-btn" data-target="cat-chromatography">
                        <span class="dot-badge" style="background-color: #43a047;"></span>
                        Chromatography
                    </a>
                    <a href="#cat-industrial-filtration" class="chm-filter-btn" data-target="cat-industrial-filtration">
                        <span class="dot-badge" style="background-color: #00acc1;"></span>
                        Industrial Filtration
                    </a>
                    <a href="#cat-capsule-filters" class="chm-filter-btn" data-target="cat-capsule-filters">
                        <span class="dot-badge" style="background-color: #039be5;"></span>
                        Capsule Filters
                    </a>
                </nav>
            </div>
        </div>

        <!-- 4. PRODUCT SECTIONS (DETAIL PER KATEGORI) -->
        <div class="chm-catalog-body">
            <section id="cat-filtration" class="chm-category-section category-block" data-category="cat-filtration">
                <div class="chm-container">
                    <div class="chm-cat-header-block" style="border-left-color: #e53935;">
                        <div class="chm-cat-title-wrap">
                            <h2>Filtration</h2>
                            <p>Kertas saring analitis kualitas tinggi dari 100% alpha-cellulose dan serat kapas pilihan untuk analisis gravimetri kuantitatif, kualitatif, serta mikroserat kaca bebas pengikat.</p>
                        </div>
                        <span class="chm-cat-badge-pill" style="background-color: #ffebee; color: #c62828;">
                            High Purity Filter Papers & Analytical Filtration
                        </span>
                    </div>

                    <div class="chm-products-grid">
                        <div class="chm-product-card">
                            <div class="chm-card-img-wrap">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/prod-quantitative.jpg" alt="Ashless Quantitative Filter Paper" loading="lazy" />
                                <span class="chm-card-tag">Filtration</span>
                                <span class="chm-card-badge" style="background-color: #e53935;">Bestseller</span>
                            </div>

                            <div class="chm-card-body">
                                <span class="chm-card-code">F2040-F2045</span>
                                <h3 class="chm-card-title">Ashless Quantitative Filter Paper</h3>
                                <p class="chm-card-desc">Kertas saring kuantitatif murni tanpa abu (<0.007%) dari refined pulp & pure cotton linters. Dirancang khusus untuk analisis gravimetrik kritis dan preparasi sampel instrumen presisi.</p>

                                <div class="chm-specs-preview-grid">
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Kandungan Abu</span>
                                        <span class="chm-spec-pill-val">< 0.007%</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Bahan</span>
                                        <span class="chm-spec-pill-val">100% Alpha Cellulose</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Pilihan Grade</span>
                                        <span class="chm-spec-pill-val">F2040, F2041, F2042, F2043, F2044, F2045</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Rentang Retensi</span>
                                        <span class="chm-spec-pill-val">1.5 - 25 µm</span>
                                    </div>
                                </div>

                                <div class="chm-card-sizes">
                                    <i class="fas fa-boxes"></i>
                                    <span><strong>Tersedia:</strong> Diameter 55, 70, 90, 110, 125, 150, 185, 240 mm (Pack of 100 pcs)</span>
                                </div>

                                <div class="chm-card-actions">
                                    <button type="button" 
                                            class="chm-btn-spec-modal"
                                            data-title="Ashless Quantitative Filter Paper"
                                            data-code="F2040-F2045"
                                            data-category="Filtration"
                                            data-wa="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Ashless%20Quantitative%20Filter%20Paper%20(F2040-F2045).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0"
                                            data-specs='&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F2040&lt;/td&gt;
            &lt;td&gt;Medium-Slow&lt;/td&gt;
            &lt;td&gt;85 g/m²&lt;/td&gt;
            &lt;td&gt;170 µm&lt;/td&gt;
            &lt;td&gt;7 - 9 µm&lt;/td&gt;
            &lt;td&gt;&amp;lt;0.007%&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Analisis gravimetri umum, barium sulfat, kalsium oksalat&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F2041&lt;/td&gt;
            &lt;td&gt;Fast&lt;/td&gt;
            &lt;td&gt;85 g/m²&lt;/td&gt;
            &lt;td&gt;190 µm&lt;/td&gt;
            &lt;td&gt;20 - 25 µm&lt;/td&gt;
            &lt;td&gt;&amp;lt;0.007%&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Presipitat kasar, besi/aluminium hidroksida&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F2042&lt;/td&gt;
            &lt;td&gt;Very Slow&lt;/td&gt;
            &lt;td&gt;100 g/m²&lt;/td&gt;
            &lt;td&gt;160 µm&lt;/td&gt;
            &lt;td&gt;1.5 - 2.5 µm&lt;/td&gt;
            &lt;td&gt;&amp;lt;0.007%&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Presipitat sangat halus, barium sulfat dingin, timah oksida&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F2043&lt;/td&gt;
            &lt;td&gt;Medium&lt;/td&gt;
            &lt;td&gt;85 g/m²&lt;/td&gt;
            &lt;td&gt;180 µm&lt;/td&gt;
            &lt;td&gt;14 - 17 µm&lt;/td&gt;
            &lt;td&gt;&amp;lt;0.007%&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Analisis rutin, uji sedimen makanan &amp;amp; minuman&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F2044&lt;/td&gt;
            &lt;td&gt;Slow&lt;/td&gt;
            &lt;td&gt;85 g/m²&lt;/td&gt;
            &lt;td&gt;170 µm&lt;/td&gt;
            &lt;td&gt;2 - 4 µm&lt;/td&gt;
            &lt;td&gt;&amp;lt;0.007%&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Presipitat halus, filtrasi lebih cepat dari F2042&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F2045&lt;/td&gt;
            &lt;td&gt;Very Fast&lt;/td&gt;
            &lt;td&gt;85 g/m²&lt;/td&gt;
            &lt;td&gt;200 µm&lt;/td&gt;
            &lt;td&gt;25 - 30 µm&lt;/td&gt;
            &lt;td&gt;&amp;lt;0.007%&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Presipitat sangat kasar, filtrasi cepat gelatin&lt;/td&gt;
        &lt;/tr&gt;'>
                                        <i class="fas fa-table"></i>
                                        <span>Spesifikasi</span>
                                    </button>
                                    <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Ashless%20Quantitative%20Filter%20Paper%20(F2040-F2045).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="chm-btn-wa">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Penawaran</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="chm-product-card">
                            <div class="chm-card-img-wrap">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/filtration-1.jpg" alt="Ashless Hardened Quantitative Filter Paper" loading="lazy" />
                                <span class="chm-card-tag">Filtration</span>
                                <span class="chm-card-badge" style="background-color: #e53935;">Acid Hardened</span>
                            </div>

                            <div class="chm-card-body">
                                <span class="chm-card-code">F2140-F2142</span>
                                <h3 class="chm-card-title">Ashless Hardened Quantitative Filter Paper</h3>
                                <p class="chm-card-desc">Kertas saring asam keras dengan kekuatan basah sangat tinggi dan permukaan yang sangat halus. Memudahkan pengerokan endapan tanpa merusak serat kertas pada larutan asam kuat/alkali.</p>

                                <div class="chm-specs-preview-grid">
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Kandungan Abu</span>
                                        <span class="chm-spec-pill-val">< 0.006%</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Ketahanan Asam</span>
                                        <span class="chm-spec-pill-val">Sangat Tinggi</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Pilihan Grade</span>
                                        <span class="chm-spec-pill-val">F2140, F2141, F2142</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Kekuatan Basah</span>
                                        <span class="chm-spec-pill-val">Wet Strengthened</span>
                                    </div>
                                </div>

                                <div class="chm-card-sizes">
                                    <i class="fas fa-boxes"></i>
                                    <span><strong>Tersedia:</strong> Diameter 70, 90, 110, 125, 150, 185 mm</span>
                                </div>

                                <div class="chm-card-actions">
                                    <button type="button" 
                                            class="chm-btn-spec-modal"
                                            data-title="Ashless Hardened Quantitative Filter Paper"
                                            data-code="F2140-F2142"
                                            data-category="Filtration"
                                            data-wa="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Ashless%20Hardened%20Quantitative%20Filter%20Paper%20(F2140-F2142).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0"
                                            data-specs='&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F2140&lt;/td&gt;
            &lt;td&gt;Medium&lt;/td&gt;
            &lt;td&gt;84 g/m²&lt;/td&gt;
            &lt;td&gt;160 µm&lt;/td&gt;
            &lt;td&gt;7 - 12 µm&lt;/td&gt;
            &lt;td&gt;&amp;lt;0.006%&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Analisis asam/basa kuat, Buchner funnel filtration&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F2141&lt;/td&gt;
            &lt;td&gt;Fast&lt;/td&gt;
            &lt;td&gt;84 g/m²&lt;/td&gt;
            &lt;td&gt;170 µm&lt;/td&gt;
            &lt;td&gt;20 - 25 µm&lt;/td&gt;
            &lt;td&gt;&amp;lt;0.006%&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Filtrasi cepat larutan korosif, partikel kasar&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F2142&lt;/td&gt;
            &lt;td&gt;Slow&lt;/td&gt;
            &lt;td&gt;95 g/m²&lt;/td&gt;
            &lt;td&gt;150 µm&lt;/td&gt;
            &lt;td&gt;2 - 4 µm&lt;/td&gt;
            &lt;td&gt;&amp;lt;0.006%&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Retensi partikel halus dengan tekanan vakum tinggi&lt;/td&gt;
        &lt;/tr&gt;'>
                                        <i class="fas fa-table"></i>
                                        <span>Spesifikasi</span>
                                    </button>
                                    <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Ashless%20Hardened%20Quantitative%20Filter%20Paper%20(F2140-F2142).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="chm-btn-wa">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Penawaran</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="chm-product-card">
                            <div class="chm-card-img-wrap">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/cat-filtration.jpg" alt="Qualitative Standard Filter Paper" loading="lazy" />
                                <span class="chm-card-tag">Filtration</span>
                                <span class="chm-card-badge" style="background-color: #e53935;">Rutin Lab</span>
                            </div>

                            <div class="chm-card-body">
                                <span class="chm-card-code">F1001-F1007</span>
                                <h3 class="chm-card-title">Qualitative Standard Filter Paper</h3>
                                <p class="chm-card-desc">Kertas saring kualitatif standar laboratorium untuk pemisahan rutin, klarifikasi cairan, dan identifikasi zat kimia. Tersedia dalam format lembaran datar maupun lipat (folded/pleated).</p>

                                <div class="chm-specs-preview-grid">
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Alpha Cellulose</span>
                                        <span class="chm-spec-pill-val">> 98%</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Kandungan Abu</span>
                                        <span class="chm-spec-pill-val">< 0.06%</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Grade Populer</span>
                                        <span class="chm-spec-pill-val">F1001 (Medium Speed)</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Format</span>
                                        <span class="chm-spec-pill-val">Flat & Folded (Pleated)</span>
                                    </div>
                                </div>

                                <div class="chm-card-sizes">
                                    <i class="fas fa-boxes"></i>
                                    <span><strong>Tersedia:</strong> Diameter 55, 70, 90, 110, 125, 150, 185, 240, 320 mm & Lembaran 460x570, 580x580 mm</span>
                                </div>

                                <div class="chm-card-actions">
                                    <button type="button" 
                                            class="chm-btn-spec-modal"
                                            data-title="Qualitative Standard Filter Paper"
                                            data-code="F1001-F1007"
                                            data-category="Filtration"
                                            data-wa="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Qualitative%20Standard%20Filter%20Paper%20(F1001-F1007).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0"
                                            data-specs='&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F1001&lt;/td&gt;
            &lt;td&gt;Medium&lt;/td&gt;
            &lt;td&gt;84 g/m²&lt;/td&gt;
            &lt;td&gt;180 µm&lt;/td&gt;
            &lt;td&gt;7 - 11 µm&lt;/td&gt;
            &lt;td&gt;&amp;lt;0.06%&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Paling populer di lab; klarifikasi buffer, tanah, urine&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F1002&lt;/td&gt;
            &lt;td&gt;Medium-Slow&lt;/td&gt;
            &lt;td&gt;97 g/m²&lt;/td&gt;
            &lt;td&gt;190 µm&lt;/td&gt;
            &lt;td&gt;5 - 8 µm&lt;/td&gt;
            &lt;td&gt;&amp;lt;0.06%&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Filtrasi suspensi semi-halus, uji kontaminasi makanan&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F1003&lt;/td&gt;
            &lt;td&gt;Slow / Thick&lt;/td&gt;
            &lt;td&gt;200 g/m²&lt;/td&gt;
            &lt;td&gt;320 µm&lt;/td&gt;
            &lt;td&gt;5 - 7 µm&lt;/td&gt;
            &lt;td&gt;&amp;lt;0.06%&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Kapasitas muat tinggi untuk minyak, ekstrak pekat&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F1004&lt;/td&gt;
            &lt;td&gt;Very Fast&lt;/td&gt;
            &lt;td&gt;84 g/m²&lt;/td&gt;
            &lt;td&gt;210 µm&lt;/td&gt;
            &lt;td&gt;12 - 15 µm&lt;/td&gt;
            &lt;td&gt;&amp;lt;0.06%&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Filtrasi minyak atsiri, resin, sirup kental&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F1005&lt;/td&gt;
            &lt;td&gt;Very Slow&lt;/td&gt;
            &lt;td&gt;80 g/m²&lt;/td&gt;
            &lt;td&gt;170 µm&lt;/td&gt;
            &lt;td&gt;1 - 2 µm&lt;/td&gt;
            &lt;td&gt;&amp;lt;0.06%&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Retensi partikel ultra halus, klarifikasi minuman beralkohol&lt;/td&gt;
        &lt;/tr&gt;'>
                                        <i class="fas fa-table"></i>
                                        <span>Spesifikasi</span>
                                    </button>
                                    <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Qualitative%20Standard%20Filter%20Paper%20(F1001-F1007).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="chm-btn-wa">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Penawaran</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="chm-product-card">
                            <div class="chm-card-img-wrap">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/prod-glass-microfiber.jpg" alt="Glass Microfiber Filters (Binder-Free)" loading="lazy" />
                                <span class="chm-card-tag">Filtration</span>
                                <span class="chm-card-badge" style="background-color: #e53935;">Thermal 500°C</span>
                            </div>

                            <div class="chm-card-body">
                                <span class="chm-card-code">GF1-GF5</span>
                                <h3 class="chm-card-title">Glass Microfiber Filters (Binder-Free)</h3>
                                <p class="chm-card-desc">Filter serat mikro kaca borosilikat 100% murni tanpa pengikat kimia. Memiliki laju alir sangat cepat, kapasitas tampung partikel tinggi, dan tahan suhu hingga 500°C. Standar pengujian TSS air limbah.</p>

                                <div class="chm-specs-preview-grid">
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Bahan</span>
                                        <span class="chm-spec-pill-val">100% Borosilicate Glass</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Batas Suhu</span>
                                        <span class="chm-spec-pill-val">Hingga 500°C</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Retensi</span>
                                        <span class="chm-spec-pill-val">0.7 - 2.7 µm</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Aplikasi Utama</span>
                                        <span class="chm-spec-pill-val">Uji TSS (Total Suspended Solids)</span>
                                    </div>
                                </div>

                                <div class="chm-card-sizes">
                                    <i class="fas fa-boxes"></i>
                                    <span><strong>Tersedia:</strong> Diameter 25, 47, 55, 70, 90, 110, 125, 142, 150 mm & Lembaran</span>
                                </div>

                                <div class="chm-card-actions">
                                    <button type="button" 
                                            class="chm-btn-spec-modal"
                                            data-title="Glass Microfiber Filters (Binder-Free)"
                                            data-code="GF1-GF5"
                                            data-category="Filtration"
                                            data-wa="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Glass%20Microfiber%20Filters%20(Binder-Free)%20(GF1-GF5).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0"
                                            data-specs='&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;GF1&lt;/td&gt;
            &lt;td&gt;Fast&lt;/td&gt;
            &lt;td&gt;52 g/m²&lt;/td&gt;
            &lt;td&gt;260 µm&lt;/td&gt;
            &lt;td&gt;1.6 µm&lt;/td&gt;
            &lt;td&gt;Inorganik&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Standar TSS air limbah (setara Whatman GF/A)&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;GF2&lt;/td&gt;
            &lt;td&gt;Medium-Fast&lt;/td&gt;
            &lt;td&gt;143 g/m²&lt;/td&gt;
            &lt;td&gt;680 µm&lt;/td&gt;
            &lt;td&gt;1.0 µm&lt;/td&gt;
            &lt;td&gt;Inorganik&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Kapasitas muat 3x lebih tebal, prefilter membran (GF/B)&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;GF3&lt;/td&gt;
            &lt;td&gt;Very Fast&lt;/td&gt;
            &lt;td&gt;52 g/m²&lt;/td&gt;
            &lt;td&gt;260 µm&lt;/td&gt;
            &lt;td&gt;1.2 µm&lt;/td&gt;
            &lt;td&gt;Inorganik&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Analisis air minum &amp;amp; air limbah perkotaan (GF/C)&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;GF4&lt;/td&gt;
            &lt;td&gt;Extremely Fast&lt;/td&gt;
            &lt;td&gt;120 g/m²&lt;/td&gt;
            &lt;td&gt;530 µm&lt;/td&gt;
            &lt;td&gt;2.7 µm&lt;/td&gt;
            &lt;td&gt;Inorganik&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Prefilter cairan kental, klarifikasi darah &amp;amp; serum (GF/D)&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;GF5&lt;/td&gt;
            &lt;td&gt;Slow / Fine&lt;/td&gt;
            &lt;td&gt;75 g/m²&lt;/td&gt;
            &lt;td&gt;400 µm&lt;/td&gt;
            &lt;td&gt;0.7 µm&lt;/td&gt;
            &lt;td&gt;Inorganik&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Retensi bakteri halus, filtrasi protein (GF/F)&lt;/td&gt;
        &lt;/tr&gt;'>
                                        <i class="fas fa-table"></i>
                                        <span>Spesifikasi</span>
                                    </button>
                                    <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Glass%20Microfiber%20Filters%20(Binder-Free)%20(GF1-GF5).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="chm-btn-wa">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Penawaran</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="cat-microfiltration" class="chm-category-section category-block" data-category="cat-microfiltration">
                <div class="chm-container">
                    <div class="chm-cat-header-block" style="border-left-color: #fb8c00;">
                        <div class="chm-cat-title-wrap">
                            <h2>Microfiltration</h2>
                            <p>Membran filtrasi presisi tinggi dengan ukuran pori terkalibrasi (0.1 µm, 0.22 µm, 0.45 µm, 0.8 µm hingga 8 µm) dari material MCE, Nylon 66, PTFE, PVDF, dan PES untuk sterilisasi cairan dan analisis mikrobiologi.</p>
                        </div>
                        <span class="chm-cat-badge-pill" style="background-color: #fff3e0; color: #e65100;">
                            Precision Membrane Filters & Syringe Filters
                        </span>
                    </div>

                    <div class="chm-products-grid">
                        <div class="chm-product-card">
                            <div class="chm-card-img-wrap">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/prod-membrane-filters.jpg" alt="CHM® Disc Membrane Filters" loading="lazy" />
                                <span class="chm-card-tag">Microfiltration</span>
                                <span class="chm-card-badge" style="background-color: #fb8c00;">Presisi Pori</span>
                            </div>

                            <div class="chm-card-body">
                                <span class="chm-card-code">MCE-NY-PTFE</span>
                                <h3 class="chm-card-title">CHM® Disc Membrane Filters</h3>
                                <p class="chm-card-desc">Piringan membran filtrasi dengan pori sangat seragam untuk klarifikasi, sterilisasi mikrobiologis, uji bioburden, dan preparasi sampel HPLC. Tersedia versi polos (plain) dan kisi (gridded) steril.</p>

                                <div class="chm-specs-preview-grid">
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Pilihan Material</span>
                                        <span class="chm-spec-pill-val">MCE, Nylon 66, PTFE, PVDF, PES, CA</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Ukuran Pori</span>
                                        <span class="chm-spec-pill-val">0.22 µm, 0.45 µm, 0.8 µm, 1.2 µm</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Diameter</span>
                                        <span class="chm-spec-pill-val">13, 25, 47, 50, 90, 142, 293 mm</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Standar</span>
                                        <span class="chm-spec-pill-val">USP Class VI & ISO 9001</span>
                                    </div>
                                </div>

                                <div class="chm-card-sizes">
                                    <i class="fas fa-boxes"></i>
                                    <span><strong>Tersedia:</strong> Diameter 47 mm (Standard Uji Mikrobiologi) & 25, 50, 90, 142 mm</span>
                                </div>

                                <div class="chm-card-actions">
                                    <button type="button" 
                                            class="chm-btn-spec-modal"
                                            data-title="CHM® Disc Membrane Filters"
                                            data-code="MCE-NY-PTFE"
                                            data-category="Microfiltration"
                                            data-wa="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20CHM%C2%AE%20Disc%20Membrane%20Filters%20(MCE-NY-PTFE).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0"
                                            data-specs='&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;MCE Membrane&lt;/td&gt;
            &lt;td&gt;High Flow&lt;/td&gt;
            &lt;td&gt;Hydrophilic&lt;/td&gt;
            &lt;td&gt;135 µm&lt;/td&gt;
            &lt;td&gt;0.45 µm / 0.22 µm&lt;/td&gt;
            &lt;td&gt;Steril / Non-steril&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Hitung koloni bakteri air, media kultur, bioburden testing&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;Nylon 66&lt;/td&gt;
            &lt;td&gt;Fast Flow&lt;/td&gt;
            &lt;td&gt;Hydrophilic&lt;/td&gt;
            &lt;td&gt;115 µm&lt;/td&gt;
            &lt;td&gt;0.22 µm / 0.45 µm&lt;/td&gt;
            &lt;td&gt;Broad chemical&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Filtrasi fase gerak HPLC, pelarut organik, buffer biologis&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;PTFE Hydrophobic&lt;/td&gt;
            &lt;td&gt;Gas &amp;amp; Solvent&lt;/td&gt;
            &lt;td&gt;Hydrophobic&lt;/td&gt;
            &lt;td&gt;150 µm&lt;/td&gt;
            &lt;td&gt;0.22 µm / 0.45 µm&lt;/td&gt;
            &lt;td&gt;Inert kimia 100%&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Ventilasi udara steril, pelarut sangat agresif, asam pekat&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;PES Membrane&lt;/td&gt;
            &lt;td&gt;Ultra High Flow&lt;/td&gt;
            &lt;td&gt;Hydrophilic&lt;/td&gt;
            &lt;td&gt;130 µm&lt;/td&gt;
            &lt;td&gt;0.22 µm&lt;/td&gt;
            &lt;td&gt;Low Protein Binding&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Sterilisasi media biakan sel, serum, protein, cairan infus&lt;/td&gt;
        &lt;/tr&gt;'>
                                        <i class="fas fa-table"></i>
                                        <span>Spesifikasi</span>
                                    </button>
                                    <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20CHM%C2%AE%20Disc%20Membrane%20Filters%20(MCE-NY-PTFE).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="chm-btn-wa">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Penawaran</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="chm-product-card">
                            <div class="chm-card-img-wrap">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/prod-syringe-filters.jpg" alt="CHM® Syringe Filters" loading="lazy" />
                                <span class="chm-card-tag">Microfiltration</span>
                                <span class="chm-card-badge" style="background-color: #fb8c00;">HPLC Certified</span>
                            </div>

                            <div class="chm-card-body">
                                <span class="chm-card-code">SYR-13-25-33</span>
                                <h3 class="chm-card-title">CHM® Syringe Filters</h3>
                                <p class="chm-card-desc">Filter jarum suntik (syringe filter) sekali pakai dengan rumah polypropylene medis tahan tekanan hingga 7 bar. Menjamin cairan injeksi instrumen HPLC/UHPLC/IC bebas dari partikulat perusak kolom.</p>

                                <div class="chm-specs-preview-grid">
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Diameter Casing</span>
                                        <span class="chm-spec-pill-val">13 mm, 25 mm, 33 mm</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Pori-pori</span>
                                        <span class="chm-spec-pill-val">0.22 µm dan 0.45 µm</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Tipe Membran</span>
                                        <span class="chm-spec-pill-val">PTFE, PVDF, Nylon, PES, MCE</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Sertifikasi</span>
                                        <span class="chm-spec-pill-val">HPLC Extractables Tested</span>
                                    </div>
                                </div>

                                <div class="chm-card-sizes">
                                    <i class="fas fa-boxes"></i>
                                    <span><strong>Tersedia:</strong> Pack isi 100 pcs (Non-steril) / Individual Blister (Steril)</span>
                                </div>

                                <div class="chm-card-actions">
                                    <button type="button" 
                                            class="chm-btn-spec-modal"
                                            data-title="CHM® Syringe Filters"
                                            data-code="SYR-13-25-33"
                                            data-category="Microfiltration"
                                            data-wa="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20CHM%C2%AE%20Syringe%20Filters%20(SYR-13-25-33).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0"
                                            data-specs='&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;Nylon Syringe Filter&lt;/td&gt;
            &lt;td&gt;Universal&lt;/td&gt;
            &lt;td&gt;13mm &amp;amp; 25mm&lt;/td&gt;
            &lt;td&gt;PP Housing&lt;/td&gt;
            &lt;td&gt;0.22 µm / 0.45 µm&lt;/td&gt;
            &lt;td&gt;Non-Sterile&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Klarifikasi sampel farmasi, pelarut organik &amp;amp; campuran air&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;PTFE Syringe Filter&lt;/td&gt;
            &lt;td&gt;Organic Solvents&lt;/td&gt;
            &lt;td&gt;13mm &amp;amp; 25mm&lt;/td&gt;
            &lt;td&gt;PP Housing&lt;/td&gt;
            &lt;td&gt;0.22 µm / 0.45 µm&lt;/td&gt;
            &lt;td&gt;Solvent Resistant&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Pelarut non-polar, kloroform, heksana, THF, asam pekat&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;PES Sterile Syringe&lt;/td&gt;
            &lt;td&gt;High Recovery&lt;/td&gt;
            &lt;td&gt;33mm Sterile&lt;/td&gt;
            &lt;td&gt;Individual Blister&lt;/td&gt;
            &lt;td&gt;0.22 µm&lt;/td&gt;
            &lt;td&gt;Sterile EO&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Sterilisasi biologis, filtrasi media sel bebas endotoksin&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;PVDF Syringe Filter&lt;/td&gt;
            &lt;td&gt;Low Binding&lt;/td&gt;
            &lt;td&gt;13mm &amp;amp; 25mm&lt;/td&gt;
            &lt;td&gt;PP Housing&lt;/td&gt;
            &lt;td&gt;0.22 µm / 0.45 µm&lt;/td&gt;
            &lt;td&gt;Non-Sterile&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Kromatografi protein, peptida, antibodi monoklonal&lt;/td&gt;
        &lt;/tr&gt;'>
                                        <i class="fas fa-table"></i>
                                        <span>Spesifikasi</span>
                                    </button>
                                    <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20CHM%C2%AE%20Syringe%20Filters%20(SYR-13-25-33).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="chm-btn-wa">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Penawaran</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="cat-specialities" class="chm-category-section category-block" data-category="cat-specialities">
                <div class="chm-container">
                    <div class="chm-cat-header-block" style="border-left-color: #fbc02d;">
                        <div class="chm-cat-title-wrap">
                            <h2>Specialities</h2>
                            <p>Kertas khusus berteknologi tinggi untuk pengambilan spesimen diagnostik kering (DBS), pembersih optik mikroskop, kertas pemisah fase cair, serta kertas uji antibiotik dan germinasi benih.</p>
                        </div>
                        <span class="chm-cat-badge-pill" style="background-color: #fffde7; color: #f57f17;">
                            Dedicated Diagnostic, Sampling & Laboratory Papers
                        </span>
                    </div>

                    <div class="chm-products-grid">
                        <div class="chm-product-card">
                            <div class="chm-card-img-wrap">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/prod-dbs-cards.jpg" alt="Specimen Collection Cards (DBS)" loading="lazy" />
                                <span class="chm-card-tag">Specialities</span>
                                <span class="chm-card-badge" style="background-color: #fbc02d;">Medical IVD</span>
                            </div>

                            <div class="chm-card-body">
                                <span class="chm-card-code">DBS-903</span>
                                <h3 class="chm-card-title">Specimen Collection Cards (DBS)</h3>
                                <p class="chm-card-desc">Kartu pengambil spesimen bercak darah kering (Dried Blood Spot) dari 100% serat kapas murni terstandar internasional. Digunakan untuk skrining bayi baru lahir (neonatal screening), forensik DNA, dan bio-banking.</p>

                                <div class="chm-specs-preview-grid">
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Standar Medis</span>
                                        <span class="chm-spec-pill-val">CE-IVD & CLSI NBS01-A6</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Bahan</span>
                                        <span class="chm-spec-pill-val">100% Pure Absorbent Cotton</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Kapasitas Serapan</span>
                                        <span class="chm-spec-pill-val">Seragam dan Terkalibrasi</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Aplikasi</span>
                                        <span class="chm-spec-pill-val">Skrining Neonatus & Ekstraksi DNA</span>
                                    </div>
                                </div>

                                <div class="chm-card-sizes">
                                    <i class="fas fa-boxes"></i>
                                    <span><strong>Tersedia:</strong> Format 4-spot, 5-spot, strip barcode custom</span>
                                </div>

                                <div class="chm-card-actions">
                                    <button type="button" 
                                            class="chm-btn-spec-modal"
                                            data-title="Specimen Collection Cards (DBS)"
                                            data-code="DBS-903"
                                            data-category="Specialities"
                                            data-wa="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Specimen%20Collection%20Cards%20(DBS)%20(DBS-903).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0"
                                            data-specs='&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;CHM 903 Card&lt;/td&gt;
            &lt;td&gt;Calibrated Spot&lt;/td&gt;
            &lt;td&gt;180 g/m²&lt;/td&gt;
            &lt;td&gt;430 µm&lt;/td&gt;
            &lt;td&gt;Blood Absorption&lt;/td&gt;
            &lt;td&gt;High Purity&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Skrining hipotiroid kongenital, penyakit metabolik, DNA PCR&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;CHM Forensic Card&lt;/td&gt;
            &lt;td&gt;Rapid Dry&lt;/td&gt;
            &lt;td&gt;180 g/m²&lt;/td&gt;
            &lt;td&gt;430 µm&lt;/td&gt;
            &lt;td&gt;Micro Sample&lt;/td&gt;
            &lt;td&gt;DNase/RNase Free&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Pengambilan sampel forensik kriminal, isolasi genomik&lt;/td&gt;
        &lt;/tr&gt;'>
                                        <i class="fas fa-table"></i>
                                        <span>Spesifikasi</span>
                                    </button>
                                    <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Specimen%20Collection%20Cards%20(DBS)%20(DBS-903).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="chm-btn-wa">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Penawaran</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="chm-product-card">
                            <div class="chm-card-img-wrap">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/prod-lens-cleaning.jpg" alt="Lens Cleaning Tissue (Paper Lens)" loading="lazy" />
                                <span class="chm-card-tag">Specialities</span>
                                <span class="chm-card-badge" style="background-color: #fbc02d;">Bebas Serat</span>
                            </div>

                            <div class="chm-card-body">
                                <span class="chm-card-code">LENS-105</span>
                                <h3 class="chm-card-title">Lens Cleaning Tissue (Paper Lens)</h3>
                                <p class="chm-card-desc">Kertas pembersih lensa optik bebas serat dan bebas goresan dari serat tipis murni bermutu tinggi. Sangat aman membersihkan lensa objektif mikroskop, prisma refraktometer, dan kuvet spektrofotometer.</p>

                                <div class="chm-specs-preview-grid">
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Ketebalan</span>
                                        <span class="chm-spec-pill-val">Ultra Tipis (12 g/m²)</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Serat</span>
                                        <span class="chm-spec-pill-val">100% Lint-Free Soft Fibers</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Keamanan Optik</span>
                                        <span class="chm-spec-pill-val">Anti-Scratch Coating Safe</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Format Buku</span>
                                        <span class="chm-spec-pill-val">Booklet 50 lembar berpori robek</span>
                                    </div>
                                </div>

                                <div class="chm-card-sizes">
                                    <i class="fas fa-boxes"></i>
                                    <span><strong>Tersedia:</strong> Ukuran buku 100 x 150 mm (Buku 50 lembar / pack 25 buku)</span>
                                </div>

                                <div class="chm-card-actions">
                                    <button type="button" 
                                            class="chm-btn-spec-modal"
                                            data-title="Lens Cleaning Tissue (Paper Lens)"
                                            data-code="LENS-105"
                                            data-category="Specialities"
                                            data-wa="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Lens%20Cleaning%20Tissue%20(Paper%20Lens)%20(LENS-105).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0"
                                            data-specs='&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;Grade 105&lt;/td&gt;
            &lt;td&gt;Instant Wipe&lt;/td&gt;
            &lt;td&gt;12 g/m²&lt;/td&gt;
            &lt;td&gt;35 µm&lt;/td&gt;
            &lt;td&gt;Solvent Absorption&lt;/td&gt;
            &lt;td&gt;No Residue&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Lensa mikroskop elektron &amp;amp; cahaya, prisma polarimeter, kuvet UV-Vis&lt;/td&gt;
        &lt;/tr&gt;'>
                                        <i class="fas fa-table"></i>
                                        <span>Spesifikasi</span>
                                    </button>
                                    <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Lens%20Cleaning%20Tissue%20(Paper%20Lens)%20(LENS-105).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="chm-btn-wa">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Penawaran</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="chm-product-card">
                            <div class="chm-card-img-wrap">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/cat-specialities.jpg" alt="Phase Separation Filter Paper" loading="lazy" />
                                <span class="chm-card-tag">Specialities</span>
                                <span class="chm-card-badge" style="background-color: #fbc02d;">Hydrophobic</span>
                            </div>

                            <div class="chm-card-body">
                                <span class="chm-card-code">F2080-PHASE</span>
                                <h3 class="chm-card-title">Phase Separation Filter Paper</h3>
                                <p class="chm-card-desc">Kertas saring hidrofobik terimpregnasi silikon stabil yang hanya melewatkan fase organik (pelarut non-air) dan menahan 100% fase air. Pengganti praktis corong pisah manual (separating funnel).</p>

                                <div class="chm-specs-preview-grid">
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Tipe Impregnasi</span>
                                        <span class="chm-spec-pill-val">Silicone Hydrophobic</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Fase Tembus</span>
                                        <span class="chm-spec-pill-val">Hanya Pelarut Organik</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Fase Tertahan</span>
                                        <span class="chm-spec-pill-val">100% Fase Air</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Kecepatan</span>
                                        <span class="chm-spec-pill-val">Sangat Cepat</span>
                                    </div>
                                </div>

                                <div class="chm-card-sizes">
                                    <i class="fas fa-boxes"></i>
                                    <span><strong>Tersedia:</strong> Diameter 90, 110, 125, 150, 185, 240 mm</span>
                                </div>

                                <div class="chm-card-actions">
                                    <button type="button" 
                                            class="chm-btn-spec-modal"
                                            data-title="Phase Separation Filter Paper"
                                            data-code="F2080-PHASE"
                                            data-category="Specialities"
                                            data-wa="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Phase%20Separation%20Filter%20Paper%20(F2080-PHASE).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0"
                                            data-specs='&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F2080&lt;/td&gt;
            &lt;td&gt;Fast Flow&lt;/td&gt;
            &lt;td&gt;85 g/m²&lt;/td&gt;
            &lt;td&gt;170 µm&lt;/td&gt;
            &lt;td&gt;Water Barrier&lt;/td&gt;
            &lt;td&gt;Silicone Treated&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Ekstraksi pelarut, uji residu pestisida, pemisahan etil asetat dari air&lt;/td&gt;
        &lt;/tr&gt;'>
                                        <i class="fas fa-table"></i>
                                        <span>Spesifikasi</span>
                                    </button>
                                    <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Phase%20Separation%20Filter%20Paper%20(F2080-PHASE).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="chm-btn-wa">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Penawaran</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="cat-chromatography" class="chm-category-section category-block" data-category="cat-chromatography">
                <div class="chm-container">
                    <div class="chm-cat-header-block" style="border-left-color: #43a047;">
                        <div class="chm-cat-title-wrap">
                            <h2>Chromatography</h2>
                            <p>Kolom HPLC dengan efisiensi pemisahan tinggi (theoretical plates tinggi), tabung ekstraksi fasa padat (SPE), botol autosampler (vials & septa) bebas kontaminasi, dan kit QuEChERS.</p>
                        </div>
                        <span class="chm-cat-badge-pill" style="background-color: #e8f5e9; color: #2e7d32;">
                            High Performance HPLC Columns, SPE & Autosampler Consumables
                        </span>
                    </div>

                    <div class="chm-products-grid">
                        <div class="chm-product-card">
                            <div class="chm-card-img-wrap">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/prod-hplc-columns.jpg" alt="CHM® HPLC Analytical Columns" loading="lazy" />
                                <span class="chm-card-tag">Chromatography</span>
                                <span class="chm-card-badge" style="background-color: #43a047;">High Resolution</span>
                            </div>

                            <div class="chm-card-body">
                                <span class="chm-card-code">HPLC-C18-C8</span>
                                <h3 class="chm-card-title">CHM® HPLC Analytical Columns</h3>
                                <p class="chm-card-desc">Kolom kromatografi cair berkinerja tinggi (HPLC) dengan silika ultrapur spherical 100Å. Menghasilkan puncak kromatogram sangat simetris, efisiensi pemisahan luar biasa, dan masa pakai panjang.</p>

                                <div class="chm-specs-preview-grid">
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Fase Diam</span>
                                        <span class="chm-spec-pill-val">C18 (ODS), C8, Phenyl, Silica, NH2</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Ukuran Partikel</span>
                                        <span class="chm-spec-pill-val">3 µm dan 5 µm Spherical</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Dimensi Standar</span>
                                        <span class="chm-spec-pill-val">250 x 4.6 mm, 150 x 4.6 mm</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Tekanan Maksimum</span>
                                        <span class="chm-spec-pill-val">400 bar (HPLC) / 600 bar</span>
                                    </div>
                                </div>

                                <div class="chm-card-sizes">
                                    <i class="fas fa-boxes"></i>
                                    <span><strong>Tersedia:</strong> Panjang 50, 100, 150, 250 mm x ID 2.1, 4.0, 4.6 mm</span>
                                </div>

                                <div class="chm-card-actions">
                                    <button type="button" 
                                            class="chm-btn-spec-modal"
                                            data-title="CHM® HPLC Analytical Columns"
                                            data-code="HPLC-C18-C8"
                                            data-category="Chromatography"
                                            data-wa="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20CHM%C2%AE%20HPLC%20Analytical%20Columns%20(HPLC-C18-C8).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0"
                                            data-specs='&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;CHM-C18 5µm&lt;/td&gt;
            &lt;td&gt;High Efficiency&lt;/td&gt;
            &lt;td&gt;Endcapped&lt;/td&gt;
            &lt;td&gt;100Å Pore&lt;/td&gt;
            &lt;td&gt;Carbon Load 17%&lt;/td&gt;
            &lt;td&gt;pH range 2-9&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Uji kadar obat farmasi, asam amino, vitamin, herbisida&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;CHM-C8 5µm&lt;/td&gt;
            &lt;td&gt;Moderate Retention&lt;/td&gt;
            &lt;td&gt;Endcapped&lt;/td&gt;
            &lt;td&gt;100Å Pore&lt;/td&gt;
            &lt;td&gt;Carbon Load 11%&lt;/td&gt;
            &lt;td&gt;pH range 2-9&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Senyawa sangat hidrofobik, peptida, steroid&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;CHM-HILIC 3µm&lt;/td&gt;
            &lt;td&gt;Polar Separation&lt;/td&gt;
            &lt;td&gt;Unbonded&lt;/td&gt;
            &lt;td&gt;100Å Pore&lt;/td&gt;
            &lt;td&gt;Polar Phase&lt;/td&gt;
            &lt;td&gt;pH range 2-8&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Senyawa polar kuat, metabolit seluler, gula reduksi&lt;/td&gt;
        &lt;/tr&gt;'>
                                        <i class="fas fa-table"></i>
                                        <span>Spesifikasi</span>
                                    </button>
                                    <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20CHM%C2%AE%20HPLC%20Analytical%20Columns%20(HPLC-C18-C8).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="chm-btn-wa">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Penawaran</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="chm-product-card">
                            <div class="chm-card-img-wrap">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/cat-chromatography.jpg" alt="CHM® SPE Solid Phase Extraction Columns" loading="lazy" />
                                <span class="chm-card-tag">Chromatography</span>
                                <span class="chm-card-badge" style="background-color: #43a047;">Purity Sample</span>
                            </div>

                            <div class="chm-card-body">
                                <span class="chm-card-code">SPE-C18-SCX</span>
                                <h3 class="chm-card-title">CHM® SPE Solid Phase Extraction Columns</h3>
                                <p class="chm-card-desc">Kolom SPE untuk ekstraksi dan pembersihan sampel cair sebelum injeksi ke instrumen HPLC, LC-MS/MS, atau GC-MS. Menghilangkan matriks pengganggu dan meningkatkan sensitivitas deteksi analit.</p>

                                <div class="chm-specs-preview-grid">
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Fasa SPE</span>
                                        <span class="chm-spec-pill-val">C18, C8, Silica, Florisil, SCX, SAX</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Volume Tabung</span>
                                        <span class="chm-spec-pill-val">1 mL, 3 mL, 6 mL, 12 mL</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Massa Sorbent</span>
                                        <span class="chm-spec-pill-val">100 mg, 200 mg, 500 mg, 1000 mg</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Bahan Tabung</span>
                                        <span class="chm-spec-pill-val">Medical Polypropylene murni</span>
                                    </div>
                                </div>

                                <div class="chm-card-sizes">
                                    <i class="fas fa-boxes"></i>
                                    <span><strong>Tersedia:</strong> Kotak isi 30 atau 50 kolom SPE</span>
                                </div>

                                <div class="chm-card-actions">
                                    <button type="button" 
                                            class="chm-btn-spec-modal"
                                            data-title="CHM® SPE Solid Phase Extraction Columns"
                                            data-code="SPE-C18-SCX"
                                            data-category="Chromatography"
                                            data-wa="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20CHM%C2%AE%20SPE%20Solid%20Phase%20Extraction%20Columns%20(SPE-C18-SCX).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0"
                                            data-specs='&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;SPE C18 (Endcapped)&lt;/td&gt;
            &lt;td&gt;Reversed Phase&lt;/td&gt;
            &lt;td&gt;500 mg / 6 mL&lt;/td&gt;
            &lt;td&gt;50 µm Sorbent&lt;/td&gt;
            &lt;td&gt;Non-polar analyte&lt;/td&gt;
            &lt;td&gt;High Purity&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Residu obat hewan dalam daging/susu, pestisida dalam air&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;SPE Silica&lt;/td&gt;
            &lt;td&gt;Normal Phase&lt;/td&gt;
            &lt;td&gt;500 mg / 3 mL&lt;/td&gt;
            &lt;td&gt;50 µm Sorbent&lt;/td&gt;
            &lt;td&gt;Polar analyte&lt;/td&gt;
            &lt;td&gt;High Purity&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Fraksinasi hidrokarbon, minyak bumi, lipid bioanalisis&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;SPE Florisil&lt;/td&gt;
            &lt;td&gt;Magnesium Silicate&lt;/td&gt;
            &lt;td&gt;1000 mg / 6 mL&lt;/td&gt;
            &lt;td&gt;60-100 mesh&lt;/td&gt;
            &lt;td&gt;Pesticides&lt;/td&gt;
            &lt;td&gt;AOAC Standard&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Pembersihan residu klorin organik &amp;amp; PCB&lt;/td&gt;
        &lt;/tr&gt;'>
                                        <i class="fas fa-table"></i>
                                        <span>Spesifikasi</span>
                                    </button>
                                    <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20CHM%C2%AE%20SPE%20Solid%20Phase%20Extraction%20Columns%20(SPE-C18-SCX).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="chm-btn-wa">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Penawaran</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="chm-product-card">
                            <div class="chm-card-img-wrap">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/prod-vials-septa.jpg" alt="Autosampler Vials, Caps & Septa (2 mL)" loading="lazy" />
                                <span class="chm-card-tag">Chromatography</span>
                                <span class="chm-card-badge" style="background-color: #43a047;">HPLC / GC Autosampler</span>
                            </div>

                            <div class="chm-card-body">
                                <span class="chm-card-code">VIAL-9MM-2ML</span>
                                <h3 class="chm-card-title">Autosampler Vials, Caps & Septa (2 mL)</h3>
                                <p class="chm-card-desc">Botol autosampler 2 mL bening (clear) dan gelap (amber) berulir 9 mm dengan tutup screw cap dan septum PTFE/Silicone anti-bleeding. Kompatibel dengan autosampler Agilent, Shimadzu, Waters, dan Thermo.</p>

                                <div class="chm-specs-preview-grid">
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Kapasitas</span>
                                        <span class="chm-spec-pill-val">2 mL (Standar Autosampler)</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Kaca</span>
                                        <span class="chm-spec-pill-val">Borosilikat 33 Ekspansi Rendah</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Septa</span>
                                        <span class="chm-spec-pill-val">PTFE / Silicone (Pre-slit / Solid)</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Fitur</span>
                                        <span class="chm-spec-pill-val">Patch Putih & Skala Graduasi</span>
                                    </div>
                                </div>

                                <div class="chm-card-sizes">
                                    <i class="fas fa-boxes"></i>
                                    <span><strong>Tersedia:</strong> Kemasan pack isi 100 vial + 100 caps/septa</span>
                                </div>

                                <div class="chm-card-actions">
                                    <button type="button" 
                                            class="chm-btn-spec-modal"
                                            data-title="Autosampler Vials, Caps &amp; Septa (2 mL)"
                                            data-code="VIAL-9MM-2ML"
                                            data-category="Chromatography"
                                            data-wa="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Autosampler%20Vials%2C%20Caps%20%26%20Septa%20(2%20mL)%20(VIAL-9MM-2ML).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0"
                                            data-specs='&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;Clear Vial 2 mL&lt;/td&gt;
            &lt;td&gt;Screw 9-425&lt;/td&gt;
            &lt;td&gt;Kaca Borosilikat&lt;/td&gt;
            &lt;td&gt;1.0 mm Wall&lt;/td&gt;
            &lt;td&gt;2.0 mL&lt;/td&gt;
            &lt;td&gt;Hydrolytic Class 1&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Autosampler HPLC/GC rutin dengan patch tulis&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;Amber Vial 2 mL&lt;/td&gt;
            &lt;td&gt;UV Protection&lt;/td&gt;
            &lt;td&gt;Kaca Borosilikat&lt;/td&gt;
            &lt;td&gt;1.0 mm Wall&lt;/td&gt;
            &lt;td&gt;2.0 mL&lt;/td&gt;
            &lt;td&gt;UV Block &amp;lt;500nm&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Sampel sensitif cahaya matahari/fluoresensi&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;Blue Cap + Septa&lt;/td&gt;
            &lt;td&gt;Bonded Septa&lt;/td&gt;
            &lt;td&gt;Polypropylene&lt;/td&gt;
            &lt;td&gt;1.0 mm Septa&lt;/td&gt;
            &lt;td&gt;PTFE/Silicone&lt;/td&gt;
            &lt;td&gt;Zero Bleed&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Septum tahan jarum suntik autosampler berulang&lt;/td&gt;
        &lt;/tr&gt;'>
                                        <i class="fas fa-table"></i>
                                        <span>Spesifikasi</span>
                                    </button>
                                    <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Autosampler%20Vials%2C%20Caps%20%26%20Septa%20(2%20mL)%20(VIAL-9MM-2ML).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="chm-btn-wa">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Penawaran</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="cat-industrial-filtration" class="chm-category-section category-block" data-category="cat-industrial-filtration">
                <div class="chm-container">
                    <div class="chm-cat-header-block" style="border-left-color: #00acc1;">
                        <div class="chm-cat-title-wrap">
                            <h2>Industrial Filtration</h2>
                            <p>Kertas saring industri dan filter sheet tebal (depth filter boards) untuk proses produksi skala pabrik makanan, minuman (bir, anggur, jus), minyak nabati, kimia, dan farmasi.</p>
                        </div>
                        <span class="chm-cat-badge-pill" style="background-color: #e0f7fa; color: #00838f;">
                            Industrial Depth Filter Sheets, Boards & High-Flow Papers
                        </span>
                    </div>

                    <div class="chm-products-grid">
                        <div class="chm-product-card">
                            <div class="chm-card-img-wrap">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/prod-plain-filter.jpg" alt="Industrial Depth Filter Sheets & Boards" loading="lazy" />
                                <span class="chm-card-tag">Industrial Filtration</span>
                                <span class="chm-card-badge" style="background-color: #00acc1;">Kapasitas Besar</span>
                            </div>

                            <div class="chm-card-body">
                                <span class="chm-card-code">SHEET-DEPTH-F</span>
                                <h3 class="chm-card-title">Industrial Depth Filter Sheets & Boards</h3>
                                <p class="chm-card-desc">Filter lembaran tebal (filter sheet / cardboard) dengan struktur matriks 3 dimensi serat selulosa dan diatomaceous earth. Menyaring partikel koloidal, ragi, dan kekeruhan pada industri pangan dan farmasi.</p>

                                <div class="chm-specs-preview-grid">
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Ketebalan</span>
                                        <span class="chm-spec-pill-val">3.5 - 4.2 mm</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Tingkat Kejernihan</span>
                                        <span class="chm-spec-pill-val">Kasar, Sedang, hingga Sterilisasi Dingin</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Suhu Maksimum</span>
                                        <span class="chm-spec-pill-val">Hingga 140°C (Steam Sterilizable)</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Tekanan Kerja</span>
                                        <span class="chm-spec-pill-val">Hingga 3.5 bar</span>
                                    </div>
                                </div>

                                <div class="chm-card-sizes">
                                    <i class="fas fa-boxes"></i>
                                    <span><strong>Tersedia:</strong> Lembaran 40 x 40 cm, 60 x 60 cm, dan modul lenticular 12" & 16"</span>
                                </div>

                                <div class="chm-card-actions">
                                    <button type="button" 
                                            class="chm-btn-spec-modal"
                                            data-title="Industrial Depth Filter Sheets &amp; Boards"
                                            data-code="SHEET-DEPTH-F"
                                            data-category="Industrial Filtration"
                                            data-wa="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Industrial%20Depth%20Filter%20Sheets%20%26%20Boards%20(SHEET-DEPTH-F).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0"
                                            data-specs='&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;Coarse Clarification&lt;/td&gt;
            &lt;td&gt;Very High Flow&lt;/td&gt;
            &lt;td&gt;1000 g/m²&lt;/td&gt;
            &lt;td&gt;3.6 mm&lt;/td&gt;
            &lt;td&gt;10 - 25 µm&lt;/td&gt;
            &lt;td&gt;Food Grade&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Klarifikasi awal sari buah, sirup, minyak goreng&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;Polishing Grade&lt;/td&gt;
            &lt;td&gt;Medium Flow&lt;/td&gt;
            &lt;td&gt;1200 g/m²&lt;/td&gt;
            &lt;td&gt;3.8 mm&lt;/td&gt;
            &lt;td&gt;1.5 - 4 µm&lt;/td&gt;
            &lt;td&gt;Food Grade&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Penjernihan bir, anggur, larutan gelatin, kosmetik&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;Cold Sterile Sheet&lt;/td&gt;
            &lt;td&gt;Tight Matrix&lt;/td&gt;
            &lt;td&gt;1400 g/m²&lt;/td&gt;
            &lt;td&gt;4.0 mm&lt;/td&gt;
            &lt;td&gt;0.4 - 0.8 µm&lt;/td&gt;
            &lt;td&gt;Pharma Grade&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Reduksi mikrobia dingin pada cairan farmasi tanpa panas&lt;/td&gt;
        &lt;/tr&gt;'>
                                        <i class="fas fa-table"></i>
                                        <span>Spesifikasi</span>
                                    </button>
                                    <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Industrial%20Depth%20Filter%20Sheets%20%26%20Boards%20(SHEET-DEPTH-F).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="chm-btn-wa">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Penawaran</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="chm-product-card">
                            <div class="chm-card-img-wrap">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/cat-industrial-filtration.jpg" alt="Industrial Crêped & Plain Filter Papers" loading="lazy" />
                                <span class="chm-card-tag">Industrial Filtration</span>
                                <span class="chm-card-badge" style="background-color: #00acc1;">Wet Strength</span>
                            </div>

                            <div class="chm-card-body">
                                <span class="chm-card-code">CREPE-IND-PAPER</span>
                                <h3 class="chm-card-title">Industrial Crêped & Plain Filter Papers</h3>
                                <p class="chm-card-desc">Kertas saring bergelombang (crêped) dan polos dengan kekuatan basah tinggi untuk filter press, drum filter, dan filtrasi cairan industri bervolume besar seperti oli, varnish, dan larutan galvanik.</p>

                                <div class="chm-specs-preview-grid">
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Berat</span>
                                        <span class="chm-spec-pill-val">65 - 180 g/m²</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Tipe Tekstur</span>
                                        <span class="chm-spec-pill-val">Crêped (Permukaan Luas) & Smooth Plain</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Ketahanan Kimia</span>
                                        <span class="chm-spec-pill-val">Resin Impregnated Wet Strength</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Format Roll / Sheet</span>
                                        <span class="chm-spec-pill-val">Roll hingga lebar 120 cm & Lembaran</span>
                                    </div>
                                </div>

                                <div class="chm-card-sizes">
                                    <i class="fas fa-boxes"></i>
                                    <span><strong>Tersedia:</strong> Roll lebar 50 cm, 100 cm, 120 cm atau lembaran persegi custom</span>
                                </div>

                                <div class="chm-card-actions">
                                    <button type="button" 
                                            class="chm-btn-spec-modal"
                                            data-title="Industrial Crêped &amp; Plain Filter Papers"
                                            data-code="CREPE-IND-PAPER"
                                            data-category="Industrial Filtration"
                                            data-wa="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Industrial%20Cr%C3%AAped%20%26%20Plain%20Filter%20Papers%20(CREPE-IND-PAPER).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0"
                                            data-specs='&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F1091 Crêped&lt;/td&gt;
            &lt;td&gt;Extra Fast&lt;/td&gt;
            &lt;td&gt;65 g/m²&lt;/td&gt;
            &lt;td&gt;160 µm&lt;/td&gt;
            &lt;td&gt;35 - 40 µm&lt;/td&gt;
            &lt;td&gt;Resin Bound&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Filtrasi cepat industri elektroplating, cat, pernis&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F1095 Crêped&lt;/td&gt;
            &lt;td&gt;Fast Flow&lt;/td&gt;
            &lt;td&gt;90 g/m²&lt;/td&gt;
            &lt;td&gt;330 µm&lt;/td&gt;
            &lt;td&gt;25 - 30 µm&lt;/td&gt;
            &lt;td&gt;High Strength&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Filter press industri kimia, pemisahan padatan kasar&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;F1113 Plain Thick&lt;/td&gt;
            &lt;td&gt;High Capacity&lt;/td&gt;
            &lt;td&gt;160 g/m²&lt;/td&gt;
            &lt;td&gt;470 µm&lt;/td&gt;
            &lt;td&gt;50 - 60 µm&lt;/td&gt;
            &lt;td&gt;Heavy Duty&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Oli mesin, pelumas industri, suspensi kental&lt;/td&gt;
        &lt;/tr&gt;'>
                                        <i class="fas fa-table"></i>
                                        <span>Spesifikasi</span>
                                    </button>
                                    <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20Industrial%20Cr%C3%AAped%20%26%20Plain%20Filter%20Papers%20(CREPE-IND-PAPER).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="chm-btn-wa">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Penawaran</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="cat-capsule-filters" class="chm-category-section category-block" data-category="cat-capsule-filters">
                <div class="chm-container">
                    <div class="chm-cat-header-block" style="border-left-color: #039be5;">
                        <div class="chm-cat-title-wrap">
                            <h2>Capsule Filters</h2>
                            <p>Filter kapsul siap pakai (disposable capsule filter) yang terintegrasi penuh tanpa housing terpisah. Mencegah risiko kontaminasi silang dan kebocoran cairan berharga pada industri biofarmasi.</p>
                        </div>
                        <span class="chm-cat-badge-pill" style="background-color: #e1f5fe; color: #0277bd;">
                            CHM® CapFIL Disposable Capsule Filters for Critical Processing
                        </span>
                    </div>

                    <div class="chm-products-grid">
                        <div class="chm-product-card">
                            <div class="chm-card-img-wrap">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/chm/cat-capsule-filters.jpg" alt="CHM® CapFIL Tri-Clamp & Hose Barb Capsule Filters" loading="lazy" />
                                <span class="chm-card-tag">Capsule Filters</span>
                                <span class="chm-card-badge" style="background-color: #039be5;">Ready-to-Use</span>
                            </div>

                            <div class="chm-card-body">
                                <span class="chm-card-code">CAPFIL-TC-HB</span>
                                <h3 class="chm-card-title">CHM® CapFIL Tri-Clamp & Hose Barb Capsule Filters</h3>
                                <p class="chm-card-desc">Unit filter kapsul steril mandiri dengan membran PES atau PTFE hidrofilik/hidrofobik. Desain bodi polipropilen termofusi tanpa lem perekat atau resin (thermal welding) untuk integritas filtrasi mutlak.</p>

                                <div class="chm-specs-preview-grid">
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Koneksi Fitting</span>
                                        <span class="chm-spec-pill-val">1.5" Sanitary Tri-Clamp & 1/2" Hose Barb</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Tipe Membran</span>
                                        <span class="chm-spec-pill-val">PES Asimetris & PTFE Murni</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Panjang Efektif</span>
                                        <span class="chm-spec-pill-val">Kapsul 2.5", 5", dan 10"</span>
                                    </div>
                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">Sterilitas</span>
                                        <span class="chm-spec-pill-val">Autoclavable (126°C) & Pre-sterilized Gamma</span>
                                    </div>
                                </div>

                                <div class="chm-card-sizes">
                                    <i class="fas fa-boxes"></i>
                                    <span><strong>Tersedia:</strong> Koneksi: 1.5" Sanitary Tri-Clamp, 1/2" Hose Barb, 1/4" Male NPT</span>
                                </div>

                                <div class="chm-card-actions">
                                    <button type="button" 
                                            class="chm-btn-spec-modal"
                                            data-title="CHM® CapFIL Tri-Clamp &amp; Hose Barb Capsule Filters"
                                            data-code="CAPFIL-TC-HB"
                                            data-category="Capsule Filters"
                                            data-wa="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20CHM%C2%AE%20CapFIL%20Tri-Clamp%20%26%20Hose%20Barb%20Capsule%20Filters%20(CAPFIL-TC-HB).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0"
                                            data-specs='&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;CapFIL-PES 0.22µm&lt;/td&gt;
            &lt;td&gt;High Flow Liquid&lt;/td&gt;
            &lt;td&gt;PES Dual Layer&lt;/td&gt;
            &lt;td&gt;PP Thermal Bond&lt;/td&gt;
            &lt;td&gt;0.22 µm Absolute&lt;/td&gt;
            &lt;td&gt;USP Class VI&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Sterilisasi media biakan sel, vaksin, buffer steril, API&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;CapFIL-PTFE 0.22µm&lt;/td&gt;
            &lt;td&gt;Sterile Air / Gas&lt;/td&gt;
            &lt;td&gt;Hydrophobic PTFE&lt;/td&gt;
            &lt;td&gt;PP Thermal Bond&lt;/td&gt;
            &lt;td&gt;0.22 µm Gas / Vent&lt;/td&gt;
            &lt;td&gt;Bacterial Retention&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Ventilasi tangki fermentor steril, filtrasi gas CO2 &amp;amp; N2&lt;/td&gt;
        &lt;/tr&gt;&lt;tr&gt;
            &lt;td style=&quot;font-weight:700; color:#1e3a8a;&quot;&gt;CapFIL-PP 1.0µm&lt;/td&gt;
            &lt;td&gt;High Dirt Pre-filter&lt;/td&gt;
            &lt;td&gt;Meltblown PP&lt;/td&gt;
            &lt;td&gt;PP Thermal Bond&lt;/td&gt;
            &lt;td&gt;1.0 µm / 5.0 µm&lt;/td&gt;
            &lt;td&gt;Food &amp;amp; Pharma&lt;/td&gt;
            &lt;td style=&quot;font-size:0.82rem;&quot;&gt;Klarifikasi dan prefiltrasi sebelum membran 0.22µm&lt;/td&gt;
        &lt;/tr&gt;'>
                                        <i class="fas fa-table"></i>
                                        <span>Spesifikasi</span>
                                    </button>
                                    <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20tertarik%20dengan%20produk%20CHMLAB%3A%20CHM%C2%AE%20CapFIL%20Tri-Clamp%20%26%20Hose%20Barb%20Capsule%20Filters%20(CAPFIL-TC-HB).%20Mohon%20info%20penawaran%20harga%20dan%20ketersediaan%20stok.&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="chm-btn-wa">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Penawaran</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- 5. DOWNLOAD CATALOGUE & CONSULTATION BANNER -->
        <section class="chm-cta-banner-section">
            <div class="chm-container">
                <div class="chm-cta-box">
                    <span class="chm-badge" style="background: rgba(255,255,255,0.12); margin-bottom: 16px;">
                        <i class="fas fa-file-download"></i> Download Resmi Brosur & Tabel Ekuivalensi
                    </span>
                    <h2 class="chm-cta-title">Butuh Rekomendasi Filter Sesuai Prosedur Lab Anda?</h2>
                    <p class="chm-cta-desc">
                        Gunakan tabel ekuivalensi CHMLAB untuk membandingkan grade Whatman, Sartorius, Millipore, dan Advantec, atau konsultasikan kebutuhan riset dan pabrik Anda langsung dengan tim teknis Kinglab Medika Lestari.
                    </p>
                    <div class="chm-cta-btn-group">
                        <a href="https://www.chmlab.com/files/pdf/download_area/en/chmlab_cataleg.pdf" target="_blank" rel="noopener noreferrer" class="chm-cta-btn-pdf">
                            <i class="fas fa-file-pdf"></i>
                            <span>Unduh Katalog Lengkap (PDF)</span>
                        </a>
                        <a href="https://www.chmlab.com/files/pdf/download_area/en/chmlab_equivalence_table.pdf" target="_blank" rel="noopener noreferrer" class="chm-cta-btn-eq">
                            <i class="fas fa-exchange-alt"></i>
                            <span>Tabel Ekuivalensi Merk (PDF)</span>
                        </a>
                        <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20ingin%20konsultasi%20pemilihan%20filter%20CHMLAB&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="chm-cta-btn-eq" style="background:#25d366; border-color:#25d366;">
                            <i class="fab fa-whatsapp"></i>
                            <span>Konsultasi Produk Lab</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- 6. INTERACTIVE TECHNICAL SPECS MODAL -->
    <div class="chm-modal-backdrop" id="chmSpecsModal" aria-hidden="true" role="dialog">
        <div class="chm-modal-container">
            <div class="chm-modal-header">
                <div class="chm-modal-title-group">
                    <h3 id="chmModalTitle">Spesifikasi Teknis</h3>
                    <p id="chmModalSubtitle">CHMLAB Group - Standar Laboratorium Eropa</p>
                </div>
                <button type="button" class="chm-modal-close" id="chmModalClose" aria-label="Tutup Modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="chm-modal-body">
                <div class="chm-table-responsive">
                    <table class="chm-spec-table">
                        <thead>
                            <tr>
                                <th>Grade</th>
                                <th>Filtration Speed</th>
                                <th>Weight (g/m²)</th>
                                <th>Thickness (µm)</th>
                                <th>Retention (µm)</th>
                                <th>Ash Content</th>
                                <th>Rekomendasi Aplikasi</th>
                            </tr>
                        </thead>
                        <tbody id="chmModalTableBody">
                            <!-- Populated dynamically via JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="chm-modal-footer">
                <span style="font-size: 0.85rem; color: #64748b;">
                    <i class="fas fa-shield-alt" style="color: #2563eb;"></i> Garansi Keaslian Produk 100% Original Spanyol
                </span>
                <a href="#" target="_blank" rel="noopener noreferrer" class="chm-btn-wa" id="chmModalWaBtn">
                    <i class="fab fa-whatsapp"></i>
                    <span>Tanya Stok Grade Ini</span>
                </a>
            </div>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Sticky Nav Filter & Active State
    var filterBtns = document.querySelectorAll('.chm-filter-btn');
    var categorySections = document.querySelectorAll('.category-block');

    filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            var target = this.getAttribute('data-target');
            if (target === 'all') {
                e.preventDefault();
                filterBtns.forEach(function(b) { b.classList.remove('active'); });
                btn.classList.add('active');
                categorySections.forEach(function(sec) { sec.style.display = ''; });
                window.scrollTo({ top: document.querySelector('.chm-catalog-body').offsetTop - 120, behavior: 'smooth' });
            } else {
                filterBtns.forEach(function(b) { b.classList.remove('active'); });
                btn.classList.add('active');
            }
        });
    });

    // 2. Technical Specs Modal
    var modal = document.getElementById('chmSpecsModal');
    var modalClose = document.getElementById('chmModalClose');
    var modalTitle = document.getElementById('chmModalTitle');
    var modalSubtitle = document.getElementById('chmModalSubtitle');
    var modalTableBody = document.getElementById('chmModalTableBody');
    var modalWaBtn = document.getElementById('chmModalWaBtn');
    var specBtns = document.querySelectorAll('.chm-btn-spec-modal');

    function closeModal() {
        modal.classList.remove('active');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    specBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var title = this.getAttribute('data-title');
            var code = this.getAttribute('data-code');
            var category = this.getAttribute('data-category');
            var specs = this.getAttribute('data-specs');
            var waLink = this.getAttribute('data-wa');

            modalTitle.textContent = title + ' (' + code + ')';
            modalSubtitle.textContent = 'Kategori: ' + category + ' • CHMLAB Group Standard';
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
