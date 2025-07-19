<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incridibbble control type checkbox class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Checkbox_Control extends Incredibbble_Control
{

    /**
     * Sanitize value.
     * 
     * @since  1.0.0
     * @access public
     * @param  boolean $value
     * @return boolean
     */
    public function sanitize($value)
    {
        return (bool) $value;
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

        return incredibbble()->view('controls.checkbox', $data);
    }

}


/**
 * Register checkbox control
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('incredibbble_load_controls', function($incredibbble) {
    $incredibbble->register_control('checkbox', 'Incredibbble_Checkbox_Control');
});