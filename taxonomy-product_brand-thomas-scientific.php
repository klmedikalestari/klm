<?php
/**
 * Taxonomy Template for Brand: Thomas Scientific
 * Displays the specialized Wiley Mill Showcase
 * 
 * @package Kinglab_Medika_Lestari_Theme
 */

get_header();

$template_file = get_template_directory() . '/template-parts/thomas-scientific-showcase.php';
if (file_exists($template_file)) {
    include $template_file;
} else {
    get_template_part('template-parts/thomas-scientific-showcase');
}

get_footer();
