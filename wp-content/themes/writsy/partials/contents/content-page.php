<?php
/**
 * The default template for displaying pages.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="entry-media">
            <figure class="entry-thumbnail">
                <?php the_post_thumbnail('writsy-monitor'); ?>
            </figure>
        </div>
    <?php endif; ?>
    
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>

    <div class="entry-content">
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
</article>