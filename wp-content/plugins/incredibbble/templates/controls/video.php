<?php defined('ABSPATH') or die('Cheatin\' Uh?'); ?>

<div class="incredibbble-input-group">
    <input type="url" id="<?php echo esc_attr($field->get_attr('id')); ?>" class="<?php echo esc_attr($field->get_attr('class')); ?>" name="<?php echo esc_attr($field->get_attr('name')); ?>" value="<?php echo esc_attr($value); ?>">

    <span class="input-group-addon input-group-button">
        <?php
        if ($value) {
            submit_button(__('Remove', 'incredibbble'), 'remove secondary', false, false);
        }
        else {
            submit_button(__('Open Library', 'incredibbble'), 'select secondary', false, false);
        }
        ?>
    </span>
</div>