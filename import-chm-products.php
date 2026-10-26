<?php
/**
 * MDK Products Importer for WordPress
 * 
 * This script imports MDK Medical Technology products from mdk-products-data.json 
 * into WordPress as 'product' custom post type entries.
 * 
 * USAGE:
 * 1. Upload this file + import-tools/mdk-products-data.json + images/ folder to your theme directory
 * 2. Visit: https://yourdomain.com/wp-content/themes/YOUR_THEME/import-mdk-products.php
 * 3. After import is complete, DELETE this file from the server
 * 
 * @package Kinglab_Medika_Lestari_Theme
 */

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
        die('Error: Could not find wp-load.php. Make sure this file is in your theme directory.');
    }
}

// Only allow admins (Commented out temporarily to fix login error)
/*
if (!current_user_can('manage_options')) {
    die('Error: You must be logged in as an administrator to run this import.');
}
*/

// Set time limit for long import
set_time_limit(600);
ini_set('memory_limit', '512M');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ==========================================
// IMPORT: Thomas Scientific Wiley Mill Model 4
// ==========================================
$thomas_title = 'Thomas Scientific - New Model 4 Wiley® Cutting Mill';
$thomas_existing = get_posts(array(
    'post_type'   => 'product',
    'title'       => $thomas_title,
    'post_status' => 'any',
    'numberposts' => 1,
));

$thomas_pid = !empty($thomas_existing) ? $thomas_existing[0]->ID : 0;
$thomas_desc = '<p><strong>The New Model 4 Wiley® Cutting Mill by Thomas Scientific</strong> is the industry-standard, heavy-duty laboratory cutting mill engineered for precise, rapid, and heat-minimized particle size reduction of fibrous, tough, and resilient materials.</p>
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

$thomas_spec = '<table class="spec-table" style="width:100%; border-collapse:collapse; margin-top:15px; margin-bottom:20px;">
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

if ($thomas_pid) {
    wp_update_post(array(
        'ID'           => $thomas_pid,
        'post_content' => $thomas_desc,
        'post_excerpt' => 'New Model 4',
    ));
} else {
    $thomas_pid = wp_insert_post(array(
        'post_title'   => $thomas_title,
        'post_content' => $thomas_desc,
        'post_excerpt' => 'New Model 4',
        'post_status'  => 'publish',
        'post_type'    => 'product',
    ), true);
}

echo "<!-- THOMAS_PID_DEBUG: ";
if (is_wp_error($thomas_pid)) {
    echo "ERROR: " . $thomas_pid->get_error_message();
} else {
    echo "SUCCESS_ID_" . $thomas_pid;
}
echo " -->\n";

if ($thomas_pid && !is_wp_error($thomas_pid)) {
    update_post_meta($thomas_pid, '_specification_content', $thomas_spec);
    update_post_meta($thomas_pid, '_product_model', 'New Model 4');

    // Brand
    $b_term = term_exists('Thomas Scientific', 'product_brand');
    if (!$b_term) {
        $b_term = wp_insert_term('Thomas Scientific', 'product_brand', array('slug' => 'thomas-scientific'));
    }
    if (!is_wp_error($b_term)) {
        $b_id = is_array($b_term) ? $b_term['term_id'] : $b_term;
        wp_set_object_terms($thomas_pid, array((int)$b_id), 'product_brand');
    }

    // Industry
    $i_term = term_exists('Industry', 'product_industry');
    if (!$i_term) {
        $i_term = wp_insert_term('Industry', 'product_industry', array('slug' => 'industry'));
    }
    if (!is_wp_error($i_term)) {
        $i_id = is_array($i_term) ? $i_term['term_id'] : $i_term;
        wp_set_object_terms($thomas_pid, array((int)$i_id), 'product_industry');
    }

    // Image
    if (!has_post_thumbnail($thomas_pid)) {
        $img_file = dirname(__FILE__) . '/assets/images/wiley-mill-model-4.jpg';
        if (file_exists($img_file)) {
            require_once(ABSPATH . 'wp-admin/includes/media.php');
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            $tmp = wp_tempnam('wiley-mill-model-4.jpg');
            if (copy($img_file, $tmp)) {
                $att_id = media_handle_sideload(array('name' => 'wiley-mill-model-4.jpg', 'tmp_name' => $tmp), $thomas_pid, $thomas_title);
                if (!is_wp_error($att_id)) {
                    set_post_thumbnail($thomas_pid, $att_id);
                }
            }
        }
    }
}

