<?php
/**
 * Archive Template
 *
 * @package Kinglab_Medika_Lestari_Theme
 */

get_header(); ?>

<div class="news-page-wrapper" style="padding-top: 40px; padding-bottom: 100px; margin-top: var(--header-height, 118px);">
    <div class="container">
        
        <!-- Breadcrumbs -->
        <div class="breadcrumb" style="font-size: 0.85rem; text-transform: uppercase; color: var(--text-medium); margin-bottom: 50px; letter-spacing: 0.5px;">
            <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Kinglab_Medika_Lestari</a> > <span style="font-weight: 600;"><?php echo strtoupper(single_term_title('', false)); ?></span>
        </div>

        <?php if (have_posts()) : ?>
            <div class="news-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 40px;">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('news-card'); ?> style="display: flex; flex-direction: column;">
                        <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit; display: block;">
                            <div class="news-image" style="margin-bottom: 20px;">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium_large', ['style' => 'width: 100%; max-width: 100%; height: 100%; display: block; aspect-ratio: 16/10; object-fit: contain; padding: 15px; background: #fff; box-sizing: border-box;']); ?>
                                <?php else : ?>
                                    <div style="width: 100%; aspect-ratio: 16/10; background: #e0e5ed; display:flex; align-items:center; justify-content:center; color:#a4b2c1;">
                                        <i class="fas fa-image" style="font-size: 4rem; opacity: 0.5;"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <h2 class="news-title" style="font-size: 1.25rem; color: var(--dark-corporate); font-weight: 600; line-height: 1.4; margin-bottom: 15px;"><?php the_title(); ?></h2>
                            <div class="news-excerpt" style="color: var(--text-medium); font-size: 0.95rem; line-height: 1.6; margin-bottom: 20px;">
                                <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?>
                            </div>
                        </a>
                        <div class="news-meta" style="margin-top: auto; padding-top: 15px; border-top: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center;">
                            <a href="<?php the_permalink(); ?>" class="read-more" style="color: var(--primary-blue); font-weight: 500; text-decoration: none; font-size: 0.95rem;">Learn more</a>
                            <span class="comments-count" style="color: var(--text-medium); font-size: 0.95rem;">
                                <i class="fas fa-quote-left" style="opacity: 0.5; margin-right: 5px;"></i> <?php comments_number('0', '1', '%'); ?>
                            </span>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="pagination" style="margin-top: 60px;">
                <?php
                echo paginate_links(array(
                    'mid_size'  => 2,
                    'prev_text' => '<i class="fas fa-chevron-left"></i>',
                    'next_text' => '<i class="fas fa-chevron-right"></i>',
                ));
                ?>
            </div>
        <?php else : ?>
            <div class="no-results">
                <h2 style="font-size: 1.5rem; color: var(--dark-corporate); margin-bottom: 15px;"><?php esc_html_e('Nothing Found', 'Kinglab_Medika_Lestari'); ?></h2>
                <p style="color: var(--text-medium);"><?php esc_html_e('Sorry, no posts matched your criteria.', 'Kinglab_Medika_Lestari'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
