<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incridibbble control type image class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Image_Control extends Incredibbble_Control
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
        $pathinfo = pathinfo(filter_var($value, FILTER_SANITIZE_URL));

        if (isset($pathinfo['extension'])) {
            if (in_array($pathinfo['extension'], array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'ico'))) {
                return $value;
            }
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

        return incredibbble()->view('controls.image', $data);
    }

}


/**
 * Register image control
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('incredibbble_load_controls', function($incredibbble) {
    $incredibbble->register_control('image', 'Incredibbble_Image_Control');
});