<?php defined('ABSPATH') or die('Cheatin\' Uh?'); ?>

<input type="checkbox" id="<?php echo esc_attr($field->get_attr('id')); ?>" class="<?php echo esc_attr($field->get_attr('class')); ?>" name="<?php echo esc_attr($field->get_attr('name')); ?>"<?php checked($value); ?>>