<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incredibbble plugin class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble
{

    /**
     * Self cached instance.
     * 
     * @since  1.0.0
     * @access protected
     * @var    self
     */
    protected static $instance;

    
    /**
     * Plugin directory path.
     * 
     * @since  1.0.0
     * @access protected
     * @var    string
     */
    protected $path;

    
    /**
     * Plugin directory url.
     * 
     * @since  1.0.0
     * @access protected
     * @var    string
     */
    protected $url;

    
    /**
     * Components collections
     * 
     * @since  1.0.0
     * @access protected
     * @var    Incredibbble_Collection
     */
    protected $components;

    
    /**
     * Controls collection.
     * 
     * @since  1.0.0
     * @access protected
     * @var    Incredibbble_Collection
     */
    protected $controls;

    
    /**
     * JavaScript translations.
     * 
     * @since  1.0.0
     * @access protected
     * @var    Incredibbble_Collection
     */
    protected $js_translation;


    /**
     * The class constructor.
     * 
     * @since  1.0.0
     * @access protected
     * @return void
     */
    protected function __construct()
    {
        $this->path = plugin_dir_path(dirname(__FILE__));

        $this->url  = plugin_dir_url(dirname(__FILE__));

        $this->load_files();

        add_action('plugins_loaded', array($this, 'load_controls'));

        add_action('plugins_loaded', array($this, 'load_components'));

        add_action('plugins_loaded', array($this, 'components_loaded'));

        add_action('admin_enqueue_scripts', array($this, 'load_admin_assets'));

        add_action('wp_enqueue_scripts', array($this, 'load_public_assets'));

        add_action('init', array($this, 'init'));
    }


    /**
     * Hook actions after WordPress has finished loading.
     * 
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function init()
    {
        if (! $this->is_support()) {
            if (! is_network_admin()) {
                add_action('all_admin_notices', function () {
                    echo $this->view('unsupported');
                });
            }

            return;
        }

        do_action('incredibbble_init');
    }


    /**
     * Load admin assets.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $hook
     * @return void
     */
    public function load_admin_assets($hook)
    {
        if (! $this->is_support()) {
            return;
        }

        if (! wp_style_is('incredibbble', 'registered')) {
            wp_register_style(
                'incredibbble',
                incredibbble()->url('assets/css/incredibbble.css'),
                array('wp-color-picker'),
                incredibbble_info()->version,
                'all'
            );
        }

        if (! wp_script_is('incredibbble', 'registered')) {
            wp_register_script(
                'incredibbble',
                incredibbble()->url('assets/js/incredibbble.js'),
                array('jquery', 'wp-color-picker', 'underscore'),
                incredibbble_info()->version,
                true
            );
        }

        wp_localize_script('incredibbble', 'incredibbble_params', $this->get_js_translation());

        do_action('incredibbble_load_admin_assets', $hook);
    }


    /**
     * Load public assets.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $hook
     * @return void
     */
    public function load_public_assets($hook)
    {
        if (is_admin() && ! $this->is_support()) {
            return;
        }

        do_action('incredibbble_load_public_assets', $hook);
    }


    /**
     * Register a component
     * 
     * @since  1.0.0
     * @access public
     * @param  string  $name
     * @param  Closure $callback
     * @return boolean
     */
    public function register_component($name, $callback)
    {
        if (! is_callable($callback)) {
            return false;
        }

        $this->components[$name] = $callback();

        return true;
    }


    /**
     * Load all components.
     * 
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function load_components()
    {
        $this->components = new Incredibbble_Collection;

        do_action('incredibbble_load_components', $this);
    }


    /**
     * Fire actions after all components are loaded.
     * 
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function components_loaded()
    {
        do_action('incredibbble_components_loaded');
    }


    /**
     * Register a new control.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $name
     * @param  string $class
     * @return boolean
     */
    public function register_control($name, $class)
    {
        if (! class_exists($class)) {
            return false;
        }

        $this->controls[$name] = $class;

        return true;
    }


    /**
     * Check whether a specified control exists.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $name
     * @return boolean
     */
    public function has_control($name)
    {
        return $this->controls->has($name);
    }


    /**
     * Get a specified control.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $name
     * @return string
     */
    public function get_control($name)
    {
        return $this->controls[$name];
    }


    /**
     * Load all controls.
     * 
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function load_controls()
    {
        $this->controls = new Incredibbble_Collection;

        do_action('incredibbble_load_controls', $this);
    }


    /**
     * Get plugin path.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $path
     * @return string
     */
    public function path($path = '')
    {
        if (! $this->is_file($path)) {
            $path = trailingslashit($path);
        }

        return $this->path . $path;
    }


    /**
     * Get plugin url.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $path
     * @return string
     */
    public function url($path = '')
    {
        if (! $this->is_file($path)) {
            $path = trailingslashit($path);
        }
        
        return $this->url . $path;
    }


    /**
     * Load plugin's required files.
     * 
     * @since  1.0.0
     * @access protected
     * @return void
     */
    protected function load_files()
    {
        $this->load_file($this->path('includes/incredibbble-helpers.php'));

        $this->load_files_in($this->path('includes/support'), array('index.php'));

        $this->load_files_in($this->path('includes/controls'), array('index.php'));

        $this->load_files_in($this->path('includes/components'), array('index.php'));

        $this->load_files_in($this->path('includes/widgets'), array('index.php'));
    }


    /**
     * Check if string is a file.
     * We prefer to not use built-in php is_file() function because 
     * sometimes it doesn't work due to file permissions.
     * 
     * @since  1.0.0
     * @access public
     * @param  string  $file
     * @return boolean
     */
    public function is_file($file)
    {
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        return strlen($extension) > 0;
    }


    /**
     * Load a specified file.
     * 
     * @since  1.0.0
     * @access public
     * @param  string  $file
     * @return boolean
     */
    public function load_file($file)
    {
        if (! file_exists($file)) {
            return false;
        }

        require_once $file;

        return true;
    }


    /**
     * Load all files in a specific directory.
     * 
     * @since  1.0.0
     * @access public
     * @param  string  $directory
     * @param  array   $exclude
     * @return integer
     */
    public function load_files_in($directory, $exclude = array())
    {
        $files = glob(trailingslashit($directory) . '*.php');
        $found = 0;

        foreach ($files as $file) {
            if (in_array(basename($file), $exclude)) {
                continue;
            }

            if ($this->load_file(trailingslashit($directory) . basename($file))) {
                $found++;
            }
        }

        return $found;
    }


    /**
     * Render a view template.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $template
     * @param  array  $data
     * @return string
     */
    public function view($template, $data = array())
    {
        if (! file_exists($template)) {
            $template = $this->get_template($template);
        }

        if (! $template) {
            return "Template '$template' is not found";
        }

        ob_start();

        extract($data);

        include $template;

        return ltrim(ob_get_clean());
    }


    /**
     * Get a view template.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $name
     * @return string|boolean
     */
    public function get_template($name)
    {
        $template = $this->path('templates') . str_replace('.', DIRECTORY_SEPARATOR, $name) . '.php';
        
        if (file_exists($template)) {
            return $template;
        }

        return false;
    }


    /**
     * Get JavaScipt translations.
     * 
     * @since  1.0.0
     * @access public
     * @param  string  $file
     * @return boolean
     */
    public function get_js_translation()
    {
        $this->js_translation = new Incredibbble_Collection();

        $this->js_translation->fill(
            array(
                'open_library' => __('Open Library', 'incredibbble'),
                'select_image' => __('Select Image', 'incredibbble'),
                'select_video' => __('Select Video', 'incredibbble'),
                'select_audio' => __('Select Audio', 'incredibbble'),
                'remove'       => __('Remove', 'incredibbble')
            )
        );

        do_action('incredibbble_js_translation', $this->js_translation);

        return $this->js_translation->all();
    }


    /**
     * Get WP_Filesystem object.
     *
     * @since  1.0.0
     * @access public
     * @return boolean
     */
    public function filesystem($url)
    {
        $url = wp_nonce_url($url);

        if (! function_exists('request_filesystem_credentials') || false === ($credentials = request_filesystem_credentials($url))) {
            return;
        }

        if (! WP_Filesystem($credentials)) {
            request_filesystem_credentials($url, 'direct', true); 
            return;
        }

        global $wp_filesystem;

        return $wp_filesystem;
    }


    /**
     * Check whether current theme support for this plugin.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $component
     * @return boolean
     */
    public function is_support($component = null)
    {
        if (! $component) {
            return current_theme_supports('incredibbble');
        }

        $support = get_theme_support('incredibbble');

        if (! is_array($support)) {
            return false;
        }
        
        $support = current($support);

        return in_array($component, $support);
    }


    /**
     * Returns self cached instance or build new instance if undefined.
     * 
     * @since  1.0.0
     * @access public
     * @return self
     */
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * Fired once plugin activated.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public static function activate()
    {
        do_action('incredibbble_activated');
    }


    /**
     * Fired once plugin deactivated.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public static function deactivate()
    {
        do_action('incredibbble_deactivated');
    }


    /**
     * Magic method.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $name
     * @param  array  $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (preg_match('/\Acontrol_/', $name)) {
            $name = preg_replace('/\Acontrol_/', '', $name);

            if ($this->controls->has($name)) {
                return $this->controls->get($name);
            }
        }

        if ($this->components->has($name)) {
            return $this->components->get($name);
        }
    }

}