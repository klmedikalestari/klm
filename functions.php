<?php
/**
 * Kinglab_Medika_Lestari Theme Functions & Definitions
 *
 * @package Kinglab_Medika_Theme
 * @version 1.0.0
 */

if (!defined('ABSPATH')) exit;

define('Kinglab_Medika_Lestari_VERSION', time());
define('Kinglab_Medika_Lestari_DIR', get_template_directory());
define('Kinglab_Medika_Lestari_URI', get_template_directory_uri());

/**
 * Force-apply correct defaults on theme activation.
 * This ensures WordPress database values match the latest code.
 */
function kinglab_medika_activate_theme() {
    // Footer
    set_theme_mod('footer_copyright', '© 2026 PT Kinglab Medika Lestari. All rights reserved.');
    set_theme_mod('footer_about', 'PT Kinglab Medika Lestari adalah distributor terpercaya alat laboratorium, industri, kesehatan hewan, dan medis di Indonesia.');

    // Contact Info
    set_theme_mod('contact_phone', '+62-21-739 2856');
    set_theme_mod('contact_email', 'info@kinglabmedikalestari.com');
    set_theme_mod('contact_address', 'Jakarta, Indonesia');
    set_theme_mod('contact_whatsapp', 'https://wa.me/6221739285');

    // About Page defaults
    set_theme_mod('about_company_p1', 'Established in 1981, PT. Kinglab Medika Lestari is one of the leading distributor of Life Science, Biotechnology, Microbiology and Medical products in Indonesia. Coming from a humble beginning, Kinglab Medika Lestari has been contributing to the advancement of scientific technology in Indonesia for more than 40 years.');
    set_theme_mod('about_advantages_p1', 'One of the advantages of choosing Kinglab Medika Lestari is access to our expansive and cutting edge product portfolio ranging from Life Science equipments and consumables, Microbiological and Food Safety products, Animal Health kits, and Medical instruments and consumables.');
    set_theme_mod('about_vision_intro', 'It is believed that growing is human nature. By growing, human are learning, and developing into a better individual. The process of growing our business has shaped Kinglab Medika Lestari to become who we are today.');

    // ======== AUTO-SETUP PAGES & MENUS ========
    // 1. Create Core Pages
    $pages = array(
        'home'     => array('title' => 'Home',     'template' => ''),
        'about'    => array('title' => 'About',    'template' => 'page-about.php'),
        'products' => array('title' => 'Products', 'template' => 'page-products.php'),
        'news'     => array('title' => 'News',     'template' => ''),
        'services' => array('title' => 'Services', 'template' => 'template-services.php'),
        'contact'  => array('title' => 'Contact',  'template' => 'template-contact.php'),
    );

    $menu_items = array();

    foreach ($pages as $slug => $page_data) {
        $page_obj = get_page_by_path($slug);
        if (!$page_obj) {
            $page_id = wp_insert_post(array(
                'post_title'   => $page_data['title'],
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => ''
            ));
            
            if (!is_wp_error($page_id) && !empty($page_data['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page_data['template']);
            }
            $menu_items[$page_data['title']] = $page_id;
        } else {
            $menu_items[$page_data['title']] = $page_obj->ID;
        }
    }

    // Settings for Home/News
    $home_page = get_page_by_path('home');
    $news_page = get_page_by_path('news');
    if ($home_page && $news_page) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $home_page->ID);
        update_option('page_for_posts', $news_page->ID);
    }

    // 2. Create and Assign Menu
    $menu_name = 'Primary Menu';
    $menu_exists = wp_get_nav_menu_object($menu_name);
    
    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);
        
        $order = 1;
        foreach ($menu_items as $title => $object_id) {
            if (!is_wp_error($object_id)) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title'     => $title,
                    'menu-item-object-id' => $object_id,
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                    'menu-item-position'  => $order
                ));
            }
            $order++;
        }

        // Assign to Theme Location
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}
add_action('after_switch_theme', 'kinglab_medika_activate_theme');

/**
 * Theme Setup
 */
function Kinglab_Medika_Lestari_setup() {
    // Add title tag support
    add_theme_support('title-tag');

    // Add post thumbnails support
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(800, 500, true);
    add_image_size('Kinglab_Medika_Lestari-slider', 1920, 800, true);
    add_image_size('Kinglab_Medika_Lestari-card', 400, 280, true);
    add_image_size('Kinglab_Medika_Lestari-gallery', 400, 400, true);
    add_image_size('Kinglab_Medika_Lestari-partner', 200, 100, false);

    // Register menus
    register_nav_menus(array(
        'primary'      => __('Primary Navigation', 'Kinglab_Medika_Lestari-theme'),
        'footer'       => __('Footer Navigation', 'Kinglab_Medika_Lestari-theme'),
        'by_brand'     => __('By Brand Menu', 'Kinglab_Medika_Lestari-theme'),
        'by_industry'  => __('By Industry Menu', 'Kinglab_Medika_Lestari-theme'),
    ));

    // HTML5 support
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'
    ));

    // Custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Custom header
    add_theme_support('custom-header', array(
        'default-image' => Kinglab_Medika_Lestari_URI . '/assets/images/hero-default.jpg',
        'width'         => 1920,
        'height'        => 800,
    ));

    // Custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));

    // Wide alignment for blocks
    add_theme_support('align-wide');

    // Responsive embeds
    add_theme_support('responsive-embeds');

    // Automatic feed links
    add_theme_support('automatic-feed-links');
}
add_action('after_setup_theme', 'Kinglab_Medika_Lestari_setup');

/**
 * Register Custom Post Types & Taxonomies
 */
