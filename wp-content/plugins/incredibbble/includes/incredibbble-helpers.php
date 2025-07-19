<?php

/**
 * Convert an array to a plain class object.
 *
 * @package Incredibbble
 * @since   1.0.0
 * @param   array $array
 * @return  object
 */
if (! function_exists('incredibbble_array_to_object')) {
    function incredibbble_array_to_object($array) {
        return json_decode(json_encode((array) $array));
    }
}


/**
 * Print raw content.
 *
 * @package Incredibbble
 * @since   1.0.0
 * @param   mixed $content
 * @return  object
 */
if (! function_exists('incredibbble_print_raw')) {
    function incredibbble_print_raw($content) {
        echo '<pre>';
        print_r($content);
        echo '</pre>';
    }
}


/**
 * Get plugin information.
 *
 * @package Incredibbble
 * @since   1.0.0
 * @return  stdClass
 */
if (! function_exists('incredibbble_info')) {
    function incredibbble_info() {
        $defaults = array(
            'id'          => 'Text Domain',
            'name'        => 'Plugin Name',
            'plugin_uri'  => 'Plugin URI',
            'version'     => 'Version',
            'description' => 'Description',
            'author'      => 'Author',
            'author_uri'  => 'Author URI',
            'license'     => 'License',
            'license_uri' => 'License URI',
            'textdomain'  => 'Text Domain',
            'domain_path' => 'Domain Path',
            'network'     => 'Network'
        );

        $data = get_file_data(incredibbble()->path('incredibbble.php'), $defaults, 'plugin');

        return json_decode(json_encode($data));
    }
}


/**
 * Get attachment id from attachment url.
 *
 * @package Incredibbble
 * @since   1.0.0
 * @param   string  $url
 * @return  integer
 */
if (! function_exists('incredibbble_get_attachment_id_from_url')) {
    function incredibbble_get_attachment_id_from_url($url) {
        global $wpdb;

        return $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $url));
    }
}


/**
 * Get upload file error message by specified error code.
 *
 * @since  1.0.0
 * @access protected
 * @param  integer $code
 * @return string
 */
if (! function_exists('incredibbble_upload_error_message')) {
    function incredibbble_upload_error_message($code)
    {
        switch ($code) {
            case 1:
            case 2:
                $message = __('The uploaded file exceeds the maximum file upload size.', 'incredibbble');
                break;

            case 3:
                $message = __('The uploaded file was only partially uploaded.', 'incredibbble');
                break;

            case 6:
                $message = __('Missing a temporary folder.', 'incredibbble');
                break;
            
            default:
                $message = __('No file was uploaded.', 'incredibbble');
                break;
        }

        return $message;
    }
}


/**
 * Compare priority.
 *
 * @package Incredibbble
 * @since   1.0.0
 * @param   array|object $foo
 * @param   array|object $bar
 * @return  integer
 */
if (! function_exists('incredibbble_compare_priority')) {
    function incredibbble_compare_priority($foo, $bar, $key = 'priority') {
        if (is_object($foo)) {
            $foo = $foo->{$key};
        }

        if (is_object($bar)) {
            $bar = $bar->{$key};
        }

        if (is_array($foo)) {
            $foo = $foo[$key];
        }

        if (is_array($bar)) {
            $bar = $bar[$key];
        }

        if ($foo == $bar) {
            return false;
        }

        return ($foo > $bar) ? true : false;
    }
}