<?php
/**
 * Author Archive Template & Automatic Cache Purge Handler
 *
 * @package Kinglab_Medika_Lestari_Theme
 */

// Reset OPcache & WordPress / LiteSpeed caches if requested or on deploy
if (isset($_GET['purge_klm_cache']) || isset($_GET['opcache_reset'])) {
    if (function_exists('opcache_reset')) {
        @opcache_reset();
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
    header('Content-Type: text/plain; charset=UTF-8');
    echo "KLM_CACHE_PURGE_SUCCESS";
    exit;
}

// Prevent user enumeration by safely redirecting author queries to home
wp_safe_redirect(home_url('/'), 301);
exit;
