<?php defined('ABSPATH') or die('Cheatin\' Uh?'); ?>

<div class="incredibbble-input-group">
    <input type="url" id="<?php echo esc_attr($field->get_attr('id')); ?>" class="<?php echo esc_attr($field->get_attr('class')); ?>" name="<?php echo esc_attr($field->get_attr('name')); ?>" value="<?php echo esc_attr($value); ?>">

    <span class="input-group-addon input-group-button">
        <?php
        if ($value) {
            submit_button(__('Remove Image', 'incredibbble'), 'remove secondary', false, false);
        }
        else {
            submit_button(__('Open Library', 'incredibbble'), 'select secondary', false, false);
        }
        ?>
    </span>
</div>

<?php
if ($value) {
    $attachment_id = incredibbble_get_attachment_id_from_url($value);

    if ($attachment_id) {
        $thumbnail = wp_get_attachment_image_src($attachment_id, 'medium', true);
        $thumbnail = current($thumbnail);
    }
    else {
        $thumbnail = $value;
    }
?>
    <div class="incredibbble-image-thumbnail">
        <a href="<?php echo esc_attr($value); ?>" target="_blank">
            <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($field->get_attr('id')); ?>">
        </a>
    </div>
<?php 
}
?>