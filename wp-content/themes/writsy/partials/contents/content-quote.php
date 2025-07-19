<?php
/**
 * The template for displaying posts in Quote format.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

$quote = writsy_get_meta(get_the_ID(), 'quote_text');
$bg    = false;

if (! $quote) {
    get_template_part('partials/contents/content');
    return;
}

if (is_single() && has_post_thumbnail()) {
    $bgset = array();

    $small_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'writsy-monitor-small');
    $large_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'writsy-monitor');

    if (is_array($small_image) && ! empty($small_image)) {
        $bgset[] = $small_image[0] . ' ' . $small_image[1] . 'w';
    }

    if (is_array($large_image) && ! empty($large_image)) {
        $bgset[] = $large_image[0] . ' ' . $large_image[1] . 'w';
    }

    $bg = esc_attr(join(', ', $bgset));
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
    <div class="card-media entry-media">
        <?php if ($bg): ?>
            <div class="entry-media-cover lazyload" data-bgset="<?php echo esc_attr($bg) ?>" data-sizes="auto"></div>
        <?php endif ?>

        <a href="<?php the_permalink(); ?>" class="entry-quote">
            <blockquote>
                <p><?php echo esc_html($quote); ?></p>

                <?php if($author = writsy_get_meta(get_the_ID(), 'quote_author')) : ?>
                    <cite>
                        <strong><?php echo esc_html($author); ?></strong>

                        <?php if($author_subtitle = writsy_get_meta(get_the_ID(), 'quote_author_subtitle')) : ?>
                            <em><?php echo esc_html($author_subtitle); ?></em>
                        <?php endif; ?>
                    </cite>
                <?php endif; ?>
            </blockquote>
        </a>
    </div>

    <?php if(is_single()) : ?>
        <header class="entry-header">
            <p class="entry-categories text-secondary"><?php echo get_the_category_list(', '); ?></p>

            <h1 class="entry-title"><?php the_title(); ?></h1>

            <p class="entry-meta">
                <span class="entry-author"><?php esc_html_e('By', 'writsy'); ?> <?php the_author_posts_link(); ?></span>
                <time class="entry-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
            </p>
        </header>

        <div class="entry-content">
            <?php
            the_content();

            wp_link_pages(array(
                'before'      => '<div class="entry-page-links"><span class="page-links-title">' . esc_html__('Pages:', 'writsy') . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ));

            the_tags('<p class="entry-tags"><span class="entry-tags-label">' . esc_html__('Tags:', 'writsy') . '</span> ', ' ', '</p>');
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
    <?php endif; ?>
</article>