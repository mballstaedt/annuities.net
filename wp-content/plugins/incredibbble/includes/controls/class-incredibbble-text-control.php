<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incridibbble control type text class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Text_Control extends Incredibbble_Control
{

    /**
     * Sanitize value.
     * 
     * @since  1.0.0
     * @access public
     * @uses   sanitize_text_field()
     * @param  string $value
     * @return string
     */
    public function sanitize($value)
    {
        return sanitize_text_field($value);
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

        return incredibbble()->view('controls.text', $data);
    }

}


/**
 * Register text control
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('incredibbble_load_controls', function($incredibbble) {
    $incredibbble->register_control('text', 'Incredibbble_Text_Control');
});