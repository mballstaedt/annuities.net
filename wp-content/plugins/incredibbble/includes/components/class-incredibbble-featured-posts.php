<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incredibbble featured posts component class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Featured_Posts
{

    /**
     * Unique component identifier.
     * 
     * @since  1.0.0
     * @access protected
     * @var    string
     */
    protected $id;


    /**
     * Featured tag ID.
     * 
     * @since  1.0.0
     * @access protected
     * @var    integer
     */
    protected $tag = 0;


    /**
     * Whether hide the featured tag from the front end.
     * 
     * @since  1.0.0
     * @access protected
     * @var    boolean
     */
    protected $hide_tag = false;


    /**
     * Maximum posts to show.
     * 
     * @since  1.0.0
     * @access protected
     * @var    integer
     */
    protected $max = 5;


    /**
     * The constructor
     * 
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
        $this->tag = incredibbble_get_option('featured_posts_tag');
        $this->hide_tag = incredibbble_get_option('featured_posts_tag_hide');
        $this->max = incredibbble_get_option('featured_posts_max');

        add_action('incredibbble_init', array($this, 'init'));

        add_filter('incredibbble_get_featured_posts', array($this, 'get'));
    }


    /**
     * Fires once incredibble initialized.
     * 
     * @since  1.0.0
     * @access public
     * @param  array $attributes
     * @return void
     */
    public function init()
    {
        if (! $this->is_supported()) {
            return;
        }

        add_action('incredibbble_register_options', array($this, 'register_options'), 1);
        add_action('save_post', array($this, 'clear'));
        add_action('incredibbble_options_updated', array($this, 'options_updated'));
        add_action('pre_get_posts', array($this, 'pre_get_posts'));
        add_action('wp_loaded', array($this, 'wp_loaded'));
        add_action('incredibbble_deactivated', array($this, 'clear'));
    }


    /**
     * Fires once wp loaded.
     * 
     * @since  1.0.0
     * @access public
     * @param  array $attributes
     * @return void
     */
    public function wp_loaded()
    {
        if (! $this->hide_tag) {
            return;
        }

        add_filter('get_terms', array($this, 'hide_tag'), 10, 3);
        add_filter('get_the_terms', array($this, 'hide_the_tag'), 10, 3);
    }


    /**
     * Hide featured tag from displaying when global terms are queried from the front end.
     * 
     * @since  1.0.0
     * @access public
     * @param  array $attributes
     * @return void
     */
    public function hide_tag($terms, $taxonomies, $args)
    {
        if (is_admin() || ! in_array('post_tag', $taxonomies) || empty($terms) || ('all' != $args['fields'])) {
            return $terms;
        }

        return array_filter($terms, function ($tag) {
            return $tag->term_id != $this->tag;
        });
    }


    /**
     * Hide featured tag from display when terms associated with a post object.
     * 
     * @since  1.0.0
     * @access public
     * @param  array $attributes
     * @return void
     */
    public function hide_the_tag($terms, $id, $taxonomy)
    {
        if (is_admin() || ('post_tag' != $taxonomy) || empty($terms)) {
            return $terms;
        }

        return array_filter($terms, function ($tag) {
            return $tag->term_id != $this->tag;
        });
    }


    /**
     * Register options.
     * 
     * @since  1.0.0
     * @access public
     * @param  Incredibbble_Manager $manager
     * @return void
     */
    public function register_options($manager)
    {
        $manager->add_panel('featured_posts', array (
            'title'    => __('Featured Posts', 'incredibbble'),
            'subtitle' => __('Featured posts settings.', 'incredibbble'),
            'priority' => 20
        ));

        $manager->add_section('featured_posts_settings', array (
            'title'    => __('Query Settings', 'incredibbble'),
            'panel'    => 'featured_posts',
            'priority' => 10
        ));

        $manager->add_section('featured_posts_display', array (
            'title'    => __('Display Options', 'incredibbble'),
            'panel'    => 'featured_posts',
            'priority' => 10
        ));

        $manager->add_field('featured_posts_tag', array(
            'title'       => __('Tag', 'incredibbble'),
            'subtitle'    => __('Featured posts tag ID.', 'incredibbble'),
            'description' => __('Enter a tag ID to be use as tag query of your featured posts.', 'incredibbble'),
            'section'     => 'featured_posts_settings',
            'type'        => 'number',
            'priority'    => 10
        ));

        $manager->add_field('featured_posts_tag_hide', array(
            'title'       => __('Hide Tag', 'incredibbble'),
            'subtitle'    => __('Hide the tag on the front end.', 'incredibbble'),
            'description' => __('Check this option to hide featured tag on the front end.', 'incredibbble'),
            'section'     => 'featured_posts_settings',
            'type'        => 'checkbox',
            'priority'    => 10
        ));

        $manager->add_field('featured_posts_max', array(
            'section'     => 'featured_posts_settings',
            'title'       => __('Max Posts', 'writsy'),
            'subtitle'    => __('Max. number of posts to show', 'writsy'),
            'description' => __('Numeric value only, default is 5.', 'writsy'),
            'type'        => 'number',
            'default'     => 5,
            'priority'    => 10
        ));
    }


    /**
     * Fire actions when options updated.
     * 
     * @since  1.0.0
     * @access public
     * @param  Incredibbble_Collection $options
     * @return void
     */
    public function options_updated($options)
    {
        if ($options->get('featured_posts_tag') != $this->tag) {
            $this->clear();
        }

        if ($options->get('featured_posts_max') != $this->max) {
            $this->clear();
        }
    }


    /**
     * Get featured post IDs.
     * 
     * @since  1.0.0
     * @access public
     * @return array
     */
    public function get_ids()
    {
        if ($ids = get_transient($this->id)) {
            return $ids;
        }

        $ids = get_posts(array(
            'fields'           => 'ids',
            'numberposts'      => $this->max,
            'suppress_filters' => false,
            'tax_query'        => array(
                array(
                    'field'    => 'term_id',
                    'taxonomy' => 'post_tag',
                    'terms'    => $this->tag
                ),
            ),
        ));

        if (! $ids) {
            return array();
        }

        $ids = array_map('absint', $ids);

        set_transient($this->id, $ids);

        return $ids;
    }


    /**
     * Clear featured post IDs.
     * 
     * @since  1.0.0
     * @access public
     * @param  array $attributes
     * @return void
     */
    public function clear()
    {
        delete_transient($this->id);
    }


    /**
     * Get featured posts.
     * 
     * @since  1.0.0
     * @access public
     * @param  array $attributes
     * @return void
     */
    public function get()
    {
        $ids = $this->get_ids();

        if (empty($ids)) {
            return array();
        }

        return get_posts(array(
            'include' => $ids,
            'post_per_page' => count($ids)
        ));
    }


    /**
     * Exclude featured posts from the home page blog query.
     * 
     * @since  1.0.0
     * @access public
     * @param  array $attributes
     * @return void
     */
    public function pre_get_posts($query)
    {
        if ( ! $query->is_home() || ! $query->is_main_query() ) {
            return;
        }

        if ('posts' !== get_option('show_on_front')) {
            return;
        }

        $ids = $this->get_ids();

        if (empty($ids)) {
            return array();
        }

        $post__not_in = $query->get('post__not_in');

        if ( ! empty($post__not_in) ) {
            $ids = array_merge((array) $post__not_in, $ids);
            $ids = array_unique($ids);
        }

        $query->set('post__not_in', $ids);
    }


    /**
     * Check whether current theme support this component.
     *
     * @since  1.0.0
     * @access protected
     * @return boolean
     */
    protected function is_supported()
    {
        return incredibbble()->is_support('featured_posts');
    }

}


/**
 * Register featured posts component.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('incredibbble_load_components', function($incredibbble) {
    $incredibbble->register_component('featured_posts', function () {
        return new Incredibbble_Featured_Posts('incredibbble_featured_posts');
    });
});