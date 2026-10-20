<?php
/**
 * One-time cleanup for old CHM LAB brand and products
 */
if (function_exists('opcache_reset')) {
    @opcache_reset();
}

if (isset($_GET['delete_chm_lab']) || !get_option('kinglab_chm_lab_cleaned_v2')) {
    // 1. Cari term 'chm-lab' atau 'CHM LAB' di product_brand
    $term_chm_lab = get_term_by('slug', 'chm-lab', 'product_brand');
    if (!$term_chm_lab) {
        $term_chm_lab = get_term_by('name', 'CHM LAB', 'product_brand');
    }

    $deleted_items = array();

    // Hapus produk terkait
    $pids_to_delete = array();
    if ($term_chm_lab && !is_wp_error($term_chm_lab)) {
        $found = get_posts(array(
            'post_type'      => 'product',
            'posts_per_page' => -1,
            'post_status'    => 'any',
            'fields'         => 'ids',
            'tax_query'      => array(
                array(
                    'taxonomy'         => 'product_brand',
                    'field'            => 'term_id',
                    'terms'            => $term_chm_lab->term_id,
                    'include_children' => true,
                ),
            ),
        ));
        if (!empty($found)) {
            $pids_to_delete = array_merge($pids_to_delete, $found);
        }
    }

    $specific = get_posts(array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'post_status'    => 'any',
        'fields'         => 'ids',
        'name'           => 'chm-quantitative-filter-paper',
    ));
    if (!empty($specific)) {
        $pids_to_delete = array_merge($pids_to_delete, $specific);
    }

    $specific_title = get_posts(array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'post_status'    => 'any',
        'fields'         => 'ids',
        'title'          => 'CHM Quantitative filter paper',
    ));
    if (!empty($specific_title)) {
        $pids_to_delete = array_merge($pids_to_delete, $specific_title);
    }

    $pids_to_delete = array_unique(array_filter($pids_to_delete));

    foreach ($pids_to_delete as $pid) {
        $thumb_id = get_post_thumbnail_id($pid);
        if ($thumb_id) {
            wp_delete_attachment($thumb_id, true);
        }
        wp_delete_post($pid, true);
        $deleted_items[] = "Product ID {$pid} deleted.";
    }

    // Hapus child terms dan term brand CHM LAB
    if ($term_chm_lab && !is_wp_error($term_chm_lab)) {
        $children = get_terms(array(
            'taxonomy'   => 'product_brand',
            'parent'     => $term_chm_lab->term_id,
            'hide_empty' => false,
        ));
        if (!is_wp_error($children) && !empty($children)) {
            foreach ($children as $child) {
                $sub_children = get_terms(array(
                    'taxonomy'   => 'product_brand',
                    'parent'     => $child->term_id,
                    'hide_empty' => false,
                ));
                if (!is_wp_error($sub_children) && !empty($sub_children)) {
                    foreach ($sub_children as $sc) {
                        wp_delete_term($sc->term_id, 'product_brand');
                        $deleted_items[] = "Sub-term {$sc->name} deleted.";
                    }
                }
                wp_delete_term($child->term_id, 'product_brand');
                $deleted_items[] = "Child term {$child->name} deleted.";
            }
        }
        wp_delete_term($term_chm_lab->term_id, 'product_brand');
        $deleted_items[] = "Brand term CHM LAB (ID: {$term_chm_lab->term_id}) deleted.";
    }

    if (function_exists('clean_term_cache')) {
        clean_term_cache(0, 'product_brand');
    }
    if (function_exists('wp_cache_flush')) {
        wp_cache_flush();
    }

    update_option('kinglab_chm_lab_cleaned_v2', 1);

    if (isset($_GET['delete_chm_lab'])) {
        echo '<div style="background:#fff;padding:20px;margin:20px auto;max-width:600px;border:2px solid green;font-family:sans-serif;">';
        echo '<h3>Pembersihan CHM LAB Berhasil!</h3>';
        echo '<ul>';
        foreach ($deleted_items as $item) {
            echo '<li>' . esc_html($item) . '</li>';
        }
        echo '</ul>';
        echo '<p style="color:green;font-weight:bold;">CHM LAB dan produk terkait telah dihapus.</p>';
        echo '</div>';
    }
}
?>
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
                        <p><?php echo esc_html(get_theme_mod('footer_about', 'PT Kinglab Medika Lestari adalah perusahaan yang bergerak dibidang supplier Alat-alat Kesehatan dan Alat-alat Laboratorium.')); ?></p>
                        <div class="footer-barcode" style="margin-top: 18px;">
                            <a href="<?php echo esc_url(get_theme_mod('footer_barcode_url', 'https://katalog.inaproc.id/pt-kinglab-medika-lestari')); ?>" target="_blank" rel="noopener noreferrer" style="display: inline-block; text-decoration: none;">
                                <img src="<?php echo esc_url(get_theme_mod('footer_barcode_img', get_template_directory_uri() . '/assets/images/qr-ecatalog-inaproc-kml.png')); ?>" alt="Barcode e-Katalog LKPP INAPROC PT Kinglab Medika Lestari" style="width: 135px; height: auto; border-radius: 8px; display: block; background: #ffffff; padding: 6px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);">
                            </a>
                        </div>
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
