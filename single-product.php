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
                    $video_url = get_post_meta( get_the_ID(), '_product_video_url', true );
                    if ( empty( $video_url ) && ( stripos( get_the_title(), 'FoodLab' ) !== false || stripos( get_the_title(), 'CDR' ) !== false ) ) {
                        $video_url = 'https://www.youtube.com/watch?v=8J3gxjpsM90';
                    }
                    $video_embed_url = '';
                    if ( ! empty( $video_url ) ) {
                        if ( function_exists( 'kinglab_get_youtube_embed_url' ) ) {
                            $video_embed_url = kinglab_get_youtube_embed_url( $video_url );
                        } else {
                            $video_embed_url = 'https://www.youtube-nocookie.com/embed/8J3gxjpsM90?rel=0&enablejsapi=1';
                        }
                    }
                    ?>
                    <div class="product-media-slider" id="productMediaSlider">
                        <div class="product-slider-wrapper">
                            <div class="product-slider-track" id="productSliderTrack">
                                <!-- Slide 1: Image -->
                                <div class="product-slide" data-slide="0">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail( 'large' ); ?>
                                    <?php else : ?>
                                        <div class="product-placeholder">
                                            <i class="fas fa-microscope"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Slide 2: YouTube Video -->
                                <?php if ( ! empty( $video_embed_url ) ) : ?>
                                    <div class="product-slide slide-video" data-slide="1">
                                        <div class="video-responsive-wrapper">
                                            <iframe 
                                                id="productVideoIframe"
                                                src="<?php echo esc_url( $video_embed_url ); ?>" 
                                                title="<?php echo esc_attr( get_the_title() . ' Video' ); ?>" 
                                                frameborder="0" 
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if ( ! empty( $video_embed_url ) ) : ?>
                                <!-- Arrows -->
                                <button type="button" class="slider-arrow-btn prev" onclick="moveProductSlide(-1)" aria-label="Previous">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button type="button" class="slider-arrow-btn next" onclick="moveProductSlide(1)" aria-label="Next">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            <?php endif; ?>
                        </div>

                        <?php if ( ! empty( $video_embed_url ) ) : ?>
                            <!-- Media Switcher Tabs -->
                            <div class="product-slider-thumbs">
                                <button type="button" class="thumb-btn active" onclick="goToProductSlide(0)">
                                    <i class="fas fa-image"></i>
                                    <span>Foto Produk</span>
                                </button>
                                <button type="button" class="thumb-btn" onclick="goToProductSlide(1)">
                                    <i class="fab fa-youtube"></i>
                                    <span>Video YouTube</span>
                                </button>
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
    const thumbs = document.querySelectorAll('.product-slider-thumbs .thumb-btn');
    if (!track) return;

    currentProductSlide = index;
    track.style.transform = 'translateX(-' + (index * 100) + '%)';

    thumbs.forEach(function(thumb, i) {
        if (i === index) {
            thumb.classList.add('active');
        } else {
            thumb.classList.remove('active');
        }
    });

    // Pause video when switching back to image slide
    if (index === 0) {
        const iframe = document.getElementById('productVideoIframe');
        if (iframe && iframe.contentWindow) {
            iframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        }
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
