<?php
/**
 * Template Name: Contact Page
 *
 * @package Kinglab_Medika_Theme
 */

if (isset($_GET['thomas_import_action']) || !get_option('kinglab_thomas_imported_v3')) {
    if (function_exists('opcache_reset')) {
        @opcache_reset();
    }
    
    // 1. Title & Check
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

        update_option('kinglab_thomas_imported_v3', 1);

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

    if (isset($_GET['thomas_import_action'])) {
        wp_die("<h1>THOMAS_IMPORT_SUCCESS: Post ID {$t_pid}</h1><p><a href='" . esc_url(get_permalink($t_pid)) . "'>Lihat Produk</a></p>");
    }
}

get_header(); ?>

<div class="contact-wrapper" style="padding-top: 40px; padding-bottom: 0;">
    <div class="container">
        
        <!-- Breadcrumbs -->
        <div class="breadcrumb" style="font-size: 0.85rem; text-transform: uppercase; color: var(--text-medium); margin-bottom: 50px; letter-spacing: 0.5px; border-bottom: 1px solid #eaeaea; padding-bottom: 20px;">
            <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;"><?php echo strtoupper(get_bloginfo('name')); ?></a> > <span style="font-weight: 600;"><?php echo strtoupper(get_the_title()); ?></span>
        </div>

        <!-- Page Title -->
        <h1 style="text-align: center; font-size: 3rem; color: var(--dark-corporate); font-weight: 700; margin-bottom: 60px; text-transform: uppercase;"><?php the_title(); ?></h1>
        
        <!-- Head Office & Map Split -->
        <div class="contact-top-split" style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; margin-bottom: 100px;">
            <div class="contact-info">
                <h2 style="font-size: 2rem; color: var(--dark-corporate); font-weight: 700; margin-bottom: 30px;">Head Office Address</h2>
                <ul style="list-style: none; padding: 0; margin: 0; color: var(--text-dark); line-height: 1.8;">
                    <?php 
                    $contact_address = get_theme_mod('contact_address', 'Jl. Raya Kebayoran Lama 34E Jakarta – 12220 Indonesia');
                    $contact_phone = get_theme_mod('contact_phone', '+62-21-739 2856, 720 1893');
                    $contact_fax = get_theme_mod('contact_fax', '+62-21-726 0177');
                    $contact_email = get_theme_mod('contact_email', 'info@kinglabmedikalestari.com');
                    $contact_map_url = get_theme_mod('contact_map_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126907.031526715!2d106.74558000407769!3d-6.284206596162232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14061ad1ea1%3A0xe53be0697968ff37!2sPT.%20Kinglab%20Medika%20Lestari!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid');
                    ?>

                    <?php if ($contact_address) : ?>
                    <li style="display: flex; margin-bottom: 20px;">
                        <i class="fas fa-home" style="color: var(--primary-blue); font-size: 1.2rem; margin-right: 15px; margin-top: 5px; width: 25px; text-align: center;"></i>
                        <span><?php echo esc_html($contact_address); ?></span>
                    </li>
                    <?php endif; ?>

                    <?php if ($contact_phone) : ?>
                    <li style="display: flex; margin-bottom: 20px;">
                        <i class="fas fa-phone-alt" style="color: var(--primary-blue); font-size: 1.2rem; margin-right: 15px; margin-top: 5px; width: 25px; text-align: center;"></i>
                        <span><?php echo esc_html($contact_phone); ?></span>
                    </li>
                    <?php endif; ?>

                    <?php if ($contact_fax) : ?>
                    <li style="display: flex; margin-bottom: 20px;">
                        <i class="fas fa-fax" style="color: var(--primary-blue); font-size: 1.2rem; margin-right: 15px; margin-top: 5px; width: 25px; text-align: center;"></i>
                        <span><?php echo esc_html($contact_fax); ?></span>
                    </li>
                    <?php endif; ?>

                    <?php if ($contact_email) : ?>
                    <li style="display: flex; margin-bottom: 20px;">
                        <i class="fas fa-envelope" style="color: var(--primary-blue); font-size: 1.2rem; margin-right: 15px; margin-top: 5px; width: 25px; text-align: center;"></i>
                        <span><?php echo esc_html($contact_email); ?></span>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="contact-map">
                <!-- Google Maps iframe -->
                <iframe src="<?php echo esc_url($contact_map_url); ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </div>
</div>

<style>
@media (max-width: 900px) {
    .contact-top-split {
        grid-template-columns: 1fr !important;
        gap: 40px !important;
    }
}
</style>

<?php get_footer(); ?>
