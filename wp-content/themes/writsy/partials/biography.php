<?php 
/**
 * The template part for displaying an Author biography.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');
?>

<div class="author-info clearfix">
    <div class="author-avatar">
        <?php echo get_avatar(get_the_author_meta('user_email'), 100, ''); ?>
    </div>

    <div class="author-description">
        <h2 class="author-title h5"><?php the_author_posts_link(); ?></h2>

        <p class="author-bio">
            <?php the_author_meta('description'); ?>
            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="author-link" rel="author">
                <?php esc_html_e('View all posts', 'writsy'); ?>
            </a>
        </p>

        <ul class="author-links">
            <?php
            foreach (writsy_social_brands() as $key => $value) {
                if ($url = get_user_meta(get_the_author_meta('ID'), $key, true)) {
                    printf('<li><a href="%1$s" rel="nofollow">%2$s</a></li>' . "\n",
                        esc_url($url),
                        wp_kses($value['icon'], array(
                            'i'  => array(
                                'class' => true
                            )
                        ))
                    );
                }
            }
            ?>
        </ul>
    </div>
</div>