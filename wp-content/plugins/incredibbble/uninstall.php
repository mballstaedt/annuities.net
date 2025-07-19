<?php

defined('WP_UNINSTALL_PLUGIN') or die('Cheatin\' Uh?');

$archives = get_option('incredibbble_options', array());

if (is_array($archives)) {
    foreach ($archives as $theme) {
        delete_option($theme);
    }
}