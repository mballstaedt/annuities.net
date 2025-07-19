<?php
/**
 * The template for displaying posts in Gallery format.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

$gallery = writsy_get_meta(get_the_ID(), 'gallery');

if (! $gallery || ! preg_match('/\[gallery.*ids=.(.*).\]/', $gallery, $ids)) {
    return get_template_part('partials/contents/content');
}

$view = writsy_get_meta(get_the_ID(), 'gallery_view', 'tile');
$ids  = explode(',', end($ids));
$ids  = array_map('absint', $ids);
$ids  = array_filter($ids, function ($id) {
    return 'publish' === get_post_status($id);
});
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if(! empty($ids)) : ?>
        <div class="entry-media">
            <?php if (is_sticky() && is_home() && ! is_paged()) : ?>
                <span class="sticky-post"><i class="fa fa-thumb-tack"></i></span>
            <?php endif; ?>
        
            <?php if ($view == 'slider') : ?>
                <div class="entry-gallery image-slider">
                    <?php foreach($ids as $id) : ?>
                        <div class="image-slide">
                            <?php echo wp_get_attachment_image($id, 'writsy-monitor'); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="entry-gallery gallery">
                    <?php if (is_single()) : ?>
                        <?php
                        $large = get_post(current($ids));
                        $large_image = wp_get_attachment_image($large->ID, 'writsy-monitor');
                        $large_caption = empty($large->post_excerpt) ? '' : '<figcaption class="gallery-caption">' . $large->post_excerpt . '</figcaption>';

                        printf('<figure class="gallery-item large" data-mh="galery-item"><div class="gallery-icon"><a href="%1$s">%2$s</a></div> %3$s</figure>',
                            esc_url($large->guid),
                            $large_image,
                            $large_caption
                        );

                        $rest = array_chunk(array_slice($ids, 1), 2);

                        foreach ($rest as $order => $row) {
                            $isOdd = ($order % 2 != 0) ? true : false;

                            foreach ($row as $key => $item) {
                                $item    = get_post($item);
                                $caption = empty($item->post_excerpt) ? '' : '<figcaption class="gallery-caption">' . $item->post_excerpt . '</figcaption>';

                                if ($isOdd) {
                                    if ($key === 0) {
                                        $class = 'small';
                                        $image = wp_get_attachment_image($item->ID, 'thumbnail');
                                    }
                                    else {
                                        $class = 'medium';
                                        $image = wp_get_attachment_image($item->ID, 'writsy-monitor');
                                    }
                                }
                                else {
                                    if ($key === 0) {
                                        $class = 'medium';
                                        $image = wp_get_attachment_image($item->ID, 'writsy-monitor');
                                    }
                                    else {
                                        $class = 'small';
                                        $image = wp_get_attachment_image($item->ID, 'thumbnail');
                                    }
                                }

                                printf('<figure class="gallery-item %1$s" data-mh="galery-item"><div class="gallery-icon"><a href="%2$s">%3$s</a></div> %4$s</figure>',
                                    esc_attr($class),
                                    esc_url($item->guid),
                                    $image,
                                    $caption
                                );
                            }
                        }
                        ?>
                    <?php else: ?>
                        <?php
                        $items = array_slice($ids, 0, 5);
                        $rest  = count($ids) - 5;

                        foreach ($items as $key => $item) {
                            if ($key === 0) {
                                $class = 'gallery-item large';
                                $image = wp_get_attachment_image($item, 'writsy-monitor');
                            } else {
                                $class = 'gallery-item mini';
                                $image = wp_get_attachment_image($item, 'writsy-frame');
                            }

                            printf('<figure class="%1$s"><div class="gallery-icon"><a href="%2$s">%3$s %4$s</a></div></figure>',
                                esc_attr($class),
                                get_the_permalink(),
                                $image,
                                ($rest && $item === end($items)) ? sprintf('<span class="gallery-more">%s+</span>', absint($rest)) : ''
                            );
                        }
                        ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <header class="entry-header">
        <p class="entry-categories text-secondary"><?php echo get_the_category_list(', '); ?></p>

        <?php if (is_single()) : ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php else : ?>
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <?php endif; ?>

        <p class="entry-meta">
            <span class="entry-author"><?php esc_html_e('By', 'writsy'); ?> <?php the_author_posts_link(); ?></span>
            <time class="entry-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
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