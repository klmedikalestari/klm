<!-- Latest Posts Section -->
<section class="latest-posts section-padding" id="latest-posts">
    <div class="container">
        <div class="section-title">
            <h2><?php esc_html_e('Latest Posts', 'Kinglab_Medika_Lestari-theme'); ?></h2>
            <p><?php esc_html_e('Stay updated with our latest news and articles', 'Kinglab_Medika_Lestari-theme'); ?></p>
        </div>

        <div class="posts-grid">
            <?php
            $latest_posts = new WP_Query(array(
                'posts_per_page' => 3,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));

            if ($latest_posts->have_posts()) :
                while ($latest_posts->have_posts()) : $latest_posts->the_post();
            ?>
                <article class="post-card" id="post-<?php the_ID(); ?>">
                    <div class="post-card-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('Kinglab_Medika_Lestari-card'); ?>
                            </a>
                        <?php else : ?>
                            <?php 
                                $placeholders = array(
                                    'https://images.unsplash.com/photo-1576086213369-97a306d36557?w=400&h=280&fit=crop',
                                    'https://images.unsplash.com/photo-1579154204601-01588f351e67?w=400&h=280&fit=crop',
                                    'https://images.unsplash.com/photo-1559757175-0eb30cd8c063?w=400&h=280&fit=crop'
                                );
                                $idx = isset($latest_posts->current_post) ? ($latest_posts->current_post % 3) : 0;
                            ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo esc_url($placeholders[$idx]); ?>" alt="<?php the_title_attribute(); ?>">
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
                            <span><i class="far fa-comment"></i> <?php comments_number('0', '1', '%'); ?> <?php esc_html_e('Comments', 'Kinglab_Medika_Lestari-theme'); ?></span>
                            <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'Kinglab_Medika_Lestari-theme'); ?> →</a>
                        </div>
                    </div>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <!-- Fallback: Sample cards when no posts exist -->
                <article class="post-card">
                    <div class="post-card-image">
                        <img src="https://images.unsplash.com/photo-1576086213369-97a306d36557?w=400&h=280&fit=crop" alt="Post 1">
                        <span class="post-date">Mar 27, 2026</span>
                    </div>
                    <div class="post-card-content">
                        <span class="post-category">News</span>
                        <h3><a href="#">New Laboratory Equipment for Advanced Research</a></h3>
                        <p class="excerpt">Discover our latest range of laboratory equipment designed for cutting-edge research and development.</p>
                        <div class="post-card-meta">
                            <span><i class="far fa-comment"></i> 0 Comments</span>
                            <a href="#">Read More →</a>
                        </div>
                    </div>
                </article>
                <article class="post-card">
                    <div class="post-card-image">
                        <img src="https://images.unsplash.com/photo-1579154204601-01588f351e67?w=400&h=280&fit=crop" alt="Post 2">
                        <span class="post-date">Mar 25, 2026</span>
                    </div>
                    <div class="post-card-content">
                        <span class="post-category">Industry</span>
                        <h3><a href="#">Industrial Solutions for Modern Manufacturing</a></h3>
                        <p class="excerpt">How our industrial solutions are helping manufacturers improve quality control and efficiency.</p>
                        <div class="post-card-meta">
                            <span><i class="far fa-comment"></i> 2 Comments</span>
                            <a href="#">Read More →</a>
                        </div>
                    </div>
                </article>
                <article class="post-card">
                    <div class="post-card-image">
                        <img src="https://images.unsplash.com/photo-1559757175-0eb30cd8c063?w=400&h=280&fit=crop" alt="Post 3">
                        <span class="post-date">Mar 20, 2026</span>
                    </div>
                    <div class="post-card-content">
                        <span class="post-category">Medical</span>
                        <h3><a href="#">Advancing Healthcare with Diagnostic Solutions</a></h3>
                        <p class="excerpt">Our medical diagnostic solutions are transforming patient care across healthcare facilities.</p>
                        <div class="post-card-meta">
                            <span><i class="far fa-comment"></i> 5 Comments</span>
                            <a href="#">Read More →</a>
                        </div>
                    </div>
                </article>
            <?php endif; ?>
        </div>
    </div>
</section>
