<?php
/**
 * Script to undo the previous Scitek import.
 * Deletes all products imported and cleans up the product_industry terms.
 */

define( 'WP_USE_THEMES', false );

// Load WordPress
$wp_load_paths = array(
    dirname(__FILE__) . '/wp-load.php',
    dirname(__FILE__) . '/../../../wp-load.php',
    dirname(__FILE__) . '/../../../../wp-load.php',
);

$wp_loaded = false;
foreach ($wp_load_paths as $path) {
    if (file_exists($path)) {
        require_once($path);
        $wp_loaded = true;
        break;
    }
}

if (!$wp_loaded) {
    die("Error: wp-load.php not found. Please upload this file to the public_html folder.");
}

set_time_limit(0);

echo "<html><body style='font-family:sans-serif; padding: 20px;'>";
echo "<h2>Undo Scitek Import</h2>";
echo "<ul>";

// 1. Delete all products that have brand 'Scitek'
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'product_brand',
            'field'    => 'slug',
            'terms'    => 'scitek',
        ),
    ),
);

$query = new WP_Query($args);
$deleted_count = 0;

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        
        // Delete featured image attachment
        $thumbnail_id = get_post_thumbnail_id($post_id);
        if ($thumbnail_id) {
            wp_delete_attachment($thumbnail_id, true);
        }
        
        // Delete the product post
        wp_delete_post($post_id, true);
        $deleted_count++;
    }
    echo "<li>Deleted {$deleted_count} Scitek products (and their images).</li>";
} else {
    echo "<li>No Scitek products found.</li>";
}
wp_reset_postdata();

// 2. Delete terms from product_industry
$industries_to_delete = array(
    'Laboratory Ventilation',
    'Autoclaves & Sterilizers',
    'Cold Storage Products'
);

$terms_deleted = 0;
foreach ($industries_to_delete as $industry_name) {
    $parent_term = get_term_by('name', $industry_name, 'product_industry');
    if ($parent_term) {
        // Delete all child terms first
        $children = get_terms(array(
            'taxonomy' => 'product_industry',
            'parent' => $parent_term->term_id,
            'hide_empty' => false
        ));
        
        if (!is_wp_error($children)) {
            foreach ($children as $child) {
                wp_delete_term($child->term_id, 'product_industry');
                $terms_deleted++;
            }
        }
        
        // Delete the parent term
        wp_delete_term($parent_term->term_id, 'product_industry');
        $terms_deleted++;
    }
}

echo "<li>Deleted {$terms_deleted} terms from the By Industry menu to restore it to original state.</li>";
echo "</ul>";
echo "<h3 style='color:green;'>Undo Complete! Your 'By Industry' menu should be back to normal.</h3>";
echo "<p style='color:red;'><strong>IMPORTANT:</strong> Please delete this file (undo-import.php) from your server now.</p>";
echo "</body></html>";
