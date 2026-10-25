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
        <h1 style="font-size: 3.5rem; color: var(--dark-corporate); margin-bottom: 30px; font-weight: 800;"><?php single_term_title(); ?></h1>

        <?php 
        $current_term = get_queried_object();
        $is_hospital = ($current_term && (strtolower($current_term->slug) === 'hospital' || stripos($current_term->name, 'hospital') !== false));
        if ($is_hospital) : ?>
            <!-- Featured Hospital Centrifuges Banner -->
            <div class="featured-industry-banner" style="background: linear-gradient(135deg, #0d47a1 0%, #1565c0 60%, #1976d2 100%); border-radius: 20px; padding: 40px; margin-bottom: 50px; text-align: left; color: #ffffff; box-shadow: 0 15px 35px rgba(13, 71, 161, 0.2); position: relative; overflow: hidden;">
                <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 30px; position: relative; z-index: 2;">
                    <div style="max-width: 650px;">
                        <span style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.18); padding: 6px 14px; border-radius: 30px; font-size: 0.82rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; border: 1px solid rgba(255,255,255,0.25);">
                            <i class="fas fa-hospital-user"></i> Hospital & Blood Bank Standard
                        </span>
                        <h2 style="font-size: 2.2rem; font-weight: 800; line-height: 1.25; margin-bottom: 12px; color: #fff;">
                            Hospital & Clinical Centrifuge Systems
                        </h2>
                        <p style="font-size: 1.05rem; opacity: 0.92; line-height: 1.6; margin-bottom: 24px;">
                            Peralatan centrifuge spesialisasi Rumah Sakit, Unit Transfusi Darah (Blood Bank), UTD PMI, Laboratorium Patologi Klinik, Gel Card Blood Grouping (TXK4), dan PRP (Platelet Rich Plasma) bersertifikasi internasional ISO 13485 & CE.
                        </p>
                        <div style="display: flex; flex-wrap: wrap; gap: 14px;">
                            <a href="<?php echo esc_url(home_url('/product_brand/yingtai/#cat-hospital-blood')); ?>" style="display: inline-flex; align-items: center; gap: 10px; background: #fff; color: #0d47a1; padding: 12px 26px; border-radius: 8px; font-weight: 700; text-decoration: none; box-shadow: 0 4px 15px rgba(0,0,0,0.15); transition: transform 0.2s ease;">
                                <span>Lihat Katalog Centrifuge Rumah Sakit</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <a href="https://api.whatsapp.com/send/?phone=6281211174724&text=Halo%20PT%20Kinglab%20Medika%20Lestari%2C%20saya%20ingin%20konsultasi%20centrifuge%20untuk%20Rumah%20Sakit&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center; gap: 8px; background: #25d366; color: #fff; padding: 12px 22px; border-radius: 8px; font-weight: 700; text-decoration: none;">
                                <i class="fab fa-whatsapp" style="font-size: 1.1rem;"></i>
                                <span>Konsultasi Alat RS</span>
                            </a>
                        </div>
                    </div>
                    <div style="flex-shrink: 0; display: flex; gap: 16px; background: rgba(255,255,255,0.1); padding: 16px; border-radius: 16px; backdrop-filter: blur(8px);">
                        <div style="text-align: center; background: #fff; padding: 12px; border-radius: 10px; width: 130px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/yingtai/CDL7M.jpg'); ?>" alt="CDL7M Blood Bank" style="width: 100%; height: 90px; object-fit: contain; margin-bottom: 6px;">
                            <span style="display: block; font-size: 0.75rem; font-weight: 700; color: #0f172a;">CDL7M Blood Bank</span>
                        </div>
                        <div style="text-align: center; background: #fff; padding: 12px; border-radius: 10px; width: 130px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/yingtai/TXK4.jpg'); ?>" alt="TXK4 Gel Card" style="width: 100%; height: 90px; object-fit: contain; margin-bottom: 6px;">
                            <span style="display: block; font-size: 0.75rem; font-weight: 700; color: #0f172a;">TXK4 Gel Card</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

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
