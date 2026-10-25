<?php
/**
 * Taxonomy Archive Template for Products
 * 
 * @package Kinglab_Medika_Lestari_Theme
 */

// Check if current brand is CDR FoodLab (or a child taxonomy of CDR FoodLab)
$current_term = get_queried_object();
$is_cdr_brand = false;

if ($current_term && isset($current_term->taxonomy) && $current_term->taxonomy === 'product_brand') {
    if ($current_term->slug === 'cdr-foodlab' || stripos($current_term->slug, 'cdr') !== false || stripos($current_term->name, 'cdr') !== false) {
        $is_cdr_brand = true;
    } elseif (!empty($current_term->parent)) {
        $parent_term = get_term($current_term->parent, 'product_brand');
        if ($parent_term && !is_wp_error($parent_term) && (stripos($parent_term->slug, 'cdr') !== false || stripos($parent_term->name, 'cdr') !== false)) {
            $is_cdr_brand = true;
        }
    }
}

if ($is_cdr_brand) {
    get_header();
    get_template_part('template-parts/cdr-analysis-systems');
    get_footer();
    return;
}

// Check if current brand is ARCO
$is_arco_brand = false;
if ($current_term && isset($current_term->taxonomy) && $current_term->taxonomy === 'product_brand') {
    if ($current_term->slug === 'arco' || stripos($current_term->slug, 'arco') !== false || stripos($current_term->name, 'arco') !== false) {
        $is_arco_brand = true;
    } elseif (!empty($current_term->parent)) {
        $parent_term = get_term($current_term->parent, 'product_brand');
        if ($parent_term && !is_wp_error($parent_term) && (stripos($parent_term->slug, 'arco') !== false || stripos($parent_term->name, 'arco') !== false)) {
            $is_arco_brand = true;
        }
    }
}

if ($is_arco_brand) {
    get_header();
    get_template_part('template-parts/arco-equipment-showcase');
    get_footer();
    return;
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
