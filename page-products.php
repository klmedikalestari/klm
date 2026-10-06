<?php
/**
 * Template Name: Product Page
 * 
 * @package Kinglab_Medika_Lestari_Theme
 */

get_header(); ?>

<div class="page-header">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <?php the_title(); ?>
        </div>
    </div>
</div>

<section class="products-section">
    <div class="container">
        <div class="product-nav-card">
            <div class="product-nav-grid">
                <!-- By Brand Column -->
                <div class="nav-vertical-divider">
                    <h3 class="nav-group-title"><?php esc_html_e('By Brand', 'Kinglab_Medika_Lestari'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'by_brand',
                        'container'      => false,
                        'menu_class'     => 'nav-list',
                        'fallback_cb'    => function() {
                            echo '<ul class="nav-list">';
                            echo '<li><a href="#">ACDBio</a></li>';
                            echo '<li><a href="#">Agilent</a></li>';
                            echo '<li><a href="#">Airtech</a></li>';
                            echo '<li><a href="#">Asecos</a></li>';
                            echo '<li><a href="#">Bio-Bottle</a></li>';
                            echo '<li><a href="#">Biolasco</a></li>';
                            echo '<li><a href="#">BioNavis</a></li>';
                            echo '<li><a href="#">Capsovision</a></li>';
                            echo '<li><a href="#">Dynex Technologies</a></li>';
                            echo '<li><a href="#">Finnpipette</a></li>';
                            echo '<li><a href="#">Global DX</a></li>';
                            echo '<li><a href="#">Honeywell</a></li>';
                            echo '<li><a href="#">Hygiena</a></li>';
                            echo '<li><a href="#">IDEXX</a></li>';
                            echo '<li><a href="#">Interscience</a></li>';
                            echo '<li><a href="#">LI-COR</a></li>';
                            echo '</ul>';
                        },
                    ));
                    ?>
                </div>

                <!-- By Industry Column -->
                <div class="nav-industry-col">
                    <h3 class="nav-group-title"><?php esc_html_e('By Industry', 'Kinglab_Medika_Lestari'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'by_industry',
                        'container'      => false,
                        'menu_class'     => 'nav-list',
                        'fallback_cb'    => function() {
                            echo '<ul class="nav-list">';
                            echo '<li><a href="#">Animal Health</a></li>';
                            echo '<li><a href="#">Hospital</a></li>';
                            echo '<li><a href="#">Industry</a></li>';
                            echo '<li><a href="#">Life Science</a></li>';
                            echo '</ul>';
                        },
                    ));
                    ?>
                </div>
            </div>

            <!-- Page Content if any -->
            <div class="product-page-content" style="margin-top: 50px;">
                <?php
                while ( have_posts() ) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
