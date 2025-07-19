<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incridibbble control type url class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Url_Control extends Incredibbble_Control
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
        return filter_var($value, FILTER_SANITIZE_URL);
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

        return incredibbble()->view('controls.url', $data);
    }

}


/**
 * Register url control
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('incredibbble_load_controls', function($incredibbble) {
    $incredibbble->register_control('url', 'Incredibbble_Url_Control');
});