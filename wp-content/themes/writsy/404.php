<?php 
/**
 * The template for displaying 404 page (not found).
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

get_header();
?>

<div id="main-content" class="main-content">
    <div class="container">
        <div id="primary" class="content-area">
            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title h2"><?php esc_html_e('Page not found!', 'writsy') ?></h1>
                </header>

                <div class="page-content">
                    <?php
                    printf('<p>%s</p>', sprintf(esc_html__('It seems we can\'t find what you\'re looking for. Perhaps searching can help or go back to %s', 'writsy'),
                        sprintf('<a href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html__('Homepage', 'writsy'))
                    ));

                    get_search_form();
                    ?>
                </div>
            </section>
        </div>
    </div>
</div>

<?php get_footer(); ?>