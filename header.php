<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Site Header -->
<header class="site-header" id="site-header">
    <!-- Top Bar -->
    <div class="header-top-bar">
        <div class="container">
            <?php
            $phone = get_theme_mod('contact_phone', '+62-21-739 2856');
            $email = get_theme_mod('contact_email', 'info@kinglabmedikalestari.com');
            ?>
            <?php if ($phone) : ?>
                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>">
                    <i class="fas fa-phone-alt"></i>
                    <?php echo esc_html($phone); ?>
                </a>
            <?php endif; ?>
            <?php if ($email) : ?>
                <a href="mailto:<?php echo esc_attr($email); ?>">
                    <i class="fas fa-envelope"></i>
                    <?php echo esc_html($email); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Main Header -->
    <div class="header-main">
        <div class="container">
            <!-- Logo -->
            <div class="site-logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <?php 
                    $site_name = get_bloginfo('name');
                    $words = explode(' ', $site_name);
                    $first_word = array_shift($words);
                    $rest_words = implode(' ', $words);
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-text">
                        <span><?php echo esc_html($first_word); ?></span> <?php echo esc_html($rest_words); ?>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="menu-toggle" id="menu-toggle" aria-label="Toggle Navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <!-- Navigation -->
            <nav class="main-navigation" id="main-navigation" role="navigation" aria-label="Primary Navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => '',
                    'walker'         => new Kinglab_Medika_Lestari_Nav_Walker(),
                    'fallback_cb'    => function() {
                        echo '<ul>';
                        echo '<li class="current-menu-item"><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/about/')) . '">About</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/products/')) . '">Products</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/news/')) . '">News</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/services/')) . '">Services</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/contact/')) . '">Contact</a></li>';
                        echo '</ul>';
                    },
                ));
                ?>
            </nav>
        </div>
    </div>
</header>
