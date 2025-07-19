<?php
/**
 * The template part for displaying related posts.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

$queryby = writsy_get_option('related_posts_by');
$args    = array(
    'post__not_in'   => array(get_the_ID()),
    'posts_per_page' => writsy_get_option('related_posts_max', 12),
    'post_status'    => 'publish',
    'ignore_sticky_posts' => true
);

if ($queryby == 'tags') {
    $args['tag__in'] = wp_get_post_tags(get_the_ID(), array('fields' => 'ids'));
}
else {
    $args['category__in'] = wp_get_post_categories(get_the_ID());
}

$related = new WP_Query($args);
?>

<?php if ($related->have_posts()) : ?>
    <div class="widget related-posts">
        <div class="related-posts-header text-center">
            <h3 class="widget-title related-posts-title h5">
                <span><?php echo esc_html(writsy_get_option('related_posts_title', __('Related Posts', 'writsy'))); ?></span>
            </h3>
        </div>

        <div class="posts-list posts-list-vertical row">
            <?php while($related->have_posts()) : $related->the_post(); ?>
                <div class="posts-list-item column column-xsmall-6 column-small-4">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="posts-list-item-thumbnail">
                            <?php the_post_thumbnail('writsy-frame', array('alt' => the_title_attribute('echo=0'))); ?>
                        </a>
                    <?php endif; ?>

                    <div class="posts-list-item-content">
                        <h4 class="posts-list-item-title h5">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h4>

                        <div class="posts-list-item-meta">
                            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    
    <?php wp_reset_postdata(); ?>
<?php endif; ?>