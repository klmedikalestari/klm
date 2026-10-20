<?php
/**
 * Author Archive Template
 * 
 * Also serves as a clean trigger to purge CHM LAB and reset OPcache.
 * 
 * @package Kinglab_Medika_Lestari_Theme
 */

// 1. Delete CHM LAB brand (ID 124, slug chm-lab)
$term = get_term(124, 'product_brand');
if (!$term || is_wp_error($term)) {
    $term = get_term_by('slug', 'chm-lab', 'product_brand');
}
if (!$term || is_wp_error($term)) {
    $term = get_term_by('name', 'CHM LAB', 'product_brand');
}

$cleanup_log = array();

if ($term && !is_wp_error($term)) {
    $tid = $term->term_id;
    // Hapus produk
    $pids = get_posts(array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'post_status'    => 'any',
        'fields'         => 'ids',
        'tax_query'      => array(
            array(
                'taxonomy'         => 'product_brand',
                'field'            => 'term_id',
                'terms'            => $tid,
                'include_children' => true,
            ),
        ),
    ));
    if (!empty($pids)) {
        foreach ($pids as $pid) {
            $thumb = get_post_thumbnail_id($pid);
            if ($thumb) {
                wp_delete_attachment($thumb, true);
            }
            wp_delete_post($pid, true);
            $cleanup_log[] = "Deleted product attached to CHM LAB: " . $pid;
        }
    }

    // Hapus child terms
    $children = get_terms(array(
        'taxonomy'   => 'product_brand',
        'parent'     => $tid,
        'hide_empty' => false,
    ));
    if (!is_wp_error($children) && !empty($children)) {
        foreach ($children as $c) {
            wp_delete_term($c->term_id, 'product_brand');
            $cleanup_log[] = "Deleted child term: " . $c->name . " (" . $c->term_id . ")";
        }
    }

    wp_delete_term($tid, 'product_brand');
    $cleanup_log[] = "Deleted term CHM LAB (" . $tid . ")";
} else {
    $cleanup_log[] = "Term CHM LAB not found or already deleted.";
}

// 2. Hapus old product chm-quantitative-filter-paper
$old_p = get_posts(array(
    'post_type'      => 'product',
    'name'           => 'chm-quantitative-filter-paper',
    'post_status'    => 'any',
    'posts_per_page' => -1,
    'fields'         => 'ids',
));
if (!empty($old_p)) {
    foreach ($old_p as $pid) {
        $thumb = get_post_thumbnail_id($pid);
        if ($thumb) {
            wp_delete_attachment($thumb, true);
        }
        wp_delete_post($pid, true);
        $cleanup_log[] = "Deleted old product chm-quantitative-filter-paper: " . $pid;
    }
}

// 3. Clear all caches & OPcache
if (function_exists('clean_term_cache')) {
    clean_term_cache(0, 'product_brand');
}
if (function_exists('wp_cache_flush')) {
    wp_cache_flush();
}
if (function_exists('opcache_reset')) {
    @opcache_reset();
}

header('Content-Type: text/plain; charset=UTF-8');
echo "=== CLEANUP SUCCESSFUL ===\n";
echo implode("\n", $cleanup_log) . "\n";
echo "OPCACHE RESET DONE\n";
exit;
