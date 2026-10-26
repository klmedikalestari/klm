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
    set_theme_mod('contact_whatsapp', 'https://api.whatsapp.com/send/?phone=6281211174724&text=' . rawurlencode('Selamat datang di Kinglab Medika Lestari, ada yang bisa dibantu?') . '&type=phone_number&app_absent=0');
    set_theme_mod('floating_whatsapp_text', 'Selamat datang di Kinglab Medika Lestari, ada yang bisa dibantu?');
    set_theme_mod('contact_sales_whatsapp_phone', '6281211174724');
    set_theme_mod('contact_sales_whatsapp_button_text', 'Hubungi Kinglab');
    set_theme_mod('contact_sales_whatsapp_text', 'hallo Kinglab Medika Lestari saya tertarik dengan produk nya');

    // Legal Licenses
    set_theme_mod('company_idak', '12290002200830022');
    set_theme_mod('company_cdakb', '122900022008300150007');

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

    // Auto-upgrade legacy whatsapp default text
    if (get_theme_mod('contact_sales_whatsapp_text') === 'hallo kinglab saya tertarik dengan produk nya') {
        set_theme_mod('contact_sales_whatsapp_text', 'hallo Kinglab Medika Lestari saya tertarik dengan produk nya');
    }

    // Auto-upgrade legacy floating whatsapp button
    $current_wa = get_theme_mod('contact_whatsapp');
    if (empty($current_wa) || strpos($current_wa, '6221739285') !== false) {
        set_theme_mod('contact_whatsapp', 'https://api.whatsapp.com/send/?phone=6281211174724&text=' . rawurlencode('Selamat datang di Kinglab Medika Lestari, ada yang bisa dibantu?') . '&type=phone_number&app_absent=0');
    }
    if (empty(get_theme_mod('floating_whatsapp_text'))) {
        set_theme_mod('floating_whatsapp_text', 'Selamat datang di Kinglab Medika Lestari, ada yang bisa dibantu?');
    }

    // Auto-setup IDAK & CDAKB defaults
    if (empty(get_theme_mod('company_idak'))) {
        set_theme_mod('company_idak', '12290002200830022');
    }
    if (empty(get_theme_mod('company_cdakb'))) {
        set_theme_mod('company_cdakb', '122900022008300150007');
    }
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

    // Ensure key brand terms exist
    if (!term_exists('Yingtai Centrifuge', 'product_brand')) {
        wp_insert_term('Yingtai Centrifuge', 'product_brand', array('slug' => 'yingtai'));
    }
    if (!term_exists('Arco', 'product_brand')) {
        wp_insert_term('Arco', 'product_brand', array('slug' => 'arco'));
    }
    if (!term_exists('Thomas Scientific', 'product_brand')) {
        wp_insert_term('Thomas Scientific', 'product_brand', array('slug' => 'thomas-scientific'));
    }
    // Ensure key industry terms exist
    if (!term_exists('Hospital', 'product_industry')) {
        wp_insert_term('Hospital', 'product_industry', array('slug' => 'hospital'));
    }
    if (!term_exists('Industry', 'product_industry')) {
        wp_insert_term('Industry', 'product_industry', array('slug' => 'industry'));
    }
}
add_action('init', 'Kinglab_Medika_Lestari_register_post_types');

/**
 * Convert any YouTube URL into an embed URL
 */
function kinglab_get_youtube_embed_url($url) {
    if (empty($url)) return '';
    
    $video_id = '';
    if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $url, $match)) {
        $video_id = $match[1];
    }
    
    if (!empty($video_id)) {
        return 'https://www.youtube-nocookie.com/embed/' . $video_id . '?rel=0&enablejsapi=1';
    }
    
    return $url;
}

/**
 * Add Meta Box for Product Media (Video, Secondary Image / Barcode e-Katalog, e-Katalog URL) in WP Admin
 */
