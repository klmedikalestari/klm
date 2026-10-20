<?php
/**
 * Taxonomy Template for Brand Biobase
 * Serves both as normal brand template and OPcache/Bytecode reset trigger
 */

// 1. Invalidate and reset OPcache
if (function_exists('opcache_reset')) {
    @opcache_reset();
}

$theme_dir = get_template_directory();
$functions_file = $theme_dir . '/functions.php';

if (function_exists('opcache_invalidate') && file_exists($functions_file)) {
    @opcache_invalidate($functions_file, true);
}

// 2. Clear WordPress cache
if (function_exists('wp_cache_flush')) {
    @wp_cache_flush();
}

if (function_exists('clean_term_cache')) {
    @clean_term_cache(0, 'product_brand');
    @clean_term_cache(0, 'product_industry');
}

// 3. Clear LiteSpeed cache if active
if (defined('LSCWP_V') || class_exists('LiteSpeed_Cache_API')) {
    do_action('litespeed_purge_all');
}

// 4. Verify & auto-repair functions.php on disk if needed
$functions_repaired = false;
$has_foreach = false;

if (file_exists($functions_file)) {
    $content = file_get_contents($functions_file);
    $has_foreach = (strpos($content, 'foreach ($brands as $brand)') !== false);
    
    if (!$has_foreach) {
        // Auto-repair the broken By Brand mega menu block
        $broken_pattern = '/(<\?php\s+if\s*\(!is_wp_error\(\$brands\)\s*&&\s*!empty\(\$brands\)\)\s*\{)([\s\S]*?)(\$brand_link\s*=\s*get_term_link\(\$brand\);[\s\S]*?echo\s*\'<li><a\s*href="\'[\s\S]*?<\/a><\/li>\';)([\s\S]*?)(\}\s*else\s*\{)/i';
        
        $fixed_block = '<?php if (!is_wp_error($brands) && !empty($brands)) {
                        foreach ($brands as $brand) {
                            if (!is_object($brand) || empty($brand->name)) {
                                continue;
                            }
                            $brand_link = get_term_link($brand);
                            if (is_wp_error($brand_link)) {
                                continue;
                            }
                            echo \'<li><a href="\' . esc_url($brand_link) . \'">\' . esc_html($brand->name) . \'</a></li>\';
                        }
                    } else {';
                    
        $new_content = preg_replace($broken_pattern, $fixed_block, $content, 1);
        if ($new_content && $new_content !== $content) {
            @file_put_contents($functions_file, $new_content);
            $functions_repaired = true;
            $has_foreach = true;
            if (function_exists('opcache_invalidate')) {
                @opcache_invalidate($functions_file, true);
            }
            if (function_exists('opcache_reset')) {
                @opcache_reset();
            }
        }
    }
}

// 5. If diagnostic query parameter is present, return JSON summary and exit
if (isset($_GET['opcache_diag'])) {
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode(array(
        'status'             => 'OK',
        'theme_dir'          => $theme_dir,
        'functions_exists'   => file_exists($functions_file),
        'has_foreach'        => $has_foreach,
        'functions_repaired' => $functions_repaired,
        'opcache_reset'      => function_exists('opcache_reset'),
        'timestamp'          => time(),
    ));
    exit;
}

// 6. Normal visitors view the brand page
$default_brand_template = $theme_dir . '/taxonomy-product_brand.php';
if (file_exists($default_brand_template)) {
    require $default_brand_template;
} else {
    get_header();
    echo '<div class="container section-padding"><h1>' . single_term_title('', false) . '</h1></div>';
    get_footer();
}
