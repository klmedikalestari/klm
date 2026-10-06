<?php
/**
 * Single Post Template
 *
 * @package Kinglab_Medika_Lestari_Theme
 */

get_header(); ?>

<!-- Page Header Banner -->
<div class="page-header-banner">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <?php Kinglab_Medika_Lestari_breadcrumbs(); ?>
    </div>
</div>

<!-- Content Area -->
<div class="content-area section-padding">
    <div class="container">
        <div class="content-wrapper">
            <main class="site-main">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-featured-image" style="margin-bottom: 30px; border-radius: 8px; overflow: hidden;">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="post-meta" style="margin-bottom: 25px; display: flex; gap: 20px; color: var(--text-light); font-size: 0.9rem;">
                            <span><i class="far fa-calendar-alt"></i> <?php echo get_the_date(); ?></span>
                            <span><i class="far fa-user"></i> <?php the_author(); ?></span>
                            <span><i class="far fa-folder"></i> <?php the_category(', '); ?></span>

                        </div>

                        <div class="post-content" style="line-height: 1.9; font-size: 1.05rem;">
                            <?php the_content(); ?>
                        </div>

                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links" style="margin: 30px 0;">',
                            'after'  => '</div>',
                        ));
                        ?>

                        <?php if (has_tag()) : ?>
                            <div class="post-tags" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--medium-grey);">
                                <i class="fas fa-tags" style="color: var(--primary-blue); margin-right: 8px;"></i>
                                <?php the_tags('', ', '); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Post Navigation -->
                        <div class="post-navigation" style="margin-top: 40px; display: flex; justify-content: space-between; padding: 20px 0; border-top: 1px solid var(--medium-grey); border-bottom: 1px solid var(--medium-grey);">
                            <div style="max-width: 45%;">
                                <?php previous_post_link('<span style="font-size: 0.8rem; color: var(--text-light); text-transform: uppercase;">Previous</span><br>%link'); ?>
                            </div>
                            <div style="text-align: right; max-width: 45%;">
                                <?php next_post_link('<span style="font-size: 0.8rem; color: var(--text-light); text-transform: uppercase;">Next</span><br>%link'); ?>
                            </div>
                        </div>
                    </article>


                <?php endwhile; ?>
            </main>

            <aside class="sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</div>

<?php get_footer(); ?>
