<?php defined('ABSPATH') or die('Cheatin\' Uh?'); ?>

<div class="wrap incredibbble">
    <h1><?php _e('Theme Options', 'incredibbble'); ?></h1>

    <?php settings_errors('incredibbble_options'); ?>

    <form enctype="multipart/form-data" method="post" action="options.php" role="form">
        <?php settings_fields('incredibbble_options'); ?>

        <div class="incredibbble-options">
            <div class="incredibbble-options-sidenav">
                <div class="incredibbble-options-header striped-bg">
                    <div class="incredibbble-options-title">
                        <?php
                        $words = explode(' ', $theme->name);

                        if (count($words) > 1) {
                            $first = $words[0];
                            $last  = trim(str_replace($first, '', $theme->name));

                            printf('%s <strong>%s</strong>', esc_html($first), esc_html($last));
                        }
                        else {
                            printf('<strong>%s</strong>', esc_html($theme->name));
                        }
                        ?>
                    </div>

                    <div class="incredibbble-options-subtitle">
                        <?php printf('%s: %s', __('Version', 'incredibbble'), esc_html($theme->version)); ?>
                    </div>
                </div>

                <ul class="incredibbble-options-nav">
                    <?php foreach($panels->all() as $panel) : ?>
                        <li><a href="#panel-<?php echo esc_attr($panel->id); ?>"><?php echo esc_html($panel->title); ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="#panel-backup"><?php _e('Import / Export', 'incredibbble'); ?></a></li>
                </ul>
            </div>

            <div class="incredibbble-options-content">
                <?php foreach($panels->all() as $panel ) : ?>
                    <div id="panel-<?php echo esc_attr($panel->id) ?>" class="incredibbble-panel">
                        <div class="incredibbble-panel-header striped-bg">
                            <div class="incredibbble-panel-title">
                                <?php
                                $words = explode(' ', $panel->title);

                                if (count($words) > 1) {
                                    $first = $words[0];
                                    $last  = trim(str_replace($first, '', $panel->title));

                                    printf('%s <strong>%s</strong>', esc_html($first), esc_html($last));
                                }
                                else {
                                    printf('<strong>%s</strong>', esc_html($panel->title));
                                }
                                ?>
                            </div>

                            <?php if ($panel->subtitle) : ?>
                                <div class="incredibbble-panel-subtitle">
                                    <?php echo esc_html($panel->subtitle); ?>
                                </div>
                            <?php endif; ?>

                            <ul class="incredibbble-panel-tabs">
                                <?php foreach($panel->sections->all() as $section) : ?>
                                    <li><a href="#incredibbble-section-<?php echo esc_attr($section->id); ?>"><?php echo esc_html($section->title); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

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
                                                    $value = apply_filters('incredibbble_get_option', $field->id);

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
                <?php endforeach; ?>

                <?php echo incredibbble()->view('backup'); ?>
            </div>

            <div class="incredibbble-options-footer">
                <?php submit_button(__('Restore Defaults', 'incredibbble'), 'button-large secondary', 'reset', false); ?>
                <?php submit_button(__('Save Changes', 'incredibbble'), 'button-large primary', 'save', false); ?>
            </div>
        </div>

        <div class="incredibbble-options-credits clearfix">
            <span><?php echo $info->description; ?></span>
            <span><?php printf('%s %s', __('Version', 'incredibbble'), $info->version); ?></span>
        </div>
    </form>
</div>