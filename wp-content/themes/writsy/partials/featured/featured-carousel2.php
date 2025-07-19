<?php 
/**
 * The template for displaying featured post in slider carousel type.
 *
 * @package Writsy
 * @since   1.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

$featured_posts = writsy_get_featured_posts();

if (empty($featured_posts)) {
    return;
}
?>

<div class="featured-area">
    <div class="featured-carousel2">
        <div class="featured-slider">
            <?php foreach ($featured_posts as $post) : setup_postdata($post); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-mh="featured-carousel2">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="entry-media">
                            <figure class="entry-thumbnail">
                                <?php the_post_thumbnail('writsy-frame'); ?>
                            </figure>
                        </div>
                    <?php endif; ?>

                    <header class="entry-header">
                        <p class="entry-categories text-secondary"><?php echo get_the_category_list(', '); ?></p>

                        <h2 class="entry-title h5">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h2>

                        <p class="entry-meta">
                            <span class="entry-author"><?php esc_html_e('By', 'writsy'); ?> <?php the_author_posts_link(); ?></span>
                            <time class="entry-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                        </p>
                    </header>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</div>