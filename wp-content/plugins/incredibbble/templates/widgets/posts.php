<?php

defined('ABSPATH') or die('Cheatin\' Uh?');

$query = array(
    'order'          => $instance['order'],
    'orderby'        => $instance['orderby'],
    'posts_per_page' => $instance['count'],
    'post_status'    => 'publish',
    'ignore_sticky_posts' => true,
);

if ($instance['exclude_no_image']) {
    $query['meta_key'] = '_thumbnail_id';
}

$posts = new WP_Query($query);

?>
<?php if ($posts->have_posts()) : ?>
    <?php echo $args['before_widget']; ?>
        <?php echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title']; ?>

        <ol class="posts-list">
        <?php while($posts->have_posts()) : $posts->the_post(); ?>
            <li class="posts-list-item">
                <a href="<?php the_permalink(); ?>" class="posts-list-item-thumbnail lazy-load">
                    <?php echo apply_filters('incredibbble_posts_widget_list_item_thumbnail', get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('alt' => the_title_attribute('echo=0')))); ?>
                </a>

                <div class="posts-list-item-content">
                    <h5 class="posts-list-item-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h5>
                    <div class="posts-list-item-meta">
                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo get_the_date(); ?></time>
                    </div>
                </div>
            </li>
        <?php endwhile; ?>
        </ol>

    <?php echo $args['after_widget']; ?>
<?php endif; ?>

<?php wp_reset_postdata(); ?>