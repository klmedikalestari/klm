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
            <a href="tel:+622173928546"><i class="fas fa-phone-alt"></i> +62-21-739 2856</a>
            <a href="mailto:info@kinglab.co.id"><i class="fas fa-envelope"></i> info@kinglab.co.id</a>
        </div>
    </div>
    <div class="header-main">
        <div class="container">
            <div class="site-logo">
                <a href="preview.html" class="logo-text">Kinglab Medika Lestari</a>
            </div>
            <button class="menu-toggle" id="menu-toggle"><span></span><span></span><span></span></button>
            <nav class="main-navigation" id="main-navigation">
                <ul>
                    <li><a href="preview.html">Home</a></li>
                    <li><a href="preview-about.html">About</a></li>
                    <li><a href="preview-products.html">Products</a></li>
                    <li><a href="preview-news.html">News</a></li>
                    <li><a href="preview-services.html">Services</a></li>
                    <li><a href="preview-contact.html">Contact</a></li>
                </ul>
            </nav>
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
                    <p>We are a leading company providing innovative solutions across life science, industry, animal health and medical sectors.</p>
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
                        <a href="#"><i class="fab fa-instagram"></i></a>
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
<a href="https://wa.me/6221739285" class="floating-btn" target="_blank"><i class="fab fa-whatsapp"></i></a>

<!-- Scroll to Top -->
<button class="scroll-to-top" id="scrollToTop"><i class="fas fa-chevron-up"></i></button>
`
};
