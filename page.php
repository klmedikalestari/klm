<?php
/**
 * Page Template
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
        <div class="content-wrapper full-width">
            <main class="site-main">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-featured-image" style="margin-bottom: 30px; border-radius: 8px; overflow: hidden;">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="page-content" style="line-height: 1.9; font-size: 1.05rem;">
                            <?php the_content(); ?>
                        </div>

                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links" style="margin: 30px 0;">',
                            'after'  => '</div>',
                        ));
                        ?>
                    </article>

                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                <?php endwhile; ?>
            </main>
        </div>
    </div>
</div>

<?php get_footer(); ?>
