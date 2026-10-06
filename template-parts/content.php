<!-- Post Card Template -->
<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    <div class="post-card-image">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('Kinglab_Medika_Lestari-card'); ?>
            </a>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo esc_url(Kinglab_Medika_Lestari_URI . '/assets/images/placeholder.jpg'); ?>" alt="<?php the_title_attribute(); ?>">
            </a>
        <?php endif; ?>
        <span class="post-date"><?php echo get_the_date('M d, Y'); ?></span>
    </div>

    <div class="post-card-content">
        <?php
        $categories = get_the_category();
        if ($categories) : ?>
            <span class="post-category">
                <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>">
                    <?php echo esc_html($categories[0]->name); ?>
                </a>
            </span>
        <?php endif; ?>

        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

        <p class="excerpt"><?php echo wp_trim_words(get_the_excerpt(), 18, '...'); ?></p>

        <div class="post-card-meta">
            <span><i class="far fa-comment"></i> <?php comments_number('0', '1', '%'); ?></span>
            <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'Kinglab_Medika_Lestari-theme'); ?> →</a>
        </div>
    </div>
</article>