function Kinglab_Medika_Lestari_register_post_types() {
    // Product Post Type
    register_post_type('product', array(
        'labels'      => array(
            'name'          => __('Products', 'Kinglab_Medika_Lestari'),
            'singular_name' => __('Product', 'Kinglab_Medika_Lestari'),
        ),
        'public'      => true,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-cart',
        'supports'    => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'     => array('slug' => 'products'),
    ));

    // Product Brand Taxonomy
    register_taxonomy('product_brand', 'product', array(
        'labels'       => array(
            'name' => __('Product Brands', 'Kinglab_Medika_Lestari'),
        ),
        'hierarchical' => true,
        'show_ui'      => true,
        'rewrite'      => array('slug' => 'product_brand'),
    ));

    // Product Industry Taxonomy
    register_taxonomy('product_industry', 'product', array(
        'labels'       => array(
            'name' => __('Product Industries', 'Kinglab_Medika_Lestari'),
        ),
        'hierarchical' => true,
        'show_ui'      => true,
        'rewrite'      => array('slug' => 'product_industry'),
    ));
}
add_action('init', 'Kinglab_Medika_Lestari_register_post_types');

/**
 * Enqueue Scripts & Styles
 */
function Kinglab_Medika_Lestari_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'Kinglab_Medika_Lestari-google-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Open+Sans:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
        array(),
        '6.5.0'
    );

    // Main stylesheet
    wp_enqueue_style(
        'Kinglab_Medika_Lestari-style',
        get_stylesheet_uri(),
        array('Kinglab_Medika_Lestari-google-fonts', 'font-awesome'),
        Kinglab_Medika_Lestari_VERSION
    );

    // Main script
    wp_enqueue_script(
        'Kinglab_Medika_Lestari-main',
        Kinglab_Medika_Lestari_URI . '/assets/js/main.js',
        array(),
        Kinglab_Medika_Lestari_VERSION,
        true
    );

    // Localize script
    wp_localize_script('Kinglab_Medika_Lestari-main', 'Kinglab_Medika_LestariData', array(
        'ajaxUrl'  => admin_url('admin-ajax.php'),
        'themeUrl' => Kinglab_Medika_Lestari_URI,
        'nonce'    => wp_create_nonce('Kinglab_Medika_Lestari_nonce'),
    ));

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'Kinglab_Medika_Lestari_scripts');

/**
 * Register Widget Areas
 */
function Kinglab_Medika_Lestari_widgets_init() {
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'Kinglab_Medika_Lestari-theme'),
        'id'            => 'sidebar-main',
        'description'   => __('Widgets for the main sidebar', 'Kinglab_Medika_Lestari-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 1', 'Kinglab_Medika_Lestari-theme'),
        'id'            => 'footer-1',
        'description'   => __('First footer widget area', 'Kinglab_Medika_Lestari-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 2', 'Kinglab_Medika_Lestari-theme'),
        'id'            => 'footer-2',
        'description'   => __('Second footer widget area', 'Kinglab_Medika_Lestari-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 3', 'Kinglab_Medika_Lestari-theme'),
        'id'            => 'footer-3',
        'description'   => __('Third footer widget area', 'Kinglab_Medika_Lestari-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 4', 'Kinglab_Medika_Lestari-theme'),
        'id'            => 'footer-4',
        'description'   => __('Fourth footer widget area', 'Kinglab_Medika_Lestari-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'Kinglab_Medika_Lestari_widgets_init');

/**
 * Custom Excerpt Length
 */
function Kinglab_Medika_Lestari_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'Kinglab_Medika_Lestari_excerpt_length');

function Kinglab_Medika_Lestari_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'Kinglab_Medika_Lestari_excerpt_more');

/**
 * Custom Walker for Primary Navigation (adds sub-menu support)
 * Mega menu diinjeksi via filter wp_nav_menu_items agar lebih aman.
 */
class Kinglab_Medika_Lestari_Nav_Walker extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
}

/**
 * Inject Products Mega Menu via wp_nav_menu_items filter
 * Deteksi berdasarkan URL link yang mengarah ke /products/
 */
function kinglab_inject_products_mega_menu($items, $args) {
    if (!isset($args->theme_location) || $args->theme_location !== 'primary') {
        return $items;
    }

    // Bangun HTML mega menu
    ob_start();
    // Hanya ambil Parent (level teratas) agar anak-anak kategori Scitek tidak bocor ke menu utama
    $brands = get_terms(array('taxonomy' => 'product_brand', 'hide_empty' => false, 'parent' => 0, 'orderby' => 'name'));
    $industries = get_terms(array('taxonomy' => 'product_industry', 'hide_empty' => false, 'parent' => 0, 'orderby' => 'name'));
    ?>
    <div class="mega-menu-wrapper">
        <div class="mega-menu-container">
            <div class="mega-menu-col">
                <h4 class="mega-menu-title">By Brand</h4>
                <ul class="mega-menu-list">
                    <?php if (!is_wp_error($brands) && !empty($brands)) {
                        foreach ($brands as $brand) {
                            echo '<li><a href="' . esc_url(get_term_link($brand)) . '">' . esc_html($brand->name) . '</a></li>';
                        }
                    } else {
                        echo '<li><span style="color:#999;font-size:0.9rem;">No brands found.</span></li>';
                    } ?>
                </ul>
            </div>
            <div class="mega-menu-col">
                <h4 class="mega-menu-title">By Industry</h4>
                <ul class="mega-menu-list">
                    <?php if (!is_wp_error($industries) && !empty($industries)) {
                        foreach ($industries as $industry) {
                            if ( strtolower( trim( $industry->name ) ) === 'medical' ) {
                                continue;
                            }
                            echo '<li><a href="' . esc_url(get_term_link($industry)) . '">' . esc_html($industry->name) . '</a></li>';
                        }
                    } else {
                        echo '<li><span style="color:#999;font-size:0.9rem;">No industries found yet.</span></li>';
                    } ?>
                </ul>
            </div>
        </div>
    </div>
    <?php
    $mega_menu_html = ob_get_clean();

    // Cari <li> yang berisi link ke /products/ lalu tambahkan class + mega menu
    $products_url = home_url('/products/');
    
    // Tambahkan class has-mega-menu dan inject mega menu HTML ke item Products
    $items = preg_replace_callback(
        '/<li([^>]*)><a([^>]*)href="' . preg_quote($products_url, '/') . '"([^>]*)>(.*?)<\/a>/i',
        function($matches) use ($mega_menu_html) {
            // Tambahkan class has-mega-menu ke <li>
            $li_attrs = $matches[1];
            if (strpos($li_attrs, 'class="') !== false) {
                $li_attrs = preg_replace('/class="([^"]*)"/', 'class="$1 has-mega-menu"', $li_attrs);
            } else {
                $li_attrs .= ' class="has-mega-menu"';
            }
            // Mengubah href menjadi javascript:void(0); agar tidak bisa diklik ke halaman lain
            return '<li' . $li_attrs . '><a' . $matches[2] . 'href="javascript:void(0);"' . $matches[3] . '>' . $matches[4] . '</a>' . $mega_menu_html;
        },
        $items
    );

    return $items;
}
add_filter('wp_nav_menu_items', 'kinglab_inject_products_mega_menu', 10, 2);

