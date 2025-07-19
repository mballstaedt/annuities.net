 <?php 
/**
 * The template for displaying the footer
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');
?>
        </main>

        <footer id="site-footer" class="site-footer" role="contentinfo">
            <?php get_sidebar('footer'); ?>

            <?php if(writsy_get_option('instagram_gallery') && shortcode_exists('incredibbble_instagram_feeds')) : ?>
                <?php
                $username = writsy_get_option('instagram_gallery_username');
                $maximum  = writsy_get_option('instagram_gallery_max', 12);
                $photos   = do_shortcode('[incredibbble_instagram_feeds username="' . esc_attr($username) . '" count="' . esc_attr($maximum) . '" size="standard_resolution" lazyload="1"]');
                ?>

                <?php if($photos) : ?>
                <div class="instagram-gallery">
                    <?php echo $photos; ?>

                    <a href="<?php echo esc_url('https://www.instagram.com/' . esc_html($username)); ?>" class="instagram-follow-button text-secondary">
                        <span><i class="fa fa-instagram"></i> <?php esc_html_e('Instagram', 'writsy') ?></span>
                    </a>
                </div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="site-info">
                <div class="container">
                    <?php
                    printf('<p>%1$s &copy; %2$s %3$s. <span>%4$s</span></p>',
                        esc_html__('Copyright', 'writsy'),
                        esc_html(date('Y')),
                        esc_html(get_bloginfo('name', 'display')),
                        wp_kses(writsy_get_option('footer_text'), array_merge(wp_kses_allowed_html(), array(
                            'br' => array(),
                            'i'  => array(
                                'class' => true
                            )
                        )))
                    );
                    ?>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>