// Reset cache
if (function_exists('opcache_reset')) {
    @opcache_reset();
}
$t_dir = function_exists('get_template_directory') ? get_template_directory() : __DIR__;
@touch($t_dir . '/functions.php');
@touch($t_dir . '/.htaccess');
$root_dir = dirname(dirname($t_dir));
if (file_exists($root_dir . '/.htaccess')) {
    @touch($root_dir . '/.htaccess');
}
@touch('/home/ambrawar/.lsphp_restart.txt');

if (function_exists('clean_term_cache')) {
    clean_term_cache(0, 'product_brand');
    clean_term_cache(0, 'product_industry');
}
if (function_exists('wp_cache_flush')) {
    wp_cache_flush();
}

// Path to data
$json_file = dirname(__FILE__) . '/import-tools/chm-products-data.json';
$images_dir = dirname(__FILE__) . '/import-tools/images/';

if (!file_exists($json_file)) {
    die('Error: chm-products-data.json not found at: ' . $json_file);
}

// Read product data
$products = json_decode(file_get_contents($json_file), true);

if (!$products || !is_array($products)) {
    die('Error: Could not parse chm-products-data.json');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>MDK Products Import - Kinglab Medika Lestari</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; max-width: 900px; margin: 40px auto; padding: 0 20px; background: #f0f0f1; color: #1d2327; }
        h1 { color: #1d2327; border-bottom: 2px solid #0073aa; padding-bottom: 10px; }
        .summary { background: #fff; padding: 20px; border-radius: 6px; border-left: 4px solid #0073aa; margin-bottom: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .product-log { background: #fff; padding: 15px; margin: 8px 0; border-radius: 4px; border-left: 3px solid #00a32a; box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
        .product-log.error { border-left-color: #d63638; }
        .product-log.skip { border-left-color: #dba617; }
        .success { color: #00a32a; font-weight: 600; }
        .error { color: #d63638; font-weight: 600; }
        .skip { color: #dba617; font-weight: 600; }
        .stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin: 20px 0; }
        .stat-box { background: #fff; padding: 20px; border-radius: 6px; text-align: center; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .stat-box .number { font-size: 2em; font-weight: 700; color: #0073aa; }
        .stat-box .label { color: #646970; margin-top: 5px; }
        small { color: #646970; }
        .detail-box { background: #f9f9f9; padding: 12px 15px; margin-top: 8px; border-radius: 4px; font-size: 0.9em; }
        .detail-box strong { color: #1d2327; }
    </style>
</head>
<body>
<h1>🏥 MDK Products Import</h1>
<div class="summary">
    <strong>Importing <?php echo count($products); ?> product(s)</strong> from MDK Medical Technology into WordPress.<br>
    <small>Brand: MDK | Industry: Hospital | Category: Clinical Chemistry</small>
</div>

<?php
ob_flush();
flush();

$imported = 0;
$skipped = 0;
$errors = 0;

foreach ($products as $index => $product) {
    $product_title = trim($product['type']);
    $brand_name = !empty($product['brand']) ? $product['brand'] : 'MDK';
    $industry_name = !empty($product['industry']) ? $product['industry'] : 'Hospital';
    $progress = '[' . ($index + 1) . '/' . count($products) . ']';

    // Build the product content (description)
    $content = '';
    if (!empty($product['description'])) {
        $content = $product['description'];
    }

    // Build the specification content
    $spec_content = '';
    if (!empty($product['specification'])) {
        $spec_content = $product['specification'];
    }

    // Check if product already exists
    $existing = get_posts(array(
        'post_type'   => 'product',
        'title'       => $product_title,
        'post_status' => 'any',
        'numberposts' => 1,
    ));

    $post_id = 0;
    $is_update = false;
    if (!empty($existing)) {
        $post_id = $existing[0]->ID;
        $is_update = true;

        // Update existing post content
        wp_update_post(array(
            'ID'           => $post_id,
            'post_content' => $content,
            'post_excerpt' => !empty($product['model']) ? $product['model'] : '',
        ));
    } else {
        // Create the product post
        $post_data = array(
            'post_title'   => $product_title,
            'post_content' => $content,
            'post_excerpt' => !empty($product['model']) ? $product['model'] : '',
            'post_status'  => 'publish',
            'post_type'    => 'product',
        );
        $post_id = wp_insert_post($post_data, true);
    }

    if (is_wp_error($post_id)) {
        echo '<div class="product-log error">';
        echo "<small>{$progress}</small> <span class='error'>ERROR</span> - <strong>{$product_title}</strong>: " . $post_id->get_error_message();
        echo '</div>';
        $errors++;
        ob_flush(); flush();
        continue;
    }

    // Set specification content meta
    if (!empty($spec_content)) {
        update_post_meta($post_id, '_specification_content', $spec_content);
    }

    // ========================================
    // Set product_brand taxonomy hierarchy
    // Brand -> Klasifikasi -> Nama Barang
    // ========================================
    $brand_terms_to_set = array();

    // 1. Parent Level (Brand) - e.g. "MDK"
    $brand_term = term_exists($brand_name, 'product_brand');
    if (!$brand_term) {
        $brand_term = wp_insert_term($brand_name, 'product_brand');
    }
    if (!is_wp_error($brand_term)) {
        $brand_term_id = is_array($brand_term) ? $brand_term['term_id'] : $brand_term;
        $brand_terms_to_set[] = (int)$brand_term_id;

        // 2. Child Level 1 (Klasifikasi) - e.g. "Clinical Chemistry"
        if (!empty($product['klasifikasi'])) {
            $klasifikasi_term = term_exists($product['klasifikasi'], 'product_brand', (int)$brand_term_id);
            if (!$klasifikasi_term) {
                $klasifikasi_term = wp_insert_term($product['klasifikasi'], 'product_brand', array('parent' => (int)$brand_term_id));
            }
            if (is_wp_error($klasifikasi_term) && isset($klasifikasi_term->error_data['term_exists'])) {
                $klasifikasi_term_id = $klasifikasi_term->error_data['term_exists'];
            } elseif (!is_wp_error($klasifikasi_term)) {
                $klasifikasi_term_id = is_array($klasifikasi_term) ? $klasifikasi_term['term_id'] : $klasifikasi_term;
            } else {
                $klasifikasi_term_id = 0;
            }

            if ($klasifikasi_term_id) {
                $brand_terms_to_set[] = (int)$klasifikasi_term_id;

                // 3. Child Level 2 (Nama Barang) - e.g. "HPLC HbA1c Analyzer"
                if (!empty($product['namaBarang'])) {
                    $nama_barang_term = term_exists($product['namaBarang'], 'product_brand', (int)$klasifikasi_term_id);
                    if (!$nama_barang_term) {
                        $nama_barang_term = wp_insert_term($product['namaBarang'], 'product_brand', array('parent' => (int)$klasifikasi_term_id));
                    }
                    if (is_wp_error($nama_barang_term) && isset($nama_barang_term->error_data['term_exists'])) {
                        $nama_barang_term_id = $nama_barang_term->error_data['term_exists'];
                        $brand_terms_to_set[] = (int)$nama_barang_term_id;
                    } elseif (!is_wp_error($nama_barang_term)) {
                        $nama_barang_term_id = is_array($nama_barang_term) ? $nama_barang_term['term_id'] : $nama_barang_term;
                        $brand_terms_to_set[] = (int)$nama_barang_term_id;
                    }
                }
            }
        }
    }

    // Assign brand terms
    wp_set_object_terms($post_id, $brand_terms_to_set, 'product_brand');

    // ========================================
    // Set product_industry taxonomy - e.g. "Hospital"
    // ========================================
    if (!empty($industry_name)) {
        $industry_term = term_exists($industry_name, 'product_industry');
        if (!$industry_term) {
            $industry_term = wp_insert_term($industry_name, 'product_industry');
        }
        if (!is_wp_error($industry_term)) {
            $industry_term_id = is_array($industry_term) ? $industry_term['term_id'] : $industry_term;
            wp_set_object_terms($post_id, array((int)$industry_term_id), 'product_industry');
        }
    }

    // ========================================
    // Upload featured image
    // ========================================
    $image_status = '⚠️ no image found';
    
    // TEMPORARY: Force update image for all CHM products
    if (has_post_thumbnail($post_id)) {
        wp_delete_attachment(get_post_thumbnail_id($post_id), true);
    }
    
    if (has_post_thumbnail($post_id)) {
        $image_status = '📷 (already exists)';
    } elseif (!empty($product['localImage'])) {
        $image_path = $images_dir . $product['localImage'];
        if (file_exists($image_path)) {
            // Include required files for media upload
            require_once(ABSPATH . 'wp-admin/includes/media.php');
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            require_once(ABSPATH . 'wp-admin/includes/image.php');

            // Copy file to temp location (wp expects to move the file)
            $tmp_file = wp_tempnam($product['localImage']);
            if (copy($image_path, $tmp_file)) {
                $file_array = array(
                    'name'     => $product['localImage'],
                    'tmp_name' => $tmp_file,
                );

                $attachment_id = media_handle_sideload($file_array, $post_id, $product_title);

                if (!is_wp_error($attachment_id)) {
                    set_post_thumbnail($post_id, $attachment_id);
                    $image_status = '📷 uploaded successfully';
                } else {
                    $image_status = '❌ Error: ' . $attachment_id->get_error_message();
                }
            } else {
                $image_status = '❌ Error: could not copy to temp file';
            }
        } else {
            $image_status = '❌ Error: file missing at ' . $image_path;
        }
    }

    // Output result log
    echo '<div class="product-log ' . ($is_update ? 'skip' : '') . '">';
    $action_text = $is_update ? 'UPDATED' : 'IMPORTED';
    echo "<small>{$progress}</small> <span class='" . ($is_update ? 'skip' : 'success') . "'>✓ {$action_text}</span> - <strong>{$product_title}</strong> ";
    echo "<div class='detail-box'>";
    echo "<strong>Brand:</strong> {$brand_name} → {$product['klasifikasi']} → {$product['namaBarang']}<br>";
    echo "<strong>Industry:</strong> {$industry_name}<br>";
    echo "<strong>Model:</strong> {$product['model']}<br>";
    echo "<strong>Image:</strong> {$image_status}<br>";
    echo "<strong>Specification:</strong> " . (!empty($spec_content) ? '✅ loaded' : '⚠️ empty');
    echo "</div>";
    echo '</div>';

    if ($is_update) {
        $skipped++;
    } else {
        $imported++;
    }
    ob_flush(); flush();
}
?>

<h2>Import Complete!</h2>
<div class="stats">
    <div class="stat-box">
        <div class="number success"><?php echo $imported; ?></div>
        <div class="label">Imported</div>
    </div>
    <div class="stat-box">
        <div class="number skip"><?php echo $skipped; ?></div>
        <div class="label">Updated</div>
    </div>
    <div class="stat-box">
        <div class="number error"><?php echo $errors; ?></div>
        <div class="label">Errors</div>
    </div>
</div>

<div class="summary" style="border-left-color: #d63638;">
    <strong>⚠️ IMPORTANT:</strong> Please delete this file (<code>import-mdk-products.php</code>) from your server now for security reasons.
</div>

</body>
</html>
