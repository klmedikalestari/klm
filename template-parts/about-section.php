<!-- About Section -->
<section class="about-section section-padding" id="about-section">
    <div class="container">
        <div class="about-wrapper">
            <!-- Image Side -->
            <div class="about-image">
                <?php
                $about_img = get_theme_mod('about_image', '');
                $img_url = $about_img ? $about_img : 'https://images.unsplash.com/photo-1581093450021-4a7360e9a6b5?w=600&h=400&fit=crop';
                ?>
                <img src="<?php echo esc_url($img_url); ?>" alt="<?php esc_attr_e('About Us', 'Kinglab_Medika_Lestari-theme'); ?>">

                <div class="about-quote-box">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p><?php echo esc_html(get_theme_mod('about_quote', 'Throughout more than 40 years, we have been committed to delivering excellence in every solution we provide.')); ?></p>
                </div>
            </div>

            <!-- Content Side -->
            <div class="about-content">
                <span class="subtitle"><?php echo esc_html(get_theme_mod('about_subtitle', 'Who We Are')); ?></span>
                <h2><?php echo esc_html(get_theme_mod('about_title', 'About Our Company')); ?></h2>
                
                <?php
                $about_desc = get_theme_mod('about_description', 'We are a leading provider of innovative laboratory solutions, serving the needs of life science, industry, animal health, and medical sectors. Our commitment to quality and service excellence has made us a trusted partner for organizations across Indonesia.');
                ?>
                <p><?php echo wp_kses_post($about_desc); ?></p>

                <?php
                $about_btn_text = get_theme_mod('about_btn_text', 'Learn More');
                $default_about_url = get_permalink(get_page_by_path('about'));
                $about_btn_url = get_theme_mod('about_btn_url', '');
                $final_btn_url = !empty($about_btn_url) ? $about_btn_url : $default_about_url;
                
                if (!empty($about_btn_text)) :
                ?>
                <a href="<?php echo esc_url($final_btn_url); ?>" class="btn btn-primary">
                    <?php echo esc_html($about_btn_text); ?>
                </a>
                <?php endif; ?>

                <!-- Stats -->
                <div class="about-stats">
                    <?php
                    $stats = array(
                        1 => array(
                            'number' => get_theme_mod('stat_1_number', '40+'),
                            'label'  => get_theme_mod('stat_1_label', 'Years Experience'),
                        ),
                        2 => array(
                            'number' => get_theme_mod('stat_2_number', '500+'),
                            'label'  => get_theme_mod('stat_2_label', 'Products'),
                        ),
                        3 => array(
                            'number' => get_theme_mod('stat_3_number', '100+'),
                            'label'  => get_theme_mod('stat_3_label', 'Global Partners'),
                        ),
                    );

                    foreach ($stats as $stat) :
                        if ($stat['number']) :
                    ?>
                        <div class="stat-item">
                            <span class="stat-number"><?php echo esc_html($stat['number']); ?></span>
                            <span class="stat-label"><?php echo esc_html($stat['label']); ?></span>
                        </div>
                    <?php
                        endif;
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
