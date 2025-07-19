<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incredibbble instagram feeds widget class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Instagram_Feeds_Widget extends WP_Widget
{

    public $lazyload = false;


    /**
     * The class constructor.
     * 
     * @since  1.0.0
     * @access protected
     * @return void
     */
    public function __construct() {
        $widget_name    = __('Incredibbble Instagram Feeds', 'incredibbble');
        $widget_id      = 'widget_incredibbble_instagram_feeds';
        $widget_options = array(
            'classname'   => $widget_id,
            'description' => 'Widget description.'
        );

        $this->lazyload = apply_filters('incredibbble_instagram_feeds_lazyload', $this->lazyload);

        parent::__construct($widget_id, $widget_name, $widget_options);
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
        $title    = empty($instance['title']) ? __('Instagram', 'incredibbble') : $instance['title'];
        // $username = empty($instance['username']) ? '' : $instance['username'];
        $count    = empty($instance['count']) ? 12 : absint($instance['count']);
        $size     = empty($instance['size']) ? 'thumbnail' : $instance['size'];

        echo $args['before_widget'];
        echo $args['before_title'] . apply_filters('widget_title', $title) . $args['after_title'];
        echo do_shortcode('[incredibbble_instagram_feeds count="' . $count . '" size="' . $size . '" lazyload="' . $this->lazyload . '"]');
        echo $args['after_widget'];
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
        $instance['title']    = strip_tags($new['title']);
        // $instance['username'] = sanitize_text_field($new['username']);
        $instance['count']    = empty($new['count']) ? 12 : absint($new['count']);
        $instance['size']     = empty($new['size']) ? 'thumbnail' : $instance['size'];

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
        echo incredibbble()->view('widgets.form-instagram-feeds', array(
            'widget'   => $this,
            'instance' => $instance
        ));
    }

}


/**
 * Register instagram feeds widget.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('widgets_init', function() {
    if (incredibbble()->is_support('instagram_feeds') && incredibbble()->is_support('widget_instagram_feeds')) {
        register_widget('Incredibbble_Instagram_Feeds_Widget');
    }
});