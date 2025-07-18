<?php 
/**
 * The template for displaying archive pages.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

$layout  = writsy_get_option('archives_post_layout', 'default');
$sidebar = writsy_get_option('archives_sidebar_position', 'right');

get_header();
?>

<div id="main-content" class="main-content sidebar-<?php echo esc_attr($sidebar); ?>">
    <div class="container">
        <div class="row">
            <div class="column column-medium-8<?php echo esc_attr($sidebar == 'left' ? ' column-medium-push-4' : ''); ?>">
                <div id="primary" class="content-area">
                    <header class="archive-header text-center">
                        <?php the_archive_title('<h1 class="archive-title striketrough-heading h5"><span>', '</span></h1>'); ?>
                    </header>

                    <?php
                    if (have_posts()) {
                        if ($layout == 'grid') {
                            echo '<div class="row">';
                        }

                        while (have_posts()) {
                            the_post();

                            if ($layout == 'grid') {
                                echo '<div class="column column-medium-6">';
                            }

                            if ($layout == 'grid') {
                                get_template_part('partials/contents/grid-content', get_post_format());
                            }
                            elseif ($layout == 'list' && ! in_array(get_post_format(), array('quote', 'link'))) {
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