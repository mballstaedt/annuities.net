<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incridibbble control type email class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Email_Control extends Incredibbble_Control
{

    /**
     * Sanitize value.
     * 
     * @since  1.0.0
     * @access public
     * @uses   sanitize_email()
     * @param  string $value
     * @return string
     */
    public function sanitize($value)
    {
        return sanitize_email($value);
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

        return incredibbble()->view('controls.email', $data);
    }

}


/**
 * Register email control
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('incredibbble_load_controls', function($incredibbble) {
    $incredibbble->register_control('email', 'Incredibbble_Email_Control');
});