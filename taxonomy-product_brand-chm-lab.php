<?php
/**
 * Cleaner and Redirect Template for Brand CHM LAB
 * 
 * WordPress Template Hierarchy: taxonomy-product_brand-chm-lab.php
 * Automatically called when visiting /product_brand/chm-lab/
 * 
 * @package Kinglab_Medika_Lestari_Theme
 */

if (function_exists('opcache_reset')) {
    @opcache_reset();
}

$report = array();

// 1. Cari term chm-lab
$term = get_term_by('slug', 'chm-lab', 'product_brand');
if (!$term) {
    $term = get_term_by('name', 'CHM LAB', 'product_brand');
}

if ($term && !is_wp_error($term)) {
    $term_id = $term->term_id;

    // Hapus semua produk yang terhubung ke brand ini
    $pids = get_posts(array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'post_status'    => 'any',
        'fields'         => 'ids',
        'tax_query'      => array(
            array(
                'taxonomy'         => 'product_brand',
                'field'            => 'term_id',
                'terms'            => $term_id,
                'include_children' => true,
            ),
        ),
    ));
    if (!empty($pids)) {
        foreach ($pids as $pid) {
            $thumb_id = get_post_thumbnail_id($pid);
            if ($thumb_id) {
                wp_delete_attachment($thumb_id, true);
            }
            wp_delete_post($pid, true);
            $report[] = "Deleted product attached to CHM LAB: ID " . $pid;
        }
    }

    // Hapus child terms jika ada
    $children = get_terms(array(
        'taxonomy'   => 'product_brand',
        'parent'     => $term_id,
        'hide_empty' => false,
    ));
    if (!is_wp_error($children) && !empty($children)) {
        foreach ($children as $child) {
            wp_delete_term($child->term_id, 'product_brand');
            $report[] = "Deleted child term: " . $child->name . " (ID: " . $child->term_id . ")";
        }
    }

    wp_delete_term($term_id, 'product_brand');
    $report[] = "Deleted brand term: " . $term->name . " (slug: " . $term->slug . ", ID: " . $term_id . ")";
} else {
    $report[] = "Brand term 'CHM LAB' already deleted or not found.";
}

// 2. Hapus produk lama berdasarkan slug chm-quantitative-filter-paper
$old_products = get_posts(array(
    'post_type'      => 'product',
    'name'           => 'chm-quantitative-filter-paper',
    'post_status'    => 'any',
    'posts_per_page' => -1,
    'fields'         => 'ids',
));
if (!empty($old_products)) {
    foreach ($old_products as $pid) {
        $thumb_id = get_post_thumbnail_id($pid);
        if ($thumb_id) {
            wp_delete_attachment($thumb_id, true);
        }
        wp_delete_post($pid, true);
        $report[] = "Deleted old product: chm-quantitative-filter-paper (ID: " . $pid . ")";
    }
}

// 3. Purge cache WordPress dan OPcache
if (function_exists('clean_term_cache')) {
    clean_term_cache(0, 'product_brand');
}
if (function_exists('wp_cache_flush')) {
    wp_cache_flush();
}
if (function_exists('opcache_reset')) {
    @opcache_reset();
}

// Respon teks jika mode debug
if (isset($_GET['debug']) || isset($_GET['nocache'])) {
    header('Content-Type: text/plain; charset=UTF-8');
    echo "=== CHM LAB CLEANUP REPORT ===\n";
    echo implode("\n", $report) . "\n";
    echo "STATUS: SUCCESS\n";
    exit;
}

// Redirect 301 ke brand resmi CHM
wp_redirect(home_url('/product_brand/chm/'), 301);
exit;
