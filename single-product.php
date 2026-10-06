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
                    <!-- Left: Project Image -->
                    <div class="product-featured-image">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'large' ); ?>
                        <?php else : ?>
                            <div class="product-placeholder">
                                <i class="fas fa-microscope"></i>
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
                                        <?php echo wp_kses_post( $spec_content ); ?>
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
</script>

<?php
get_footer();
