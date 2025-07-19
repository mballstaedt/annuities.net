<?php 
/**
 * The template for displaying pages.
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

                        get_template_part('partials/contents/content', 'page');
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