/**
 * Customizer Settings
 */
function Kinglab_Medika_Lestari_customizer($wp_customize) {
    // ── Hero Slider Section ──
    $wp_customize->add_section('Kinglab_Medika_Lestari_hero', array(
        'title'    => __('Hero Slider', 'Kinglab_Medika_Lestari-theme'),
        'priority' => 30,
    ));

    $default_slides = array(
        1 => array(
            'image'    => 'https://images.unsplash.com/photo-1582719471384-894fbb16e074?w=1920&q=80',
            'title'    => 'Innovative Solutions for Life Science',
            'text'     => 'Providing advanced laboratory equipment and solutions for research, industry, and healthcare.',
            'btn_text' => 'Read More',
            'btn_url'  => '#',
        ),
        2 => array(
            'image'    => 'https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?w=1920&q=80',
            'title'    => 'Quality Products & Services',
            'text'     => 'More than 40 years of experience delivering excellence in laboratory solutions.',
            'btn_text' => 'Our Services',
            'btn_url'  => '#',
        ),
        3 => array(
            'image'    => 'https://images.unsplash.com/photo-1581093458791-9d42e3c7e117?w=1920&q=80',
            'title'    => 'Global Partners, Local Expertise',
            'text'     => 'Representing leading global brands with local knowledge and support.',
            'btn_text' => 'Learn More',
            'btn_url'  => '#',
        ),
    );

    foreach ($default_slides as $i => $slide_defaults) {
        $wp_customize->add_setting("hero_slide_{$i}_image", array(
            'default'           => $slide_defaults['image'],
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "hero_slide_{$i}_image", array(
            'label'   => sprintf(__('Slide %d Image', 'Kinglab_Medika_Lestari-theme'), $i),
            'section' => 'Kinglab_Medika_Lestari_hero',
        )));

        $wp_customize->add_setting("hero_slide_{$i}_title", array(
            'default'           => $slide_defaults['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("hero_slide_{$i}_title", array(
            'label'   => sprintf(__('Slide %d Title', 'Kinglab_Medika_Lestari-theme'), $i),
            'section' => 'Kinglab_Medika_Lestari_hero',
            'type'    => 'text',
        ));

        $wp_customize->add_setting("hero_slide_{$i}_text", array(
            'default'           => $slide_defaults['text'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("hero_slide_{$i}_text", array(
            'label'   => sprintf(__('Slide %d Description', 'Kinglab_Medika_Lestari-theme'), $i),
            'section' => 'Kinglab_Medika_Lestari_hero',
            'type'    => 'textarea',
        ));

        $wp_customize->add_setting("hero_slide_{$i}_btn_text", array(
            'default'           => $slide_defaults['btn_text'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("hero_slide_{$i}_btn_text", array(
            'label'   => sprintf(__('Slide %d Button Text', 'Kinglab_Medika_Lestari-theme'), $i),
            'section' => 'Kinglab_Medika_Lestari_hero',
            'type'    => 'text',
        ));

        $wp_customize->add_setting("hero_slide_{$i}_btn_url", array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control("hero_slide_{$i}_btn_url", array(
            'label'   => sprintf(__('Slide %d Button URL', 'Kinglab_Medika_Lestari-theme'), $i),
            'section' => 'Kinglab_Medika_Lestari_hero',
            'type'    => 'url',
        ));
    }

    // ── About Section ──
    $wp_customize->add_section('Kinglab_Medika_Lestari_about', array(
        'title'    => __('About Section', 'Kinglab_Medika_Lestari-theme'),
        'priority' => 35,
    ));

    $wp_customize->add_setting('about_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
        'label'   => __('About Image', 'Kinglab_Medika_Lestari-theme'),
        'section' => 'Kinglab_Medika_Lestari_about',
    )));

    $wp_customize->add_setting('about_quote', array(
        'default'           => 'Throughout more than 40 years, we have been committed to delivering excellence.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_quote', array(
        'label'   => __('Quote Text', 'Kinglab_Medika_Lestari-theme'),
        'section' => 'Kinglab_Medika_Lestari_about',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('about_subtitle', array(
        'default'           => 'Who We Are',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_subtitle', array(
        'label'   => __('Subtitle', 'Kinglab_Medika_Lestari-theme'),
        'section' => 'Kinglab_Medika_Lestari_about',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('about_title', array(
        'default'           => 'About Our Company',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_title', array(
        'label'   => __('Title', 'Kinglab_Medika_Lestari-theme'),
        'section' => 'Kinglab_Medika_Lestari_about',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('about_description', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('about_description', array(
        'label'   => __('Description', 'Kinglab_Medika_Lestari-theme'),
        'section' => 'Kinglab_Medika_Lestari_about',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('about_btn_text', array(
        'default'           => 'Learn More',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_btn_text', array(
        'label'   => __('Button Text', 'Kinglab_Medika_Lestari-theme'),
        'section' => 'Kinglab_Medika_Lestari_about',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('about_btn_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('about_btn_url', array(
        'label'   => __('Button URL', 'Kinglab_Medika_Lestari-theme'),
        'section' => 'Kinglab_Medika_Lestari_about',
        'type'    => 'url',
    ));

    // Stats
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("stat_{$i}_number", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("stat_{$i}_number", array(
            'label'   => sprintf(__('Stat %d Number', 'Kinglab_Medika_Lestari-theme'), $i),
            'section' => 'Kinglab_Medika_Lestari_about',
            'type'    => 'text',
        ));

        $wp_customize->add_setting("stat_{$i}_label", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("stat_{$i}_label", array(
            'label'   => sprintf(__('Stat %d Label', 'Kinglab_Medika_Lestari-theme'), $i),
            'section' => 'Kinglab_Medika_Lestari_about',
            'type'    => 'text',
        ));
    }

    // ── Services Section ──
    $wp_customize->add_section('Kinglab_Medika_Lestari_services', array(
        'title'    => __('Services Section', 'Kinglab_Medika_Lestari-theme'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('services_title', array(
        'default'           => 'What We Do',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('services_title', array(
        'label'   => __('Section Title', 'Kinglab_Medika_Lestari-theme'),
        'section' => 'Kinglab_Medika_Lestari_services',
        'type'    => 'text',
    ));

    $service_defaults = array(
        1 => array('title' => 'Life Science', 'icon' => 'fas fa-flask', 'desc' => 'Providing advanced solutions for life science research and development.'),
        2 => array('title' => 'Industry', 'icon' => 'fas fa-industry', 'desc' => 'Industrial solutions and equipment for modern manufacturing.'),
        3 => array('title' => 'Animal Health', 'icon' => 'fas fa-paw', 'desc' => 'Comprehensive solutions for animal health and veterinary care.'),
        4 => array('title' => 'Medical', 'icon' => 'fas fa-heartbeat', 'desc' => 'Cutting-edge medical equipment and diagnostic solutions.'),
    );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("service_{$i}_icon", array(
            'default'           => $service_defaults[$i]['icon'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("service_{$i}_icon", array(
            'label'       => sprintf(__('Service %d Icon Class', 'Kinglab_Medika_Lestari-theme'), $i),
            'description' => __('FontAwesome class e.g. "fas fa-flask"', 'Kinglab_Medika_Lestari-theme'),
            'section'     => 'Kinglab_Medika_Lestari_services',
            'type'        => 'text',
        ));

        $wp_customize->add_setting("service_{$i}_title", array(
            'default'           => $service_defaults[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("service_{$i}_title", array(
            'label'   => sprintf(__('Service %d Title', 'Kinglab_Medika_Lestari-theme'), $i),
            'section' => 'Kinglab_Medika_Lestari_services',
            'type'    => 'text',
        ));

        $wp_customize->add_setting("service_{$i}_desc", array(
            'default'           => $service_defaults[$i]['desc'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("service_{$i}_desc", array(
            'label'   => sprintf(__('Service %d Description', 'Kinglab_Medika_Lestari-theme'), $i),
            'section' => 'Kinglab_Medika_Lestari_services',
            'type'    => 'textarea',
        ));

        $wp_customize->add_setting("service_{$i}_url", array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control("service_{$i}_url", array(
            'label'   => sprintf(__('Service %d Link', 'Kinglab_Medika_Lestari-theme'), $i),
            'section' => 'Kinglab_Medika_Lestari_services',
            'type'    => 'url',
        ));
    }

    // ── About Us Page Section ──
    $wp_customize->add_section('Kinglab_Medika_Lestari_about_page', array(
        'title'    => __('About Us Page', 'Kinglab_Medika_Lestari-theme'),
        'priority' => 38,
    ));

    // Section 1: Our Company
    $about_page_fields = array(
        'about_company_heading' => array('label' => 'Company Heading',    'default' => 'Our Company',    'type' => 'text'),
        'about_company_p1'      => array('label' => 'Company Paragraph 1', 'default' => 'Established in 1981, PT. Kinglab Medika Lestari is one of the leading distributor of Life Science, Biotechnology, Microbiology and Medical products in Indonesia. Coming from a humble beginning, Kinglab Medika Lestari has been contributing to the advancement of scientific technology in Indonesia for more than 40 years.', 'type' => 'textarea'),
        'about_company_p2'      => array('label' => 'Company Paragraph 2', 'default' => 'Part of our success comes from our motto "Serving you better". This motto has become DNA in our day-to-day life where we always aim to serve each other better, be that our clients, our principals and most importantly our work peers.', 'type' => 'textarea'),
        'about_company_p3'      => array('label' => 'Company Paragraph 3', 'default' => 'Our head office is located in Jakarta with representative offices in Surabaya, Bandung, Bogor and Yogyakarta. Through efficient logistic operations we have catered clients from different industries in all major areas of Indonesia.', 'type' => 'textarea'),
        // Section 2: Advantages
        'about_advantages_title' => array('label' => 'Advantages Heading', 'default' => 'Advantages', 'type' => 'text'),
        'about_advantages_p1'    => array('label' => 'Advantages Paragraph 1', 'default' => 'One of the advantages of choosing Kinglab Medika Lestari is access to our expansive and cutting edge product portfolio ranging from Life Science equipments and consumables, Microbiological and Food Safety products, Animal Health kits, and Medical instruments and consumables.', 'type' => 'textarea'),
        'about_advantages_p2'    => array('label' => 'Advantages Paragraph 2', 'default' => 'Our head office is located in Jakarta with representative offices in Surabaya, Bandung, Bogor and Yogyakarta. Through efficient logistic operations we have catered clients from different industries in all major areas of Indonesia.', 'type' => 'textarea'),
        // Section 3: Vision & Mission
        'about_vision_title'   => array('label' => 'Vision & Mission Heading', 'default' => 'Vision and Mission', 'type' => 'text'),
        'about_vision_intro'   => array('label' => 'Vision Intro Text',        'default' => 'It is believed that growing is human nature. By growing, human are learning, and developing into a better individual. The process of growing our business has shaped Kinglab Medika Lestari to become who we are today.', 'type' => 'textarea'),
        'about_vision_text'    => array('label' => 'Vision Statement',         'default' => 'To become the leading distributor in Life Science and Medical business through effective synergy with our principals and achieving the best solution for our customers.', 'type' => 'textarea'),
        'about_mission_text'   => array('label' => 'Mission Statement',        'default' => 'To improve customer satisfaction by consistently providing high quality innovative products and better service experience.', 'type' => 'textarea'),
        'about_vision_closing' => array('label' => 'Vision Closing Text',      'default' => 'Through this vision and mission, we hope to inspire our team, people and business for years to come and continue with our commitment to serve you better.', 'type' => 'textarea'),
        // Section 4: Team
        'about_team_heading'    => array('label' => 'Our Team Heading',   'default' => 'OUR TEAM',           'type' => 'text'),
        'team_item_1_title'     => array('label' => 'Team Item 1 Title',  'default' => 'Application Team',   'type' => 'text'),
        'team_item_1_text'      => array('label' => 'Team Item 1 Text',   'default' => 'Our application team will help you to better understand the application of your product and instrument.', 'type' => 'textarea'),
        'team_item_2_title'     => array('label' => 'Team Item 2 Title',  'default' => 'Service Engineer Team', 'type' => 'text'),
        'team_item_2_text'      => array('label' => 'Team Item 2 Text',   'default' => 'Our service engineer team is dedicated to help our clients throughout the installation process, and the after sales service.', 'type' => 'textarea'),
        'team_item_3_title'     => array('label' => 'Team Item 3 Title',  'default' => 'Customer Service Team', 'type' => 'text'),
        'team_item_3_text'      => array('label' => 'Team Item 3 Text',   'default' => 'Our customer service team is available to provide our clients with the best-fit solution for any enquiries or problems.', 'type' => 'textarea'),
        'team_item_4_title'     => array('label' => 'Team Item 4 Title',  'default' => 'Customer Satisfaction', 'type' => 'text'),
        'team_item_4_text'      => array('label' => 'Team Item 4 Text',   'default' => 'Customer satisfaction, integrity and confidence are first in our customer service philosophy.', 'type' => 'textarea'),
        'team_item_5_title'     => array('label' => 'Team Item 5 Title',  'default' => 'Sales Team',         'type' => 'text'),
        'team_item_5_text'      => array('label' => 'Team Item 5 Text',   'default' => 'Our sales team is here to help valuable clients discover the right product, to improve the quality of their work.', 'type' => 'textarea'),
        'team_item_6_title'     => array('label' => 'Team Item 6 Title',  'default' => 'Product Specialist Team', 'type' => 'text'),
        'team_item_6_text'      => array('label' => 'Team Item 6 Text',   'default' => 'Our product specialist team is the product expert in the team, continuously trained by our principals.', 'type' => 'textarea'),
    );

    foreach ($about_page_fields as $key => $field) {
        $wp_customize->add_setting($key, array(
            'default'           => $field['default'],
            'sanitize_callback' => $field['type'] === 'textarea' ? 'sanitize_textarea_field' : 'sanitize_text_field',
        ));
        $wp_customize->add_control($key, array(
            'label'   => __($field['label'], 'Kinglab_Medika_Lestari-theme'),
            'section' => 'Kinglab_Medika_Lestari_about_page',
            'type'    => $field['type'],
        ));
    }

    // Image controls for About page
    $about_images = array(
        'about_team_image'      => 'Team Photo (Section 1)',
        'about_advantages_image'=> 'Lab Photo (Advantages)',
        'about_team2_image'     => 'Team Photo (Our Team)',
    );
    foreach ($about_images as $key => $label) {
        $wp_customize->add_setting($key, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $key, array(
            'label'   => __($label, 'Kinglab_Medika_Lestari-theme'),
            'section' => 'Kinglab_Medika_Lestari_about_page',
        )));
    }

    // ── CTA Banner Section ──
    $wp_customize->add_section('Kinglab_Medika_Lestari_cta', array(
        'title'    => __('CTA Banner', 'Kinglab_Medika_Lestari-theme'),
        'priority' => 45,
    ));

    $wp_customize->add_setting('cta_title', array(
        'default'           => 'Have a Question?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_title', array(
        'label'   => __('CTA Title', 'Kinglab_Medika_Lestari-theme'),
        'section' => 'Kinglab_Medika_Lestari_cta',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('cta_text', array(
        'default'           => 'Just send us your question or concern by starting a new case and we will give you the help you need.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('cta_text', array(
        'label'   => __('CTA Text', 'Kinglab_Medika_Lestari-theme'),
        'section' => 'Kinglab_Medika_Lestari_cta',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('cta_btn_text', array(
        'default'           => 'Get In Touch',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_btn_text', array(
        'label'   => __('CTA Button Text', 'Kinglab_Medika_Lestari-theme'),
        'section' => 'Kinglab_Medika_Lestari_cta',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('cta_btn_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('cta_btn_url', array(
        'label'   => __('CTA Button URL', 'Kinglab_Medika_Lestari-theme'),
        'section' => 'Kinglab_Medika_Lestari_cta',
        'type'    => 'url',
    ));

    // ── Partners Section ──
    $wp_customize->add_section('Kinglab_Medika_Lestari_partners', array(
        'title'    => __('Partners Section', 'Kinglab_Medika_Lestari-theme'),
        'priority' => 48,
    ));

    $wp_customize->add_setting('partners_title', array(
        'default'           => 'Our Global Partners',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('partners_title', array(
        'label'   => __('Section Title', 'Kinglab_Medika_Lestari-theme'),
        'section' => 'Kinglab_Medika_Lestari_partners',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('partners_subtitle', array(
        'default'           => 'We represent leading global brands with local expertise',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('partners_subtitle', array(
        'label'   => __('Section Subtitle', 'Kinglab_Medika_Lestari-theme'),
        'section' => 'Kinglab_Medika_Lestari_partners',
        'type'    => 'textarea',
    ));

    // Partner Logos
    for ($i = 1; $i <= 20; $i++) {
        $wp_customize->add_setting("kl_partner_img_{$i}", array(
            'default'           => '',
            'sanitize_callback' => 'kinglab_sanitize_partner_logo',
            'transport'         => 'refresh',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "kl_partner_img_{$i}", array(
            'label'       => sprintf(__('Partner Logo %d', 'Kinglab_Medika_Lestari-theme'), $i),
            'description' => sprintf(__('Upload logo partner ke-%d (PNG/JPG, disarankan transparan)', 'Kinglab_Medika_Lestari-theme'), $i),
            'section'     => 'Kinglab_Medika_Lestari_partners',
        )));
    }

    // ── Contact & Social ──
    $wp_customize->add_section('Kinglab_Medika_Lestari_contact', array(
        'title'    => __('Contact & Social', 'Kinglab_Medika_Lestari-theme'),
        'priority' => 50,
    ));

    $contact_fields = array(
        'phone'     => array('label' => 'Phone', 'default' => '+62-21-739 2856'),
        'email'     => array('label' => 'Email', 'default' => 'info@kinglab.co.id'),
        'address'   => array('label' => 'Address', 'default' => 'Jakarta, Indonesia'),
        'fax'       => array('label' => 'Fax', 'default' => ''),
        'map_url'   => array('label' => 'Google Maps Embed URL', 'default' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126907.031526715!2d106.74558000407769!3d-6.284206596162232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14061ad1ea1%3A0xe53be0697968ff37!2sPT.%20Kinglab%20Medika%20Lestari!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid'),
        'whatsapp'  => array('label' => 'WhatsApp URL', 'default' => 'https://wa.me/6221739285'),
        'facebook'  => array('label' => 'Facebook URL', 'default' => '#'),
        'youtube'   => array('label' => 'YouTube URL', 'default' => '#'),
        'instagram' => array('label' => 'Instagram URL', 'default' => 'https://www.instagram.com/kinglabmedikalestari?stkn=MWd3ZWtybWxkemt0ZA=='),
    );

    foreach ($contact_fields as $key => $field) {
        $wp_customize->add_setting("contact_{$key}", array(
            'default'           => $field['default'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("contact_{$key}", array(
            'label'   => $field['label'],
            'section' => 'Kinglab_Medika_Lestari_contact',
            'type'    => 'text',
        ));
    }

    // ── Footer Section ──
    $wp_customize->add_section('Kinglab_Medika_Lestari_footer', array(
        'title'    => __('Footer Settings', 'Kinglab_Medika_Lestari-theme'),
        'priority' => 55,
    ));

    $wp_customize->add_setting('footer_about', array(
        'default'           => 'PT Kinglab Medika Lestari adalah distributor terpercaya alat laboratorium, industri, kesehatan hewan, dan medis di Indonesia.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('footer_about', array(
        'label'   => __('Footer About Text', 'Kinglab_Medika_Lestari-theme'),
        'section' => 'Kinglab_Medika_Lestari_footer',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('footer_copyright', array(
        'default'           => '© 2026 PT Kinglab Medika Lestari. All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_copyright', array(
        'label'   => __('Copyright Text', 'Kinglab_Medika_Lestari-theme'),
        'section' => 'Kinglab_Medika_Lestari_footer',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'Kinglab_Medika_Lestari_customizer');

/**
 * Sanitize partner logo — menerima URL maupun attachment ID (integer)
 */
function kinglab_sanitize_partner_logo($value) {
    // Jika angka (attachment ID), kembalikan sebagai integer
    if (is_numeric($value)) {
        return absint($value);
    }
    // Jika URL, sanitasi sebagai URL
    return esc_url_raw($value);
}

/**
 * Include template parts helper
 */
function Kinglab_Medika_Lestari_get_mod($key, $default = '') {
    return get_theme_mod($key, $default);
}

/**
 * Breadcrumbs
 */
function Kinglab_Medika_Lestari_breadcrumbs() {
    if (is_front_page()) return;

    echo '<nav class="breadcrumbs">';
    echo '<a href="' . esc_url(home_url('/')) . '">Home</a>';
    echo '<span class="separator">/</span>';

    if (is_category() || is_single()) {
        $cats = get_the_category();
        if ($cats) {
            echo '<a href="' . esc_url(get_category_link($cats[0]->term_id)) . '">' . esc_html($cats[0]->name) . '</a>';
            if (is_single()) {
                echo '<span class="separator">/</span>';
                the_title();
            }
        }
    } elseif (is_page()) {
        the_title();
    } elseif (is_search()) {
        echo 'Search Results';
    } elseif (is_404()) {
        echo 'Page Not Found';
    } elseif (is_archive()) {
        the_archive_title();
    }

    echo '</nav>';
}

/**
 * Add body classes
 */
function Kinglab_Medika_Lestari_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'home-page';
    }
    if (is_singular()) {
        $classes[] = 'singular-page';
    }
    return $classes;
}
add_filter('body_class', 'Kinglab_Medika_Lestari_body_classes');

/**
 * Register ACF Field Groups for Product Post Type
 * Fields: Benefit, Specification, Cat No, Resource
 */
function kinglab_register_product_acf_fields() {
    if ( ! function_exists('acf_add_local_field_group') ) return;

    acf_add_local_field_group(array(
        'key'      => 'group_product_details',
        'title'    => 'Product Details',
        'fields'   => array(

            // Benefit
            array(
                'key'           => 'field_benefit_content',
                'label'         => 'Benefit',
                'name'          => '_benefit_content',
                'type'          => 'wysiwyg',
                'instructions'  => 'Masukkan keunggulan / manfaat produk ini.',
                'required'      => 0,
                'tabs'          => 'all',
                'toolbar'       => 'full',
                'media_upload'  => 1,
            ),

            // Specification
            array(
                'key'           => 'field_specification_content',
                'label'         => 'Specification',
                'name'          => '_specification_content',
                'type'          => 'wysiwyg',
                'instructions'  => 'Masukkan spesifikasi teknis produk.',
                'required'      => 0,
                'tabs'          => 'all',
                'toolbar'       => 'full',
                'media_upload'  => 1,
            ),

            // Cat No
            array(
                'key'           => 'field_cat_no_content',
                'label'         => 'Cat No',
                'name'          => '_cat_no_content',
                'type'          => 'wysiwyg',
                'instructions'  => 'Masukkan nomor katalog / Cat No produk.',
                'required'      => 0,
                'tabs'          => 'all',
                'toolbar'       => 'basic',
                'media_upload'  => 0,
            ),

            // Resource
            array(
                'key'           => 'field_resource_content',
                'label'         => 'Resource',
                'name'          => '_resource_content',
                'type'          => 'wysiwyg',
                'instructions'  => 'Masukkan link atau dokumen resource (brosur, manual, dll).',
                'required'      => 0,
                'tabs'          => 'all',
                'toolbar'       => 'basic',
                'media_upload'  => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'product',
                ),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'active'                => true,
    ));
}
add_action('acf/init', 'kinglab_register_product_acf_fields');

/**
 * Change posts_per_page for product archives and taxonomies to 20.
 */
function kinglab_change_products_per_page($query) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( is_post_type_archive('product') || is_tax('product_brand') || is_tax('product_industry') ) {
            $query->set('posts_per_page', 20);
        }
    }
}
add_action('pre_get_posts', 'kinglab_change_products_per_page');

/**
 * MDK Products Import - Admin Page
 * Accessible from WP Admin → Tools → MDK Import
 */
function kinglab_mdk_import_menu() {
    add_management_page(
        'MDK Products Import',
        'MDK Import',
        'manage_options',
        'mdk-import',
        'kinglab_mdk_import_page'
    );
}
add_action('admin_menu', 'kinglab_mdk_import_menu');

function kinglab_mdk_import_page() {
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized access');
    }

    $json_file = get_template_directory() . '/import-tools/mdk-products-data.json';
    $images_dir = get_template_directory() . '/import-tools/images/';

    echo '<div class="wrap">';
    echo '<h1>🏥 MDK Products Import</h1>';

    // Check if import was triggered
    if (isset($_POST['run_mdk_import']) && wp_verify_nonce($_POST['mdk_import_nonce'], 'mdk_import_action')) {

        if (!file_exists($json_file)) {
            echo '<div class="notice notice-error"><p>Error: mdk-products-data.json not found at: ' . esc_html($json_file) . '</p></div>';
            echo '</div>';
            return;
        }

        $products = json_decode(file_get_contents($json_file), true);
        if (!$products || !is_array($products)) {
            echo '<div class="notice notice-error"><p>Error: Could not parse mdk-products-data.json</p></div>';
            echo '</div>';
            return;
        }

        echo '<div class="notice notice-info"><p>Importing ' . count($products) . ' product(s) from MDK Medical Technology...</p></div>';

        $imported = 0;
        $updated = 0;
        $errors = 0;

        foreach ($products as $index => $product) {
            $product_title = trim($product['type']);
            $brand_name = !empty($product['brand']) ? $product['brand'] : 'MDK';
            $industry_name = !empty($product['industry']) ? $product['industry'] : 'Hospital';

            // Build content
            $content = !empty($product['description']) ? $product['description'] : '';
            $spec_content = !empty($product['specification']) ? $product['specification'] : '';

            // Check if product already exists
            $existing = get_posts(array(
                'post_type'   => 'product',
                'title'       => $product_title,
                'post_status' => 'any',
                'numberposts' => 1,
            ));

            $post_id = 0;
            $is_update = false;

            if (!empty($existing)) {
                $post_id = $existing[0]->ID;
                $is_update = true;
                wp_update_post(array(
                    'ID'           => $post_id,
                    'post_content' => $content,
                    'post_excerpt' => !empty($product['model']) ? $product['model'] : '',
                ));
            } else {
                $post_data = array(
                    'post_title'   => $product_title,
                    'post_content' => $content,
                    'post_excerpt' => !empty($product['model']) ? $product['model'] : '',
                    'post_status'  => 'publish',
                    'post_type'    => 'product',
                );
                $post_id = wp_insert_post($post_data, true);
            }

            if (is_wp_error($post_id)) {
                echo '<div class="notice notice-error"><p>❌ ERROR - <strong>' . esc_html($product_title) . '</strong>: ' . esc_html($post_id->get_error_message()) . '</p></div>';
                $errors++;
                continue;
            }

            // Set specification
            if (!empty($spec_content)) {
                update_post_meta($post_id, '_specification_content', $spec_content);
            }

            // Set product_brand hierarchy
            $brand_terms_to_set = array();
            $brand_term = term_exists($brand_name, 'product_brand');
            if (!$brand_term) {
                $brand_term = wp_insert_term($brand_name, 'product_brand');
            }
            if (!is_wp_error($brand_term)) {
                $brand_term_id = is_array($brand_term) ? $brand_term['term_id'] : $brand_term;
                $brand_terms_to_set[] = (int)$brand_term_id;

                if (!empty($product['klasifikasi'])) {
                    $klasifikasi_term = term_exists($product['klasifikasi'], 'product_brand', (int)$brand_term_id);
                    if (!$klasifikasi_term) {
                        $klasifikasi_term = wp_insert_term($product['klasifikasi'], 'product_brand', array('parent' => (int)$brand_term_id));
                    }
                    if (is_wp_error($klasifikasi_term) && isset($klasifikasi_term->error_data['term_exists'])) {
                        $klasifikasi_term_id = $klasifikasi_term->error_data['term_exists'];
                    } elseif (!is_wp_error($klasifikasi_term)) {
                        $klasifikasi_term_id = is_array($klasifikasi_term) ? $klasifikasi_term['term_id'] : $klasifikasi_term;
                    } else {
                        $klasifikasi_term_id = 0;
                    }

                    if ($klasifikasi_term_id) {
                        $brand_terms_to_set[] = (int)$klasifikasi_term_id;

                        if (!empty($product['namaBarang'])) {
                            $nama_barang_term = term_exists($product['namaBarang'], 'product_brand', (int)$klasifikasi_term_id);
                            if (!$nama_barang_term) {
                                $nama_barang_term = wp_insert_term($product['namaBarang'], 'product_brand', array('parent' => (int)$klasifikasi_term_id));
                            }
                            if (is_wp_error($nama_barang_term) && isset($nama_barang_term->error_data['term_exists'])) {
                                $brand_terms_to_set[] = (int)$nama_barang_term->error_data['term_exists'];
                            } elseif (!is_wp_error($nama_barang_term)) {
                                $brand_terms_to_set[] = (int)(is_array($nama_barang_term) ? $nama_barang_term['term_id'] : $nama_barang_term);
                            }
                        }
                    }
                }
            }
            wp_set_object_terms($post_id, $brand_terms_to_set, 'product_brand');

            // Set product_industry
            if (!empty($industry_name)) {
                $industry_term = term_exists($industry_name, 'product_industry');
                if (!$industry_term) {
                    $industry_term = wp_insert_term($industry_name, 'product_industry');
                }
                if (!is_wp_error($industry_term)) {
                    $industry_term_id = is_array($industry_term) ? $industry_term['term_id'] : $industry_term;
                    wp_set_object_terms($post_id, array((int)$industry_term_id), 'product_industry');
                }
            }

            // Upload featured image
            $image_status = '⚠️ no image';
            if (has_post_thumbnail($post_id)) {
                $image_status = '📷 already exists';
            } elseif (!empty($product['localImage'])) {
                $image_path = $images_dir . $product['localImage'];
                if (file_exists($image_path)) {
                    require_once(ABSPATH . 'wp-admin/includes/media.php');
                    require_once(ABSPATH . 'wp-admin/includes/file.php');
                    require_once(ABSPATH . 'wp-admin/includes/image.php');

                    $tmp_file = wp_tempnam($product['localImage']);
                    if (copy($image_path, $tmp_file)) {
                        $file_array = array(
                            'name'     => $product['localImage'],
                            'tmp_name' => $tmp_file,
                        );
                        $attachment_id = media_handle_sideload($file_array, $post_id, $product_title);
                        if (!is_wp_error($attachment_id)) {
                            set_post_thumbnail($post_id, $attachment_id);
                            $image_status = '📷 uploaded ✅';
                        } else {
                            $image_status = '❌ ' . $attachment_id->get_error_message();
                        }
                    } else {
                        $image_status = '❌ could not copy to temp';
                    }
                } else {
                    $image_status = '❌ file not found: ' . $product['localImage'];
                }
            }

            $action = $is_update ? 'UPDATED' : 'IMPORTED';
            $notice_class = $is_update ? 'notice-warning' : 'notice-success';
            echo '<div class="notice ' . $notice_class . '"><p>';
            echo '✓ <strong>' . $action . '</strong> - ' . esc_html($product_title) . '<br>';
            echo '<small>Brand: ' . esc_html($brand_name) . ' → ' . esc_html($product['klasifikasi']) . ' → ' . esc_html($product['namaBarang']) . '</small><br>';
            echo '<small>Industry: ' . esc_html($industry_name) . ' | Model: ' . esc_html($product['model']) . ' | Image: ' . $image_status . '</small>';
            echo '</p></div>';

            if ($is_update) { $updated++; } else { $imported++; }
        }

        echo '<div class="notice notice-success"><p><strong>🎉 Import Complete!</strong> Imported: ' . $imported . ' | Updated: ' . $updated . ' | Errors: ' . $errors . '</p></div>';
        echo '<p><a href="' . admin_url('edit.php?post_type=product') . '" class="button button-primary">View All Products</a></p>';

    } else {
        // Show import form
        if (!file_exists($json_file)) {
            echo '<div class="notice notice-error"><p>⚠️ File <code>mdk-products-data.json</code> not found in <code>import-tools/</code> folder.</p></div>';
        } else {
            $products = json_decode(file_get_contents($json_file), true);
            $count = is_array($products) ? count($products) : 0;

            echo '<div class="card" style="max-width: 600px; padding: 20px;">';
            echo '<h2>MDK Medical Technology - Product Import</h2>';
            echo '<p>Ready to import <strong>' . $count . '</strong> product(s) from MDK.</p>';
            echo '<table class="widefat" style="margin-bottom: 20px;">';
            echo '<thead><tr><th>Product</th><th>Model</th><th>Category</th></tr></thead><tbody>';
            foreach ($products as $p) {
                echo '<tr><td>' . esc_html($p['type']) . '</td><td>' . esc_html($p['model']) . '</td><td>' . esc_html($p['klasifikasi']) . '</td></tr>';
            }
            echo '</tbody></table>';

            echo '<form method="post">';
            wp_nonce_field('mdk_import_action', 'mdk_import_nonce');
            echo '<input type="hidden" name="run_mdk_import" value="1">';
            echo '<p><button type="submit" class="button button-primary button-hero">🚀 Run Import Now</button></p>';
            echo '</form>';
            echo '</div>';
        }
    }

    echo '</div>';
}
