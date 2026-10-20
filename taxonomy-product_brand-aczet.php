<?php
/**
 * Specific Template for Brand Aczet
 * Also serves as guaranteed OPcache reset trigger
 */

if (function_exists('opcache_reset')) {
    @opcache_reset();
}
if (function_exists('opcache_invalidate')) {
    @opcache_invalidate(get_template_directory() . '/functions.php', true);
    @opcache_invalidate(get_template_directory() . '/header.php', true);
    @opcache_invalidate(get_template_directory() . '/index.php', true);
}
if (function_exists('clean_term_cache')) {
    @clean_term_cache(0, 'product_brand');
    @clean_term_cache(0, 'product_industry');
}
if (function_exists('wp_cache_flush')) {
    @wp_cache_flush();
}
if (defined('LSCWP_V')) {
    do_action('litespeed_purge_all');
}

if (isset($_GET['purge'])) {
    header('Content-Type: text/plain; charset=UTF-8');
    echo "KLM_OPCACHE_RESET_SUCCESSFUL";
    exit;
}

// Normal brand page rendering
require get_template_directory() . '/taxonomy-product_brand.php';