function kinglab_product_media_metabox() {
    add_meta_box(
        'kinglab_product_media',
        __('Media Produk, Barcode & e-Katalog LKPP', 'Kinglab_Medika_Lestari'),
        'kinglab_product_media_metabox_callback',
        'product',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'kinglab_product_media_metabox');

function kinglab_product_media_metabox_callback($post) {
    wp_nonce_field('kinglab_product_media_nonce_action', 'kinglab_product_media_nonce');
    $video_url       = get_post_meta($post->ID, '_product_video_url', true);
    $secondary_image = get_post_meta($post->ID, '_product_secondary_image', true);
    $ecatalog_url    = get_post_meta($post->ID, '_product_ecatalog_url', true);
    $auto_qr_preview = !empty($ecatalog_url) ? 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&margin=8&format=png&data=' . rawurlencode($ecatalog_url) : '';
    ?>
    <div style="margin-bottom:18px; padding-bottom:15px; border-bottom:1px solid #e2e8f0;">
        <label for="product_ecatalog_url" style="display:block; font-size:13px; font-weight:700; color:#0a4d3c; margin-bottom:5px;">
            <span class="dashicons dashicons-cart" style="vertical-align:text-top; margin-right:3px;"></span> Link e-Katalog LKPP / INAPROC:
        </label>
        <input type="url" id="product_ecatalog_url" name="product_ecatalog_url" value="<?php echo esc_attr($ecatalog_url); ?>" style="width:100%; padding:6px 10px; border-radius:4px; font-size:12px;" placeholder="https://katalog.inaproc.id/...">
        <p class="description" style="color:#64748b; font-size:0.82em; margin-top:5px; line-height:1.4;">
            💡 Masukkan link e-Katalog produk di sini. <strong>Barcode / QR Code akan otomatis digenerate</strong> dan ditanamkan ke galeri produk, langsung terhubung ke link e-Katalog saat discan atau diklik.
        </p>

        <!-- Real-time Generated Barcode Preview -->
        <div id="ecatalog_auto_qr_box" style="margin-top:10px; padding:12px; background:#f0fdf4; border:1px solid #bbf7d0; border-radius:6px; text-align:center; <?php echo empty($ecatalog_url) ? 'display:none;' : ''; ?>">
            <p style="margin:0 0 8px; font-size:12px; font-weight:600; color:#166534;">
                <span class="dashicons dashicons-yes-alt" style="color:#16a34a; vertical-align:middle;"></span> Barcode e-Katalog Terhubung:
            </p>
            <div style="background:#fff; display:inline-block; padding:8px; border-radius:6px; border:1px solid #dcfce7; box-shadow:0 1px 4px rgba(0,0,0,0.06);">
                <img id="ecatalog_auto_qr_img" src="<?php echo esc_url($auto_qr_preview); ?>" alt="Preview Barcode e-Katalog" style="width:130px; height:130px; display:block; object-fit:contain;">
            </div>
            <p style="margin:8px 0 0; font-size:11px; color:#15803d; line-height:1.3;">
                Barcode ini otomatis tampil sebagai slide kedua di halaman produk.
            </p>
        </div>
    </div>

    <div style="margin-bottom:18px; padding-bottom:15px; border-bottom:1px solid #e2e8f0;">
        <label for="product_secondary_image" style="display:block; font-size:13px; font-weight:700; color:#1e293b; margin-bottom:5px;">
            <span class="dashicons dashicons-format-image" style="vertical-align:text-top; margin-right:3px;"></span> Foto ke-2 / Barcode Kustom (Opsional):
        </label>
        <p class="description" style="color:#64748b; font-size:0.82em; margin:0 0 8px; line-height:1.4;">
            Jika Anda ingin mengunggah gambar barcode desain kustom sendiri (misal format khusus LKPP), upload di sini. Jika kosong, barcode otomatis dari link e-Katalog di atas yang akan digunakan.
        </p>
        <div style="text-align:center; background:#f8fafc; border:1px dashed #cbd5e1; border-radius:6px; padding:10px;">
            <img id="secondary_image_preview" src="<?php echo esc_url($secondary_image); ?>" style="max-width:100%; max-height:120px; <?php echo empty($secondary_image) ? 'display:none;' : 'display:inline-block;'; ?> border-radius:4px; margin-bottom:8px;">
            <input type="hidden" id="product_secondary_image" name="product_secondary_image" value="<?php echo esc_attr($secondary_image); ?>">
            <div>
                <button type="button" class="button button-secondary" id="btn_upload_secondary_image"><?php echo empty($secondary_image) ? 'Pilih / Upload Gambar' : 'Ganti Gambar'; ?></button>
                <button type="button" class="button button-link-delete" id="btn_remove_secondary_image" style="<?php echo empty($secondary_image) ? 'display:none;' : 'display:inline-block;'; ?> margin-left:8px; color:#d63638;">Hapus</button>
            </div>
        </div>
    </div>

    <div style="margin-bottom:10px;">
        <label for="product_video_url" style="display:block; font-size:13px; font-weight:700; color:#1e293b; margin-bottom:5px;">
            <span class="dashicons dashicons-video-alt3" style="vertical-align:text-top; margin-right:3px;"></span> Link Video YouTube (Opsional):
        </label>
        <input type="url" id="product_video_url" name="product_video_url" value="<?php echo esc_attr($video_url); ?>" style="width:100%; padding:6px 10px; border-radius:4px; font-size:12px;" placeholder="https://www.youtube.com/watch?v=...">
        <p class="description" style="color:#64748b; font-size:0.82em; margin-top:5px;">Video YouTube untuk thumbnail slide ke-3.</p>
    </div>

    <script>
    jQuery(document).ready(function($) {
        // Real-time live barcode preview when ecatalog link is typed or pasted
        $('#product_ecatalog_url').on('input paste change keyup', function() {
            var rawUrl = $(this).val().trim();
            if (rawUrl.length > 5 && (rawUrl.indexOf('http://') === 0 || rawUrl.indexOf('https://') === 0)) {
                var qrApi = 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&margin=8&format=png&data=' + encodeURIComponent(rawUrl);
                $('#ecatalog_auto_qr_img').attr('src', qrApi);
                $('#ecatalog_auto_qr_box').slideDown(150);
            } else if (rawUrl.length === 0) {
                $('#ecatalog_auto_qr_box').slideUp(150);
            }
        });

        // Media uploader for custom secondary image
        var file_frame;
        $('#btn_upload_secondary_image').on('click', function(e) {
            e.preventDefault();
            if (file_frame) {
                file_frame.open();
                return;
            }
            file_frame = wp.media({
                title: 'Pilih Foto ke-2 / Barcode e-Katalog Kustom',
                button: { text: 'Gunakan Gambar Ini' },
                multiple: false
            });
            file_frame.on('select', function() {
                var attachment = file_frame.state().get('selection').first().toJSON();
                $('#product_secondary_image').val(attachment.url);
                $('#secondary_image_preview').attr('src', attachment.url).show();
                $('#btn_upload_secondary_image').text('Ganti Gambar');
                $('#btn_remove_secondary_image').show();
            });
            file_frame.open();
        });

        $('#btn_remove_secondary_image').on('click', function(e) {
            e.preventDefault();
            $('#product_secondary_image').val('');
            $('#secondary_image_preview').attr('src', '').hide();
            $('#btn_upload_secondary_image').text('Pilih / Upload Gambar');
            $(this).hide();
        });
    });
    </script>
    <?php
}

function kinglab_save_product_media_meta($post_id) {
    if (!isset($_POST['kinglab_product_media_nonce']) || !wp_verify_nonce($_POST['kinglab_product_media_nonce'], 'kinglab_product_media_nonce_action')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['product_video_url'])) {
        update_post_meta($post_id, '_product_video_url', esc_url_raw($_POST['product_video_url']));
    }
    if (isset($_POST['product_secondary_image'])) {
        update_post_meta($post_id, '_product_secondary_image', esc_url_raw($_POST['product_secondary_image']));
    }
    if (isset($_POST['product_ecatalog_url'])) {
        update_post_meta($post_id, '_product_ecatalog_url', esc_url_raw($_POST['product_ecatalog_url']));
    }
}
add_action('save_post_product', 'kinglab_save_product_media_meta');

