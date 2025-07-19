<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incridibbble control type number class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Number_Control extends Incredibbble_Control
{

    /**
     * Sanitize value.
     * 
     * @since  1.0.0
     * @access public
     * @param  integer $value
     * @return integer
     */
    public function sanitize($value)
    {
        $min = $this->has_attr('min') ? $this->get_attr('min') : null;
        $max = $this->has_attr('max') ? $this->get_attr('max') : null;

        $value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);

        if (! is_null($min) && $value < $min) {
            return $min;
        }

        if (! is_null($max) && ($value > $max)) {
            return $this->default;
        }

        return $value;
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

        return incredibbble()->view('controls.number', $data);
    }

}


/**
 * Register number control
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('incredibbble_load_controls', function($incredibbble) {
    $incredibbble->register_control('number', 'Incredibbble_Number_Control');
});