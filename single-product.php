<?php
/**
 * The template for displaying all single products
 *
 * @package Kinglab_Medika_Lestari_Theme
 */

get_header(); ?>

<div class="single-product-page-wrapper">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <div class="container">
            <div class="product-main-content">
                <div class="product-top-row">
                    <!-- Left: Product Media Gallery / Slider -->
                    <?php
                    $product_id     = get_the_ID();
                    $product_title  = get_the_title();
                    $video_url      = get_post_meta( $product_id, '_product_video_url', true );
                    $secondary_img  = get_post_meta( $product_id, '_product_secondary_image', true );
                    $ecatalog_url   = get_post_meta( $product_id, '_product_ecatalog_url', true );

                    // Auto-attach e-katalog QR code for KML-340 HPLC HbA1c Analyzer
                    if ( empty( $secondary_img ) && stripos( $product_title, 'KML-340' ) !== false ) {
                        $secondary_img = Kinglab_Medika_Lestari_URI . '/assets/images/qr-ecatalog-kml340.png';
                        update_post_meta( $product_id, '_product_secondary_image', $secondary_img );
                    }
                    if ( empty( $ecatalog_url ) && stripos( $product_title, 'KML-340' ) !== false ) {
                        $ecatalog_url = 'https://katalog.inaproc.id/pt-kinglab-medika-lestari/saikou-hplc-hba1c-analyzer';
                        update_post_meta( $product_id, '_product_ecatalog_url', $ecatalog_url );
                    }

                    $video_embed_url = '';
                    $video_id = '';
                    if ( ! empty( $video_url ) ) {
                        if ( preg_match( '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $video_url, $vm ) ) {
                            $video_id = $vm[1];
                        }
                        if ( function_exists( 'kinglab_get_youtube_embed_url' ) ) {
                            $video_embed_url = kinglab_get_youtube_embed_url( $video_url );
                        } else {
                            $video_embed_url = 'https://www.youtube-nocookie.com/embed/' . ( $video_id ?: '9wkjBTCHsUY' ) . '?rel=0&enablejsapi=1';
                        }
                    }

                    // Collect all slides
                    $slides = array();

                    // Slide 1: Featured Image (Foto Utama)
                    $featured_url   = get_the_post_thumbnail_url( $product_id, 'large' );
                    $featured_thumb = get_the_post_thumbnail_url( $product_id, 'thumbnail' ) ?: $featured_url;
                    if ( ! empty( $featured_url ) ) {
                        $slides[] = array(
                            'type'      => 'image',
                            'url'       => $featured_url,
                            'thumb'     => $featured_thumb,
                            'alt'       => $product_title,
                            'label'     => 'Foto Produk',
                            'is_qrcode' => false,
                        );
                    }

                    // Slide 2: Foto ke-2 / Barcode e-Katalog
                    if ( ! empty( $secondary_img ) ) {
                        $slides[] = array(
                            'type'      => 'image',
                            'url'       => $secondary_img,
                            'thumb'     => $secondary_img,
                            'alt'       => 'Barcode e-Katalog LKPP - ' . $product_title,
                            'label'     => 'e-Katalog LKPP',
                            'link'      => $ecatalog_url,
                            'is_qrcode' => true,
                        );
                    }

                    // Slide 3: YouTube Video (if explicitly set)
                    if ( ! empty( $video_embed_url ) ) {
                        $video_thumb = ! empty( $video_id ) ? "https://img.youtube.com/vi/{$video_id}/mqdefault.jpg" : '';
                        $slides[] = array(
                            'type'      => 'video',
                            'embed_url' => $video_embed_url,
                            'thumb'     => $video_thumb,
                            'alt'       => $product_title . ' Video',
                            'label'     => 'Video Demo',
                            'is_qrcode' => false,
                        );
                    }

                    // Fallback if no images
                    if ( empty( $slides ) ) {
                        $slides[] = array(
                            'type'      => 'placeholder',
                            'url'       => '',
                            'thumb'     => '',
                            'alt'       => $product_title,
                            'label'     => 'Foto Produk',
                            'is_qrcode' => false,
                        );
                    }
                    ?>
                    <div class="product-media-slider" id="productMediaSlider">
                        <div class="product-slider-wrapper">
                            <div class="product-slider-track" id="productSliderTrack">
                                <?php foreach ( $slides as $slide_index => $slide ) : ?>
                                    <div class="product-slide <?php echo $slide['type'] === 'video' ? 'slide-video' : ''; ?>" data-slide="<?php echo esc_attr( $slide_index ); ?>">
                                        <?php if ( $slide['type'] === 'video' ) : ?>
                                            <div class="video-responsive-wrapper">
                                                <iframe 
                                                    id="productVideoIframe"
                                                    src="<?php echo esc_url( $slide['embed_url'] ); ?>" 
                                                    title="<?php echo esc_attr( $slide['alt'] ); ?>" 
                                                    frameborder="0" 
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                    allowfullscreen>
                                                </iframe>
                                            </div>
                                        <?php elseif ( ! empty( $slide['is_qrcode'] ) ) : ?>
                                            <div class="product-qr-slide-content">
                                                <div class="qr-image-frame">
                                                    <?php if ( ! empty( $slide['link'] ) ) : ?>
                                                        <a href="<?php echo esc_url( $slide['link'] ); ?>" target="_blank" rel="noopener noreferrer" title="<?php esc_attr_e( 'Buka Produk di e-Katalog LKPP', 'Kinglab_Medika_Lestari' ); ?>">
                                                            <img src="<?php echo esc_url( $slide['url'] ); ?>" alt="<?php echo esc_attr( $slide['alt'] ); ?>" class="qr-main-img">
                                                        </a>
                                                    <?php else : ?>
                                                        <img src="<?php echo esc_url( $slide['url'] ); ?>" alt="<?php echo esc_attr( $slide['alt'] ); ?>" class="qr-main-img">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php elseif ( $slide['type'] === 'placeholder' ) : ?>
                                            <div class="product-placeholder">
                                                <i class="fas fa-microscope"></i>
                                            </div>
                                        <?php else : ?>
                                            <img src="<?php echo esc_url( $slide['url'] ); ?>" alt="<?php echo esc_attr( $slide['alt'] ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <?php if ( count( $slides ) > 1 ) : ?>
                                <!-- Arrows -->
                                <button type="button" class="slider-arrow-btn prev" onclick="moveProductSlide(-1)" aria-label="Previous">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button type="button" class="slider-arrow-btn next" onclick="moveProductSlide(1)" aria-label="Next">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            <?php endif; ?>
                        </div>

                        <?php if ( count( $slides ) > 1 ) : ?>
                            <!-- Media Switcher Gallery Thumbnails (Sub-Foto) -->
                            <div class="product-gallery-thumbnails">
                                <?php foreach ( $slides as $thumb_index => $thumb_slide ) : ?>
                                    <button type="button" 
                                            class="gallery-thumb <?php echo $thumb_index === 0 ? 'active' : ''; ?>" 
                                            onclick="goToProductSlide(<?php echo esc_attr( $thumb_index ); ?>)"
                                            title="<?php echo esc_attr( $thumb_slide['label'] ); ?>"
                                            aria-label="<?php echo esc_attr( $thumb_slide['label'] ); ?>">
                                        <div class="thumb-img-wrapper">
                                            <?php if ( $thumb_slide['type'] === 'video' ) : ?>
                                                <?php if ( ! empty( $thumb_slide['thumb'] ) ) : ?>
                                                    <img src="<?php echo esc_url( $thumb_slide['thumb'] ); ?>" alt="<?php echo esc_attr( $thumb_slide['alt'] ); ?>">
                                                <?php else : ?>
                                                    <i class="fab fa-youtube" style="font-size:24px; color:#ff0000;"></i>
                                                <?php endif; ?>
                                                <span class="thumb-play-overlay"><i class="fas fa-play"></i></span>
                                            <?php elseif ( $thumb_slide['type'] === 'placeholder' ) : ?>
                                                <i class="fas fa-microscope" style="font-size:20px; color:#94a3b8;"></i>
                                            <?php else : ?>
                                                <img src="<?php echo esc_url( $thumb_slide['thumb'] ); ?>" alt="<?php echo esc_attr( $thumb_slide['alt'] ); ?>">
                                                <?php if ( ! empty( $thumb_slide['is_qrcode'] ) ) : ?>
                                                    <span class="thumb-qr-badge"><i class="fas fa-qrcode"></i></span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <span class="thumb-caption"><?php echo esc_html( $thumb_slide['label'] ); ?></span>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Right: Product Information -->
                    <div class="product-info-col">
                        <h1 class="product-main-title"><?php the_title(); ?></h1>
                        
                        <div class="product-excerpt">
                            <?php the_content(); ?>
                        </div>



                        <div class="product-meta-data">
                            <?php
                            $industries = get_the_terms( get_the_ID(), 'product_industry' );
                            if ( ! empty( $industries ) && ! is_wp_error( $industries ) ) :
                                ?>
                                <div class="meta-row">
                                    <span class="meta-label"><?php esc_html_e( 'Category:', 'Kinglab_Medika_Lestari' ); ?></span>
                                    <span class="meta-value">
                                        <?php
                                        $industry_links = array();
                                        foreach ( $industries as $industry ) {
                                            $industry_links[] = '<a href="' . esc_url( get_term_link( $industry ) ) . '">' . esc_html( $industry->name ) . '</a>';
                                        }
                                        echo implode( ' &ndash; ', $industry_links );
                                        ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <?php
                            $brands = get_the_terms( get_the_ID(), 'product_brand' );
                            if ( ! empty( $brands ) && ! is_wp_error( $brands ) ) :
                                ?>
                                <div class="meta-row">
                                    <span class="meta-label"><?php esc_html_e( 'Manufacture:', 'Kinglab_Medika_Lestari' ); ?></span>
                                    <span class="meta-value">
                                        <?php
                                        $brand_links = array();
                                        foreach ( $brands as $brand ) {
                                            $brand_links[] = '<a href="' . esc_url( get_term_link( $brand ) ) . '">' . esc_html( $brand->name ) . '</a>';
                                        }
                                        echo implode( ', ', $brand_links );
                                        ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Hubungi Kinglab Sales WhatsApp Button -->
                        <?php
                        $sales_phone   = get_theme_mod( 'contact_sales_whatsapp_phone', '6281211174724' );
                        $button_label  = get_theme_mod( 'contact_sales_whatsapp_button_text', 'Hubungi Kinglab' );
                        $base_msg      = get_theme_mod( 'contact_sales_whatsapp_text', 'hallo Kinglab Medika Lestari saya tertarik dengan produk nya' );
                        if ( empty( $base_msg ) || trim( $base_msg ) === 'hallo kinglab saya tertarik dengan produk nya' ) {
                            $base_msg = 'hallo Kinglab Medika Lestari saya tertarik dengan produk nya';
                        }
                        $clean_phone   = preg_replace( '/[^0-9]/', '', $sales_phone );
                        if ( empty( $clean_phone ) ) {
                            $clean_phone = '6281211174724';
                        }
                        $product_title = get_the_title();
                        $full_msg      = trim( $base_msg ) . ': ' . $product_title;
                        $wa_url        = 'https://api.whatsapp.com/send/?phone=' . $clean_phone . '&text=' . rawurlencode( $full_msg ) . '&type=phone_number&app_absent=0';
                        ?>
                        <div class="product-contact-sales-wrap">
                            <a href="<?php echo esc_url( $wa_url ); ?>" class="btn-sales-pill" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( sprintf( __( '%s via WhatsApp', 'Kinglab_Medika_Lestari' ), $button_label ) ); ?>">
                                <span class="sales-pill-icon-box">
                                    <i class="fas fa-shopping-cart icon-cart"></i>
                                </span>
                                <span class="sales-pill-text"><?php echo esc_html( $button_label ); ?></span>
                            </a>
                        </div>

                        <!-- Product Specification Accordion -->
                        <?php
                        $spec_content = get_post_meta( get_the_ID(), '_specification_content', true );
                        ?>
                        <div class="product-technical-tabs">
                            <div class="technical-accordion-item">
                                <div class="accordion-header active" onclick="toggleProductAccordion(this)">
                                    <h3><?php esc_html_e( 'Specification', 'Kinglab_Medika_Lestari' ); ?></h3>
                                    <i class="fas fa-minus"></i>
                                </div>
                                <div class="accordion-panel active">
                                    <?php if ( ! empty( $spec_content ) ) : ?>
                                        <?php echo $spec_content; // Removed wp_kses_post to preserve table styles ?>
                                    <?php else : ?>
                                        <p><?php esc_html_e( 'Please add specification content in the editor.', 'Kinglab_Medika_Lestari' ); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

            </div>
        </div>
        </div>
        </div>
        <?php
    endwhile;
    ?>
</div>

<script>
function toggleProductAccordion(element) {
    element.classList.toggle('active');
    let panel = element.nextElementSibling;
    panel.classList.toggle('active');

    let icon = element.querySelector('i');
    if (element.classList.contains('active')) {
        icon.classList.replace('fa-plus', 'fa-minus');
    } else {
        icon.classList.replace('fa-minus', 'fa-plus');
    }
}

/* Product Media Slider */
let currentProductSlide = 0;
function goToProductSlide(index) {
    const track = document.getElementById('productSliderTrack');
    const thumbs = document.querySelectorAll('.product-gallery-thumbnails .gallery-thumb, .product-slider-thumbs .thumb-btn');
    if (!track) return;

    currentProductSlide = index;
    track.style.transform = 'translateX(-' + (index * 100) + '%)';

    thumbs.forEach(function(thumb, i) {
        if (i === index) {
            thumb.classList.add('active');
            if (typeof thumb.scrollIntoView === 'function') {
                thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
            }
        } else {
            thumb.classList.remove('active');
        }
    });

    // Pause video when switching away from video slide
    const iframe = document.getElementById('productVideoIframe');
    if (iframe && iframe.contentWindow) {
        iframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
    }
}

function moveProductSlide(direction) {
    const track = document.getElementById('productSliderTrack');
    if (!track) return;
    const slides = track.querySelectorAll('.product-slide');
    if (slides.length <= 1) return;

    let next = currentProductSlide + direction;
    if (next < 0) next = slides.length - 1;
    if (next >= slides.length) next = 0;

    goToProductSlide(next);
}

// Touch swipe support for mobile
(function() {
    const slider = document.getElementById('productMediaSlider');
    if (!slider) return;

    let startX = 0;
    let endX = 0;

    slider.addEventListener('touchstart', function(e) {
        startX = e.touches[0].clientX;
    }, { passive: true });

    slider.addEventListener('touchend', function(e) {
        endX = e.changedTouches[0].clientX;
        const diff = startX - endX;
        if (Math.abs(diff) > 40) {
            if (diff > 0) {
                moveProductSlide(1);
            } else {
                moveProductSlide(-1);
            }
        }
    }, { passive: true });
})();
</script>

<?php
get_footer();
