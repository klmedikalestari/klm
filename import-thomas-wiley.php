<?php
/**
 * Thomas Scientific Wiley Mill Product Importer for WordPress
 * 
 * This script imports the "New Model 4 Wiley® Cutting Mill" by Thomas Scientific
 * into WordPress under 'product_brand' (Thomas Scientific) and 'product_industry' (Industry).
 * 
 * USAGE:
 * 1. Push to GitHub (automatically deployed to cPanel via GitHub Actions)
 * 2. Visit: https://kinglabmedikalestari.com/wp-content/themes/kinglab-medika-v2/import-thomas-wiley.php
 *    (or your active theme URL)
 * 
 * @package Kinglab_Medika_Lestari_Theme
 */

// Load WordPress
if (!defined('ABSPATH')) {
    $wp_load_paths = array(
        dirname(__FILE__) . '/wp-load.php',                 // Root directory
        dirname(__FILE__) . '/../../../wp-load.php',        // Standard theme location
        dirname(__FILE__) . '/../../../../wp-load.php',     // Child theme
    );

    $wp_loaded = false;
    foreach ($wp_load_paths as $wp_load) {
        if (file_exists($wp_load)) {
            require_once($wp_load);
            $wp_loaded = true;
            break;
        }
    }

    if (!$wp_loaded) {
        die('Error: Could not find wp-load.php. Make sure this file is placed within your WordPress theme directory.');
    }
}

