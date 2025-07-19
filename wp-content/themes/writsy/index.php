<?php 
/**
 * The main template file.
 *
 * @package Writsy
 * @since   1.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

$layout  = writsy_get_option('homepage_post_layout', 'default');
$sidebar = writsy_get_option('homepage_sidebar_position', 'right');
$slider  = writsy_get_option('featured_posts_slider_type', 'boxed');

get_header();

if (is_home() || is_front_page()) {
    if (writsy_get_option('featured_posts_slider')) {
        get_template_part('partials/featured/featured', $slider);
    }
    
    if (writsy_get_option('recommended_posts')) {
        get_template_part('partials/recommended', 'posts');
    }
}
?>

<div id="main-content" class="main-content sidebar-<?php echo esc_attr($sidebar); ?>">
    <div class="container">
        <div class="row">
            <div class="column column-medium-8<?php echo esc_attr($sidebar == 'left' ? ' column-medium-push-4' : ''); ?>">
                <div id="primary" class="content-area">
                    <?php
                    if (have_posts()) {
                        if ($layout == 'grid') {
                            echo '<div class="row">';
                        }

                        while (have_posts()) {
                            the_post();

                            if ($layout == 'grid') {
                                echo '<div class="column' . esc_attr(((is_sticky() && is_home() && ! is_paged()) ? ' column-medium-12' : ' column-medium-6')) . '">';
                            }

                            if ($layout == 'grid' && ! (is_sticky() && is_home() && ! is_paged())) {
                                get_template_part('partials/contents/grid-content', get_post_format());
                            }
                            elseif ($layout == 'list' && ! is_sticky() && ! in_array(get_post_format(), array('quote', 'link'))) {
                                get_template_part('partials/contents/list-content', get_post_format());
                            }
                            else {
                                get_template_part('partials/contents/content', get_post_format());
                            }

                            if ($layout == 'grid') {
                                echo '</div>';
                            }
                        }

                        if ($layout == 'grid') {
                            echo '</div>';
                        }

                        the_posts_pagination( array(
                            'prev_text' => '<i class="wi wi-arrow-left"></i> ' . esc_html__('Newer Posts', 'writsy'),
                            'next_text' => esc_html__('Older Posts', 'writsy') . ' <i class="wi wi-arrow-right"></i>',
                        ) );
                    }
                    else {
                        get_template_part('partials/contents/content', 'none');
                    }
                    ?>
                </div>
            </div>

            <div class="column column-medium-4<?php echo esc_attr($sidebar == 'left' ? ' column-medium-pull-8' : ''); ?>">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>