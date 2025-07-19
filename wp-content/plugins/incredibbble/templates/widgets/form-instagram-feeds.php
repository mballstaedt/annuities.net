<?php

defined('ABSPATH') or die('Cheatin\' Uh?');

$title    = empty($instance['title']) ? '' : esc_attr($instance['title']);
$count    = empty($instance['count']) ? 12 : absint($instance['count']);
$size     = empty($instance['size']) ? 'thumbnail' : $instance['size'];

?>
<p>
    <label for="<?php echo esc_attr($widget->get_field_id('title')); ?>"><?php _e('Title:', 'incredibbble'); ?></label>
    <input id="<?php echo esc_attr($widget->get_field_id('title')); ?>" class="widefat" name="<?php echo esc_attr($widget->get_field_name('title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>">
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('count')); ?>"><?php _e('Number of Items:', 'incredibbble'); ?></label>
    <input id="<?php echo esc_attr($widget->get_field_id('count')); ?>" class="widefat" name="<?php echo esc_attr($widget->get_field_name('count' )); ?>" type="number" value="<?php echo esc_attr($count); ?>">
</p>

<?php if(! $widget->lazyload) : ?>
<p>
    <label for="<?php echo esc_attr($widget->get_field_id('size')); ?>"><?php _e('Image Size:', 'incredibbble'); ?></label>
    <select id="<?php echo esc_attr($widget->get_field_id('size')); ?>" class="widefat" name="<?php echo esc_attr($widget->get_field_name('size' )); ?>">
        <option value="thumbnail"<?php selected($size, 'thumbnail') ?>><?php _e('Small', 'incredibbble') ?></option>
        <option value="low_resolution"<?php selected($size, 'low_resolution') ?>><?php _e('Medium', 'incredibbble') ?></option>
        <option value="standard_resolution"<?php selected($size, 'standard_resolution') ?>><?php _e('Large', 'incredibbble') ?></option>
    </select>
</p>
<?php endif; ?>