<?php
/**
 * Taxonomy Archive Template for Products
 * @version 2.1-thomas-sync
 * 
 * @package Kinglab_Medika_Lestari_Theme
 */

get_header(); ?>

<div class="industry-page-wrapper" style="padding-top: 80px; padding-bottom: 100px; text-align: center; margin-top: calc(var(--header-height, 118px) + 20px);">
    <div class="container">
        <!-- Industry Title -->
        <h1 style="font-size: 3.5rem; color: var(--dark-corporate); margin-bottom: 30px; font-weight: 800;"><?php single_term_title(); ?></h1>

        <?php 
        $current_term = get_queried_object();
        $is_hospital = ($current_term && (strtolower($current_term->slug) === 'hospital' || stripos($current_term->name, 'hospital') !== false));
        $is_industry = (is_tax('product_industry', 'industry') || ($current_term && (strtolower($current_term->slug) === 'industry' || stripos($current_term->slug, 'industry') !== false || stripos($current_term->name, 'industry') !== false)));
        $is_life_science = ($current_term && (strtolower($current_term->slug) === 'life-science' || stripos($current_term->slug, 'life-science') !== false || stripos($current_term->name, 'life science') !== false));
        ?>

        <!-- Product Grid (No Sidebar) -->
        <?php if (have_posts() || $is_hospital || $is_industry || $is_life_science) : ?>
            <div class="industry-product-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 40px; text-align: center;">
                
                <?php if ($is_industry) : ?>
                    <!-- CDR FoodLab Product Card (Links to CDR FoodLab Brand, positioned on the left) -->
                    <a href="<?php echo esc_url(home_url('/product_brand/cdr-foodlab/')); ?>" class="industry-product-card" style="text-decoration: none; display: block;">
                        <div class="image-wrapper" style="border-radius: 16px; overflow: hidden; background: #e0e5ed; margin-bottom: 20px; aspect-ratio: 1/1; display:flex; align-items:center; justify-content:center;">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cdr-foodlab-analyzer.png'); ?>" alt="CDR FoodLab" style="width: 100%; max-width: 100%; height: 100%; object-fit: contain; padding: 15px; background: #fff; box-sizing: border-box;">
                        </div>
                        <h3 style="font-size: 1.1rem; color: var(--dark-corporate); font-weight: 500; line-height: 1.4; transition: color var(--transition-fast);">CDR FoodLab</h3>
                    </a>

                    <!-- Thomas Scientific Product Card (Links to Thomas Scientific Brand / Wiley Mill) -->
                    <a href="<?php echo esc_url(home_url('/product_brand/thomas-scientific/')); ?>" class="industry-product-card" style="text-decoration: none; display: block;">
                        <div class="image-wrapper" style="border-radius: 16px; overflow: hidden; background: #ffffff; margin-bottom: 20px; aspect-ratio: 1/1; display:flex; align-items:center; justify-content:center; border: 1px solid #e2e8f0; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/wiley-mill-model-4.jpg'); ?>" alt="Thomas Scientific - New Model 4 Wiley® Cutting Mill" style="width: 100%; max-width: 100%; height: 100%; object-fit: contain; padding: 15px; background: #fff; box-sizing: border-box;">
                        </div>
                        <h3 style="font-size: 1.1rem; color: var(--dark-corporate); font-weight: 500; line-height: 1.4; transition: color var(--transition-fast);">Thomas Scientific - Wiley® Cutting Mill</h3>
                    </a>
                <?php endif; ?>

                <?php if ($is_life_science) : ?>
                    <!-- CHM Lab Product Card (Links to CHM Lab Brand) -->
                    <a href="<?php echo esc_url(home_url('/product_brand/chm-lab/')); ?>" class="industry-product-card" style="text-decoration: none; display: block;">
                        <div class="image-wrapper" style="border-radius: 16px; overflow: hidden; background: #e0e5ed; margin-bottom: 20px; aspect-ratio: 1/1; display:flex; align-items:center; justify-content:center;">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/chm/chm-qualitative-filter-paper.jpg'); ?>" alt="CHM Lab" style="width: 100%; max-width: 100%; height: 100%; object-fit: contain; padding: 15px; background: #fff; box-sizing: border-box;">
                        </div>
                        <h3 style="font-size: 1.1rem; color: var(--dark-corporate); font-weight: 500; line-height: 1.4; transition: color var(--transition-fast);">CHM Lab</h3>
                    </a>
                <?php endif; ?>

                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php 
                        // If on industry page, skip duplicate single CDR posts since we display the main CDR FoodLab brand card
                        if ($is_industry) {
                            $title = get_the_title();
                            $post_brands = get_the_terms(get_the_ID(), 'product_brand');
                            $is_cdr_post = (stripos($title, 'CDR') !== false || stripos($title, 'FoodLab') !== false);
                            if ($post_brands && !is_wp_error($post_brands)) {
                                foreach ($post_brands as $brand_term) {
                                    if (stripos($brand_term->slug, 'cdr') !== false || stripos($brand_term->name, 'cdr') !== false) {
                                        $is_cdr_post = true;
                                        break;
                                    }
                                }
                            }
                            if ($is_cdr_post) {
                                continue;
                            }
                        }

                        // If on life science page, skip duplicate single CHM filter paper posts since we display the main CHM Lab brand card
                        if ($is_life_science) {
                            $title = get_the_title();
                            $post_brands = get_the_terms(get_the_ID(), 'product_brand');
                            $is_chm_post = (stripos($title, 'Filter Paper') !== false || stripos($title, 'CHM') !== false);
                            if ($post_brands && !is_wp_error($post_brands)) {
                                foreach ($post_brands as $brand_term) {
                                    if (stripos($brand_term->slug, 'chm') !== false || stripos($brand_term->name, 'chm') !== false) {
                                        $is_chm_post = true;
                                        break;
                                    }
                                }
                            }
                            if ($is_chm_post) {
                                continue;
                            }
                        }
                        ?>
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
                <?php endif; ?>

                <?php if ($is_hospital) : ?>
                    <!-- Centrifuge Product Card (Links to Yingtai Brand) -->
                    <a href="<?php echo esc_url(home_url('/product_brand/yingtai/')); ?>" class="industry-product-card" style="text-decoration: none; display: block;">
                        <div class="image-wrapper" style="border-radius: 16px; overflow: hidden; background: #e0e5ed; margin-bottom: 20px; aspect-ratio: 1/1; display:flex; align-items:center; justify-content:center;">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/yingtai/cdl7m.png'); ?>" alt="Centrifuge" style="width: 100%; max-width: 100%; height: 100%; object-fit: contain; padding: 15px; background: #fff; box-sizing: border-box;">
                        </div>
                        <h3 style="font-size: 1.1rem; color: var(--dark-corporate); font-weight: 500; line-height: 1.4; transition: color var(--transition-fast);">Centrifuge</h3>
                    </a>
                <?php endif; ?>
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
