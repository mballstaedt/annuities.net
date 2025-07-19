<?php
/**
 * The template for displaying search forms.
 *
 * @package Writsy
 * @since   1.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="screen-reader-text"><?php echo esc_html_x('Search for:', 'label', 'writsy'); ?></label>
    <input type="search" class="input" placeholder="<?php echo esc_attr_x('Type and hit enter &hellip;', 'placeholder', 'writsy'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label', 'writsy'); ?>" />
</form>