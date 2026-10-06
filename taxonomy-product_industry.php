<?php
/**
 * Taxonomy Archive Template for Products
 * 
 * @package Kinglab_Medika_Lestari_Theme
 */

get_header(); ?>

<div class="industry-page-wrapper" style="padding-top: 80px; padding-bottom: 100px; text-align: center; margin-top: calc(var(--header-height, 118px) + 20px);">
    <div class="container">
        <!-- Industry Title -->
        <h1 style="font-size: 3.5rem; color: var(--dark-corporate); margin-bottom: 60px; font-weight: 800;"><?php single_term_title(); ?></h1>

        <!-- Product Grid (No Sidebar) -->
        <?php if (have_posts()) : ?>
            <div class="industry-product-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 40px; text-align: center;">
                <?php while (have_posts()) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="industry-product-card" style="text-decoration: none; display: block;">
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
