<?php
/**
 * The default template for displaying Gallery posts in grid layout.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

$gallery = writsy_get_meta(get_the_ID(), 'gallery');

if (! $gallery || ! preg_match('/\[gallery.*ids=.(.*).\]/', $gallery, $ids)) {
    return get_template_part('partials/contents/grid-content');
}

$view = writsy_get_meta(get_the_ID(), 'gallery_view', 'tile');
$ids  = explode(',', end($ids));
$ids  = array_map('absint', $ids);
$ids  = array_filter($ids, function ($id) {
    return 'publish' === get_post_status($id);
});
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry-grid'); ?> data-mh="entry-grid">
    <div class="entry-media">
        <?php if ($view == 'slider') : ?>
            <div class="entry-gallery image-slider">
                <?php foreach($ids as $id) : ?>
                    <div class="image-slide">
                        <?php echo wp_get_attachment_image($id, 'writsy-frame'); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="entry-gallery gallery">
                <?php
                $items = array_slice($ids, 0, 3);
                $rest  = count($ids) - 3;

                foreach ($items as $key => $item) {
                    $image = wp_get_attachment_image($item, 'thumbnail');

                    if ($key === 0) {
                        $class = 'gallery-item';
                    } else {
                        $class = 'gallery-item';
                    }

                    printf('<figure class="%1$s"><div class="gallery-icon"><a href="%2$s">%3$s %4$s</a></div></figure>',
                        esc_attr($class),
                        esc_url(get_the_permalink()),
                        $image,
                        ($rest && $item === end($items)) ? sprintf('<span class="gallery-more">%s+</span>', $rest) : ''
                    );
                }
                ?>
            </div>
        <?php endif; ?>
    </div>

    <header class="entry-header">
        <p class="entry-categories text-secondary"><?php echo get_the_category_list(', '); ?></p>

        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

        <p class="entry-meta">
            <span class="entry-author"><?php esc_html_e('By', 'writsy'); ?> <?php the_author_posts_link(); ?></span>
            <time class="entry-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
        </p>
    </header>

    <div class="entry-content">
        <p><?php echo writsy_excerpt(20, false); ?></p>
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
</article>