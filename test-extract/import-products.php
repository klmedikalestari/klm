<?php
/**
 * Scitek Products Importer for WordPress
 * 
 * This script imports products from products-data.json into WordPress
 * as 'product' custom post type entries.
 * 
 * USAGE:
 * 1. Upload this file + products-data.json + images/ folder to your theme directory
 * 2. Visit: https://yourdomain.com/wp-content/themes/YOUR_THEME/import-products.php
 * 3. After import is complete, DELETE this file from the server
 * 
 * @package Kinglab_Medika_Lestari_Theme
 */

// Load WordPress
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

// Only allow admins
if (!current_user_can('manage_options')) {
    die('Error: You must be logged in as an administrator to run this import.');
}

// Set time limit for long import
set_time_limit(600);

// Path to data
$json_file = dirname(__FILE__) . '/import-tools/products-data.json';
$images_dir = dirname(__FILE__) . '/import-tools/images/';

if (!file_exists($json_file)) {
    die('Error: products-data.json not found at: ' . $json_file);
}

// Read product data
$products = json_decode(file_get_contents($json_file), true);

if (!$products || !is_array($products)) {
    die('Error: Could not parse products-data.json');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Scitek Products Import - Kinglab Medika Lestari</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; max-width: 900px; margin: 40px auto; padding: 0 20px; background: #f0f0f1; color: #1d2327; }
        h1 { color: #1d2327; border-bottom: 2px solid #2271b1; padding-bottom: 10px; }
        .summary { background: #fff; padding: 20px; border-radius: 6px; border-left: 4px solid #2271b1; margin-bottom: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .product-log { background: #fff; padding: 15px; margin: 8px 0; border-radius: 4px; border-left: 3px solid #00a32a; box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
        .product-log.error { border-left-color: #d63638; }
        .product-log.skip { border-left-color: #dba617; }
        .success { color: #00a32a; font-weight: 600; }
        .error { color: #d63638; font-weight: 600; }
        .skip { color: #dba617; font-weight: 600; }
        .stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin: 20px 0; }
        .stat-box { background: #fff; padding: 20px; border-radius: 6px; text-align: center; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .stat-box .number { font-size: 2em; font-weight: 700; color: #2271b1; }
        .stat-box .label { color: #646970; margin-top: 5px; }
        small { color: #646970; }
    </style>
</head>
<body>
<h1>🔬 Scitek Products Import</h1>
<div class="summary">
    <strong>Importing <?php echo count($products); ?> products</strong> from Scitek into WordPress.<br>
    <small>Brand: Scitek | Categories: Laboratory Ventilation, Autoclaves & Sterilizers, Cold Storage Products</small>
</div>

<?php
ob_flush();
flush();

$imported = 0;
$skipped = 0;
$errors = 0;

foreach ($products as $index => $product) {
    $product_title = trim($product['type']);
    $progress = '[' . ($index + 1) . '/' . count($products) . ']';

    // Check if product already exists
    $existing = get_posts(array(
        'post_type'   => 'product',
        'title'       => $product_title,
        'post_status' => 'any',
        'numberposts' => 1,
    ));

    if (!empty($existing)) {
        echo '<div class="product-log skip">';
        echo "<small>{$progress}</small> <span class='skip'>SKIP</span> - <strong>{$product_title}</strong> (already exists)";
        echo '</div>';
        $skipped++;
        ob_flush(); flush();
        continue;
    }

    // Build description/content
    $content = '';
    if (!empty($product['description'])) {
        $content = '<p>' . esc_html($product['description']) . '</p>';
    }

    // Build specification content with models
    $spec_content = '';
    if (!empty($product['model'])) {
        $spec_content .= '<div class="spec-models">';
        $spec_content .= '<h4>Available Models</h4>';
        $spec_content .= '<p>' . esc_html($product['model']) . '</p>';
        $spec_content .= '</div>';
    }
    if (!empty($product['scitekUrl'])) {
        $spec_content .= '<div class="spec-source">';
        $spec_content .= '<p><a href="' . esc_url($product['scitekUrl']) . '" target="_blank" rel="noopener">View on Scitek Global →</a></p>';
        $spec_content .= '</div>';
    }

    // Create the product post
    $post_data = array(
        'post_title'   => $product_title,
        'post_content' => $content,
        'post_excerpt' => !empty($product['model']) ? $product['model'] : '',
        'post_status'  => 'publish',
        'post_type'    => 'product',
    );

    $post_id = wp_insert_post($post_data, true);

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

    // Set taxonomy hierarchy inside product_brand (Scitek -> Klasifikasi -> Nama Barang)
    $terms_to_set = array();

    // 1. Parent Level (Brand)
    $brand_term = term_exists('Scitek', 'product_brand');
    if (!$brand_term) {
        $brand_term = wp_insert_term('Scitek', 'product_brand');
    }
    $brand_term_id = is_array($brand_term) ? $brand_term['term_id'] : $brand_term;
    $terms_to_set[] = (int)$brand_term_id;

    // 2. Child Level 1 (Klasifikasi)
    if (!empty($product['klasifikasi'])) {
        $klasifikasi_term = term_exists($product['klasifikasi'], 'product_brand', (int)$brand_term_id);
        if (!$klasifikasi_term) {
            $klasifikasi_term = wp_insert_term($product['klasifikasi'], 'product_brand', array('parent' => (int)$brand_term_id));
        }
        $klasifikasi_term_id = is_array($klasifikasi_term) ? $klasifikasi_term['term_id'] : $klasifikasi_term;
        $terms_to_set[] = (int)$klasifikasi_term_id;

        // 3. Child Level 2 (Nama Barang)
        if (!empty($product['namaBarang'])) {
            $nama_barang_term = term_exists($product['namaBarang'], 'product_brand', (int)$klasifikasi_term_id);
            if (!$nama_barang_term) {
                $nama_barang_term = wp_insert_term($product['namaBarang'], 'product_brand', array('parent' => (int)$klasifikasi_term_id));
            }
            if (!is_wp_error($nama_barang_term)) {
                $nama_barang_term_id = is_array($nama_barang_term) ? $nama_barang_term['term_id'] : $nama_barang_term;
                $terms_to_set[] = (int)$nama_barang_term_id;
            }
        }
    }

    // Assign all terms to product_brand. We DO NOT touch product_industry.
    wp_set_object_terms($post_id, $terms_to_set, 'product_brand');

    // Upload featured image
    $image_set = false;
    if (!empty($product['localImage'])) {
        $image_path = $images_dir . $product['localImage'];
        if (file_exists($image_path)) {
            // Upload the image to WordPress media library
            $file_array = array(
                'name'     => $product['localImage'],
                'tmp_name' => $image_path,
            );

            // Copy file to temp location (wp expects to move the file)
            $tmp_file = wp_tempnam($product['localImage']);
            copy($image_path, $tmp_file);
            $file_array['tmp_name'] = $tmp_file;

            // Include required files
            require_once(ABSPATH . 'wp-admin/includes/media.php');
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            require_once(ABSPATH . 'wp-admin/includes/image.php');

            $attachment_id = media_handle_sideload($file_array, $post_id, $product_title);

            if (!is_wp_error($attachment_id)) {
                set_post_thumbnail($post_id, $attachment_id);
                $image_set = true;
            }
        }
    }

    $image_status = $image_set ? '📷' : '⚠️ no image';

    echo '<div class="product-log">';
    echo "<small>{$progress}</small> <span class='success'>✓ IMPORTED</span> - <strong>{$product_title}</strong> ";
    echo "<small>({$product['klasifikasi']} → {$product['namaBarang']}) {$image_status}</small>";
    echo '</div>';

    $imported++;
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
        <div class="label">Skipped</div>
    </div>
    <div class="stat-box">
        <div class="number error"><?php echo $errors; ?></div>
        <div class="label">Errors</div>
    </div>
</div>

<div class="summary" style="border-left-color: #d63638;">
    <strong>⚠️ IMPORTANT:</strong> Please delete this file (<code>import-products.php</code>) from your server now for security reasons.
</div>

</body>
</html>