/**
 * Enqueue Media Uploader Scripts for Product Edit Screen in Admin
 */
function kinglab_admin_media_scripts($hook) {
    global $post_type;
    if (('post.php' === $hook || 'post-new.php' === $hook) && 'product' === $post_type) {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'kinglab_admin_media_scripts');

/**
 * Automatically format KEMENKES RI AKL / AKD licenses into an eye-catching green certified badge
 */
function kinglab_format_kemenkes_badge($content) {
    if (empty($content) || !is_string($content)) {
        return $content;
    }

    if (stripos($content, 'KEMENKES') === false) {
        return $content;
    }

    // Pattern: Target <p> blocks containing KEMENKES RI AKL/AKD
    $pattern = '/<p[^>]*>\s*(?:<strong>|<b>)?\s*(KEMENKES\s+RI\s+(?:AKL|AKD)[^<\r\n]+?)\s*(?:<\/strong>|<\/b>)?\s*<\/p>/i';

    $content = preg_replace_callback($pattern, function($matches) {
        $text = trim(strip_tags($matches[1]));
        return '<div class="kemenkes-badge-wrap">' .
               '<div class="kemenkes-badge">' .
               '<i class="fas fa-check-circle kemenkes-badge-icon"></i> ' .
               '<span class="kemenkes-badge-text">' . esc_html($text) . '</span>' .
               '</div>' .
               '</div>';
    }, $content);

    return $content;
}
add_filter('the_content', 'kinglab_format_kemenkes_badge', 20);

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
                    <?php 
                    $has_yingtai = false;
                    $has_thomas = false;
                    if (!is_wp_error($brands) && !empty($brands)) {
                        foreach ($brands as $brand) {
                            if (!is_object($brand) || empty($brand->name)) {
                                continue;
                            }
                            if (stripos($brand->name, 'yingtai') !== false || stripos($brand->slug, 'yingtai') !== false || stripos($brand->slug, 'centrifuge') !== false) {
                                $has_yingtai = true;
                            }
                            if (stripos($brand->name, 'thomas') !== false || stripos($brand->slug, 'thomas') !== false) {
                                $has_thomas = true;
                            }
                            $brand_link = get_term_link($brand);
                            if (is_wp_error($brand_link)) {
                                continue;
                            }
                            echo '<li><a href="' . esc_url($brand_link) . '">' . esc_html($brand->name) . '</a></li>';
                        }
                    }
                    if (!$has_yingtai) {
                        echo '<li><a href="' . esc_url(home_url('/product_brand/yingtai/')) . '">Yingtai Centrifuge</a></li>';
                    }
                    if (!$has_thomas) {
                        echo '<li><a href="' . esc_url(home_url('/product_brand/thomas-scientific/')) . '">Thomas Scientific</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="mega-menu-col">
                <h4 class="mega-menu-title">By Industry</h4>
                <ul class="mega-menu-list">
                    <?php 
                    $has_hospital = false;
                    if (!is_wp_error($industries) && !empty($industries)) {
                        foreach ($industries as $industry) {
                            if ( strtolower( trim( $industry->name ) ) === 'medical' ) {
                                continue;
                            }
                            if ( strtolower( trim( $industry->name ) ) === 'hospital' ) {
                                $has_hospital = true;
                            }
                            echo '<li><a href="' . esc_url(get_term_link($industry)) . '">' . esc_html($industry->name) . '</a></li>';
                        }
                    }
                    if (!$has_hospital) {
                        echo '<li><a href="' . esc_url(home_url('/product_industry/hospital/')) . '">Hospital</a></li>';
                    }
                    ?>
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
 * Direct template routing and showcase rendering for Thomas Scientific
 */
function kinglab_render_thomas_scientific_showcase() {
    $theme_uri = get_template_directory_uri();
    $sales_phone = get_theme_mod('contact_sales_whatsapp_phone', '6281211174724');
    $clean_phone = preg_replace('/[^0-9]/', '', $sales_phone);
    if (empty($clean_phone)) {
        $clean_phone = '6281211174724';
    }
    $wa_url = "https://api.whatsapp.com/send/?phone={$clean_phone}&text=" . urlencode("Hallo Kinglab Medika Lestari, saya tertarik dengan produk Thomas Scientific - New Model 4 Wiley® Cutting Mill") . "&type=phone_number&app_absent=0";
    ?>
    <style>
    .single-product-page-wrapper {
        margin-top: calc(var(--header-height, 120px) + 20px);
        padding: 40px 0 80px;
    }
    .thomas-breadcrumb {
        font-size: 0.9rem;
        color: #64748b;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }
    .thomas-breadcrumb a {
        color: #64748b;
        text-decoration: none;
        transition: color 0.2s;
    }
    .thomas-breadcrumb a:hover {
        color: #1B6B5A;
    }
    .thomas-brand-badge {
        background: #e6f4f1;
        color: #1B6B5A;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .thomas-product-grid {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 50px;
        align-items: start;
        margin-bottom: 50px;
    }
    @media (max-width: 991px) {
        .thomas-product-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }
    }
    .thomas-image-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        border: 1px solid #e2e8f0;
        text-align: center;
    }
    .thomas-image-card img {
        max-width: 100%;
        height: auto;
        object-fit: contain;
        border-radius: 8px;
        max-height: 480px;
    }
    .thomas-badges-row {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 20px;
        justify-content: center;
    }
    .thomas-badge-pill {
        background: #f1f5f9;
        color: #334155;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: 1px solid #e2e8f0;
    }
    .thomas-badge-pill i {
        color: #1B6B5A;
    }
    .thomas-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.25;
        margin-bottom: 15px;
    }
    .thomas-model-tag {
        display: inline-block;
        background: #1B6B5A;
        color: #ffffff;
        padding: 4px 12px;
        border-radius: 6px;
        font-size: 0.9rem;
        font-weight: 700;
        margin-bottom: 20px;
    }
    .thomas-desc {
        font-size: 1.02rem;
        color: #334155;
        line-height: 1.8;
        margin-bottom: 30px;
    }
    .thomas-desc h3 {
        font-size: 1.25rem;
        color: #0f172a;
        font-weight: 700;
        margin-top: 25px;
        margin-bottom: 12px;
    }
    .thomas-desc ul {
        margin: 0 0 20px 20px;
        padding: 0;
    }
    .thomas-desc li {
        margin-bottom: 8px;
        line-height: 1.6;
    }
    .thomas-cta-btn {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: #25D366;
        color: #ffffff;
        padding: 16px 36px;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 700;
        text-decoration: none;
        box-shadow: 0 8px 25px rgba(37, 211, 102, 0.35);
        transition: all 0.3s ease;
        margin-bottom: 40px;
    }
    .thomas-cta-btn:hover {
        background: #1eb956;
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(37, 211, 102, 0.45);
        color: #ffffff;
    }
    .thomas-specs-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 35px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        border: 1px solid #e2e8f0;
        margin-top: 40px;
    }
    .thomas-specs-card h2 {
        font-size: 1.6rem;
        color: #0f172a;
        font-weight: 800;
        margin-bottom: 25px;
        padding-bottom: 12px;
        border-bottom: 3px solid #1B6B5A;
        display: inline-block;
    }
    .thomas-spec-table {
        width: 100%;
        border-collapse: collapse;
    }
    .thomas-spec-table th, 
    .thomas-spec-table td {
        padding: 14px 18px;
        border-bottom: 1px solid #e2e8f0;
        font-size: 0.95rem;
    }
    .thomas-spec-table th {
        background: #f8fafc;
        color: #0f172a;
        font-weight: 700;
        width: 35%;
        text-align: left;
    }
    .thomas-spec-table td {
        color: #334155;
        line-height: 1.6;
    }
    .thomas-spec-table tr:hover td {
        background: #f8fafc;
    }
    </style>

    <div class="single-product-page-wrapper">
        <div class="container">
            <!-- Breadcrumb -->
            <div class="thomas-breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>"><i class="fas fa-home"></i> Home</a>
                <span>/</span>
                <a href="<?php echo esc_url(home_url('/product_industry/industry/')); ?>">Industry</a>
                <span>/</span>
                <span class="thomas-brand-badge"><i class="fas fa-tag"></i> Thomas Scientific</span>
                <span>/</span>
                <span style="color:#0f172a; font-weight:600;">New Model 4 Wiley® Cutting Mill</span>
            </div>

            <div class="thomas-product-grid">
                <!-- Left: Product Photo & Badges -->
                <div class="thomas-image-card">
                    <img src="<?php echo esc_url($theme_uri . '/assets/images/wiley-mill-model-4.jpg'); ?>" alt="Thomas Scientific - New Model 4 Wiley® Cutting Mill">
                    <div class="thomas-badges-row">
                        <span class="thomas-badge-pill"><i class="fas fa-tachometer-alt"></i> 920 RPM Rotor</span>
                        <span class="thomas-badge-pill"><i class="fas fa-bolt"></i> 1 HP Motor</span>
                        <span class="thomas-badge-pill"><i class="fas fa-shield-alt"></i> Tool-Steel Blades</span>
                        <span class="thomas-badge-pill"><i class="fas fa-filter"></i> Saringan 316 SS</span>
                        <span class="thomas-badge-pill"><i class="fas fa-circle-notch"></i> 7.75" Chamber</span>
                    </div>
                </div>

                <!-- Right: Product Information & Inquiries -->
                <div>
                    <span class="thomas-model-tag">Model: New Model 4</span>
                    <h1 class="thomas-title">Thomas Scientific - New Model 4 Wiley® Cutting Mill</h1>
                    
                    <div class="thomas-desc">
                        <p><strong>The New Model 4 Wiley® Cutting Mill by Thomas Scientific</strong> is the industry-standard, heavy-duty laboratory cutting mill engineered for precise, rapid, and heat-minimized particle size reduction of fibrous, tough, and resilient materials.</p>
                        <p>Unlike conventional hammer mills or pulverizers that generate high friction and excessive thermal degradation, the Wiley® Mill utilizes four replaceable tool-steel revolving blades that shear cleanly against six stationary bed knives within an expansive 7.75-inch diameter cutting chamber. This continuous, low-friction shearing action preserves the integrity of moisture, volatiles, and heat-sensitive analytical compounds.</p>

                        <h3>Key Features & Advantages</h3>
                        <ul>
                            <li><strong>Continuous Shearing Action:</strong> Minimizes heat build-up and sample degradation during milling, essential for analytical accuracy.</li>
                            <li><strong>Heavy-Duty 1 HP Motor:</strong> Constant operating speed of ~920 RPM delivers high torque to process tough, resilient samples without jamming.</li>
                            <li><strong>Precision Tool-Steel Cutting System:</strong> 4 revolving rotor blades and 6 stationary bed knives crafted from hardened tool steel with easily adjustable clearance.</li>
                            <li><strong>Interchangeable Sieve System:</strong> Supplied with interchangeable 0.5 mm, 1 mm, and 2 mm sieve meshes constructed of durable 316 Stainless Steel.</li>
                            <li><strong>Safe & Controlled Sample Feeding:</strong> Heavy-duty 300-series stainless steel hopper equipped with removable safety insert and plunger to prevent blowback.</li>
                            <li><strong>Convenient Sample Collection:</strong> Threaded jar adapter securely accommodates standard 16 oz glass collection jars for direct sample reception and airtight storage.</li>
                        </ul>

                        <h3>Standard Applications</h3>
                        <ul>
                            <li><strong>Agriculture & Feed:</strong> Animal feed, cereal grains, forage, hay, straw, corn, soybeans, seeds, tobacco, and dried plant tissue.</li>
                            <li><strong>Biomass & Biofuels:</strong> Bagasse, switchgrass, wood chips, bark, cellulose, and forestry by-products.</li>
                            <li><strong>Plastics & Polymers:</strong> Polyethylene, polypropylene, synthetic fibers, elastomer pellets, and recycled polymers.</li>
                            <li><strong>Food & Pharmaceuticals:</strong> Dehydrated food samples, roots, herbs, botanical extracts, spices, and tablet excipients.</li>
                            <li><strong>Industrial Materials:</strong> Cardboard, paper pulp, leather, rubber, and solid waste materials.</li>
                        </ul>
                    </div>

                    <!-- WhatsApp CTA Button -->
                    <div>
                        <a href="<?php echo esc_url($wa_url); ?>" class="thomas-cta-btn" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-whatsapp" style="font-size: 1.4rem;"></i>
                            <span>Hubungi Sales Kinglab (Inquiry / Harga)</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Technical Specifications Table -->
            <div class="thomas-specs-card">
                <h2>Spesifikasi Teknis Lengkap</h2>
                <table class="thomas-spec-table">
                    <tbody>
                        <tr>
                            <th>Brand / Manufaktur</th>
                            <td><strong>Thomas Scientific (USA)</strong></td>
                        </tr>
                        <tr>
                            <th>Model Produk</th>
                            <td><strong>New Model 4 Wiley® Cutting Mill</strong></td>
                        </tr>
                        <tr>
                            <th>Kecepatan Rotor</th>
                            <td>~920 RPM (Constant Speed Motor)</td>
                        </tr>
                        <tr>
                            <th>Daya Motor</th>
                            <td>1 HP (Horsepower) Continuous-Duty Motor</td>
                        </tr>
                        <tr>
                            <th>Ruang Giling (Chamber)</th>
                            <td>Diameter 7.75 inci (197 mm) &bull; Volume ~141 in³ (~2.3 L)</td>
                        </tr>
                        <tr>
                            <th>Diameter Lubang Input</th>
                            <td>2.25 inci (5.7 cm) dengan safety insert &amp; plunger feed</td>
                        </tr>
                        <tr>
                            <th>Kapasitas Sampel per Batch</th>
                            <td>50 hingga 1.000 gram (tergantung densitas material)</td>
                        </tr>
                        <tr>
                            <th>Mekanisme Pemotongan</th>
                            <td>4 Pisau Putar + 6 Pisau Stasioner (Hardened Tool Steel)</td>
                        </tr>
                        <tr>
                            <th>Ukuran Saringan (Included)</th>
                            <td>0.5 mm, 1.0 mm, dan 2.0 mm (Stainless Steel 316)</td>
                        </tr>
                        <tr>
                            <th>Material Kontak Sampel</th>
                            <td>Stainless Steel 316 (Saringan) &amp; Stainless Steel 300-Series (Hopper &amp; Plunger)</td>
                        </tr>
                        <tr>
                            <th>Konstruksi Rangka</th>
                            <td>Heavy-duty all-steel construction dengan powder-coated finish tahan kimia</td>
                        </tr>
                        <tr>
                            <th>Wadah Penampung</th>
                            <td>Jar adapter ulir + 3x botol kaca koleksi 16 oz (473 ml)</td>
                        </tr>
                        <tr>
                            <th>Dimensi &amp; Berat</th>
                            <td>Benchtop: 66 &times; 56 &times; 56 cm &bull; Berat: ~150 kg (330 lbs)</td>
                        </tr>
                        <tr>
                            <th>Kebutuhan Listrik</th>
                            <td>230V / 115V AC, 50/60 Hz</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}

