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
