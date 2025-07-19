<?php
/**
 * The default template for displaying embeded Audio posts in list layout.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

$embed = writsy_get_meta(get_the_ID(), 'audio_url');

if (! $embed) {
    return get_template_part('partials/contents/list-content');
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry-alt format-audio-embed'); ?>>
    <div class="column" data-mh="entry-list-column">
        <div class="entry-media">
            <div class="entry-audio">
                <?php echo wp_oembed_get(esc_url($embed), array('width' => 270, 'height' => 270)); ?>
            </div>
        </div>
    </div>

    <div class="column" data-mh="entry-list-column">
        <header class="entry-header">
            <?php if ('post' === get_post_type()) : ?>
                <p class="entry-categories text-secondary"><?php echo get_the_category_list(', '); ?></p>
            <?php endif; ?>
            
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

            <?php if ('post' === get_post_type()) : ?>
                <p class="entry-meta">
                    <span class="entry-author"><?php esc_html_e('By', 'writsy'); ?> <?php the_author_posts_link(); ?></span>
                    <time class="entry-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                </p>
            <?php endif; ?>
        </header>

        <div class="entry-content">
            <p><?php echo writsy_excerpt(25, false); ?></p>
        </div>

        <footer class="entry-footer clearfix">
            <div class="pull-left">
                <?php echo writsy_more_link(sprintf(esc_html__('Read More %s', 'writsy'), '<i class="wi wi-arrow-right"></i>'), false); ?>
            </div>

            <div class="pull-right">
                <?php
                if (function_exists('pvc_get_post_views')) {
                    printf('<span class="entry-views-count"><i class="fa fa-eye"></i>%1$s</span>',
                        absint(pvc_get_post_views())
                    );
                }
                
                if (! post_password_required() && (comments_open() || get_comments_number())) {
                    echo '<span class="entry-comments-count">';
                    comments_popup_link(
                        '<i class="fa fa-comment-o"></i>0',
                        '<i class="fa fa-comment-o"></i>1',
                        '<i class="fa fa-comment-o"></i>%'
                    );
                    echo '</span>';
                }

                echo writsy_share_post('entry-share-links-dropdown');
                ?>
            </div>
        </footer>
    </div>
</article>