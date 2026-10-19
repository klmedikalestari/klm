    <!-- Footer -->
    <footer class="site-footer" id="site-footer">
        <div class="footer-main">
            <div class="container">
                <div class="footer-grid">
                    <!-- Column 1: About -->
                    <div class="footer-col">
                        <div class="footer-logo">
                            <?php 
                            $site_name = get_bloginfo('name');
                            $words = explode(' ', $site_name);
                            $first_word = array_shift($words);
                            $rest_words = implode(' ', $words);
                            ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-text" style="color: #fff; font-size: 1.4rem; font-weight: 800; font-family: var(--font-heading); text-decoration: none;">
                                <span style="color: var(--primary-blue);"><?php echo esc_html($first_word); ?></span> <?php echo esc_html($rest_words); ?>
                            </a>
                        </div>
                        <p><?php echo esc_html(get_theme_mod('footer_about', 'We are a leading company providing innovative solutions across life science, industry, animal health and medical sectors.')); ?></p>
                    </div>

                    <!-- Column 2: Contact -->
                    <div class="footer-col">
                        <h4><?php esc_html_e('Head Office', 'Kinglab_Medika_Lestari-theme'); ?></h4>
                        <ul class="footer-contact-list">
                            <?php
                            $address = get_theme_mod('contact_address', 'Jakarta, Indonesia');
                            $phone   = get_theme_mod('contact_phone', '+62-21-739 2856');
                            $fax     = get_theme_mod('contact_fax', '');
                            $email   = get_theme_mod('contact_email', 'info@kinglabmedikalestari.com');
                            ?>
                            <?php if ($address) : ?>
                                <li><i class="fas fa-map-marker-alt"></i> <span><?php echo esc_html($address); ?></span></li>
                            <?php endif; ?>
                            <?php if ($phone) : ?>
                                <li><i class="fas fa-phone-alt"></i> <span><?php echo esc_html($phone); ?></span></li>
                            <?php endif; ?>
                            <?php if ($fax) : ?>
                                <li><i class="fas fa-fax"></i> <span><?php echo esc_html($fax); ?></span></li>
                            <?php endif; ?>
                            <?php if ($email) : ?>
                                <li><i class="fas fa-envelope"></i> <span><?php echo esc_html($email); ?></span></li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <!-- Column 3: Links -->
                    <div class="footer-col">
                        <h4><?php esc_html_e('Links', 'Kinglab_Medika_Lestari-theme'); ?></h4>
                        <?php if (has_nav_menu('footer')) : ?>
                            <?php wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'container'      => false,
                                'menu_class'     => 'footer-links',
                                'depth'          => 1,
                            )); ?>
                        <?php else : ?>
                            <ul class="footer-links">
                                <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'Kinglab_Medika_Lestari-theme'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('About', 'Kinglab_Medika_Lestari-theme'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('Products', 'Kinglab_Medika_Lestari-theme'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('Contact', 'Kinglab_Medika_Lestari-theme'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('Careers', 'Kinglab_Medika_Lestari-theme'); ?></a></li>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <!-- Column 4: Social -->
                    <div class="footer-col">
                        <h4><?php esc_html_e('Follow Us', 'Kinglab_Medika_Lestari-theme'); ?></h4>
                        <p><?php esc_html_e('Stay connected with us on social media.', 'Kinglab_Medika_Lestari-theme'); ?></p>
                        <div class="footer-social">
                            <?php
                            $socials = array(
                                'facebook'  => 'fab fa-facebook-f',
                                'youtube'   => 'fab fa-youtube',
                                'instagram' => 'fab fa-instagram',
                            );
                            foreach ($socials as $key => $icon) :
                                $url = get_theme_mod("contact_{$key}", '#');
                                if ($key === 'instagram') {
                                    $url = 'https://www.instagram.com/kinglabmedikalestari?stkn=MWd3ZWtybWxkemt0ZA==';
                                }
                                if ($url) : ?>
                                    <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr(ucfirst($key)); ?>">
                                        <i class="<?php echo esc_attr($icon); ?>"></i>
                                    </a>
                                <?php endif;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <p><?php echo esc_html(get_theme_mod('footer_copyright', '© 2026 PT Kinglab Medika Lestari. All rights reserved.')); ?></p>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <?php
    $wa_phone        = get_theme_mod( 'contact_sales_whatsapp_phone', '6281211174724' );
    $clean_wa_phone  = preg_replace( '/[^0-9]/', '', $wa_phone );
    if ( empty( $clean_wa_phone ) ) {
        $clean_wa_phone = '6281211174724';
    }
    $wa_floating_msg = get_theme_mod( 'floating_whatsapp_text', 'Selamat datang di Kinglab Medika Lestari, ada yang bisa dibantu?' );
    $whatsapp_url    = get_theme_mod( 'contact_whatsapp' );

    if ( empty( $whatsapp_url ) || strpos( $whatsapp_url, '6221739285' ) !== false ) {
        $whatsapp_url = 'https://api.whatsapp.com/send/?phone=' . $clean_wa_phone . '&text=' . rawurlencode( $wa_floating_msg ) . '&type=phone_number&app_absent=0';
    } elseif ( strpos( $whatsapp_url, 'text=' ) === false ) {
        $separator    = ( strpos( $whatsapp_url, '?' ) !== false ) ? '&' : '?';
        $whatsapp_url .= $separator . 'text=' . rawurlencode( $wa_floating_msg );
    }
    ?>
    <?php if ( $whatsapp_url ) : ?>
        <a href="<?php echo esc_url( $whatsapp_url ); ?>" class="floating-btn" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    <?php endif; ?>

    <!-- Scroll to Top -->
    <button class="scroll-to-top" id="scrollToTop" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <?php wp_footer(); ?>
</body>
</html>
