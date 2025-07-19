<?php defined('ABSPATH') or die('Cheatin\' Uh?'); ?>

<div id="panel-backup" class="incredibbble-panel">
    <div class="incredibbble-panel-header striped-bg">
        <div class="incredibbble-panel-title"><?php _e('Import', 'incredibbble'); ?> / <strong><?php _e('Export', 'incredibbble'); ?></strong></div>
        <div class="incredibbble-panel-subtitle"><?php _e('Backup your options.', 'incredibbble'); ?></div>

        <ul class="incredibbble-panel-tabs">
            <li><a href="#incredibbble-section-import"><?php _e('Import Options', 'incredibbble'); ?></a></li>
            <li><a href="#incredibbble-section-export"><?php _e('Export Options', 'incredibbble'); ?></a></li>
        </ul>
    </div>

    <div class="incredibbble-panel-content">
        <div id="incredibbble-section-import" class="incredibbble-section">
            <div class="incredibbble-section-content">
                <div id="incredibbble-field-import" class="incredibbble-field">
                    <div class="incredibbble-field-header">
                        <strong class="incredibbble-field-title"><?php _e('Import', 'incredibbble'); ?></strong>
                        <span class="incredibbble-field-subtitle"><?php _e('Upload options backup file.', 'incredibbble'); ?></span>
                    </div>

                    <div class="incredibbble-field-content">
                        <div class="incredibbble-input-group">
                            <input type="file" class="incredibbble-control incredibbble-control-import" name="incredibbble-import-file">

                            <span class="input-group-addon">
                                <?php submit_button(__('Import options', 'incredibbble'), 'secondary import', 'import', false); ?>
                            </span>
                        </div>

                        <span class="incredibbble-field-description"><?php _e('Please note this action will overwrite all existing option values, please proceed with caution!', 'incredibbble'); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div id="incredibbble-section-export" class="incredibbble-section">
            <div class="incredibbble-section-content">
                <div id="incredibbble-field-export" class="incredibbble-field">
                    <div class="incredibbble-field-header">
                        <strong class="incredibbble-field-title"><?php _e('Export', 'incredibbble'); ?></strong>
                        <span class="incredibbble-field-subtitle"><?php _e('Download options backup file.', 'incredibbble'); ?></span>
                    </div>

                    <div class="incredibbble-field-content">
                        <?php submit_button(__('Download backup file', 'incredibbble'), 'secondary', 'export', false); ?>

                        <span class="incredibbble-field-description"><?php _e('It\'s highly recommended to export your current options before make any changes to avoid loses.', 'incredibbble'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>