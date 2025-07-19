<?php
/**
 * Template Name: Fullwidth Template 
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

get_header();
?>

<div id="main-content" class="main-content">
    <div class="container">
        <div id="primary" class="content-area">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="row">
                            <div class="column column-medium-6">
                                <div class="entry-media" data-mh="page-column">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $bgset = array();

                                        $small_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'writsy-square');
                                        $large_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'writsy-square-2x');

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
                            </div>

                            <div class="column column-medium-6" data-mh="page-column">
                    <?php endif; ?>

                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>

                    <div class="entry-content clearfix">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before'      => '<div class="entry-page-links"><span class="page-links-title">' . esc_html__('Pages:', 'writsy') . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                        ));
                        ?>
                    </div>

                    <?php if (has_post_thumbnail()) : ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>