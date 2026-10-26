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
            <div class="header-top-left">
                <?php
                $phone = get_theme_mod('contact_phone', '+62-21-739 2856');
                $email = get_theme_mod('contact_email', 'info@kinglabmedikalestari.com');
                ?>
                <?php if ($phone) : ?>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>">
                        <i class="fas fa-phone-alt"></i>
                        <span><?php echo esc_html($phone); ?></span>
                    </a>
                <?php endif; ?>
                <?php if ($email) : ?>
                    <a href="mailto:<?php echo esc_attr($email); ?>">
                        <i class="fas fa-envelope"></i>
                        <span><?php echo esc_html($email); ?></span>
                    </a>
                <?php endif; ?>
            </div>
            <div class="header-top-right">
                <?php
                $idak  = get_theme_mod('company_idak', '12290002200830022');
                $cdakb = get_theme_mod('company_cdakb', '122900022008300150007');
                ?>
                <div class="header-license-info">
                    <?php if ($idak) : ?>
                        <span class="license-item"><strong>IDAK :</strong> <?php echo esc_html($idak); ?></span>
                    <?php endif; ?>
                    <?php if ($idak && $cdakb) : ?>
                        <span class="license-divider">-</span>
                    <?php endif; ?>
                    <?php if ($cdakb) : ?>
                        <span class="license-item"><strong>CDAKB :</strong> <?php echo esc_html($cdakb); ?></span>
                    <?php endif; ?>
                </div>
            </div>
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

            <!-- Navigation & Header Actions Wrapper -->
            <div class="header-nav-wrapper">
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

                <!-- Shopping Cart Icon (Sejajar di samping Contact) -->
                <a href="<?php echo esc_url(home_url('/products/')); ?>" class="header-cart-btn" title="<?php esc_attr_e('Katalog Produk', 'Kinglab_Medika_Lestari'); ?>" aria-label="<?php esc_attr_e('Katalog Produk', 'Kinglab_Medika_Lestari'); ?>">
                    <i class="fas fa-shopping-cart"></i>
                </a>

                <!-- Mobile Menu Toggle -->
                <button class="menu-toggle" id="menu-toggle" aria-label="Toggle Navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>
</header>
<?php
$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';

// 1. Direct showcase rendering for Thomas Scientific By Brand
if (stripos($request_uri, 'thomas-scientific') !== false || (stripos($request_uri, 'product_brand') !== false && stripos($request_uri, 'thomas') !== false)) {
    if (function_exists('kinglab_render_thomas_scientific_showcase')) {
        kinglab_render_thomas_scientific_showcase();
    } else {
        $showcase_file = get_template_directory() . '/template-parts/thomas-scientific-showcase.php';
        if (file_exists($showcase_file)) {
            include $showcase_file;
        }
    }
    get_footer();
    exit;
}

// 2. Guarantee Thomas Scientific card appears in By Industry
if (stripos($request_uri, 'product_industry/industry') !== false) {
    ob_start(function($html) {
        if (strpos($html, 'wiley-mill-model-4.jpg') === false && (strpos($html, 'CDR FoodLab') !== false || strpos($html, 'cdr-foodlab') !== false)) {
            $theme_uri = get_template_directory_uri();
            $brand_url = esc_url(home_url('/product_brand/thomas-scientific/'));
            $img_url = esc_url($theme_uri . '/assets/images/wiley-mill-model-4.jpg');
            $card = '
                <!-- Thomas Scientific Product Card -->
                <a href="' . $brand_url . '" class="industry-product-card" style="text-decoration: none; display: block;">
                    <div class="image-wrapper" style="border-radius: 16px; overflow: hidden; background: #ffffff; margin-bottom: 20px; aspect-ratio: 1/1; display:flex; align-items:center; justify-content:center; border: 1px solid #e2e8f0; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                        <img src="' . $img_url . '" alt="Thomas Scientific - New Model 4 Wiley® Cutting Mill" style="width: 100%; max-width: 100%; height: 100%; object-fit: contain; padding: 15px; background: #fff; box-sizing: border-box;">
                    </div>
                    <h3 style="font-size: 1.1rem; color: var(--dark-corporate); font-weight: 500; line-height: 1.4; transition: color var(--transition-fast);">Thomas Scientific - Wiley® Cutting Mill</h3>
                </a>';
            
            $needle = 'CDR FoodLab</h3>' . "\n" . '                    </a>';
            if (strpos($html, $needle) !== false) {
                $html = str_replace($needle, $needle . "\n" . $card, $html);
            } else {
                $html = preg_replace('/(CDR FoodLab<\/h3>\s*<\/a>)/i', '$1' . $card, $html, 1);
            }
        }
        return $html;
    });
}
?>
