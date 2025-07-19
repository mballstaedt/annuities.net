<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incridibbble control type audio class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Audio_Control extends Incredibbble_Control
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
            if (in_array($pathinfo['extension'], wp_get_audio_extensions())) {
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

        return incredibbble()->view('controls.audio', $data);
    }

}


/**
 * Register audio control
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('incredibbble_load_controls', function($incredibbble) {
    $incredibbble->register_control('audio', 'Incredibbble_Audio_Control');
});