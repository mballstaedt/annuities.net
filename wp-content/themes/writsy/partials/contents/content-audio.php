<?php
/**
 * The template for displaying posts in Aduio format.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

$audio = writsy_get_meta(get_the_ID(), 'audio_file');
$embed = writsy_get_meta(get_the_ID(), 'audio_url');
$bg    = false;

if (! $audio && ! $embed) {
    return get_template_part('partials/contents/content');
}

if ($embed) {
    return get_template_part('partials/contents/content', 'audio-embed');
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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-media">
        <?php if ($bg): ?>
            <div class="entry-media-cover lazyload" data-bgset="<?php echo esc_attr($bg) ?>" data-sizes="auto"></div>
        <?php endif ?>

        <div class="entry-audio">
            <?php if ($audio) : ?>
                <?php 
                $audio_id     = writsy_get_attachment_id_from_url($audio);
                $audio_meta   = wp_get_attachment_metadata($audio_id);
                $audio_title  = get_the_author_posts_link();
                $audio_artist = get_the_author();

                if (! empty($audio_meta['title'])) {
                    $audio_title = $audio_meta['title'];
                }

                if (! empty($audio_meta['artist'])) {
                    $audio_artist = $audio_meta['artist'];
                }
                ?>
                <div class="audio-player">
                    <div class="column" data-mh="audio-player">
                        <div class="audio-player-thumbnail">
                            <?php the_post_thumbnail('writsy-square', array('alt' => the_title_attribute('echo=0'))); ?>
                            <span class="entry-media-button audio-player-button play"></span>
                        </div>
                    </div>

                    <div class="column" data-mh="audio-player">
                        <div class="audio-player-content">
                            <h2 class="audio-player-title entry-title">
                                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo esc_html($audio_title); ?></a>
                            </h2>

                            <p class="audio-player-meta"><?php esc_html_e('By', 'writsy'); ?> <?php echo esc_html($audio_artist); ?></p>

                            <?php echo wp_audio_shortcode(array('src' => esc_url($audio))); ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>

            <?php endif; ?>
        </div>
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
    <?php endif; ?>

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