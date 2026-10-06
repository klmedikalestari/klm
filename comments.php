<?php
/**
 * Comments Template
 *
 * @package Kinglab_Medika_Lestari_Theme
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h3 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            printf(
                esc_html(_n('%d Comment', '%d Comments', $comment_count, 'Kinglab_Medika_Lestari-theme')),
                $comment_count
            );
            ?>
        </h3>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 50,
            ));
            ?>
        </ol>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>

    <?php
    comment_form(array(
        'class_submit'  => 'submit btn btn-primary',
        'title_reply'   => __('Leave a Comment', 'Kinglab_Medika_Lestari-theme'),
        'label_submit'  => __('Post Comment', 'Kinglab_Medika_Lestari-theme'),
    ));
    ?>
</div>
