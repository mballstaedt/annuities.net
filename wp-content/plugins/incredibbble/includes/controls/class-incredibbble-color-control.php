<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incridibbble control type color class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Color_Control extends Incredibbble_Control
{

    /**
     * Sanitize value.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $value
     * @return string
     */
    public function sanitize($value)
    {
        if (preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $value)) {
           return strtolower($value);
        }

        return '';
    }


    /**
     * Render view interface.
     * 
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function render($data = array())
    {
        $data['field'] = $this;

        return incredibbble()->view('controls.color', $data);
    }

}


/**
 * Register color control
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('incredibbble_load_controls', function($incredibbble) {
    $incredibbble->register_control('color', 'Incredibbble_Color_Control');
});