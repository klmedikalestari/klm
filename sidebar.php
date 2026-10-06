<?php
/**
 * Sidebar Template
 *
 * @package Kinglab_Medika_Lestari_Theme
 */

if (!is_active_sidebar('sidebar-main')) {
    return;
}
?>

<?php dynamic_sidebar('sidebar-main'); ?>
