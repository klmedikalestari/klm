const fs = require('fs');
const path = require('path');

const data = JSON.parse(fs.readFileSync('import-tools/chm-showcase-curated.json', 'utf8'));

function escapeHtml(str) {
  if (!str) return '';
  return str.replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
}

function generateShowcaseHtml(isPhp = false) {
  const brand = data.brand;
  const categories = data.categories;

  const baseImg = isPhp ? "<?php echo esc_url(get_template_directory_uri()); ?>/" : "";
  const homeUrl = isPhp ? "<?php echo esc_url(home_url('/')); ?>" : "preview.html";
  const productsUrl = isPhp ? "<?php echo esc_url(home_url('/products/')); ?>" : "preview-products.html";

  let out = '';

  if (!isPhp) {
    out += `<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHMLAB GROUP - Laboratory Filtration, Microfiltration & Chromatography | PT Kinglab Medika Lestari</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- Kinglab Base Style & CHMLAB Showcase Style -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/chm-showcase.css">
</head>
<body>

    <!-- Shared Header Placeholder -->
    <div id="header-placeholder"></div>

`;
  } else {
    out += `<?php
/**
 * Template Part: CHMLAB Group Showcase
 * Brand: CHMLAB GROUP (Filtration, Microfiltration, Specialities, Chromatography, Industrial Filtration, Capsule Filters)
 * 
 * @package Kinglab_Medika_Lestari_Theme
 */

// Enqueue styles if not already enqueued
wp_enqueue_style('chm-showcase-style', get_template_directory_uri() . '/assets/css/chm-showcase.css', array(), '1.0.0');
?>
`;
  }

  out += `    <div class="chm-showcase-wrapper">

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
                            "item": "${homeUrl}"
                        },
                        {
                            "@type": "ListItem",
                            "position": 2,
                            "name": "Products",
                            "item": "${productsUrl}"
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
                    <a href="${homeUrl}">Home</a>
                    <span class="separator">/</span>
                    <a href="${productsUrl}">Products</a>
                    <span class="separator">/</span>
                    <span class="current">CHMLAB Group</span>
                </nav>

                <div class="chm-hero-content">
                    <div class="chm-hero-logo">
                        <img src="${baseImg}assets/images/chm/chm-logo.png" alt="CHMLAB GROUP Logo" width="220" height="52" loading="eager" />
                    </div>
                    
                    <div class="chm-badge">
                        <i class="fas fa-certificate"></i>
                        <span>${brand.officialDistributor}</span>
                    </div>

                    <h1 class="chm-hero-title">
                        Advanced Filtration & <span>Microfiltration Systems</span>
                    </h1>

                    <p class="chm-hero-desc">
                        ${brand.description}
                    </p>

                    <!-- Stats Grid -->
                    <div class="chm-stats-grid">
`;

  brand.stats.forEach(st => {
    out += `                        <div class="chm-stat-item">
                            <span class="chm-stat-number">${st.number}</span>
                            <span class="chm-stat-label">${st.label}</span>
                            <span class="chm-stat-sub">${st.desc}</span>
                        </div>\n`;
  });

  out += `                    </div>
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
`;

  categories.forEach(cat => {
    out += `                    <a href="#${cat.id}" class="chm-tile-card tile-${cat.slug}" style="background-image: url('${baseImg}${cat.img}');">
                        <div class="chm-tile-overlay"></div>
                        <div class="chm-tile-content">
                            <h3 class="chm-tile-title">${cat.name}</h3>
                            <span class="chm-tile-btn">
                                <span>Lihat Spesifikasi</span>
                                <i class="fas fa-arrow-down"></i>
                            </span>
                        </div>
                    </a>\n`;
  });

  out += `                </div>
            </div>
        </section>

        <!-- 3. STICKY FILTER NAVIGATION -->
        <div class="chm-sticky-nav-wrapper">
            <div class="chm-container">
                <nav class="chm-filter-nav" aria-label="Category Filter">
                    <a href="#all" class="chm-filter-btn active" data-target="all">
                        <i class="fas fa-th-large"></i> Semua Kategori
                    </a>
`;

  categories.forEach(cat => {
    out += `                    <a href="#${cat.id}" class="chm-filter-btn" data-target="${cat.id}">
                        <span class="dot-badge" style="background-color: ${cat.color};"></span>
                        ${cat.name}
                    </a>\n`;
  });

  out += `                </nav>
            </div>
        </div>

        <!-- 4. PRODUCT SECTIONS (DETAIL PER KATEGORI) -->
        <div class="chm-catalog-body">
`;

  categories.forEach(cat => {
    out += `            <section id="${cat.id}" class="chm-category-section category-block" data-category="${cat.id}">
                <div class="chm-container">
                    <div class="chm-cat-header-block" style="border-left-color: ${cat.color};">
                        <div class="chm-cat-title-wrap">
                            <h2>${cat.name}</h2>
                            <p>${cat.description}</p>
                        </div>
                        <span class="chm-cat-badge-pill" style="background-color: ${cat.badgeColor}; color: ${cat.textColor};">
                            ${cat.tagline}
                        </span>
                    </div>

                    <div class="chm-products-grid">
`;

    cat.products.forEach(p => {
      // Build WhatsApp Link
      const waText = encodeURIComponent(`Halo PT Kinglab Medika Lestari, saya tertarik dengan produk CHMLAB: ${p.title} (${p.code}). Mohon info penawaran harga dan ketersediaan stok.`);
      const waLink = `https://wa.me/6281119214488?text=${waText}`;

      // Build specs table HTML for modal
      let tableRows = '';
      p.specs.forEach(row => {
        tableRows += `<tr>
            <td style="font-weight:700; color:#1e3a8a;">${escapeHtml(row.grade)}</td>
            <td>${escapeHtml(row.speed)}</td>
            <td>${escapeHtml(row.weight)}</td>
            <td>${escapeHtml(row.thickness)}</td>
            <td>${escapeHtml(row.retention)}</td>
            <td>${escapeHtml(row.ash)}</td>
            <td style="font-size:0.82rem;">${escapeHtml(row.app)}</td>
        </tr>`;
      });

      out += `                        <div class="chm-product-card">
                            <div class="chm-card-img-wrap">
                                <img src="${baseImg}${p.image}" alt="${p.title}" loading="lazy" />
                                <span class="chm-card-tag">${cat.name}</span>
                                <span class="chm-card-badge" style="background-color: ${cat.color};">${p.badge}</span>
                            </div>

                            <div class="chm-card-body">
                                <span class="chm-card-code">${p.code}</span>
                                <h3 class="chm-card-title">${p.title}</h3>
                                <p class="chm-card-desc">${p.shortDesc}</p>

                                <div class="chm-specs-preview-grid">
`;

      p.highlights.forEach(h => {
        out += `                                    <div class="chm-spec-pill">
                                        <span class="chm-spec-pill-label">${h.label}</span>
                                        <span class="chm-spec-pill-val">${h.val}</span>
                                    </div>\n`;
      });

      out += `                                </div>

                                <div class="chm-card-sizes">
                                    <i class="fas fa-boxes"></i>
                                    <span><strong>Tersedia:</strong> ${p.sizes}</span>
                                </div>

                                <div class="chm-card-actions">
                                    <button type="button" 
                                            class="chm-btn-spec-modal"
                                            data-title="${escapeHtml(p.title)}"
                                            data-code="${escapeHtml(p.code)}"
                                            data-category="${escapeHtml(cat.name)}"
                                            data-wa="${waLink}"
                                            data-specs='${escapeHtml(tableRows)}'>
                                        <i class="fas fa-table"></i>
                                        <span>Spesifikasi</span>
                                    </button>
                                    <a href="${waLink}" target="_blank" rel="noopener noreferrer" class="chm-btn-wa">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Penawaran</span>
                                    </a>
                                </div>
                            </div>
                        </div>\n`;
    });

    out += `                    </div>
                </div>
            </section>\n`;
  });

  out += `        </div>

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
                        <a href="${brand.catalogPdf}" target="_blank" rel="noopener noreferrer" class="chm-cta-btn-pdf">
                            <i class="fas fa-file-pdf"></i>
                            <span>Unduh Katalog Lengkap (PDF)</span>
                        </a>
                        <a href="${brand.equivalencePdf}" target="_blank" rel="noopener noreferrer" class="chm-cta-btn-eq">
                            <i class="fas fa-exchange-alt"></i>
                            <span>Tabel Ekuivalensi Merk (PDF)</span>
                        </a>
                        <a href="https://wa.me/6281119214488?text=Halo%20PT%20Kinglab%20Medika%20Lestari,%20saya%20ingin%20konsultasi%20pemilihan%20filter%20CHMLAB" target="_blank" rel="noopener noreferrer" class="chm-cta-btn-eq" style="background:#25d366; border-color:#25d366;">
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
`;

  if (!isPhp) {
    out += `
    <!-- Footer Placeholder -->
    <div id="footer-placeholder"></div>

    <!-- Theme Components (Shared Header/Footer) -->
    <script src="assets/js/theme-components.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- Modal & Filter JavaScript -->
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
</body>
</html>
`;
  } else {
    out += `
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
`;
  }

  return out;
}

// Generate both files
const previewHtml = generateShowcaseHtml(false);
fs.writeFileSync('preview-chm-filtration.html', previewHtml, 'utf8');
console.log('Saved preview-chm-filtration.html');

const templatePhp = generateShowcaseHtml(true);
fs.writeFileSync('template-parts/chm-filtration-showcase.php', templatePhp, 'utf8');
console.log('Saved template-parts/chm-filtration-showcase.php');
