<?php defined('ABSPATH') or die('Cheatin\' Uh?'); ?>

<input type="text" id="<?php echo esc_attr($field->get_attr('id')); ?>" class="<?php echo esc_attr($field->get_attr('class')); ?>" name="<?php echo esc_attr($field->get_attr('name')); ?>" value="<?php echo esc_attr($value); ?>" data-default-color="<?php echo esc_attr($field->default); ?>">