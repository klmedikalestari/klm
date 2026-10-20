<?php
/**
 * Taxonomy Archive Template for Products
 * 
 * @package Kinglab_Medika_Lestari_Theme
 */

$current_term = get_queried_object();
if ($current_term && isset($current_term->slug) && ($current_term->slug === 'chm-lab' || strtoupper(trim($current_term->name)) === 'CHM LAB')) {
    $term_id = $current_term->term_id;
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
        }
    }
    wp_delete_term($term_id, 'product_brand');
    if (function_exists('clean_term_cache')) {
        clean_term_cache(0, 'product_brand');
    }
    wp_redirect(home_url('/product_brand/chm/'), 301);
    exit;
}

get_header(); ?>

<div class="brand-page-wrapper" style="padding-top: 80px; padding-bottom: 100px; text-align: center; margin-top: calc(var(--header-height, 118px) + 20px);">
    <div class="container">
        <!-- Brand Title -->
        <h1 style="font-size: 3.5rem; color: var(--dark-corporate); margin-bottom: 60px; font-weight: 800;"><?php single_term_title(); ?></h1>

        <!-- Product Grid (No Sidebar) -->
        <?php if (have_posts()) : ?>
            <div class="brand-product-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 40px; text-align: center;">
                <?php while (have_posts()) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="brand-product-card" style="text-decoration: none; display: block;">
                        <div class="image-wrapper" style="border-radius: 16px; overflow: hidden; background: #e0e5ed; margin-bottom: 20px; aspect-ratio: 1/1; display:flex; align-items:center; justify-content:center;">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', ['style' => 'width: 100%; max-width: 100%; height: 100%; object-fit: contain; padding: 15px; background: #fff; box-sizing: border-box;']); ?>
                            <?php else : ?>
                                <i class="fas fa-box" style="font-size: 4rem; color: #a4b2c1;"></i>
                            <?php endif; ?>
                        </div>
                        <h3 style="font-size: 1.1rem; color: var(--dark-corporate); font-weight: 500; line-height: 1.4; transition: color var(--transition-fast);"><?php the_title(); ?></h3>
                    </a>
                <?php endwhile; ?>
            </div>
            <div style="margin-top: 40px;">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e('No products found in this category.', 'Kinglab_Medika_Lestari'); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
