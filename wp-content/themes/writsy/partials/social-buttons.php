<?php 
/**
 * The template part for displaying social buttons.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');
?>

<ul class="social-buttons">
    <?php 
    foreach (writsy_social_brands() as $key => $value) {
        if ($url = writsy_get_option($key)) {
            printf('<li><a href="%1$s" class="button button-secondary" rel="nofollow">%2$s</a></li>' . "\n",
                esc_url($url),
                wp_kses($value['icon'], array(
                    'i'  => array(
                        'class' => true
                    )
                ))
            );
        }
    }
    ?>
</ul>