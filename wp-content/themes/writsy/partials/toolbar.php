<?php 
/**
 * The template for toolbar/menu bar on mobile and tablet view.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');
?>

<div class="site-toolbar">
    <div class="site-toolbar-item">
        <a href="#menu-dialog" class="button site-toolbar-button" data-toggle="dialog">
            <i class="fa fa-bars"></i>
        </a>

        <div id="menu-dialog" class="dialog dialog-fullscreen dialog-slide-from-right sidenav">
            <div class="dialog-overlay"></div>
            
            <div class="dialog-inner">
                <div class="dialog-content">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'  => 'main',
                        'menu_class'      => 'nav',
                        'fallback_cb'     => false
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="site-toolbar-item pull-right">
        <a href="#search-dialog" class="button site-toolbar-button" data-toggle="dialog">
            <i class="fa fa-search"></i>
        </a>

        <div id="search-dialog" class="dialog">
            <div class="dialog-overlay"></div>
            
            <div class="dialog-inner">
                <div class="dialog-header">
                    <h5 class="dialog-title"><span><?php esc_html_e('Search This Site', 'writsy') ?></span></h5>
                    <span class="dialog-close"><i class="wi wi-times"></i></span>
                </div>

                <div class="dialog-content">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="site-toolbar-item pull-right">
        <a href="#share-blog-dialog" class="button site-toolbar-button" data-toggle="dialog">
            <i class="fa fa-share-alt"></i>
        </a>

        <div id="share-blog-dialog" class="dialog">
            <div class="dialog-overlay"></div>
            
            <div class="dialog-inner">
                <div class="dialog-header">
                    <h5 class="dialog-title"><span><?php esc_html_e('Share this Blog', 'writsy') ?></span></h5>
                    <span class="dialog-close"><i class="wi wi-times"></i></span>
                </div>

                <div class="dialog-content">
                    <ul class="share-blog">
                        <?php
                        echo writsy_share_links(array(
                            'pattern' => '<li>%s</li>',
                            'url'     => esc_url(home_url()),
                            'text'    => esc_html(get_bloginfo('name', 'display') . ' - ' . get_bloginfo('description', 'display'))
                        ));
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>