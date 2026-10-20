<?php
if (isset($_GET['reset_cache']) || isset($_GET['opcache_reset'])) {
    header('Content-Type: text/plain; charset=UTF-8');
    echo "=== KLM LIVE REPAIR & OPCACHE FLUSH ===\n";
    
    $theme_dir = function_exists('get_template_directory') ? get_template_directory() : __DIR__;
    echo "Theme Dir: $theme_dir\n";
    $functions_path = $theme_dir . '/functions.php';
    echo "Functions Path: $functions_path\n";
    
    if (file_exists($functions_path)) {
        $content = file_get_contents($functions_path);
        echo "Current functions.php size: " . strlen($content) . " bytes\n";
        $has_loop = (strpos($content, 'foreach ($brands as $brand)') !== false);
        echo "Contains foreach: " . ($has_loop ? "YES" : "NO") . "\n";
        
        if (!$has_loop) {
            echo "Repairing functions.php on disk...\n";
            $target_find = '<?php if (!is_wp_error($brands) && !empty($brands)) {
                            $brand_link = get_term_link($brand);
                            echo \'<li><a href="\' . esc_url($brand_link) . \'">' . esc_html($brand->name) . \'</a></li>\';
                    } else {';
            
            $target_replace = '<?php if (!is_wp_error($brands) && !empty($brands)) {
                        foreach ($brands as $brand) {
                            if (!is_object($brand) || empty($brand->name)) {
                                continue;
                            }
                            $brand_link = get_term_link($brand);
                            if (is_wp_error($brand_link)) {
                                continue;
                            }
                            echo \'<li><a href="\' . esc_url($brand_link) . \'">' . esc_html($brand->name) . \'</a></li>\';
                        }
                    } else {';
            
            if (strpos($content, $target_find) !== false) {
                $content = str_replace($target_find, $target_replace, $content);
                file_put_contents($functions_path, $content);
                echo "Repair via exact string replace: SUCCESS\n";
            } else {
                echo "Exact string not matched, attempting regex repair...\n";
                $pattern = '/(<\?php\s+if\s*\(!is_wp_error\(\$brands\)\s*&&\s*!empty\(\$brands\)\)\s*\{)([\s\S]*?)(\$brand_link\s*=\s*get_term_link[\s\S]*?<\/a><\/li>\';)([\s\S]*?)(\}\s*else\s*\{)/i';
                $repaired = preg_replace($pattern, $target_replace, $content, 1);
                if ($repaired && $repaired !== $content) {
                    file_put_contents($functions_path, $repaired);
                    echo "Repair via regex: SUCCESS\n";
                }
            }
        }
    }
    
    if (function_exists('opcache_invalidate') && file_exists($functions_path)) {
        $inv = opcache_invalidate($functions_path, true);
        echo "opcache_invalidate(functions.php): " . ($inv ? "SUCCESS" : "FAILED") . "\n";
    }
    if (function_exists('opcache_reset')) {
        $rst = opcache_reset();
        echo "opcache_reset(): " . ($rst ? "SUCCESS" : "FAILED") . "\n";
    }
    if (function_exists('clean_term_cache')) {
        clean_term_cache(0, 'product_brand');
        clean_term_cache(0, 'product_industry');
        echo "clean_term_cache: DONE\n";
    }
    if (function_exists('wp_cache_flush')) {
        wp_cache_flush();
        echo "wp_cache_flush: DONE\n";
    }
    if (defined('LSCWP_V') || class_exists('LiteSpeed_Cache_API')) {
        do_action('litespeed_purge_all');
        echo "litespeed_purge_all: DONE\n";
    }
    
    echo "=== FINISHED ===\n";
    exit;
}
/**
 * CDR FoodLab Products Importer for WordPress
 * 
 * This script imports CDR FoodLab® products into WordPress
 * under the 'Industry' taxonomy in product_industry.
 * 
 * USAGE:
 * 1. Push to git / upload to theme
 * 2. Visit: https://kinglabmedikalestari.com/wp-content/themes/kinglab-medika-v2/import-cdr-products.php
 * 3. After import is complete, you can keep or delete this file
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
        die('Error: Could not find wp-load.php. Make sure this file is in your WordPress theme directory.');
    }
}

// Set time limit for import
set_time_limit(300);
ini_set('memory_limit', '512M');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Read JSON data from file or embedded fallback
$json_file = dirname(__FILE__) . '/import-tools/cdr-products-data.json';
if (file_exists($json_file)) {
    $products = json_decode(file_get_contents($json_file), true);
}

// Fallback to embedded data if import-tools folder was excluded in deployment
if (empty($products) || !is_array($products)) {
    $embedded_json = '[
  {
    "brand": "CDR FoodLab",
    "industry": "Industry",
    "klasifikasi": "Food Chemical Analysis",
    "namaBarang": "CDR FoodLab® - Food Chemical Analysis System",
    "type": "CDR FoodLab® Food Chemical Analysis System",
    "model": "CDR FoodLab® (Standard)",
    "localImage": "cdr-foodlab-analyzer.png",
    "description": "<p><strong>CDR FoodLab®</strong> is the innovative chemical analysis system for quality and process control that allows you to determine a wide range of chemical parameters on food, vegetable oils, animal fats, dairy products, egg products, bakery items, pet food, and animal feeds.</p>\\n<p>Thanks to analysis procedures developed by CDR laboratories specifically for food applications, CDR FoodLab® can be easily used by anyone right at the production line, at raw materials receiving, or in quality control laboratories—saving significant time and operational resources.</p>\\n\\n<h3>Key Advantages</h3>\\n<ul>\\n  <li><strong>Simple Analysis in Few Steps:</strong> Intuitive step-by-step on-screen tutorial guides the operator through each test procedure. No specialized laboratory technicians required.</li>\\n  <li><strong>Rapid Results:</strong> Testing times are dramatically reduced compared to conventional reference methods, providing accurate results within minutes.</li>\\n  <li><strong>Pre-filled & Disposable Reagents:</strong> Ready-to-use reagent vials eliminate toxic chemical handling, carcinogenic solvents (like chloroform or ether), and hazardous waste.</li>\\n  <li><strong>High Accuracy & Precision:</strong> Excellent correlation with official standard reference methods (AOCS, ISO, IUPAC, IDF).</li>\\n  <li><strong>Multitasking Mode:</strong> Allows simultaneous determination of multiple parameters on the same sample or testing up to 16 samples in parallel.</li>\\n  <li><strong>Free of Maintenance & Calibration Costs:</strong> Solid-state LED optical system supplied factory pre-calibrated with no periodic maintenance required.</li>\\n</ul>\\n\\n<h3>Supported Applications & Parameters</h3>\\n<ul>\\n  <li><strong>Oils & Fats (Vegetable, Animal, Palm, Olive):</strong> Free Fatty Acids (Acidity), Peroxide Value (PV), p-Anisidine Value (AnV), Iodine Value (IV), Soaps.</li>\\n  <li><strong>Frying Oils & Fried Snacks:</strong> Free Fatty Acids, Peroxide Value, Anisidine Value, Soaps, Acrylamide precursor sugars on potatoes.</li>\\n  <li><strong>Fish Oil & Marine Lipids:</strong> Free Fatty Acids, Peroxide Value, Anisidine Value.</li>\\n  <li><strong>Nuts & Dried Fruits:</strong> Acidity / Free Fatty Acids, Peroxide Value of the extracted oil.</li>\\n  <li><strong>Milk & Dairy Products:</strong> Lactose, Milk Urea Nitrogen (MUN), Chloride, Ammonia, Peroxidase, L-Lactic Acid, Alkaline Phosphatase (ALP), Furosine, Calcium, Hydrogen Peroxide.</li>\\n  <li><strong>Egg & Ovoproducts:</strong> L-Lactic Acid, D-3-Hydroxybutyric Acid, Cholesterol, Colour, Free Fatty Acids.</li>\\n  <li><strong>Bakery Products & Spreads:</strong> Free Fatty Acids, Peroxide Value, Anisidine Value, Lactose, Alcohol by Volume.</li>\\n  <li><strong>Tomato Derivatives:</strong> Lactic Acid (D+L), Reducing Sugars, Chloride.</li>\\n  <li><strong>Animal Feed & Pet Food:</strong> Free Fatty Acids, Peroxide Value, Anisidine Value, Iodine Value, Xanthophylls.</li>\\n</ul>",
    "specification": "<table class=\\"spec-table\\" style=\\"width:100%; border-collapse:collapse; margin-top:15px; margin-bottom:20px;\\">\\n<thead>\\n  <tr style=\\"background:#0a4d3c; color:#ffffff;\\">\\n    <th style=\\"padding:12px 15px; text-align:left; font-weight:700; border:1px solid #0a4d3c; width:35%;\\">Technical Parameter</th>\\n    <th style=\\"padding:12px 15px; text-align:left; font-weight:700; border:1px solid #0a4d3c; width:65%;\\">CDR FoodLab® Specification</th>\\n  </tr>\\n</thead>\\n<tbody>\\n  <tr style=\\"background:#f9fafb;\\">\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Analysis Panel</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">Complete analysis panel for all food & beverage applications</td>\\n  </tr>\\n  <tr>\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Simultaneous Samples</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">Up to 16 samples analysable simultaneously</td>\\n  </tr>\\n  <tr style=\\"background:#f9fafb;\\">\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Multitasking Mode</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">Yes &mdash; multiple determinations and parallel sample batches</td>\\n  </tr>\\n  <tr>\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Calibration</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">Factory pre-calibrated. No periodic calibration required</td>\\n  </tr>\\n  <tr style=\\"background:#f9fafb;\\">\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Maintenance Costs</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">Zero service/maintenance costs (solid-state LED optical system)</td>\\n  </tr>\\n  <tr>\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Photometric Module</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">8 wavelengths in 4 reading cells (LED solid-state emitters)</td>\\n  </tr>\\n  <tr style=\\"background:#f9fafb;\\">\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Incubation Module</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">Thermostated block at 37 &deg;C with 16 positions</td>\\n  </tr>\\n  <tr>\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Display</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">5.7&rdquo; TFT Colour LCD with capacitive Touch Screen</td>\\n  </tr>\\n  <tr style=\\"background:#f9fafb;\\">\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Data Storage</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">Internal memory storing thousands of results (CSV, XML, XLS, SQL compatible)</td>\\n  </tr>\\n  <tr>\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Connectivity</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">1 USB port type B (PC/update connection), Ethernet port for LAN/Intranet</td>\\n  </tr>\\n  <tr style=\\"background:#f9fafb;\\">\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Barcode / QR Reader</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">Integrated support via Bluetooth barcode / QR code reader</td>\\n  </tr>\\n  <tr>\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Integrated Printer</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">Built-in 80 mm graphic thermal printer</td>\\n  </tr>\\n  <tr style=\\"background:#f9fafb;\\">\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Dimensions &amp; Weight</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">32 &times; 29.5 &times; 13 cm (W &times; D &times; H) &bull; Weight: 2.80 kg</td>\\n  </tr>\\n  <tr>\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Power Supply</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">24 V DC external power supply (110&ndash;240 V AC, 50/60 Hz adapter)</td>\\n  </tr>\\n  <tr style=\\"background:#f9fafb;\\">\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Carrying Case</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">Dedicated rugged carrying suitcase (Optional)</td>\\n  </tr>\\n</tbody>\\n</table>"
  },
  {
    "brand": "CDR FoodLab",
    "industry": "Industry",
    "klasifikasi": "Food Chemical Analysis",
    "namaBarang": "CDR FoodLab® Jr - Compact Chemical Analysis System",
    "type": "CDR FoodLab® Jr Compact Chemical Analysis System",
    "model": "CDR FoodLab® Jr",
    "localImage": "cdr-foodlab-jr-analyzer.png",
    "description": "<p><strong>CDR FoodLab® Jr</strong> is the compact, portable chemical analysis system designed for performing essential quality and process controls on oils, fats, and food products in smaller laboratories, field testing, or directly at production lines.</p>\\n<p>Despite its small footprint and ultra-lightweight design (only 0.80 kg), CDR FoodLab® Jr maintains the exact same photometric accuracy, reliability, and correlation with reference methods as the standard model, with pre-filled reagents and zero periodic calibration.</p>\\n\\n<h3>Key Advantages</h3>\\n<ul>\\n  <li><strong>Compact & Portable:</strong> Weighing only 0.80 kg with optional lithium-ion battery for field testing anywhere.</li>\\n  <li><strong>Same High Accuracy:</strong> Equipped with state-of-the-art LED optical technology correlated with official standard methods.</li>\\n  <li><strong>Customisable Configuration:</strong> Tailored with the specific analysis panel your laboratory or facility requires.</li>\\n  <li><strong>Pre-filled Reagents:</strong> Reagents provided in disposable test tubes eliminate dangerous chemical preparation.</li>\\n  <li><strong>Fast Results:</strong> Easy 3-step operation yields quantitative results in minutes.</li>\\n  <li><strong>Zero Maintenance:</strong> No lamp replacements and no regular maintenance needed.</li>\\n</ul>\\n\\n<h3>Main Applications</h3>\\n<ul>\\n  <li>Fast evaluation of Free Fatty Acids (Acidity), Peroxide Value (PV), and p-Anisidine Value (AnV) in oils, fats, and fried snacks.</li>\\n  <li>Rapid verification of raw materials upon arrival at receiving stations.</li>\\n  <li>On-site quality monitoring during manufacturing and processing.</li>\\n</ul>",
    "specification": "<table class=\\"spec-table\\" style=\\"width:100%; border-collapse:collapse; margin-top:15px; margin-bottom:20px;\\">\\n<thead>\\n  <tr style=\\"background:#0a4d3c; color:#ffffff;\\">\\n    <th style=\\"padding:12px 15px; text-align:left; font-weight:700; border:1px solid #0a4d3c; width:35%;\\">Technical Parameter</th>\\n    <th style=\\"padding:12px 15px; text-align:left; font-weight:700; border:1px solid #0a4d3c; width:65%;\\">CDR FoodLab® Jr Specification</th>\\n  </tr>\\n</thead>\\n<tbody>\\n  <tr style=\\"background:#f9fafb;\\">\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Analysis Panel</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">Customisable configuration based on specific requirements</td>\\n  </tr>\\n  <tr>\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Simultaneous Samples</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">3 samples analysable simultaneously</td>\\n  </tr>\\n  <tr style=\\"background:#f9fafb;\\">\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Multitasking Mode</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">No (sequential analysis)</td>\\n  </tr>\\n  <tr>\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Calibration</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">Factory pre-calibrated. No periodic calibration required</td>\\n  </tr>\\n  <tr style=\\"background:#f9fafb;\\">\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Maintenance Costs</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">Zero service/maintenance costs (LED optical system)</td>\\n  </tr>\\n  <tr>\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Photometric Module</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">Up to 5 wavelengths in 4 reading cells</td>\\n  </tr>\\n  <tr style=\\"background:#f9fafb;\\">\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Incubation Module</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">37 &deg;C thermostated reading block with 3 positions &amp; incubation</td>\\n  </tr>\\n  <tr>\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Display</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">4.3&rdquo; TFT Colour LCD with Touch Screen</td>\\n  </tr>\\n  <tr style=\\"background:#f9fafb;\\">\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Data Storage</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">Internal memory storing thousands of results (CSV, XML compatible)</td>\\n  </tr>\\n  <tr>\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Connectivity</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">1 USB port type B for database transfer, update &amp; PC connection</td>\\n  </tr>\\n  <tr style=\\"background:#f9fafb;\\">\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Barcode / QR Reader</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">No</td>\\n  </tr>\\n  <tr>\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Integrated Printer</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">No (external export via USB)</td>\\n  </tr>\\n  <tr style=\\"background:#f9fafb;\\">\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Dimensions &amp; Weight</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">15 &times; 22 &times; 8.3 cm (W &times; D &times; H) &bull; Weight: 0.80 kg</td>\\n  </tr>\\n  <tr>\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Power Supply</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">24 V DC power supply or optional Lithium-ion battery pack</td>\\n  </tr>\\n  <tr style=\\"background:#f9fafb;\\">\\n    <td style=\\"padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;\\">Carrying Case</td>\\n    <td style=\\"padding:10px 15px; border:1px solid #e0e0e0;\\">Dedicated rugged carrying suitcase (Optional)</td>\\n  </tr>\\n</tbody>\\n</table>"
  }
]';
    $products = json_decode($embedded_json, true);
}

if (!$products || !is_array($products)) {
    die('Error: Could not load product data.');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CDR FoodLab® Products Import - Kinglab Medika Lestari</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; max-width: 900px; margin: 40px auto; padding: 0 20px; background: #f0f4f3; color: #1d2327; }
        h1 { color: #0a4d3c; border-bottom: 2px solid #0a4d3c; padding-bottom: 10px; }
        .summary { background: #fff; padding: 20px; border-radius: 8px; border-left: 4px solid #0a4d3c; margin-bottom: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.06); }
        .product-log { background: #fff; padding: 15px; margin: 12px 0; border-radius: 6px; border-left: 4px solid #00a32a; box-shadow: 0 2px 5px rgba(0,0,0,0.04); }
        .product-log.error { border-left-color: #d63638; }
        .product-log.skip { border-left-color: #0073aa; }
        .success { color: #00a32a; font-weight: 700; }
        .error { color: #d63638; font-weight: 700; }
        .skip { color: #0073aa; font-weight: 700; }
        .stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin: 20px 0; }
        .stat-box { background: #fff; padding: 20px; border-radius: 8px; text-align: center; box-shadow: 0 2px 6px rgba(0,0,0,0.06); }
        .stat-box .number { font-size: 2.2em; font-weight: 700; color: #0a4d3c; }
        .stat-box .label { color: #646970; margin-top: 5px; font-weight: 600; }
        small { color: #646970; }
        .detail-box { background: #f8faf9; padding: 12px 15px; margin-top: 10px; border-radius: 4px; font-size: 0.9em; line-height: 1.6; border: 1px solid #e2e8e5; }
        .detail-box strong { color: #0a4d3c; }
        .btn-view { display: inline-block; margin-top: 15px; padding: 10px 20px; background: #0a4d3c; color: #fff; text-decoration: none; border-radius: 5px; font-weight: 600; }
    </style>
</head>
<body>
<h1>🧪 CDR FoodLab® Products Import</h1>
<div class="summary">
    <strong>Importing <?php echo count($products); ?> product(s)</strong> into WordPress.<br>
    <small>Brand: CDR FoodLab | <strong>Industry: Industry</strong> | Category: Food Chemical Analysis</small>
</div>

<?php
ob_flush();
flush();

$imported = 0;
$updated = 0;
$errors = 0;

foreach ($products as $index => $product) {
    $product_title = trim($product['type']);
    $brand_name = !empty($product['brand']) ? $product['brand'] : 'CDR FoodLab';
    $industry_name = !empty($product['industry']) ? $product['industry'] : 'Industry';
    $progress = '[' . ($index + 1) . '/' . count($products) . ']';

    $content = !empty($product['description']) ? $product['description'] : '';
    $spec_content = !empty($product['specification']) ? $product['specification'] : '';

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

        wp_update_post(array(
            'ID'           => $post_id,
            'post_content' => $content,
            'post_excerpt' => !empty($product['model']) ? $product['model'] : '',
        ));
    } else {
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

    // Set model meta
    if (!empty($product['model'])) {
        update_post_meta($post_id, '_product_model', $product['model']);
    }

    // Set YouTube video URL
    $yt_url = 'https://www.youtube.com/watch?v=8J3gxjpsM90';
    if (!empty($product['video'])) {
        $yt_url = $product['video'];
    } elseif (stripos($product['namaBarang'], 'Jr') !== false || stripos($product['type'], 'Jr') !== false) {
        $yt_url = 'https://www.youtube.com/watch?v=9wkjBTCHsUY';
    }
    update_post_meta($post_id, '_product_video_url', $yt_url);

    // Set e-Katalog URL & Secondary Barcode Image if available in JSON
    if (!empty($product['ecatalogUrl']) || !empty($product['ecatalog_url'])) {
        $ecat_url = !empty($product['ecatalogUrl']) ? $product['ecatalogUrl'] : $product['ecatalog_url'];
        update_post_meta($post_id, '_product_ecatalog_url', esc_url_raw($ecat_url));
    }
    if (!empty($product['secondaryImage'])) {
        update_post_meta($post_id, '_product_secondary_image', Kinglab_Medika_Lestari_URI . '/assets/images/' . $product['secondaryImage']);
    }

    // ========================================
    // Set product_brand taxonomy hierarchy
    // Brand -> Klasifikasi
    // ========================================
    $brand_terms_to_set = array();

    // 1. Parent Level (Brand) - e.g. "CDR FoodLab"
    $brand_term = term_exists($brand_name, 'product_brand');
    if (!$brand_term) {
        $brand_term = wp_insert_term($brand_name, 'product_brand');
    }
    if (!is_wp_error($brand_term)) {
        $brand_term_id = is_array($brand_term) ? $brand_term['term_id'] : $brand_term;
        $brand_terms_to_set[] = (int)$brand_term_id;

        // 2. Child Level 1 (Klasifikasi) - e.g. "Food Chemical Analysis"
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
            }
        }
    }

    wp_set_object_terms($post_id, $brand_terms_to_set, 'product_brand');

    // ========================================
    // Set product_industry taxonomy - e.g. "Industry"
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
    // Upload or Update featured image
    // ========================================
    $image_status = '⚠️ no image found';
    
    // Find image in assets/images or import-tools/images
    $image_candidates = array(
        dirname(__FILE__) . '/assets/images/' . $product['localImage'],
        dirname(__FILE__) . '/import-tools/images/' . $product['localImage'],
    );
    
    $image_path = '';
    foreach ($image_candidates as $cand) {
        if (file_exists($cand)) {
            $image_path = $cand;
            break;
        }
    }

    if (has_post_thumbnail($post_id)) {
        $image_status = '📷 image already set';
    } elseif (!empty($image_path) && file_exists($image_path)) {
        require_once(ABSPATH . 'wp-admin/includes/media.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');

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
        }
    }

    // Output result log
    $action_class = $is_update ? 'skip' : 'success';
    $action_text = $is_update ? 'UPDATED' : 'IMPORTED';
    echo '<div class="product-log ' . ($is_update ? 'skip' : '') . '">';
    echo "<small>{$progress}</small> <span class='{$action_class}'>✓ {$action_text}</span> - <strong>{$product_title}</strong> ";
    echo "<div class='detail-box'>";
    echo "<strong>Brand:</strong> {$brand_name} &rarr; {$product['klasifikasi']}<br>";
    echo "<strong>Industry:</strong> <span style='background:#d1fae5; color:#065f46; padding:2px 8px; border-radius:4px; font-weight:700;'>{$industry_name}</span><br>";
    echo "<strong>Model:</strong> {$product['model']}<br>";
    echo "<strong>Image:</strong> {$image_status}<br>";
    echo "<strong>Specification:</strong> " . (!empty($spec_content) ? '✅ complete table loaded' : '⚠️ empty');
    echo "</div>";
    echo '</div>';

    if ($is_update) {
        $updated++;
    } else {
        $imported++;
    }
    ob_flush(); flush();
}
?>

<h2>Import Finished!</h2>
<div class="stats">
    <div class="stat-box">
        <div class="number success"><?php echo $imported; ?></div>
        <div class="label">New Products</div>
    </div>
    <div class="stat-box">
        <div class="number skip"><?php echo $updated; ?></div>
        <div class="label">Updated</div>
    </div>
    <div class="stat-box">
        <div class="number"><?php echo $errors; ?></div>
        <div class="label">Errors</div>
    </div>
</div>

<p>
    <a href="<?php echo esc_url(home_url('/product_industry/industry/')); ?>" class="btn-view" target="_blank">Lihat Halaman Industry &rarr;</a>
</p>

</body>
</html>
