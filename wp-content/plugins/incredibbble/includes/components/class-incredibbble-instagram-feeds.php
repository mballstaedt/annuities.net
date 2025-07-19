<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incredibbble tweets component class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Instagram_Feeds
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
     * Instagram Access Token
     * 
     * @since  1.0.0
     * @access protected
     * @var    string
     */
    protected $token;


    /**
     * Cache expiration time in minutes.
     * 
     * @since  1.0.0
     * @access protected
     * @var    integer
     */
    protected $cache = 15;


    /**
     * The constructor
     * 
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function __construct($id)
    {
        $this->id    = $id;
        $this->cache = incredibbble_get_option('instagram_api_cache', 15) * 60;
        $this->token = incredibbble_get_option('instagram_api_access_token');

        add_action('incredibbble_init', array($this, 'init'));
    }


    /**
     * Firest once incredibble initialized.
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

        add_shortcode($this->id, array($this, 'shortcode'));

        add_action('incredibbble_register_options', array($this, 'register_options'));

        add_action('incredibbble_options_updated', array($this, 'options_updated'));

        add_action('incredibbble_deactivated', array($this, 'clear'));

        do_action('incredibbble_instagram_feeds_init');
    }


    /**
     * Add tweets shortcode.
     * 
     * @since  1.0.0
     * @access public
     * @param  array $attributes
     * @return string
     */
    public function shortcode($attributes)
    {
        $attributes = shortcode_atts(array(
            'count'    => 12,
            'size'     => 'thumbnail',
            'lazyload' => false
        ), $attributes, $this->id);

        $attributes['count'] = absint($attributes['count']);

        if (! $attributes['count'] || $attributes['count'] < 1) {
            $attributes['count'] = 12;
        }

        if ($feeds = $this->get($attributes['count'], $attributes['size'])) {
            return incredibbble()->view('shortcodes.instagram-feeds', compact('feeds', 'attributes'));
        }
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
        $manager->add_section('instagram_api', array (
            'title'    => __('Instagram', 'incredibbble'),
            'panel'    => 'integrations',
            'priority' => 510
        ));

        $manager->add_field('instagram_api_access_token', array(
            'title'       => __('Access Token', 'incredibbble'),
            'subtitle'    => __('Instagram Access Token', 'incredibbble'),
            'description' => sprintf(__('Paste your Instagram access token here. Use free tool such as %s to generate your access token.', 'incredibbble'), '<a href="http://instagram.pixelunion.net/">PixelUnion Instagram</a>'),
            'section'     => 'instagram_api',
            'type'        => 'text',
            'priority'    => 10
        ));

        $manager->add_field('instagram_api_cache', array(
            'title'       => __('Cache', 'incredibbble'),
            'subtitle'    => __('Cache expiration', 'incredibbble'),
            'description' => __('Please specify the cache expiration in minutes. Minimum is 5 minutes.', 'incredibbble'),
            'section'     => 'instagram_api',
            'type'        => 'number',
            'attributes'  => array(
                'min' => 5
            ),
            'default'    => 15,
            'priority'   => 10
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
        if ($options->get('instagram_api_access_token') != $this->token) {
            $this->clear();
        }

        if ($options->get('instagram_api_cache') != $this->cache / 60) {
            $this->clear();
        }
    }


    /**
     * Perform API request.
     * 
     * @since  1.0.0
     * @access protected
     * @param  string $url
     * @return array
     */
    public function request($url)
    {
        $options = [
            CURLOPT_HEADER         => false,
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false
        ];

        $request = curl_init();

        curl_setopt_array($request, $options);

        $response = curl_exec($request);

        curl_close($request);

        return json_decode($response, true);
    }


    /**
     * Get the feeds.
     * 
     * @since  1.0.0
     * @access protected
     * @param  string  $username
     * @param  integer $count
     * @param  string  $size
     * @return array
     */
    public function get($count = 12, $size = 'thumbnail')
    {
        if ($data = get_transient($this->id)) {
            return $this->parse($data, $count, $size);
        }

        if ($this->token) {
            $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $this->token;

            $response = $this->request($url);

            if (! is_array($response) || empty($response)) {
                return;
            }

            set_transient($this->id, $response, $this->cache);

            return $this->parse($response, $count, $size);
        }
    }


    /**
     * Parse response data.
     *
     * @since  1.0.0
     * @access protected
     * @param  array   $data
     * @param  integer $count
     * @param  string  $size
     * @return boolean
     */
    protected function parse($data, $count, $size)
    {
        $output = array();

        if (! is_array($data) || empty($data)) {
            return $output;
        }

        if (($data['meta']['code'] == 200) && ! empty($data['data'])) {
            foreach ($data['data'] as $item) {
                if ($item['type'] != 'image') {
                    continue;
                }

                $image = $item['images'][$size];

                if ($image['width'] != $image['height']) {
                    continue;
                }

                $output[] = array(
                    'id'     => $item['id'],
                    'link'   => $item['link'],
                    'url'    => $item['link'],
                    'image'  => $image,
                    'images' => $item['images']
                );
            }
        }

        return array_slice($output, 0, $count);
    }


    /**
     * Clear cache.
     * 
     * @since  1.0.0
     * @access protected
     * @return void
     */
    public function clear()
    {
        delete_transient($this->id);
        delete_transient($this->id . '_ids');
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
        return incredibbble()->is_support('instagram_feeds');
    }

}


/**
 * Register tweet component.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('incredibbble_load_components', function($incredibbble) {
    $incredibbble->register_component('instagram_feeds', function () {
        return new Incredibbble_Instagram_Feeds('incredibbble_instagram_feeds');
    });
});