add_action('template_redirect', function() {
    $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';

    // 1. By Brand: Thomas Scientific
    if (stripos($uri, 'thomas-scientific') !== false || (stripos($uri, 'thomas') !== false && stripos($uri, 'product_brand') !== false)) {
        get_header();
        kinglab_render_thomas_scientific_showcase();
        get_footer();
        exit;
    }

    // 2. By Industry: Industry -> guarantee Thomas Scientific card is displayed
    if (stripos($uri, 'product_industry/industry') !== false) {
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
                
                // Inject after the CDR FoodLab link in industry grid
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
});

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
        'whatsapp'  => array('label' => 'WhatsApp URL', 'default' => 'https://api.whatsapp.com/send/?phone=6281211174724&text=' . rawurlencode('Selamat datang di Kinglab Medika Lestari, ada yang bisa dibantu?') . '&type=phone_number&app_absent=0'),
        'floating_whatsapp_text'     => array('label' => 'Floating WhatsApp Greeting Text', 'default' => 'Selamat datang di Kinglab Medika Lestari, ada yang bisa dibantu?'),
        'sales_whatsapp_phone'        => array('label' => 'Product Sales WhatsApp Number', 'default' => '6281211174724'),
        'sales_whatsapp_button_text' => array('label' => 'Product Sales Button Text', 'default' => 'Hubungi Kinglab'),
        'sales_whatsapp_text'        => array('label' => 'Product Sales Default Message', 'default' => 'hallo Kinglab Medika Lestari saya tertarik dengan produk nya'),
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

/**
 * Hapus Brand 'CHM LAB' dan produk lama terkait
 */
function kinglab_delete_chm_lab_brand_and_products() {
    $report = array();

    // 1. Cari term 'chm-lab' atau 'CHM LAB' di product_brand
    $term_chm_lab = get_term_by('slug', 'chm-lab', 'product_brand');
    if (!$term_chm_lab) {
        $term_chm_lab = get_term_by('name', 'CHM LAB', 'product_brand');
    }

    $product_ids = array();

    if ($term_chm_lab && !is_wp_error($term_chm_lab)) {
        // Ambil semua produk yang di-assign ke brand CHM LAB (termasuk child terms)
        $brand_products = get_posts(array(
            'post_type'      => 'product',
            'posts_per_page' => -1,
            'post_status'    => 'any',
            'fields'         => 'ids',
            'tax_query'      => array(
                array(
                    'taxonomy'         => 'product_brand',
                    'field'            => 'term_id',
                    'terms'            => $term_chm_lab->term_id,
                    'include_children' => true,
                ),
            ),
        ));
        if (!empty($brand_products)) {
            $product_ids = array_merge($product_ids, $brand_products);
        }
    }

    // Cari juga produk dengan slug 'chm-quantitative-filter-paper' atau judul 'CHM Quantitative filter paper'
    $specific_products = get_posts(array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'post_status'    => 'any',
        'fields'         => 'ids',
        'name'           => 'chm-quantitative-filter-paper',
    ));
    if (!empty($specific_products)) {
        $product_ids = array_merge($product_ids, $specific_products);
    }

    $title_products = get_posts(array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'post_status'    => 'any',
        'fields'         => 'ids',
        'title'          => 'CHM Quantitative filter paper',
    ));
    if (!empty($title_products)) {
        $product_ids = array_merge($product_ids, $title_products);
    }

    // Juga periksa 'Ashless Filter Paper for Quantitative Analysis' (produk sisa lama)
    $old_chm_products = get_posts(array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'post_status'    => 'any',
        'fields'         => 'ids',
        'title'          => 'Ashless Filter Paper for Quantitative Analysis',
    ));
    if (!empty($old_chm_products)) {
        $product_ids = array_merge($product_ids, $old_chm_products);
    }

    $product_ids = array_unique(array_filter($product_ids));

    if (!empty($product_ids)) {
        foreach ($product_ids as $pid) {
            $p_title = get_the_title($pid);
            $thumb_id = get_post_thumbnail_id($pid);
            if ($thumb_id) {
                wp_delete_attachment($thumb_id, true);
            }
            wp_delete_post($pid, true);
            $report[] = "Produk dihapus: [ID {$pid}] '{$p_title}' (dan featured image).";
        }
    } else {
        $report[] = "Tidak ada produk lama/duplikat yang ditemukan untuk dihapus.";
    }

    // 2. Hapus anak-anak term dan term CHM LAB itu sendiri
    if ($term_chm_lab && !is_wp_error($term_chm_lab)) {
        $children = get_terms(array(
            'taxonomy'   => 'product_brand',
            'parent'     => $term_chm_lab->term_id,
            'hide_empty' => false,
        ));
        if (!is_wp_error($children) && !empty($children)) {
            foreach ($children as $child) {
                // Hapus sub-child bila ada
                $sub_children = get_terms(array(
                    'taxonomy'   => 'product_brand',
                    'parent'     => $child->term_id,
                    'hide_empty' => false,
                ));
                if (!is_wp_error($sub_children) && !empty($sub_children)) {
                    foreach ($sub_children as $sc) {
                        wp_delete_term($sc->term_id, 'product_brand');
                        $report[] = "Sub-kategori brand dihapus: '{$sc->name}' (ID: {$sc->term_id})";
                    }
                }
                wp_delete_term($child->term_id, 'product_brand');
                $report[] = "Kategori brand dihapus: '{$child->name}' (ID: {$child->term_id})";
            }
        }

        wp_delete_term($term_chm_lab->term_id, 'product_brand');
        $report[] = "Brand utama '{$term_chm_lab->name}' (slug: {$term_chm_lab->slug}) berhasil dihapus dari taxonomy.";
    } else {
        $report[] = "Term brand 'CHM LAB' sudah tidak ada di database.";
    }

    if (function_exists('clean_term_cache')) {
        clean_term_cache(0, 'product_brand');
    }
    if (function_exists('wp_cache_flush')) {
        wp_cache_flush();
    }

    return $report;
}

