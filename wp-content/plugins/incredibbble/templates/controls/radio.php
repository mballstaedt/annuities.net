<?php defined('ABSPATH') or die('Cheatin\' Uh?'); ?>

<ul class="incredibbble-radio-list">
    <?php foreach($field->choices as $key => $label) : ?>
    <li>
        <input type="radio" id="<?php echo esc_attr($field->get_attr('id') . '-' . $key); ?>" class="<?php echo esc_attr($field->get_attr('class')); ?>" name="<?php echo esc_attr($field->get_attr('name')); ?>" value="<?php echo sanitize_key($key); ?>"<?php checked($value, $key); ?>>

        <label for="<?php echo esc_attr($field->get_attr('id') . '-' . $key); ?>"><?php echo esc_html($label); ?></label>
    </li>
    <?php endforeach; ?>
</ul>