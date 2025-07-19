<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incredibbble theme options component class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Options extends Incredibbble_Manager
{

    /**
     * Theme options screen slug.
     * 
     * @since  1.0.0
     * @access protected
     * @var    string
     */
    protected $screen;


    /**
     * Options data.
     * 
     * @since  1.0.0
     * @access protected
     * @var    Incredibbble_Collection
     */
    protected $data;


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

        $this->sync();

        add_action('admin_menu', array($this, 'register_menu'));

        add_action('admin_init', array($this, 'register_setting'));

        add_action('incredibbble_load_admin_assets', array($this, 'load_assets'));

        add_action('incredibbble_init', array($this, 'init'), 999);

        add_action('customize_register', array($this, 'customizer_init'));

        add_filter('incredibbble_get_option', array($this, 'value'), 1, 2);
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

        $this->add_panel('components', array(
            'title'    => __('Components', 'incredibbble'),
            'subtitle' => __('3rd party API (application program interface) configuration.', 'incredibbble'),
            'priority' => 999
        ));

        $this->add_panel('integrations', array(
            'title'    => __('API Configuration', 'incredibbble'),
            'subtitle' => __('3rd party API (application program interface) configuration.', 'incredibbble'),
            'priority' => 999
        ));

        do_action('incredibbble_register_options', $this);

        if ($this->data->is_empty()) {
            $this->reset(true);
        }

        $archives = get_option('incredibbble_options', array());

        if (! in_array($this->id, (array) $archives)) {
            $archives[] = $this->id;

            update_option('incredibbble_options', array_filter($archives));
        }
    }


    /**
     * Add submenu under appearance tab.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function register_menu()
    {
        if (! $this->is_supported()) {
            return;
        }

        $this->screen = add_theme_page(
            __('Theme Options', 'incredibbble'),
            __('Theme Options', 'incredibbble'),
            'edit_theme_options',
            $this->id,
            array($this, 'render'),
            false
        );
    }


    /**
     * Register setting.
     * 
     * @since  1.0.0
     * @access public
     * @return self
     */
    public function register_setting()
    {
        if (! $this->is_supported()) {
            return;
        }

        register_setting('incredibbble_options', $this->id, array($this, 'validate'));
    }


    /**
     * Register options to WP Customizer.
     *
     * @since  1.0.0
     * @access protected
     * @param  WP_Customizer
     * @return boolean
     */
    public function customizer_init($customizer)
    {
        if (version_compare($GLOBALS['wp_version'], '4.0', '<=')) {
            return;
        }

        $this->customizer_register_panels($customizer);
        $this->customizer_register_sections($customizer);
        $this->customizer_register_fields($customizer);
    }


    /**
     * Register WP Customizer panels.
     *
     * @since  1.0.0
     * @access protected
     * @param  WP_Customizer $customizer
     * @return void
     */
    public function customizer_register_panels($customizer)
    {
        foreach ($this->panels()->all() as $panel) {
            $customizer->add_panel($panel->id, array(
                'title'       => $panel->title,
                'description' => $panel->subtitle,
                'priority'    => $panel->priority,
            ));
        }
    }


    /**
     * Register WP Customizer sections.
     *
     * @since  1.0.0
     * @access protected
     * @param  WP_Customizer $customizer
     * @return void
     */
    public function customizer_register_sections($customizer)
    {
        foreach ($this->sections()->all() as $section) {
            $customizer->add_section($section->id, array(
                'title'       => $section->title,
                'description' => $section->subtitle,
                'priority'    => $section->priority,
                'panel'       => $section->panel
            ));
        }
    }


    /**
     * Register WP Customizer fields.
     *
     * @since  1.0.0
     * @access protected
     * @param  WP_Customizer $customizer
     * @return void
     */
    public function customizer_register_fields($customizer)
    {
        foreach ($this->fields()->all() as $field) {
            $control_args = array(
                'label'       => $field->title,
                'description' => $field->description,
                'choices'     => $field->choices,
                'type'        => $field->type,
                'priority'    => $field->priority,
                'section'     => $field->section,
            );

            $setting_args = array(
                'default'     => $field->default,
                'type'        => 'option',
                'transport'   => isset($field->customizer['transport']) ? $field->customizer['transport'] : 'refresh',
                'sanitize_callback' => array($field, 'sanitize')
            );

            $customizer->add_setting($field->get_attr('name'), $setting_args);

            switch ($field->type) {
                case 'color':
                    $customizer->add_control(new WP_Customize_Color_Control($customizer, $field->get_attr('name'), $control_args));
                    break;
                
                case 'video':
                    $control_args['mime_type'] = 'video';
                    $customizer->add_control(new WP_Customize_Media_Control($customizer, $field->get_attr('name'), $control_args));
                    break;
                
                case 'audio':
                    $control_args['mime_type'] = 'audio';
                    $customizer->add_control(new WP_Customize_Media_Control($customizer, $field->get_attr('name'), $control_args));
                    break;
                
                case 'image':
                    $control_args['mime_type'] = 'image';
                    $customizer->add_control(new WP_Customize_Image_Control($customizer, $field->get_attr('name'), $control_args));
                    break;
                
                default:
                    $customizer->add_control($field->get_attr('name'), $control_args);
                    break;
            }
        }
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
        if (! $this->is_supported() || ($this->screen !== get_current_screen()->id)) {
            return;
        }

        if (! wp_style_is('incredibbble-options', 'enqueued')) {
            wp_enqueue_style(
                'incredibbble-options',
                incredibbble()->url('assets/css/incredibbble-options.css'),
                array('incredibbble'),
                incredibbble_info()->version,
                'all'
            );
        }

        if (! wp_script_is('incredibbble-options', 'enqueued')) {
            wp_enqueue_script(
                'incredibbble-options',
                incredibbble()->url('assets/js/incredibbble-options.js'),
                array('incredibbble'),
                incredibbble_info()->version,
                true
            );
        }

        if ( function_exists('wp_enqueue_media') ) {
            wp_enqueue_media();
        }

        do_action('incredibbble_options_load_assets');
    }


    /**
     * Render the theme options interface.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function render()
    {
        $this->rebuild();

        echo incredibbble()->view('options', array(
            'info'   => incredibbble_info(),
            'theme'  => wp_get_theme(),
            'panels' => $this->panels
        ));
    }


    /**
     * Get option value by specified key.
     * 
     * @since  1.0.0
     * @access public
     * @return array
     */
    public function value($id, $default = null)
    {
        $this->sync();

        $value = $this->data[$id];

        if (! is_null($value) && ($value !== '')) {
            return $value;
        }

        return $default;
    }


    /**
     * Sync the values.
     * 
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function sync()
    {
        $this->data = new Incredibbble_Collection(get_option($this->id));
    }


    /**
     * Validate form data values.
     *
     * @since  1.0.0
     * @access public
     * @param  array $values
     * @return array
     */
    public function validate($values)
    {
        if (isset($_POST['export'])) {
            return $this->export();
        }

        if (isset($_POST['import'])) {
            return $this->import();
        }

        if (isset($_POST['reset'])) {
            return $this->reset(false, true);
        }

        return $this->update($values, false, true);
    }


    /**
     * Sync a values with the options data.
     *
     * @since  1.0.0
     * @access protected
     * @param  array   $values
     * @param  boolean $persist
     * @param  boolean $notice
     * @return array
     */
    protected function update($values = array(), $persist = false, $notice = false)
    {
        if (! is_array($values) || empty($values)) {
            return $this->data->all();
        }

        $this->data->clear();

        foreach ($this->fields()->all() as $field) {
            if (isset($values[$field->id])) {
                $this->data[$field->id] = $field->sanitize($values[$field->id]);
            }
            else {
                switch ($field->type) {
                    case 'checkbox':
                        $this->data[$field->id] = false;
                        break;
                    
                    default:
                        $this->data[$field->id] = null;
                        break;
                }
            }
        }

        if ($notice) {
            $this->notify('options-saved', __('Options saved.', 'incredibbble'), 'updated');
        }

        if ($persist) {
            update_option($this->id, $this->data->all());
        }

        do_action('incredibbble_options_updated', $this->data);

        return $this->data->all();
    }


    /**
     * Restore default options values.
     *
     * @since  1.0.0
     * @access protected
     * @param  boolean $persist
     * @param  boolean $notice
     * @return array
     */
    protected function reset($persist = false, $notice = false)
    {
        if ($notice) {
            $this->notify('options-reset', __('Default options has been succesfully restored.', 'incredibbble'), 'updated');
        }

        return $this->update($this->defaults(), $persist);
    }


    /**
     * Export options data as a JSON file.
     * 
     * @since  1.0.0
     * @access protected
     * @return array
     */
    protected function export()
    {
        $this->data->add('id', $this->id);

        $output = $this->data->jsonSerialize();

        header('Content-Description: File Transfer');
        header('Cache-Control: public, must-revalidate');
        header('Pragma: hack');
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="' . $this->id . date('-Ymd-His') . '.json"');
        header('Content-Length: ' . strlen($output));

        echo $output;

        exit();
    }


    /**
     * Import options data from a JSON file.
     * 
     * @since  1.0.0
     * @access protected
     * @param  array $input
     * @return array
     */
    protected function import()
    {
        $fs   = incredibbble()->filesystem('/wp-admin/themes.php?page=' . $this->id);
        $file = $_FILES['incredibbble-import-file'];

        if (! $fs) {
            $this->notify('import-error', __('Could not instantiate WP_Filesystem.', 'incredibbble'), 'error');

            return $this->data->all();
        }

        if ($file['error'] > 0) {
            $this->notify('import-error', incredibbble_upload_error_message($file['error']), 'error');

            return $this->data->all();
        }

        $values = json_decode($fs->get_contents($file['tmp_name']), true);

        if (! is_array($values)) {
            $this->notify('import-error', __('Unable to load data from this file.', 'incredibbble'), 'error');

            return $this->data->all();
        }

        if (! isset($values['id']) || ($values['id'] !== $this->id)) {
            $this->notify('import-error', __('Invalid backup file.', 'incredibbble'), 'error');

            return $this->data->all();
        }

        $this->notify('import-success', __('Your backup has been succesfully restored.', 'incredibbble'), 'updated');

        return $this->update($values);
    }


    /**
     * Show notification.
     *
     * @since  1.0.0
     * @access protected
     * @param  string $id
     * @param  string $message
     * @param  string $type
     * @return void
     */
    protected function notify($id, $message, $type = 'updated')
    {
        add_settings_error('incredibbble_options', $id, $message, $type . ' incredibbble-notice');
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
        return incredibbble()->is_support('options');
    }

}


/**
 * Register theme options component.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('incredibbble_load_components', function($incredibbble) {
    $incredibbble->register_component('options', function () {
        $id = sanitize_key('incredibbble_' . str_replace(' ', '_', wp_get_theme()->name));

        return new Incredibbble_Options($id);
    });
}, 1);


/**
 * Returns option value by id.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
if (! function_exists('incredibbble_get_option')) {
    function incredibbble_get_option($id, $default = null) {
        return apply_filters('incredibbble_get_option', $id, $default);
    }
}