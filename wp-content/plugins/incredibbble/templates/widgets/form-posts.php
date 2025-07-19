<?php

defined('ABSPATH') or die('Cheatin\' Uh?');

$title   = empty($instance['title']) ? '' : $instance['title'];
$count   = empty($instance['count']) ? 5 : $instance['count'];
$orderby = empty($instance['orderby']) ? 'date' : $instance['orderby'];
$order   = empty($instance['order']) ? 'DESC' : $instance['order'];
$exclude_no_image = isset($instance['exclude_no_image']) ? (bool) $instance['exclude_no_image'] : false;
?>
<p>
    <label for="<?php echo esc_attr($widget->get_field_id('title')); ?>"><?php _e('Title:', 'incredibbble'); ?></label>
    <input id="<?php echo esc_attr($widget->get_field_id('title')); ?>" class="widefat" name="<?php echo esc_attr($widget->get_field_name('title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>">
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('count')); ?>"><?php _e('Number of Posts:', 'incredibbble'); ?></label>
    <input id="<?php echo esc_attr($widget->get_field_id('count')); ?>" class="widefat" name="<?php echo esc_attr($widget->get_field_name('count' )); ?>" type="number" value="<?php echo esc_attr($count); ?>">
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('orderby')); ?>"><?php _e('Order By:', 'incredibbble'); ?></label>
    <select id="<?php echo esc_attr($widget->get_field_id('orderby')); ?>" class="widefat" name="<?php echo esc_attr($widget->get_field_name('orderby' )); ?>">
        <?php
        foreach($widget->orderby as $key => $value) {
            echo '<option value="' . $key . '"' . selected($orderby, $key, false) . '>' . $value . '</option>';
        }
        ?>
    </select>
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('order')); ?>"><?php _e('Order:', 'incredibbble'); ?></label>
    <select id="<?php echo esc_attr($widget->get_field_id('order')); ?>" class="widefat" name="<?php echo esc_attr($widget->get_field_name('order' )); ?>">
        <?php
        foreach($widget->orders as $key => $value) {
            echo '<option value="' . $key . '"' . selected($order, $key, false) . '>' . $value . '</option>';
        }
        ?>
    </select>
</p>

<p>
    <input type="checkbox" class="checkbox" id="<?php echo $widget->get_field_id('exclude_no_image'); ?>" name="<?php echo $widget->get_field_name('exclude_no_image'); ?>"<?php checked($exclude_no_image); ?> />
    <label for="<?php echo $widget->get_field_id('exclude_no_image'); ?>"><?php _e('Exclude posts without featured image', 'incredibbble'); ?></label>
</p>