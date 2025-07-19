<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incredibbble social widget class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Posts_Widget extends WP_Widget
{

    /**
     * Pots orderby.
     * 
     * @since  1.0.0
     * @access protected
     * @var    array
     */
    public $orderby = array();


    /**
     * Posts orders.
     * 
     * @since  1.0.0
     * @access protected
     * @var    array
     */
    public $orders = array();


    /**
     * The class constructor.
     * 
     * @since  1.0.0
     * @access protected
     * @return void
     */
    public function __construct() {
        $widget_name    = __('Incredibbble Posts', 'incredibbble');
        $widget_id      = 'widget_incredibbble_posts';
        $widget_options = array(
            'classname'   => $widget_id,
            'description' => 'Widget description.'
        );

        $this->setup();

        parent::__construct($widget_id, $widget_name, $widget_options);
    }


    /**
     * Setup
     * 
     * @since  1.0.0
     * @access protected
     * @return void
     */
    public function setup() {
        $orderby = array(
            'none'  => __('None', 'incredibbble'),
            'id'    => __('Post ID', 'incredibbble'),
            'title' => __('Post Title', 'incredibbble'),
            'date'  => __('Publish Date', 'incredibbble'),
            'rand'  => __('Random', 'incredibbble'),
            'comment_count' => __('Comments Number', 'incredibbble')
        );

        $orders = array(
            'ASC'  => __('Ascending', 'incredibbble'),
            'DESC' => __('Descending', 'incredibbble')
        );

        $this->orders  = $orders;
        $this->orderby = apply_filters('incredibbble_posts_widget_orderby', $orderby);
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
        echo incredibbble()->view('widgets.posts', array(
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
        $instance['title']   = strip_tags($new['title']);
        $instance['count']   = empty($new['count']) ? 5 : absint($new['count']);
        $instance['orderby'] = array_key_exists($new['orderby'], $this->orderby) ? $new['orderby'] : 'date';
        $instance['order']   = array_key_exists($new['order'], $this->orders) ? $new['order'] : 'DESC';
        $instance['exclude_no_image'] = empty($new['exclude_no_image']) ? 0 : 1;

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
        echo incredibbble()->view('widgets.form-posts', array(
            'widget'   => $this,
            'instance' => $instance
        ));
    }

}


/**
 * Register posts widget.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('widgets_init', function() {
    if (incredibbble()->is_support('widget_posts')) {
        register_widget('Incredibbble_Posts_Widget');
    }
});