<?php 
/**
 * The template for displaying comments.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php
    $commenter = wp_get_current_commenter();
    $required  = get_option('require_name_email');
    $aria_req  = $required ? ' aria-required="true"' : '';
    $html_req  = $required ? ' required="required"' : '';

    $fields = array(
        'author' => '<div class="row"><div class="column column-medium-6"><p class="comment-form-author"><label for="author" class="screen-reader-text">' . esc_html__('Name', 'writsy') . '</label>' .
                    '<input type="text" id="author" name="author" value="' . esc_attr($commenter['comment_author']) . '" placeholder="' . esc_attr('Name', 'writsy') . '"' . $aria_req . $html_req  . '></p>',
        'email'  => '</div><div class="column column-medium-6"><p class="comment-form-email"><label for="email" class="screen-reader-text">' . esc_html__('Email', 'writsy') . '</label>' .
                    '<input type="email" id="email" name="email" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="' . esc_attr__('Email Address', 'writsy') . '" aria-describedby="email-notes"' . $aria_req . $html_req  . '></p></div></div>',
        'url'    => '<p class="comment-form-url"><label for="url" class="screen-reader-text">' . esc_html__('Website', 'writsy') . '</label>' .
                    '<input type="url" id="url" name="url" value="' . esc_attr($commenter['comment_author_url']) . '" placeholder="' . esc_attr__('Website', 'writsy') . '"></p>',
    );

    comment_form(array(
        'comment_notes_before' => null,
        'fields'               => $fields,
        'comment_field'        => '<p class="comment-form-comment"><label for="comment" class="screen-reader-text">' . esc_html__('Comment', 'writsy') . '</label> <textarea id="comment" name="comment" rows="5" placeholder="' . esc_attr__('Type your comment here &hellip;', 'writsy') . '" aria-required="true" required="required"></textarea></p>',
        'class_submit'         => 'button button-primary',
        'title_reply'          => esc_html__('Leave a Comment', 'writsy'),
        'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title h5">',
        'title_reply_after'    => '</h3>',
    ));
    ?>

    <?php if (have_comments()) : ?>
        <h3 class="comment-title h5">
            <?php
            printf('%1$s (%2$s)',
                esc_html__('Comments', 'writsy'),
                esc_html(get_comments_number())
            )
            ?>
        </h3>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 70,
            ));
            ?>
        </ol>

        <?php
        the_comments_navigation(array(
            'prev_text' => '<i class="wi wi-arrow-left"></i> ' . esc_html__('Older Comments', 'writsy'),
            'next_text' => esc_html__('Newer Comments', 'writsy') . ' <i class="wi wi-arrow-right"></i>',
        ));
        ?>
    <?php endif; ?>
</div>