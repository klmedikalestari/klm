<?php
/**
 * Template Name: Services Page
 *
 * @package Kinglab_Medika_Theme
 */

get_header(); ?>

<div class="services-wrapper" style="padding-top: 60px; padding-bottom: 100px;">
    <div class="container">
        
        <!-- Top Section: Philosophy & Handshake -->
        <div class="services-top-split" style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; margin-bottom: 100px;">
            <div class="services-intro">
                <h1 style="font-size: 3rem; color: var(--dark-corporate); font-weight: 700; margin-bottom: 30px; line-height: 1.2;"><?php the_title(); ?></h1>
                
                <div style="font-size: 1rem; color: var(--text-dark); line-height: 1.8; margin-bottom: 25px;">
                    <?php 
                    // This outputs the page content written in Gutenberg directly into the left text area.
                    if (have_posts()) : while (have_posts()) : the_post();
                        the_content();
                    endwhile; endif; 
                    ?>
                </div>
            </div>
            <div class="services-image">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', ['style' => 'width: 100%; height: auto; display: block; object-fit: cover;']); ?>
                <?php else : ?>
                    <!-- Fallback placeholder if no featured image is set by user -->
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/services-handshake.png'); ?>" alt="Services" style="width: 100%; height: auto; display: block; object-fit: cover; border-radius: 8px;">
                <?php endif; ?>
            </div>
        </div>

        <!-- Bottom Section: Contact / Form -->
        <div class="services-bottom-split" style="display: block; margin-top: 40px;">
            
            <div class="services-trouble" style="max-width: 500px;">
                <h2 style="font-size: 2.5rem; color: var(--dark-corporate); font-weight: 700; margin-bottom: 20px; line-height: 1.2;"><?php esc_html_e('Having trouble with your system?', 'Kinglab_Medika_Lestari'); ?></h2>
                <p style="font-size: 1rem; color: var(--text-dark); line-height: 1.8; margin-bottom: 40px;"><?php esc_html_e('Please contact us:', 'Kinglab_Medika_Lestari'); ?></p>
                
                <!-- Halo Teknisi Banner Box -->
                <div class="halo-teknisi-banner" style="display: flex; align-items: center; gap: 20px; background: #fff; border: 1px solid #eaeaea; padding: 25px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                    <div class="teknisi-image" style="width: 100px; flex-shrink: 0;">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/halo-teknisi.png'); ?>" alt="Teknisi" style="width: 100%; height: 100px; border-radius: 50%; object-fit: cover; border: 3px solid var(--primary-blue);">
                    </div>
                    <div class="teknisi-content" style="flex: 1;">
                        <div style="border-bottom: 2px solid #f0f0f0; padding-bottom: 8px; margin-bottom: 12px;">
                            <h3 style="font-size: 1.6rem; color: var(--primary-blue); font-weight: 800; font-style: italic; margin: 0; text-transform: uppercase;">Halo Teknisi</h3>
                        </div>
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <i class="fab fa-whatsapp" style="color: #25D366; font-size: 2.5rem;"></i>
                            <?php 
                            $tech_phone = get_theme_mod('contact_technician_phone', '081211174724'); 
                            ?>
                            <span style="font-size: 2.2rem; font-weight: 800; color: #2F406A; letter-spacing: 1px;">
                                <?php echo esc_html($tech_phone); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<style>
/* Specific Form focus styling */
.services-form input:focus {
    border-bottom: 2px solid var(--primary-blue) !important;
}
@media (max-width: 900px) {
    .services-top-split, .services-bottom-split {
        grid-template-columns: 1fr !important;
        gap: 40px !important;
    }
}
</style>

<?php get_footer(); ?>
