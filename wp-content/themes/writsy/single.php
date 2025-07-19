<?php 
/**
 * The template for displaying a single post.
 *
 * @package Writsy
 * @since   1.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

$sidebar = writsy_get_option('single_sidebar_position', 'right');

get_header();
?>

<div id="main-content" class="main-content sidebar-<?php echo esc_attr($sidebar); ?>">
    <div class="container">
        <div class="row">
            <div class="column column-medium-8<?php echo esc_attr($sidebar == 'left' ? ' column-medium-push-4' : ''); ?>">
                <div id="primary" class="content-area">
                    <?php 
                    while (have_posts()) {
                        the_post();

                        get_template_part('partials/contents/content', get_post_format());
                    }

                    the_post_navigation(array(
                        'prev_text' => '<i class="wi wi-arrow-left"></i> ' . esc_html__('Prev Post', 'writsy'),
                        'next_text' => esc_html__('Next Post', 'writsy') . ' <i class="wi wi-arrow-right"></i>',
                    ));

                    get_template_part('partials/biography');

                    if (writsy_get_option('related_posts')) {
                        get_template_part('partials/related', 'posts');
                    }

                    if (comments_open() || get_comments_number()) {
                        comments_template();
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