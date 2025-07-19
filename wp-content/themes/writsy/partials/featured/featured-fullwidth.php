<?php 
/**
 * The template for displaying featured post in slider fullwidth type.
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
    <div class="featured-fullwidth">
        <div class="featured-slider featured-slider-content">
            <?php foreach ($featured_posts as $post) : setup_postdata($post); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-media">
                        <?php
                        if (has_post_thumbnail($post->ID)) {
                            $bgset = array();

                            $small_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'writsy-monitor');
                            $large_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'writsy-monitor-2x');

                            if (is_array($small_image) && ! empty($small_image)) {
                                $bgset[] = $small_image[0] . ' ' . $small_image[1] . 'w';
                            }

                            if (is_array($large_image) && ! empty($large_image)) {
                                $bgset[] = $large_image[0] . ' ' . $large_image[1] . 'w';
                            }

                            printf('<div class="entry-media-cover lazyload" data-bgset="%s" data-sizes="auto"></div>' . "\n\t\t",
                                esc_attr(join(', ', $bgset))
                            );
                        }
                        else {
                            echo '<div class="entry-media-cover"></div>';
                        }
                        ?>
                    </div>

                    <header class="entry-header">
                        <p class="entry-categories text-secondary"><?php echo get_the_category_list(', '); ?></p>

                        <h2 class="entry-title h1">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h2>

                        <p class="entry-meta">
                            <span class="entry-author"><?php esc_html_e('By', 'writsy'); ?> <?php the_author_posts_link(); ?></span>
                            <time class="entry-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo get_the_date(); ?></time>
                        </p>
                    </header>
                </article>
            <?php endforeach; ?>
        </div>

        <nav class="featured-slider-nav">
            <?php foreach ($featured_posts as $order => $post ) : $categories = get_the_category($post->ID); ?>
               <div class="featured-slider-nav-item" data-mh="featured-slider-nav-item">
                   <span class="featured-slider-nav-item-category text-secondary"><?php echo esc_html(current($categories)->name); ?></span>
                   <span class="featured-slider-nav-item-title text-secondary"><?php echo esc_html($post->post_title); ?></span>
               </div>
            <?php endforeach; ?>
        </nav>
    </div>
</div>