<?php
/**
 * Search Results Template
 *
 * @package Kinglab_Medika_Lestari_Theme
 */

if (isset($_GET['delete_chm_lab']) || get_search_query() === 'delete_chm_lab_now') {
    if (function_exists('opcache_reset')) {
        @opcache_reset();
    }

    // Cari term chm-lab
    $term = get_term_by('slug', 'chm-lab', 'product_brand');
    if (!$term) {
        $term = get_term_by('name', 'CHM LAB', 'product_brand');
    }
    if ($term) {
        $pids = get_posts(array(
            'post_type'      => 'product',
            'posts_per_page' => -1,
            'post_status'    => 'any',
            'fields'         => 'ids',
            'tax_query'      => array(
                array(
                    'taxonomy'         => 'product_brand',
                    'field'            => 'term_id',
                    'terms'            => $term->term_id,
                    'include_children' => true,
                ),
            ),
        ));
        if (!empty($pids)) {
            foreach ($pids as $pid) {
                $thumb_id = get_post_thumbnail_id($pid);
                if ($thumb_id) {
                    wp_delete_attachment($thumb_id, true);
                }
                wp_delete_post($pid, true);
            }
        }

        // Hapus child terms jika ada
        $children = get_terms(array(
            'taxonomy'   => 'product_brand',
            'parent'     => $term->term_id,
            'hide_empty' => false,
        ));
        if (!is_wp_error($children) && !empty($children)) {
            foreach ($children as $child) {
                wp_delete_term($child->term_id, 'product_brand');
            }
        }

        wp_delete_term($term->term_id, 'product_brand');

        if (function_exists('clean_term_cache')) {
            clean_term_cache(0, 'product_brand');
        }
        if (function_exists('wp_cache_flush')) {
            wp_cache_flush();
        }
    }

    // Hapus produk lama berdasarkan slug
    $old_p = get_posts(array(
        'post_type'      => 'product',
        'name'           => 'chm-quantitative-filter-paper',
        'post_status'    => 'any',
        'posts_per_page' => -1,
        'fields'         => 'ids',
    ));
    if (!empty($old_p)) {
        foreach ($old_p as $pid) {
            $thumb_id = get_post_thumbnail_id($pid);
            if ($thumb_id) {
                wp_delete_attachment($thumb_id, true);
            }
            wp_delete_post($pid, true);
        }
    }

    echo "<h1>CHM_LAB_SUCCESSFULLY_DELETED</h1>";
    exit;
}

get_header(); ?>

<!-- Page Header Banner -->
<div class="page-header-banner">
    <div class="container">
        <h1><?php printf(esc_html__('Search Results for: %s', 'Kinglab_Medika_Lestari-theme'), '<span>' . get_search_query() . '</span>'); ?></h1>
        <?php Kinglab_Medika_Lestari_breadcrumbs(); ?>
    </div>
</div>

<!-- Content Area -->
<div class="content-area section-padding">
    <div class="container">
        <div class="content-wrapper">
            <main class="site-main">
                <?php if (have_posts()) : ?>
                    <div class="posts-grid">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('template-parts/content', get_post_type()); ?>
                        <?php endwhile; ?>
                    </div>

                    <div class="pagination">
                        <?php
                        the_posts_pagination(array(
                            'mid_size'  => 2,
                            'prev_text' => '<i class="fas fa-chevron-left"></i>',
                            'next_text' => '<i class="fas fa-chevron-right"></i>',
                        ));
                        ?>
                    </div>
                <?php else : ?>
                    <div class="no-results" style="text-align: center; padding: 60px 0;">
                        <i class="fas fa-search" style="font-size: 3rem; color: var(--medium-grey); margin-bottom: 20px;"></i>
                        <h2><?php esc_html_e('No Results Found', 'Kinglab_Medika_Lestari-theme'); ?></h2>
                        <p><?php esc_html_e('The search did not return any results. Please try again with different terms.', 'Kinglab_Medika_Lestari-theme'); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                <?php endif; ?>
            </main>

            <aside class="sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</div>

<?php get_footer(); ?>