add_action('wp_ajax_nopriv_delete_chm_lab', 'kinglab_ajax_delete_chm_lab');
add_action('wp_ajax_delete_chm_lab', 'kinglab_ajax_delete_chm_lab');
function kinglab_ajax_delete_chm_lab() {
    $res = kinglab_delete_chm_lab_brand_and_products();
    $pid = kinglab_auto_import_thomas_scientific();
    wp_send_json_success(array('res' => $res, 'thomas_pid' => $pid, 'version' => 'v_thomas_test_1'));
}

add_action('wp_ajax_nopriv_import_thomas_wiley', 'kinglab_ajax_import_thomas_wiley');
add_action('wp_ajax_import_thomas_wiley', 'kinglab_ajax_import_thomas_wiley');
function kinglab_ajax_import_thomas_wiley() {
    delete_option('kinglab_thomas_imported_v1');
    $pid = kinglab_auto_import_thomas_scientific();
    wp_send_json_success(array('status' => 'success', 'post_id' => $pid, 'url' => get_permalink($pid)));
}

add_action('init', function() {
    if (isset($_GET['run_chm_import'])) {
        require_once get_template_directory() . '/import-chm-products.php';
        exit;
    }
    if (isset($_GET['run_cdr_import']) || isset($_GET['force_cdr_import'])) {
        delete_option('kinglab_cdr_imported_v1');
        require_once get_template_directory() . '/import-cdr-products.php';
        exit;
    }
    if (isset($_GET['run_thomas_import']) || isset($_GET['force_thomas_import'])) {
        delete_option('kinglab_thomas_imported_v1');
        require_once get_template_directory() . '/import-thomas-wiley.php';
        exit;
    }
    // Auto rename brand "CHM" to "CHM Lab"
    if (!get_option('kinglab_chm_to_chm_lab_v1')) {
        $chm_term = get_term_by('name', 'CHM', 'product_brand');
        if ($chm_term && !is_wp_error($chm_term)) {
            wp_update_term($chm_term->term_id, 'product_brand', array(
                'name' => 'CHM Lab',
                'slug' => 'chm-lab',
            ));
            if (function_exists('clean_term_cache')) {
                clean_term_cache(0, 'product_brand');
            }
            if (function_exists('wp_cache_flush')) {
                wp_cache_flush();
            }
        }
        update_option('kinglab_chm_to_chm_lab_v1', 1);
    }

    // Auto import CDR FoodLab products if not yet present
    if (!get_option('kinglab_cdr_imported_v1')) {
        $check = get_posts(array(
            'post_type'   => 'product',
            'title'       => 'CDR FoodLab® Food Chemical Analysis System',
            'post_status' => 'any',
            'numberposts' => 1,
        ));

        if (!empty($check)) {
            update_option('kinglab_cdr_imported_v1', 1);
        } else {
            if (file_exists(get_template_directory() . '/import-cdr-products.php')) {
                ob_start();
                include get_template_directory() . '/import-cdr-products.php';
                ob_end_clean();
                update_option('kinglab_cdr_imported_v1', 1);
            }
        }
    }

    // Auto import Thomas Scientific Wiley Mill product if not yet present in database
    $thomas_check_posts = get_posts(array(
        'post_type'      => 'product',
        'title'          => 'Thomas Scientific - New Model 4 Wiley® Cutting Mill',
        'post_status'    => 'any',
        'posts_per_page' => 1,
        'fields'         => 'ids',
    ));
    if (empty($thomas_check_posts)) {
        delete_option('kinglab_thomas_imported_v1');
        kinglab_auto_import_thomas_scientific();
    }
});

