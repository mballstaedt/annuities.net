<?php

defined('ABSPATH') or die('Cheatin\' Uh?');

if ($panel->sections->is_empty()) {
    return;
}
?>

<div id="panel-<?php echo esc_attr($panel->id) ?>" class="incredibbble-panel">
    <?php if($panel->sections->count() > 1) : ?>
        <ul class="incredibbble-panel-tabs">
            <?php foreach($panel->sections->all() as $section) : ?>
                <li><a href="#incredibbble-section-<?php echo esc_attr($section->id); ?>"><?php echo esc_html($section->title); ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    
    <div class="incredibbble-panel-content">
        <?php foreach($panel->sections->all() as $section) : ?>
            <div id="incredibbble-section-<?php echo esc_attr($section->id); ?>" class="incredibbble-section">
                <div class="incredibbble-section-content">
                    <?php foreach ($section->fields->all() as $field) : ?>
                        <div id="incredibbble-field-<?php echo esc_html($field->id); ?>" class="incredibbble-field">
                            <div class="incredibbble-field-header">
                                <strong class="incredibbble-field-title">
                                    <?php echo esc_html($field->title); ?>
                                </strong>

                                <?php if ($field->subtitle) : ?>
                                    <span class="incredibbble-field-subtitle">
                                        <?php echo esc_html($field->subtitle); ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="incredibbble-field-content">
                                <?php
                                $value = apply_filters('incredibbble_get_meta', $post->ID, $field->id, $field->default);

                                echo $field->render(compact('value'));

                                if ($field->description) {
                                    printf('<span class="incredibbble-field-description">%s</span>', $field->description);
                                }
                                ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>