<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incredibbble twitter feeds widget class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Twitter_Feeds_Widget extends WP_Widget
{

    /**
     * The class constructor.
     * 
     * @since  1.0.0
     * @access protected
     * @return void
     */
    public function __construct() {
        $widget_name    = __('Incredibbble Twitter Feeds', 'incredibbble');
        $widget_id      = 'widget_incredibbble_twitter_feeds';
        $widget_options = array(
            'classname'   => $widget_id,
            'description' => 'Widget description.'
        );

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
        $title    = empty($instance['title']) ? __('Tweets', 'incredibbble') : $instance['title'];
        $username = empty($instance['username']) ? '' : $instance['username'];
        $count    = empty($instance['count']) ? 5 : absint($instance['count']);

        echo $args['before_widget'];
        echo $args['before_title'] . apply_filters('widget_title', $title) . $args['after_title'];
        echo do_shortcode('[incredibbble_twitter_feeds username="' . $username . '" count="' . $count . '"]');
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
        $instance['username'] = sanitize_text_field($new['username']);
        $instance['count']    = empty($new['count']) ? 5 : absint($new['count']);

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
        echo incredibbble()->view('widgets.form-twitter-feeds', array(
            'widget'   => $this,
            'instance' => $instance
        ));
    }

}


/**
 * Register twitter feeds widget.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('widgets_init', function() {
    if (incredibbble()->is_support('twitter_feeds') && incredibbble()->is_support('widget_twitter_feeds')) {
        register_widget('Incredibbble_Twitter_Feeds_Widget');
    }
});