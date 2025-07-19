<?php defined('ABSPATH') or die('Cheatin\' Uh?'); ?>

<?php $title = empty($instance['title']) ? '' : esc_attr($instance['title']) ?>
<p>
    <label for="<?php echo esc_attr($widget->get_field_id('title')); ?>"><?php _e('Title:', 'twentyfourteen'); ?></label>
    <input id="<?php echo esc_attr($widget->get_field_id('title')); ?>" class="widefat" name="<?php echo esc_attr($widget->get_field_name('title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>">
</p>

<hr>

<p><?php _e('Enter a full URL to your profile page of each social media below:') ?></p>

<?php foreach ($widget->brands as $id => $brand) : ?>
<p>
    <?php $value = empty($instance[$id]) ? '' : esc_attr($instance[$id]) ?>
    <label for="<?php echo esc_attr($widget->get_field_id($id)); ?>"><?php echo esc_html($brand['name']); ?></label>
    <input id="<?php echo esc_attr($widget->get_field_id($id)); ?>" class="widefat" name="<?php echo esc_attr($widget->get_field_name($id )); ?>" type="text" value="<?php echo esc_attr($value); ?>">
</p>
<?php endforeach; ?>