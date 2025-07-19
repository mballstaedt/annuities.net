<?php
/**
 * The default template for displaying Audio posts in list layout.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

$audio = writsy_get_meta(get_the_ID(), 'audio_file');
$embed = writsy_get_meta(get_the_ID(), 'audio_url');
$bg    = false;

if (! $audio && ! $embed) {
    return get_template_part('partials/contents/list-content');
}

if ($embed) {
    return get_template_part('partials/contents/list-content', 'audio-embed');
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('entry-alt'); ?>>
    <div class="entry-media">
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
                    <div class="column" data-mh="entry-list-column">
                        <div class="audio-player-thumbnail">
                            <?php the_post_thumbnail('writsy-square', array('alt' => the_title_attribute('echo=0'))); ?>
                            <span class="entry-media-button audio-player-button play"></span>
                        </div>
                    </div>

                    <div class="column" data-mh="entry-list-column">
                        <div class="audio-player-content">
                            <h2 class="audio-player-title entry-title">
                                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo esc_html($audio_title); ?></a>
                            </h2>

                            <p class="audio-player-meta"><?php esc_html_e('By', 'writsy'); ?> <?php echo esc_html($audio_artist); ?></p>

                            <?php echo wp_audio_shortcode(array('src' => esc_url($audio))); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
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