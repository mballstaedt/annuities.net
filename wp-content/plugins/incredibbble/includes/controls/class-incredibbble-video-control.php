<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incridibbble control type video class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Video_Control extends Incredibbble_Control
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
            if (in_array($pathinfo['extension'], wp_get_video_extensions())) {
                return $value;
            }
        }
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

        return incredibbble()->view('controls.video', $data);
    }

}


/**
 * Register video control
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('incredibbble_load_controls', function($incredibbble) {
    $incredibbble->register_control('video', 'Incredibbble_Video_Control');
});