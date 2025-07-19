<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incredibbble metabox component class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Metabox extends Incredibbble_Manager
{

    /**
     * The constructor
     * 
     * @since  1.0.0
     * @access public
     * @param  string $id
     * @return void
     */
    public function __construct($id)
    {
        parent::__construct($id);

        add_action('incredibbble_init', array($this, 'init'));

        add_action('incredibbble_load_admin_assets', array($this, 'load_assets'));

        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));

        add_action('save_post', array($this, 'update'), 10, 3);

        add_filter('incredibbble_get_meta', array($this, 'value'), 1, 3);
    }


    /**
     * Hook actions once after Incredibbble loaded.
     * 
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function init()
    {
        if (! $this->is_supported()) {
            return;
        }

        do_action('incredibbble_register_metaboxes', $this);
    }


    /**
     * Load assets.
     * 
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function load_assets()
    {
        if (! $this->is_supported() || (get_current_screen()->base !== 'post')) {
            return;
        }

        if (! wp_style_is('incredibbble-metabox', 'enqueued')) {
            wp_enqueue_style(
                'incredibbble-metabox',
                incredibbble()->url('assets/css/incredibbble-metabox.css'),
                array('incredibbble'),
                incredibbble_info()->version,
                'all'
            );
        }

        if (! wp_script_is('incredibbble-metabox', 'enqueued')) {
            wp_enqueue_script(
                'incredibbble-metabox',
                incredibbble()->url('assets/js/incredibbble-metabox.js'),
                array('incredibbble'),
                incredibbble_info()->version,
                true
            );
        }

        if ( function_exists('wp_enqueue_media') ) {
            wp_enqueue_media();
        }

        do_action('incredibbble_metabox_load_assets');
    }


    /**
     * Add registered metaboxes.
     * 
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function add_meta_boxes()
    {
        $this->rebuild();
        
        foreach ($this->panels()->all() as $panel) {
            if (! property_exists($panel, 'screen')) {
                continue;
            }

            add_meta_box(
                $panel->id,
                $panel->title,
                array($this, 'render'),
                $panel->screen,
                'normal',
                'default',
                array('panel' => $panel)
            );
        }
    }


    /**
     * Render metabox interface.
     * 
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function render($post, $metabox)
    {
        echo incredibbble()->view('metabox', array(
            'panel' => $metabox['args']['panel'],
            'post'  => $post
        ));
    }


    /**
     * Save meta values.
     *
     * @since  1.0.0
     * @access public
     * @param  integer $post_id
     * @param  WP_Post $post
     * @param  boolean $update
     * @return integer|boolean
     */
    public function update($post_id, $post, $update)
    {
        global $pagenow;

        if (! isset($_POST[$this->id]) || ($pagenow == 'admin-ajax.php') || (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)) {
            return;
        }

        $values = $_POST[$this->id];

        $data = array();

        foreach ($this->fields->all() as $field) {
            if (isset($values[$field->id])) {
                $data[$field->id] = $field->sanitize($values[$field->id]);
            }
            else {
                switch ($field->type) {
                    case 'checkbox':
                        $data[$field->id] = false;
                        break;
                    
                    default:
                        $data[$field->id] = null;
                        break;
                }
            }
        }

        return update_post_meta($post_id, $this->id, $data);
    }


    /**
     * Get post meta value by specified key.
     * 
     * @since  1.0.0
     * @access public
     * @param  integer $post_id
     * @param  string  $key
     * @param  mixed   $default
     * @return array
     */
    public function value($post_id, $key, $default = null)
    {
        $values = new Incredibbble_Collection(get_post_meta($post_id, $this->id, true));

        if (! $values->has($key)) {
            return $default;
        }

        return $values->get($key);
    }


    /**
     * Set control attributes.
     * 
     * @since  1.0.0
     * @access protected
     * @param  Incredibbble_Control $control
     * @return array
     */
    protected function set_control_attributes(Incredibbble_Control $control)
    {
        $attributes = $control->attributes;

        $attributes['id']    = $this->id . '-' . $control->id;
        $attributes['name']  = $this->id . '[' . $control->id . ']';
        $attributes['class'] = 'incredibbble-control incredibbble-control-' . $control->type;

        return $attributes;
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
        return incredibbble()->is_support('metabox');
    }

}


/**
 * Register metabox component.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('incredibbble_load_components', function($incredibbble) {
    $incredibbble->register_component('metabox', function () {
        return new Incredibbble_Metabox('incredibbble_meta');
    });
});


/**
 * Returns post meta value by key.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
if (! function_exists('incredibbble_get_meta')) {
    function incredibbble_get_meta($post_id, $key, $default = null) {
        return apply_filters('incredibbble_get_meta', $post_id, $key, $default);
    }
}