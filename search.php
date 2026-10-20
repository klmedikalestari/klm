<?php
/**
 * Search Results Template
 *
 * @package Kinglab_Medika_Lestari_Theme
 */

get_header(); ?>

<!-- Page Header Banner -->
<div class="page-header-banner">
    <div class="container">
        <h1><?php printf(esc_html__('Search Results for: %s', 'Kinglab_Medika_Lestari-theme'), '<span>' . get_search_query() . '</span>'); ?></h1>
        <?php Kinglab_Medika_Lestari_breadcrumbs(); ?>
    </div>
</div>

<!-- Content Area -->
<div class="content-area section-padding">
    <div class="container">
        <div class="content-wrapper">
            <main class="site-main">
                <?php if (have_posts()) : ?>
                    <div class="posts-grid">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('template-parts/content', get_post_type()); ?>
                        <?php endwhile; ?>
                    </div>

                    <div class="pagination">
                        <?php
                        the_posts_pagination(array(
                            'mid_size'  => 2,
                            'prev_text' => '<i class="fas fa-chevron-left"></i>',
                            'next_text' => '<i class="fas fa-chevron-right"></i>',
                        ));
                        ?>
                    </div>
                <?php else : ?>
                    <div class="no-results" style="text-align: center; padding: 60px 0;">
                        <i class="fas fa-search" style="font-size: 3rem; color: var(--medium-grey); margin-bottom: 20px;"></i>
                        <h2><?php esc_html_e('No Results Found', 'Kinglab_Medika_Lestari-theme'); ?></h2>
                        <p><?php esc_html_e('The search did not return any results. Please try again with different terms.', 'Kinglab_Medika_Lestari-theme'); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                <?php endif; ?>
            </main>

            <aside class="sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</div>

<?php get_footer(); ?>
