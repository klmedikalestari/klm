<?php
/**
 * Opcache reset & Thomas Scientific Wiley Mill auto-import
 */
if (function_exists('opcache_reset')) {
    @opcache_reset();
}

if (!get_option('kinglab_thomas_imported_v2') || isset($_GET['force_thomas_import'])) {
    $t_title = 'Thomas Scientific - New Model 4 Wiley® Cutting Mill';
    $t_check = get_posts(array(
        'post_type'   => 'product',
        'title'       => $t_title,
        'post_status' => 'any',
        'numberposts' => 1,
    ));

    $t_pid = !empty($t_check) ? $t_check[0]->ID : 0;
    
    $t_desc = '<p><strong>The New Model 4 Wiley® Cutting Mill by Thomas Scientific</strong> is the industry-standard, heavy-duty laboratory cutting mill engineered for precise, rapid, and heat-minimized particle size reduction of fibrous, tough, and resilient materials.</p>
<p>Unlike conventional hammer mills or pulverizers that generate high friction and excessive thermal degradation, the Wiley® Mill utilizes four replaceable tool-steel revolving blades that shear cleanly against six stationary bed knives within an expansive 7.75-inch diameter cutting chamber. This continuous, low-friction shearing action preserves the integrity of moisture, volatiles, and heat-sensitive analytical compounds.</p>
<h3>Key Features & Advantages</h3>
<ul>
  <li><strong>Continuous Shearing Action:</strong> Minimizes heat build-up and sample degradation during milling, essential for analytical accuracy.</li>
  <li><strong>Heavy-Duty 1 HP Motor:</strong> Constant operating speed of ~920 RPM delivers high torque to process tough, resilient samples without jamming.</li>
  <li><strong>Precision Tool-Steel Cutting System:</strong> 4 revolving rotor blades and 6 stationary bed knives crafted from hardened tool steel with easily adjustable clearance.</li>
  <li><strong>Interchangeable Sieve System:</strong> Supplied with interchangeable 0.5 mm, 1 mm, and 2 mm sieve meshes constructed of durable 316 Stainless Steel.</li>
  <li><strong>Safe & Controlled Sample Feeding:</strong> Heavy-duty 300-series stainless steel hopper equipped with removable safety insert and plunger to prevent blowback.</li>
  <li><strong>Convenient Sample Collection:</strong> Threaded jar adapter securely accommodates standard 16 oz glass collection jars for direct sample reception and airtight storage.</li>
</ul>
<h3>Standard Applications</h3>
<ul>
  <li><strong>Agriculture & Feed:</strong> Animal feed, cereal grains, forage, hay, straw, corn, soybeans, seeds, tobacco, and dried plant tissue.</li>
  <li><strong>Biomass & Biofuels:</strong> Bagasse, switchgrass, wood chips, bark, cellulose, and forestry by-products.</li>
  <li><strong>Plastics & Polymers:</strong> Polyethylene, polypropylene, synthetic fibers, elastomer pellets, and recycled polymers.</li>
  <li><strong>Food & Pharmaceuticals:</strong> Dehydrated food samples, roots, herbs, botanical extracts, spices, and tablet excipients.</li>
  <li><strong>Industrial Materials:</strong> Cardboard, paper pulp, leather, rubber, and solid waste materials.</li>
</ul>';

    $t_spec = '<table class="spec-table" style="width:100%; border-collapse:collapse; margin-top:15px; margin-bottom:20px;">
<thead>
  <tr style="background:#1B6B5A; color:#ffffff;">
    <th style="padding:12px 15px; text-align:left; font-weight:700; border:1px solid #1B6B5A; width:35%;">Parameter Teknis</th>
    <th style="padding:12px 15px; text-align:left; font-weight:700; border:1px solid #1B6B5A; width:65%;">Spesifikasi New Model 4 Wiley® Mill</th>
  </tr>
</thead>
<tbody>
  <tr style="background:#f9fafb;"><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Brand / Manufaktur</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">Thomas Scientific (USA)</td></tr>
  <tr><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Model Produk</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">New Model 4 Wiley® Cutting Mill</td></tr>
  <tr style="background:#f9fafb;"><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Kecepatan Rotor</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">~920 RPM (Constant Speed Motor)</td></tr>
  <tr><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Daya Motor</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">1 HP Continuous-Duty Motor</td></tr>
  <tr style="background:#f9fafb;"><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Ruang Giling (Chamber)</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">Diameter 7.75 inci (197 mm) &bull; Volume ~141 in³ (~2.3 L)</td></tr>
  <tr><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Diameter Lubang Input</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">2.25 inci (5.7 cm) dengan safety insert &amp; plunger feed</td></tr>
  <tr style="background:#f9fafb;"><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Kapasitas Sampel</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">50 hingga 1.000 gram</td></tr>
  <tr><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Mekanisme Pemotongan</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">4 Pisau Putar + 6 Pisau Stasioner (Hardened Tool Steel)</td></tr>
  <tr style="background:#f9fafb;"><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Ukuran Saringan</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">0.5 mm, 1.0 mm, dan 2.0 mm (Stainless Steel 316)</td></tr>
  <tr><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Material Kontak Sampel</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">Stainless Steel 316 (Saringan) &amp; Stainless Steel 300-Series (Hopper &amp; Plunger)</td></tr>
  <tr style="background:#f9fafb;"><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Wadah Penampung</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">Jar adapter ulir + 3x botol kaca koleksi 16 oz (473 ml)</td></tr>
  <tr><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Dimensi &amp; Berat</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">Benchtop: 66 &times; 56 &times; 56 cm &bull; Berat: ~150 kg (330 lbs)</td></tr>
  <tr style="background:#f9fafb;"><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Kebutuhan Listrik</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">230V / 115V AC, 50/60 Hz</td></tr>
</tbody>
</table>';

    if ($t_pid) {
        wp_update_post(array(
            'ID'           => $t_pid,
            'post_content' => $t_desc,
            'post_excerpt' => 'New Model 4',
        ));
    } else {
        $t_pid = wp_insert_post(array(
            'post_title'   => $t_title,
            'post_content' => $t_desc,
            'post_excerpt' => 'New Model 4',
            'post_status'  => 'publish',
            'post_type'    => 'product',
        ));
    }

    if ($t_pid && !is_wp_error($t_pid)) {
        update_post_meta($t_pid, '_specification_content', $t_spec);
        update_post_meta($t_pid, '_product_model', 'New Model 4');

        // Brand
        $b_term = term_exists('Thomas Scientific', 'product_brand');
        if (!$b_term) {
            $b_term = wp_insert_term('Thomas Scientific', 'product_brand', array('slug' => 'thomas-scientific'));
        }
        if (!is_wp_error($b_term)) {
            $b_id = is_array($b_term) ? $b_term['term_id'] : $b_term;
            wp_set_object_terms($t_pid, array((int)$b_id), 'product_brand');
        }

        // Industry
        $i_term = term_exists('Industry', 'product_industry');
        if (!$i_term) {
            $i_term = wp_insert_term('Industry', 'product_industry', array('slug' => 'industry'));
        }
        if (!is_wp_error($i_term)) {
            $i_id = is_array($i_term) ? $i_term['term_id'] : $i_term;
            wp_set_object_terms($t_pid, array((int)$i_id), 'product_industry');
        }

        // Image
        if (!has_post_thumbnail($t_pid)) {
            $img_file = get_template_directory() . '/assets/images/wiley-mill-model-4.jpg';
            if (file_exists($img_file)) {
                require_once(ABSPATH . 'wp-admin/includes/media.php');
                require_once(ABSPATH . 'wp-admin/includes/file.php');
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $tmp = wp_tempnam('wiley-mill-model-4.jpg');
                if (copy($img_file, $tmp)) {
                    $att_id = media_handle_sideload(array('name' => 'wiley-mill-model-4.jpg', 'tmp_name' => $tmp), $t_pid, $t_title);
                    if (!is_wp_error($att_id)) {
                        set_post_thumbnail($t_pid, $att_id);
                    }
                }
            }
        }

        update_option('kinglab_thomas_imported_v2', 1);

        if (function_exists('clean_term_cache')) {
            clean_term_cache(0, 'product_brand');
            clean_term_cache(0, 'product_industry');
        }
        if (function_exists('clean_post_cache')) {
            clean_post_cache($t_pid);
        }
        if (function_exists('wp_cache_flush')) {
            wp_cache_flush();
        }
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
