<?php

defined('ABSPATH') or die('Cheatin\' Uh?');

$title    = empty($instance['title']) ? '' : esc_attr($instance['title']);
$username = empty($instance['username']) ? '' : esc_attr($instance['username']);
$count    = empty($instance['count']) ? 5 : absint($instance['count']);

?>
<p>
    <label for="<?php echo esc_attr($widget->get_field_id('title')); ?>"><?php _e('Title:', 'incredibbble'); ?></label>
    <input id="<?php echo esc_attr($widget->get_field_id('title')); ?>" class="widefat" name="<?php echo esc_attr($widget->get_field_name('title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>">
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('username')); ?>"><?php _e('Username:', 'incredibbble'); ?></label>
    <input id="<?php echo esc_attr($widget->get_field_id('username')); ?>" class="widefat" name="<?php echo esc_attr($widget->get_field_name('username' )); ?>" type="text" value="<?php echo esc_attr($username); ?>">
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('count')); ?>"><?php _e('Number of Items:', 'incredibbble'); ?></label>
    <input id="<?php echo esc_attr($widget->get_field_id('count')); ?>" class="widefat" name="<?php echo esc_attr($widget->get_field_name('count' )); ?>" type="number" value="<?php echo esc_attr($count); ?>">
</p>