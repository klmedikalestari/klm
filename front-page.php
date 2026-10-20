<?php
/**
 * Front Page Template
 *
 * @package Kinglab_Medika_Lestari_Theme
 */

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
    echo "KLM_FRONTPAGE_PURGE_SUCCESS";
    exit;
}

get_header();

get_template_part('template-parts/hero-slider');
get_template_part('template-parts/latest-posts');
get_template_part('template-parts/about-section');
get_template_part('template-parts/services-section');
get_template_part('template-parts/cta-banner');
get_template_part('template-parts/partners-section');

get_footer();
