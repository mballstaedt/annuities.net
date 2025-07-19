<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incridibbble control type textarea class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Textarea_Control extends Incredibbble_Control
{

    /**
     * Sanitize value.
     * 
     * @since  1.0.0
     * @access public
     * @uses   wp_kses()
     * @param  integer $value
     * @return integer
     */
    public function sanitize($value)
    {
        global $allowedposttags;

        return wp_kses($value, $allowedposttags);
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

        return incredibbble()->view('controls.textarea', $data);
    }

}


/**
 * Register textarea control
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('incredibbble_load_controls', function($incredibbble) {
    $incredibbble->register_control('textarea', 'Incredibbble_Textarea_Control');
});