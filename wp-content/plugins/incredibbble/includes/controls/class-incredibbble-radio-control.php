<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incridibbble control type radio class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Radio_Control extends Incredibbble_Control
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
        if (array_key_exists($value, $this->choices)) {
            return $value;
        }

        return $this->default;
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

        return incredibbble()->view('controls.radio', $data);
    }

}


/**
 * Register radio control
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('incredibbble_load_controls', function($incredibbble) {
    $incredibbble->register_control('radio', 'Incredibbble_Radio_Control');
});