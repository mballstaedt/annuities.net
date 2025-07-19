<?php 
/**
 * The template part for displaying newsletter subscription dialog.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

if (! $form = get_option('mc4wp_default_form_id')) {
    return;
}
?>

<div class="newsletter-subscription">
    <a href="#newsletter-subscription-dialog" class="newsletter-button button button-secondary" data-toggle="dialog"><?php esc_html_e('Subscribe', 'writsy') ?></a>

    <div id="newsletter-subscription-dialog" class="dialog">
        <div class="dialog-overlay"></div>
        <span class="dialog-close"><i class="wi wi-times"></i></span>
        
        <div class="dialog-inner text-center">
            <div class="dialog-content">
                <h1 class="striketrough-heading">
                    <span><?php echo esc_html(writsy_get_option('newsletter_dialog_title', __('Newsletter', 'writsy'))); ?></span>
                </h1>
                <p class="text-lead">
                    <?php
                    echo wp_kses(writsy_get_option('newsletter_dialog_text', esc_html__('Subscribe to our Newsletter and get our latest updates directly on your inbox.', 'writsy')), array_merge(wp_kses_allowed_html(), array(
                        'br' => array(),
                        'i'  => array(
                            'class' => true
                        )
                    )));
                    ?>
                </p>

                <?php echo do_shortcode('[mc4wp_form id="' . esc_attr($form) . '"]'); ?>
            </div>
        </div>
    </div>
</div>