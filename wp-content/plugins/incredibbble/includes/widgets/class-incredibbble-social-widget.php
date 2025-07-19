<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incredibbble social widget class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Social_Widget extends WP_Widget
{

    /**
     * Social media brands.
     * 
     * @since  1.0.0
     * @access protected
     * @var    array
     */
    public $brands = array();


    /**
     * The class constructor.
     * 
     * @since  1.0.0
     * @access protected
     * @return void
     */
    public function __construct() {
        $widget_name    = __('Incredibbble Social Profiles', 'incredibbble');
        $widget_id      = 'widget_incredibbble_social';
        $widget_options = array(
            'classname'   => $widget_id,
            'description' => 'Widget description.'
        );

        $this->add_brands();

        parent::__construct($widget_id, $widget_name, $widget_options);
    }


    /**
     * Add social media to brand collection.
     * 
     * @since  1.0.0
     * @access protected
     * @return void
     */
    public function add_brands() {
        $this->brands = apply_filters('incredibbble_social_widget_brands', array());
    }


    /**
     * Widget frontend view.
     * 
     * @since  1.0.0
     * @access protected
     * @param  array $args
     * @param  array $instance
     * @return void
     */
    public function widget($args, $instance) {
        echo incredibbble()->view('widgets.social', array(
            'widget'   => $this,
            'args'     => $args,
            'instance' => $instance
        ));
    }


    /**
     * Update widget backend settings.
     * 
     * @since  1.0.0
     * @access protected
     * @param  array $new
     * @param  array $instance
     * @return void
     */
    public function update($new, $instance) {
        $instance['title'] = strip_tags($new['title']);

        foreach ($this->brands as $key => $value) {
            if (isset($new[$key])) {
                $instance[$key] = esc_url($new[$key]);
            }
        }

        return $instance;
    }


    /**
     * Widget backend settings form.
     * 
     * @since  1.0.0
     * @access protected
     * @param  array $instance
     * @return void
     */
    public function form($instance) {
        echo incredibbble()->view('widgets.form-social', array(
            'widget'   => $this,
            'instance' => $instance
        ));
    }

}


/**
 * Register social widget.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('widgets_init', function() {
    if (incredibbble()->is_support('widget_social')) {
        register_widget('Incredibbble_Social_Widget');
    }
});