<?php defined('ABSPATH') or die('Cheatin\' Uh?'); ?>

<select id="<?php echo esc_attr($field->get_attr('id')); ?>" class="<?php echo esc_attr($field->get_attr('class')); ?>" name="<?php echo esc_attr($field->get_attr('name')); ?>">
    <?php foreach($field->choices as $key => $label) : ?>
    <option value="<?php echo esc_attr($key); ?>"<?php selected($value, $key); ?>><?php echo esc_html($label); ?></option>
    <?php endforeach; ?>
</select>