<?php
/**
 * The template for displaying posts in Audio embeded format.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

$embed = writsy_get_meta(get_the_ID(), 'audio_url');

if (! $embed) {
    return get_template_part('partials/contents/content');
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('format-audio-embed'); ?>>
    <div class="entry-media">
        <?php if (is_sticky() && is_home() && ! is_paged()) : ?>
            <span class="sticky-post"><i class="fa fa-thumb-tack"></i></span>
        <?php endif; ?>
        
        <div class="entry-audio">
            <?php echo wp_oembed_get($embed, array('width' => 711, 'height' => 400)); ?>
        </div>
    </div>

    <header class="entry-header">
        <p class="entry-categories text-secondary"><?php echo get_the_category_list(' '); ?></p>

        <?php if (is_single()) : ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php else : ?>
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <?php endif; ?>

        <p class="entry-meta">
            <span class="entry-author"><?php esc_html_e('By', 'writsy'); ?> <?php the_author_posts_link(); ?></span>
            <time class="entry-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo get_the_date(); ?></time>
        </p>
    </header>

    <div class="entry-content">
        <?php
        if (is_search()) {
            the_excerpt();
        }
        else {
            the_content(sprintf(esc_html__('Continue reading %s', 'writsy'), '<i class="wi wi-arrow-right"></i>'));

            wp_link_pages(array(
                'before'      => '<div class="entry-page-links"><span class="page-links-title">' . esc_html__('Pages:', 'writsy') . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ));

            if (is_single()) {
                the_tags('<p class="entry-tags"><span class="entry-tags-label">' . esc_html__('Tags:', 'writsy') . '</span> ', ' ', '</p>');
            }
        }
        ?>
    </div>

    <footer class="entry-footer clearfix">
        <div class="pull-left">
            <?php
            if (function_exists('pvc_get_post_views')) {
                printf('<span class="entry-views-count"><i class="fa fa-eye"></i>%2$s <span>%3$s</span></span>',
                    esc_url(get_permalink()),
                    absint(pvc_get_post_views()),
                    _n('View', 'Views', absint(pvc_get_post_views()), 'writsy')
                );
            }
            
            if (! post_password_required() && (comments_open() || get_comments_number())) {
                echo '<span class="entry-comments-count">';
                comments_popup_link(
                    '<i class="fa fa-comment-o"></i>0 <span>' . esc_html__('Comments', 'writsy') . '</span>',
                    '<i class="fa fa-comment-o"></i>1 <span>' . esc_html__('Comment', 'writsy') . '</span>',
                    '<i class="fa fa-comment-o"></i>% <span>' . esc_html__('Comments', 'writsy') . '</span>'
                );
                echo '</span>';
            }
            ?>
        </div>

        <div class="pull-right">
             <?php echo writsy_share_post(); ?>
        </div>
    </footer>
</article>