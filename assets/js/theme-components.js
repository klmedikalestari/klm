/**
 * Theme Components for Static Previews
 * 
 * This file serves as the "Global Settings" (One-Door) for the preview header and footer.
 * If you want to change the menu or logo for all preview pages, edit the HTML strings below.
 */

window.ThemeComponents = {
    header: `
<!-- Shared Header for Previews -->
<header class="site-header" id="site-header">
    <div class="header-top-bar">
        <div class="container">
            <div class="header-top-left">
                <a href="tel:+622173928546"><i class="fas fa-phone-alt"></i> +62-21-739 2856</a>
                <a href="mailto:info@kinglab.co.id"><i class="fas fa-envelope"></i> info@kinglab.co.id</a>
            </div>
            <div class="header-top-right">
                <div class="header-license-info">
                    <span class="license-item"><strong>IDAK :</strong> 12290002200830022</span>
                    <span class="license-divider">-</span>
                    <span class="license-item"><strong>CDAKB :</strong> 122900022008300150007</span>
                </div>
            </div>
        </div>
    </div>
    <div class="header-main">
        <div class="container">
            <div class="site-logo">
                <a href="preview.html" class="logo-text">Kinglab Medika Lestari</a>
            </div>
            <div class="header-nav-wrapper">
                <nav class="main-navigation" id="main-navigation">
                    <ul>
                        <li><a href="preview.html">Home</a></li>
                        <li><a href="preview-about.html">About</a></li>
                        <li class="has-mega-menu">
                            <a href="javascript:void(0);">Products</a>
                            <div class="mega-menu-wrapper">
                                <div class="mega-menu-container">
                                    <div class="mega-menu-col">
                                        <h4 class="mega-menu-title">By Brand</h4>
                                        <ul class="mega-menu-list">
                                            <li><a href="preview-product-grid.html">Aczet</a></li>
                                            <li><a href="preview-arco-equipment.html">Arco</a></li>
                                            <li><a href="preview-product-grid.html">Biobase</a></li>
                                            <li><a href="preview-product-grid.html">Biolab</a></li>
                                            <li><a href="preview-product-grid.html">CDR FoodLab</a></li>
                                            <li><a href="preview-chm-filtration.html">CHM Lab</a></li>
                                            <li><a href="preview-product-grid.html">CHN Spec</a></li>
                                            <li><a href="preview-product-grid.html">Dlab</a></li>
                                            <li><a href="preview-product-grid.html">Four E'S</a></li>
                                            <li><a href="preview-product-grid.html">General Lab Instruments</a></li>
                                            <li><a href="preview-product-grid.html">IAT</a></li>
                                            <li><a href="preview-product-grid.html">iCare</a></li>
                                            <li><a href="preview-product-grid.html">Infitek</a></li>
                                            <li><a href="preview-product-grid.html">Innova</a></li>
                                            <li><a href="preview-product-grid.html">Kanomax</a></li>
                                            <li><a href="preview-product-grid.html">Kason</a></li>
                                            <li><a href="preview-product-grid.html">MDK</a></li>
                                            <li><a href="preview-product-grid.html">Scitek</a></li>
                                            <li><a href="preview-yingtai-centrifuge.html">Yingtai Centrifuge</a></li>
                                        </ul>
                                    </div>
                                    <div class="mega-menu-col">
                                        <h4 class="mega-menu-title">By Industry</h4>
                                        <ul class="mega-menu-list">
                                            <li><a href="preview-yingtai-centrifuge.html#cat-hospital-blood">Hospital (Centrifuges & Blood Bank)</a></li>
                                            <li><a href="preview-products.html">Industry</a></li>
                                            <li><a href="preview-products.html">Life Science</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="preview-news.html">News</a></li>
                        <li><a href="preview-services.html">Services</a></li>
                        <li><a href="preview-contact.html">Contact</a></li>
                    </ul>
                </nav>
                <a href="preview-products.html" class="header-cart-btn" title="Katalog Produk" aria-label="Katalog Produk">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <button class="menu-toggle" id="menu-toggle"><span></span><span></span><span></span></button>
            </div>
        </div>
    </div>
</header>
`,
    footer: `
<!-- Shared Footer for Previews -->
<footer class="site-footer" id="site-footer">
    <div class="footer-main">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <div class="footer-logo" style="margin-bottom:20px">
                        <a href="preview.html" style="color:#fff;font-size:1.4rem;font-weight:800;font-family:var(--font-heading);text-decoration:none">
                            <span style="color:var(--primary-blue)">Kinglab</span> Medika Lestari
                        </a>
                    </div>
                    <p>PT Kinglab Medika Lestari adalah perusahaan yang bergerak dibidang supplier Alat-alat Kesehatan dan Alat-alat Laboratorium.</p>
                    <div class="footer-barcode" style="margin-top: 18px;">
                        <a href="https://katalog.inaproc.id/pt-kinglab-medika-lestari" target="_blank" rel="noopener noreferrer" style="display: inline-block; text-decoration: none;">
                            <img src="assets/images/qr-ecatalog-inaproc-kml.png" alt="Barcode e-Katalog LKPP INAPROC PT Kinglab Medika Lestari" style="width: 135px; height: auto; border-radius: 8px; display: block; background: #ffffff; padding: 6px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);">
                        </a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Head Office</h4>
                    <ul class="footer-contact-list">
                        <li><i class="fas fa-map-marker-alt"></i><span>Jl. Example No.123, Jakarta, Indonesia</span></li>
                        <li><i class="fas fa-phone-alt"></i><span>+62-21-739 2856</span></li>
                        <li><i class="fas fa-fax"></i><span>+62-21-739 2857</span></li>
                        <li><i class="fas fa-envelope"></i><span>info@kinglabmedikalestari.com</span></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Links</h4>
                    <ul class="footer-links">
                        <li><a href="preview.html">Home</a></li>
                        <li><a href="preview-about.html">About</a></li>
                        <li><a href="preview-products.html">Products</a></li>
                        <li><a href="preview-contact.html">Contact</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow Us</h4>
                    <p>Stay connected with us on social media.</p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.instagram.com/kinglabmedikalestari?stkn=MWd3ZWtybWxkemt0ZA=="><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p>© 2026 PT Kinglab Medika Lestari. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- Floating WhatsApp -->
<a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Selamat%20datang%20di%20Kinglab%20Medika%20Lestari%2C%20ada%20yang%20bisa%20dibantu%3F&type=phone_number&app_absent=0" class="floating-btn" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp"></i></a>

<!-- Scroll to Top -->
<button class="scroll-to-top" id="scrollToTop"><i class="fas fa-chevron-up"></i></button>
`
};
