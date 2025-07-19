<?php
/**
 * The default template for displaying content.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="entry-media">
            <?php if (is_sticky() && is_home() && ! is_paged()) : ?>
                <span class="sticky-post"><i class="fa fa-thumb-tack"></i></span>
            <?php endif; ?>

            <?php if (is_single()) :?>
                <figure class="entry-thumbnail">
                    <?php the_post_thumbnail('writsy-monitor'); ?>
                </figure>
            <?php else : ?>
                <a href="<?php the_permalink(); ?>" class="entry-thumbnail">
                    <?php the_post_thumbnail('writsy-monitor', array('alt' => the_title_attribute('echo=0'))); ?>
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <header class="entry-header">
        <?php if ('post' === get_post_type()) : ?>
            <p class="entry-categories text-secondary"><?php echo get_the_category_list(' '); ?></p>
        <?php endif; ?>
        
        <?php if (is_single()) : ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php else : ?>
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <?php endif; ?>

        <?php if ('post' === get_post_type()) : ?>
            <p class="entry-meta">
                <span class="entry-author"><?php esc_html_e('By', 'writsy'); ?> <?php the_author_posts_link(); ?></span>
                <time class="entry-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
            </p>
        <?php endif; ?>
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