// Set time limit for import
set_time_limit(300);
ini_set('memory_limit', '512M');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define Thomas Scientific New Model 4 Wiley Mill Data
$product = array(
    'brand'         => 'Thomas Scientific',
    'brand_slug'    => 'thomas-scientific',
    'industry'      => 'Industry',
    'industry_slug' => 'industry',
    'title'         => 'Thomas Scientific - New Model 4 Wiley® Cutting Mill',
    'model'         => 'New Model 4',
    'localImage'    => 'wiley-mill-model-4.jpg',
    'description'   => '<p><strong>The New Model 4 Wiley® Cutting Mill by Thomas Scientific</strong> is the industry-standard, heavy-duty laboratory cutting mill engineered for precise, rapid, and heat-minimized particle size reduction of fibrous, tough, and resilient materials.</p>
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
</ul>',
    'specification' => '<table class="spec-table" style="width:100%; border-collapse:collapse; margin-top:15px; margin-bottom:20px;">
<thead>
  <tr style="background:#1B6B5A; color:#ffffff;">
    <th style="padding:12px 15px; text-align:left; font-weight:700; border:1px solid #1B6B5A; width:35%;">Parameter Teknis</th>
    <th style="padding:12px 15px; text-align:left; font-weight:700; border:1px solid #1B6B5A; width:65%;">Spesifikasi New Model 4 Wiley® Mill</th>
  </tr>
</thead>
<tbody>
  <tr style="background:#f9fafb;">
    <td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Brand / Manufaktur</td>
    <td style="padding:10px 15px; border:1px solid #e0e0e0;">Thomas Scientific (USA)</td>
  </tr>
  <tr>
    <td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Model Produk</td>
    <td style="padding:10px 15px; border:1px solid #e0e0e0;">New Model 4 Wiley® Cutting Mill</td>
  </tr>
  <tr style="background:#f9fafb;">
    <td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Kecepatan Rotor (Operating Speed)</td>
    <td style="padding:10px 15px; border:1px solid #e0e0e0;">~920 RPM (Constant Speed Motor)</td>
  </tr>
  <tr>
    <td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Daya Motor (Motor Power)</td>
    <td style="padding:10px 15px; border:1px solid #e0e0e0;">1 HP (Horsepower) Continuous-Duty Motor</td>
  </tr>
  <tr style="background:#f9fafb;">
    <td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Ruang Giling (Chamber Size)</td>
    <td style="padding:10px 15px; border:1px solid #e0e0e0;">Diameter 7.75 inci (197 mm) &bull; Volume ~141 in³ (~2.3 L)</td>
  </tr>
  <tr>
    <td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Diameter Lubang Input (Throat)</td>
    <td style="padding:10px 15px; border:1px solid #e0e0e0;">2.25 inci (5.7 cm) dengan safety insert &amp; plunger feed</td>
  </tr>
  <tr style="background:#f9fafb;">
    <td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Kapasitas Sampel per Batch</td>
    <td style="padding:10px 15px; border:1px solid #e0e0e0;">50 hingga 1.000 gram (tergantung densitas material)</td>
  </tr>
  <tr>
    <td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Mekanisme Pemotongan</td>
    <td style="padding:10px 15px; border:1px solid #e0e0e0;">4 Pisau Putar (Revolving) + 6 Pisau Stasioner (Hardened Tool Steel)</td>
  </tr>
  <tr style="background:#f9fafb;">
    <td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Ukuran Saringan (Included Sieves)</td>
    <td style="padding:10px 15px; border:1px solid #e0e0e0;">3 Saringan Standar: 0.5 mm, 1.0 mm, dan 2.0 mm (Stainless Steel 316)</td>
  </tr>
  <tr>
    <td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Material Kontak Sampel</td>
    <td style="padding:10px 15px; border:1px solid #e0e0e0;">Stainless Steel 316 (Saringan) &amp; Stainless Steel 300-Series (Hopper &amp; Plunger)</td>
  </tr>
  <tr style="background:#f9fafb;">
    <td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Konstruksi Rangka (Chassis)</td>
    <td style="padding:10px 15px; border:1px solid #e0e0e0;">Heavy-duty all-steel construction dengan powder-coated finish tahan kimia</td>
  </tr>
  <tr>
    <td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Wadah Penampung (Sample Receiver)</td>
    <td style="padding:10px 15px; border:1px solid #e0e0e0;">Jar adapter ulir + 3x botol kaca koleksi 16 oz (473 ml)</td>
  </tr>
  <tr style="background:#f9fafb;">
    <td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Dimensi (P x L x T)</td>
    <td style="padding:10px 15px; border:1px solid #e0e0e0;">Benchtop: 66 &times; 56 &times; 56 cm (26" &times; 22" &times; 22") &bull; Floor Stand: Tinggi 124 cm (49")</td>
  </tr>
  <tr>
    <td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Berat Bersih Unit</td>
    <td style="padding:10px 15px; border:1px solid #e0e0e0;">Sekitar 150 kg (330 lbs)</td>
  </tr>
  <tr style="background:#f9fafb;">
    <td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Kebutuhan Daya Listrik</td>
    <td style="padding:10px 15px; border:1px solid #e0e0e0;">230V / 115V AC, 50/60 Hz</td>
  </tr>
</tbody>
</table>'
);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Thomas Scientific Wiley Mill Import - Kinglab Medika Lestari</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; max-width: 860px; margin: 40px auto; padding: 0 20px; background: #f0f5f3; color: #1d2327; }
        h1 { color: #1B6B5A; border-bottom: 2px solid #1B6B5A; padding-bottom: 10px; }
        .summary { background: #fff; padding: 20px; border-radius: 8px; border-left: 4px solid #1B6B5A; margin-bottom: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.06); }
        .log-box { background: #fff; padding: 18px; margin: 15px 0; border-radius: 8px; border-left: 4px solid #00a32a; box-shadow: 0 2px 5px rgba(0,0,0,0.04); }
        .success { color: #00a32a; font-weight: 700; }
        .btn-action { display: inline-block; margin: 8px 6px 0 0; padding: 10px 18px; background: #1B6B5A; color: #fff; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 0.92rem; }
        .btn-action:hover { background: #134E40; color: #fff; }
        .detail-row { margin: 6px 0; font-size: 0.95rem; }
        .detail-row strong { color: #1B6B5A; }
    </style>
</head>
<body>
<h1>⚙️ Thomas Scientific - Product Importer</h1>
<div class="summary">
    <strong>Mengimpor Produk:</strong> <?php echo esc_html($product['title']); ?><br>
    <small>Brand: <strong><?php echo esc_html($product['brand']); ?></strong> | Industry: <strong><?php echo esc_html($product['industry']); ?></strong></small>
</div>

<?php
// Check if product already exists by title
$existing = get_posts(array(
    'post_type'      => 'product',
    'title'          => $product['title'],
    'post_status'    => 'any',
    'posts_per_page' => 1,
));

$post_id = 0;
$is_update = false;

if (!empty($existing)) {
    $post_id = $existing[0]->ID;
    $is_update = true;

    wp_update_post(array(
        'ID'           => $post_id,
        'post_content' => $product['description'],
        'post_excerpt' => $product['model'],
    ));
} else {
    $post_id = wp_insert_post(array(
        'post_title'   => $product['title'],
        'post_content' => $product['description'],
        'post_excerpt' => $product['model'],
        'post_status'  => 'publish',
        'post_type'    => 'product',
    ), true);
}

if (is_wp_error($post_id)) {
    die('<div class="log-box" style="border-left-color:#d63638;"><span style="color:#d63638;font-weight:700;">ERROR:</span> ' . $post_id->get_error_message() . '</div>');
}

// 1. Set Specifications Content Meta
update_post_meta($post_id, '_specification_content', $product['specification']);

// 2. Set Model Meta
update_post_meta($post_id, '_product_model', $product['model']);

// 3. Set Taxonomy: product_brand (Thomas Scientific)
$brand_term = term_exists($product['brand'], 'product_brand');
if (!$brand_term) {
    $brand_term = wp_insert_term($product['brand'], 'product_brand', array('slug' => $product['brand_slug']));
}
if (!is_wp_error($brand_term)) {
    $brand_term_id = is_array($brand_term) ? $brand_term['term_id'] : $brand_term;
    wp_set_object_terms($post_id, array((int)$brand_term_id), 'product_brand');
}

// 4. Set Taxonomy: product_industry (Industry)
$industry_term = term_exists($product['industry'], 'product_industry');
if (!$industry_term) {
    $industry_term = wp_insert_term($product['industry'], 'product_industry', array('slug' => $product['industry_slug']));
}
if (!is_wp_error($industry_term)) {
    $industry_term_id = is_array($industry_term) ? $industry_term['term_id'] : $industry_term;
    wp_set_object_terms($post_id, array((int)$industry_term_id), 'product_industry');
}

// 5. Featured Image Handling
$image_status = '⚠️ Tidak ditemukan gambar lokal';
$image_candidates = array(
    dirname(__FILE__) . '/assets/images/' . $product['localImage'],
    dirname(__FILE__) . '/../assets/images/' . $product['localImage'],
);

$image_path = false;
foreach ($image_candidates as $cand) {
    if (file_exists($cand)) {
        $image_path = $cand;
        break;
    }
}

if ($image_path) {
    // If post already has a thumbnail, delete old attachment first to ensure refresh
    if (has_post_thumbnail($post_id)) {
        wp_delete_attachment(get_post_thumbnail_id($post_id), true);
    }

    require_once(ABSPATH . 'wp-admin/includes/media.php');
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/image.php');

    $tmp_file = wp_tempnam($product['localImage']);
    if (copy($image_path, $tmp_file)) {
        $file_array = array(
            'name'     => $product['localImage'],
            'tmp_name' => $tmp_file,
        );

        $attachment_id = media_handle_sideload($file_array, $post_id, $product['title']);
        if (!is_wp_error($attachment_id)) {
            set_post_thumbnail($post_id, $attachment_id);
            $image_status = '✅ Foto produk berhasil diunggah (Attachment ID: ' . $attachment_id . ')';
        } else {
            $image_status = '❌ Gagal upload media: ' . $attachment_id->get_error_message();
            @unlink($tmp_file);
        }
    }
}

// Flush caches
if (function_exists('clean_post_cache')) {
    clean_post_cache($post_id);
}
if (function_exists('clean_term_cache')) {
    clean_term_cache(0, 'product_brand');
    clean_term_cache(0, 'product_industry');
}
if (function_exists('wp_cache_flush')) {
    wp_cache_flush();
}

$product_url = get_permalink($post_id);
$brand_url = get_term_link('thomas-scientific', 'product_brand');
if (is_wp_error($brand_url)) {
    $brand_url = home_url('/product_brand/thomas-scientific/');
}
$industry_url = get_term_link('industry', 'product_industry');
if (is_wp_error($industry_url)) {
    $industry_url = home_url('/product_industry/industry/');
}
?>

<div class="log-box">
    <h3 style="margin-top:0; color:#1B6B5A;">
        <?php echo $is_update ? '🔄 Produk Berhasil Diperbarui!' : '✨ Produk Berhasil Dibuat!'; ?>
    </h3>
    <div class="detail-row"><strong>Post ID:</strong> <?php echo esc_html($post_id); ?></div>
    <div class="detail-row"><strong>Nama Produk:</strong> <?php echo esc_html($product['title']); ?></div>
    <div class="detail-row"><strong>Brand:</strong> <?php echo esc_html($product['brand']); ?> (Terdaftar di <em>By Brand</em>)</div>
    <div class="detail-row"><strong>Industry:</strong> <?php echo esc_html($product['industry']); ?> (Terdaftar di <em>By Industry</em>)</div>
    <div class="detail-row"><strong>Status Gambar:</strong> <?php echo esc_html($image_status); ?></div>
    
    <div style="margin-top:20px;">
        <a href="<?php echo esc_url($product_url); ?>" class="btn-action" target="_blank">Lihat Halaman Produk &rarr;</a>
        <a href="<?php echo esc_url($brand_url); ?>" class="btn-action" target="_blank">Lihat Halaman By Brand &rarr;</a>
        <a href="<?php echo esc_url($industry_url); ?>" class="btn-action" target="_blank">Lihat Halaman By Industry &rarr;</a>
    </div>
</div>

<div style="margin-top:20px; font-size:0.85rem; color:#666;">
    <p>💡 <em>Setelah proses impor selesai di server live, Anda dapat menyimpan file ini untuk referensi atau menghapusnya jika sudah tidak dibutuhkan.</em></p>
</div>
</body>
</html>
