<?php 
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title h2"><?php esc_html_e('Sorry, Nothing Found!', 'writsy'); ?></h1>
    </header>

    <div class="page-content">
        <?php if (is_search()) : ?>
            <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'writsy'); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'writsy'); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</section>