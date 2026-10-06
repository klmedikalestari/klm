<?php
/**
 * Template Name: Contact Page
 *
 * @package Kinglab_Medika_Theme
 */

get_header(); ?>

<div class="contact-wrapper" style="padding-top: 40px; padding-bottom: 0;">
    <div class="container">
        
        <!-- Breadcrumbs -->
        <div class="breadcrumb" style="font-size: 0.85rem; text-transform: uppercase; color: var(--text-medium); margin-bottom: 50px; letter-spacing: 0.5px; border-bottom: 1px solid #eaeaea; padding-bottom: 20px;">
            <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;"><?php echo strtoupper(get_bloginfo('name')); ?></a> > <span style="font-weight: 600;"><?php echo strtoupper(get_the_title()); ?></span>
        </div>

        <!-- Page Title -->
        <h1 style="text-align: center; font-size: 3rem; color: var(--dark-corporate); font-weight: 700; margin-bottom: 60px; text-transform: uppercase;"><?php the_title(); ?></h1>
        
        <!-- Head Office & Map Split -->
        <div class="contact-top-split" style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; margin-bottom: 100px;">
            <div class="contact-info">
                <h2 style="font-size: 2rem; color: var(--dark-corporate); font-weight: 700; margin-bottom: 30px;">Head Office Address</h2>
                <ul style="list-style: none; padding: 0; margin: 0; color: var(--text-dark); line-height: 1.8;">
                    <?php 
                    $contact_address = get_theme_mod('contact_address', 'Jl. Raya Kebayoran Lama 34E Jakarta – 12220 Indonesia');
                    $contact_phone = get_theme_mod('contact_phone', '+62-21-739 2856, 720 1893');
                    $contact_fax = get_theme_mod('contact_fax', '+62-21-726 0177');
                    $contact_email = get_theme_mod('contact_email', 'info@kinglabmedikalestari.com');
                    $contact_map_url = get_theme_mod('contact_map_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126907.031526715!2d106.74558000407769!3d-6.284206596162232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14061ad1ea1%3A0xe53be0697968ff37!2sPT.%20Kinglab%20Medika%20Lestari!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid');
                    ?>

                    <?php if ($contact_address) : ?>
                    <li style="display: flex; margin-bottom: 20px;">
                        <i class="fas fa-home" style="color: var(--primary-blue); font-size: 1.2rem; margin-right: 15px; margin-top: 5px; width: 25px; text-align: center;"></i>
                        <span><?php echo esc_html($contact_address); ?></span>
                    </li>
                    <?php endif; ?>

                    <?php if ($contact_phone) : ?>
                    <li style="display: flex; margin-bottom: 20px;">
                        <i class="fas fa-phone-alt" style="color: var(--primary-blue); font-size: 1.2rem; margin-right: 15px; margin-top: 5px; width: 25px; text-align: center;"></i>
                        <span><?php echo esc_html($contact_phone); ?></span>
                    </li>
                    <?php endif; ?>

                    <?php if ($contact_fax) : ?>
                    <li style="display: flex; margin-bottom: 20px;">
                        <i class="fas fa-fax" style="color: var(--primary-blue); font-size: 1.2rem; margin-right: 15px; margin-top: 5px; width: 25px; text-align: center;"></i>
                        <span><?php echo esc_html($contact_fax); ?></span>
                    </li>
                    <?php endif; ?>

                    <?php if ($contact_email) : ?>
                    <li style="display: flex; margin-bottom: 20px;">
                        <i class="fas fa-envelope" style="color: var(--primary-blue); font-size: 1.2rem; margin-right: 15px; margin-top: 5px; width: 25px; text-align: center;"></i>
                        <span><?php echo esc_html($contact_email); ?></span>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="contact-map">
                <!-- Google Maps iframe -->
                <iframe src="<?php echo esc_url($contact_map_url); ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </div>
</div>

<style>
@media (max-width: 900px) {
    .contact-top-split {
        grid-template-columns: 1fr !important;
        gap: 40px !important;
    }
}
</style>

<?php get_footer(); ?>
