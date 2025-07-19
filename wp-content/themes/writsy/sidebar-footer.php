<?php 
/**
 * The template for displaying footer widgets area.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

if (! is_active_sidebar('sidebar-2') && ! is_active_sidebar('sidebar-3')) {
    return;
}
?>

<div class="footer-widgets widget-area">
    <div class="container">
        <div class="row row-collapsed">
            <div class="column column-medium-4" data-mh="footer-widget-column">
                <div class="footer-widgets-left">
                    <?php if (is_active_sidebar('sidebar-2')) : ?>
                        <?php dynamic_sidebar('sidebar-2'); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="column column-medium-4 column-medium-push-4" data-mh="footer-widget-column">
                <div class="footer-widgets-right">
                    <?php if (is_active_sidebar('sidebar-3')) : ?>
                        <?php dynamic_sidebar('sidebar-3'); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="column column-medium-4 column-medium-pull-4" data-mh="footer-widget-column">
                <div class="footer-widgets-middle site-brand">
                    <div class="widget">
                        <?php 
                        if ($logo = writsy_get_option('logo')) {
                            printf('<a href="%1$s" class="site-logo" rel="home"><img src="%2$s" alt="%3$s"></a>',
                                esc_url(home_url('/')),
                                esc_url($logo),
                                esc_attr(get_bloginfo('name', 'display'))
                            );
                        }
                        else {
                            printf('<p class="site-title h1"><a href="%1$s" rel="home"><span>%2$s</span></a></p>',
                                esc_url(home_url('/')),
                                esc_html(get_bloginfo('name', 'display'))
                            );
                        }

                        if (writsy_get_option('tagline', true)) {
                            printf('<p class="site-description">%s</p>',
                                esc_html(get_bloginfo('description', 'display'))
                            );
                        }

                        if (writsy_get_option('social_footer', true)) {
                            get_template_part('partials/social', 'buttons');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>