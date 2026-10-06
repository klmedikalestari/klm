<?php
/**
 * 404 Page Template
 *
 * @package Kinglab_Medika_Lestari_Theme
 */

get_header(); ?>

<!-- Page Header Banner -->
<div class="page-header-banner">
    <div class="container">
        <h1><?php esc_html_e('Page Not Found', 'Kinglab_Medika_Lestari-theme'); ?></h1>
        <?php Kinglab_Medika_Lestari_breadcrumbs(); ?>
    </div>
</div>

<!-- 404 Content -->
<div class="content-area section-padding">
    <div class="container">
        <div style="text-align: center; padding: 60px 0; max-width: 600px; margin: 0 auto;">
            <div style="font-family: var(--font-heading); font-size: 8rem; font-weight: 800; color: var(--primary-blue); opacity: 0.15; line-height: 1; margin-bottom: 20px;">
                404
            </div>
            <h2 style="margin-bottom: 20px;"><?php esc_html_e('Oops! Page Not Found', 'Kinglab_Medika_Lestari-theme'); ?></h2>
            <p style="font-size: 1.1rem; margin-bottom: 30px;">
                <?php esc_html_e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'Kinglab_Medika_Lestari-theme'); ?>
            </p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                <i class="fas fa-home" style="margin-right: 8px;"></i>
                <?php esc_html_e('Back to Home', 'Kinglab_Medika_Lestari-theme'); ?>
            </a>
            
            <div style="margin-top: 40px;">
                <p style="margin-bottom: 15px; font-weight: 600;"><?php esc_html_e('Or try searching:', 'Kinglab_Medika_Lestari-theme'); ?></p>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