/**
 * Self-contained auto-importer for Thomas Scientific New Model 4 Wiley Mill
 */
function kinglab_auto_import_thomas_scientific() {
    $title = 'Thomas Scientific - New Model 4 Wiley® Cutting Mill';
    $existing = get_posts(array(
        'post_type'   => 'product',
        'title'       => $title,
        'post_status' => 'any',
        'numberposts' => 1,
    ));

    $post_id = !empty($existing) ? $existing[0]->ID : 0;
    
    $desc = '<p><strong>The New Model 4 Wiley® Cutting Mill by Thomas Scientific</strong> is the industry-standard, heavy-duty laboratory cutting mill engineered for precise, rapid, and heat-minimized particle size reduction of fibrous, tough, and resilient materials.</p>
<p>Unlike conventional hammer mills or pulverizers that generate high friction and excessive thermal degradation, the Wiley® Mill utilizes four replaceable tool-steel revolving blades that shear cleanly against six stationary bed knives within an expansive 7.75-inch diameter cutting chamber. This continuous, low-friction shearing action preserves the integrity of moisture, volatiles, and heat-sensitive analytical compounds.</p>
<h3>Key Features & Advantages</h3>
<ul>
  <li><strong>Continuous Shearing Action:</strong> Minimizes heat build-up and sample degradation during milling, essential for analytical accuracy.</li>
  <li><strong>Heavy-Duty 1 HP Motor:</strong> Constant operating speed of ~920 RPM delivers high torque to process tough, resilient samples without jamming.</li>
  <li><strong>Precision Tool-Steel Cutting System:</strong> 4 revolving rotor blades and 6 stationary bed knives crafted from hardened tool steel with easily adjustable clearance.</li>
  <li><strong>Interchangeable Sieve System:</strong> Supplied with interchangeable 0.5 mm, 1 mm, and 2 mm sieve meshes constructed of durable 316 Stainless Steel.</li>
  <li><strong>Safe & Controlled Sample Feeding:</strong> Heavy-duty 300-series stainless steel hopper equipped with removable safety insert and plunger to prevent blowback.</li>
  <li><strong>Convenient Sample Collection:</strong> Threaded jar adapter securely accommodates standard 16 oz glass collection jars for direct sample reception and airtight storage.</li>
</ul>
<h3>Standard Applications</h3>
<ul>
  <li><strong>Agriculture & Feed:</strong> Animal feed, cereal grains, forage, hay, straw, corn, soybeans, seeds, tobacco, and dried plant tissue.</li>
  <li><strong>Biomass & Biofuels:</strong> Bagasse, switchgrass, wood chips, bark, cellulose, and forestry by-products.</li>
  <li><strong>Plastics & Polymers:</strong> Polyethylene, polypropylene, synthetic fibers, elastomer pellets, and recycled polymers.</li>
  <li><strong>Food & Pharmaceuticals:</strong> Dehydrated food samples, roots, herbs, botanical extracts, spices, and tablet excipients.</li>
  <li><strong>Industrial Materials:</strong> Cardboard, paper pulp, leather, rubber, and solid waste materials.</li>
</ul>';

    $spec = '<table class="spec-table" style="width:100%; border-collapse:collapse; margin-top:15px; margin-bottom:20px;">
<thead>
  <tr style="background:#1B6B5A; color:#ffffff;">
    <th style="padding:12px 15px; text-align:left; font-weight:700; border:1px solid #1B6B5A; width:35%;">Parameter Teknis</th>
    <th style="padding:12px 15px; text-align:left; font-weight:700; border:1px solid #1B6B5A; width:65%;">Spesifikasi New Model 4 Wiley® Mill</th>
  </tr>
</thead>
<tbody>
  <tr style="background:#f9fafb;"><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Brand / Manufaktur</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">Thomas Scientific (USA)</td></tr>
  <tr><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Model Produk</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">New Model 4 Wiley® Cutting Mill</td></tr>
  <tr style="background:#f9fafb;"><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Kecepatan Rotor</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">~920 RPM (Constant Speed Motor)</td></tr>
  <tr><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Daya Motor</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">1 HP Continuous-Duty Motor</td></tr>
  <tr style="background:#f9fafb;"><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Ruang Giling (Chamber)</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">Diameter 7.75 inci (197 mm) &bull; Volume ~141 in³ (~2.3 L)</td></tr>
  <tr><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Diameter Lubang Input</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">2.25 inci (5.7 cm) dengan safety insert &amp; plunger feed</td></tr>
  <tr style="background:#f9fafb;"><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Kapasitas Sampel</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">50 hingga 1.000 gram</td></tr>
  <tr><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Mekanisme Pemotongan</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">4 Pisau Putar + 6 Pisau Stasioner (Hardened Tool Steel)</td></tr>
  <tr style="background:#f9fafb;"><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Ukuran Saringan</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">0.5 mm, 1.0 mm, dan 2.0 mm (Stainless Steel 316)</td></tr>
  <tr><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Material Kontak Sampel</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">Stainless Steel 316 (Saringan) &amp; Stainless Steel 300-Series (Hopper &amp; Plunger)</td></tr>
  <tr style="background:#f9fafb;"><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Wadah Penampung</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">Jar adapter ulir + 3x botol kaca koleksi 16 oz (473 ml)</td></tr>
  <tr><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Dimensi &amp; Berat</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">Benchtop: 66 &times; 56 &times; 56 cm &bull; Berat: ~150 kg (330 lbs)</td></tr>
  <tr style="background:#f9fafb;"><td style="padding:10px 15px; font-weight:700; border:1px solid #e0e0e0;">Kebutuhan Listrik</td><td style="padding:10px 15px; border:1px solid #e0e0e0;">230V / 115V AC, 50/60 Hz</td></tr>
</tbody>
</table>';

    if ($post_id) {
        wp_update_post(array(
            'ID'           => $post_id,
            'post_content' => $desc,
            'post_excerpt' => 'New Model 4',
        ));
    } else {
        $post_id = wp_insert_post(array(
            'post_title'   => $title,
            'post_content' => $desc,
            'post_excerpt' => 'New Model 4',
            'post_status'  => 'publish',
            'post_type'    => 'product',
        ));
    }

    if ($post_id && !is_wp_error($post_id)) {
        update_post_meta($post_id, '_specification_content', $spec);
        update_post_meta($post_id, '_product_model', 'New Model 4');

        // Brand
        $b_term = term_exists('Thomas Scientific', 'product_brand');
        if (!$b_term) {
            $b_term = wp_insert_term('Thomas Scientific', 'product_brand', array('slug' => 'thomas-scientific'));
        }
        if (!is_wp_error($b_term)) {
            $b_id = is_array($b_term) ? $b_term['term_id'] : $b_term;
            wp_set_object_terms($post_id, array((int)$b_id), 'product_brand');
        }

        // Industry
        $i_term = term_exists('Industry', 'product_industry');
        if (!$i_term) {
            $i_term = wp_insert_term('Industry', 'product_industry', array('slug' => 'industry'));
        }
        if (!is_wp_error($i_term)) {
            $i_id = is_array($i_term) ? $i_term['term_id'] : $i_term;
            wp_set_object_terms($post_id, array((int)$i_id), 'product_industry');
        }

        // Image
        if (!has_post_thumbnail($post_id)) {
            $img_file = get_template_directory() . '/assets/images/wiley-mill-model-4.jpg';
            if (file_exists($img_file)) {
                require_once(ABSPATH . 'wp-admin/includes/media.php');
                require_once(ABSPATH . 'wp-admin/includes/file.php');
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $tmp = wp_tempnam('wiley-mill-model-4.jpg');
                if (copy($img_file, $tmp)) {
                    $att_id = media_handle_sideload(array('name' => 'wiley-mill-model-4.jpg', 'tmp_name' => $tmp), $post_id, $title);
                    if (!is_wp_error($att_id)) {
                        set_post_thumbnail($post_id, $att_id);
                    }
                }
            }
        }
        update_option('kinglab_thomas_imported_v1', 1);
        if (function_exists('clean_term_cache')) {
            clean_term_cache(0, 'product_brand');
            clean_term_cache(0, 'product_industry');
        }
        if (function_exists('clean_post_cache')) {
            clean_post_cache($post_id);
        }
        if (function_exists('wp_cache_flush')) {
            wp_cache_flush();
        }
        return $post_id;
    }
    return false;
}
