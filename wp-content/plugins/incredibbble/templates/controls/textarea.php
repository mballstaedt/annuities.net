<?php
defined('ABSPATH') or die('Cheatin\' Uh?');

$rows = 2;

if ($field->has_attr('rows')) {
    $rows = $field->get_attr('rows');
}
?>

<textarea id="<?php echo esc_attr($field->get_attr('id')); ?>" class="<?php echo esc_attr($field->get_attr('class')); ?>" name="<?php echo esc_attr($field->get_attr('name')); ?>" rows="<?php echo esc_attr($rows); ?>"><?php echo $value; ?></textarea>