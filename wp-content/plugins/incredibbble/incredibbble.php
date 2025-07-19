<?php
/**
 * Plugin Name: Incredibbble
 * Description: The Incredibbble WordPress theme framework.
 * Version:     1.0.1
 * Author:      Incredibbble
 * Author URI:  https://incredibbble.com/
 * Text Domain: incredibbble
 * Domain Path: /languages/
 * Network:     false
 */

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * Load main class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
require_once 'includes/class-incredibbble.php';


/**
 * Incredibbble main class instance.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
if (! function_exists('incredibbble')) {
    function incredibbble() {
        if (isset($GLOBALS['incredibbble'])) {
            $instance = $GLOBALS['incredibbble'];
        }
        else {
            $instance = Incredibbble::instance();
        }

        return $instance;
    }
}


/**
 * Register acivation & deactivation hooks.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
register_activation_hook(__FILE__, array('Incredibbble', 'activate'));
register_deactivation_hook(__FILE__, array('Incredibbble', 'deactivate'));


/**
 * Initialize the plugin.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
$incredibbble = incredibbble();