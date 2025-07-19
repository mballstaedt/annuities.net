<?php
/**
 * The template part for displaying recommended posts.
 *
 * @package Writsy
 * @since   1.0.0
 */

$args = array(
    'posts_per_page' => writsy_get_option('recommended_posts_max', 12),
    'cat'            => writsy_get_option('recommended_posts_category', false),
    'order'          => writsy_get_option('recommended_posts_order', 'DESC'),
    'orderby'        => writsy_get_option('recommended_posts_orderby', 'comment_count'),
    'post_status'    => 'publish',
    'ignore_sticky_posts' => true
);

if (writsy_get_option('recommended_posts_image_only', true)) {
    $args['meta_key'] = '_thumbnail_id';
}

$recommended = new WP_Query($args);
?>

<?php if ($recommended->have_posts()) : ?>
    <div class="widget recommended-posts">
        <div class="container">
            <h1 class="widget-title recommended-posts-title h2">
                <span><?php echo esc_html(writsy_get_option('recommended_posts_title', __('Recommended', 'writsy'))); ?></span>
            </h1>

            <div class="posts-list posts-list-vertical row">
                <?php while($recommended->have_posts()) : $recommended->the_post(); ?>
                    <div class="posts-list-item column column-xsmall-6 column-medium-3">
                        <a href="<?php the_permalink(); ?>" class="posts-list-item-thumbnail">
                            <?php the_post_thumbnail('writsy-frame', array('alt' => the_title_attribute('echo=0'))); ?>
                        </a>

                        <div class="posts-list-item-content">
                            <h2 class="posts-list-item-title h5">
                                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                            </h2>

                            <div class="posts-list-item-meta">
                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>