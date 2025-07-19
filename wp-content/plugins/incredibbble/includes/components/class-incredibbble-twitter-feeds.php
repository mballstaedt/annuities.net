<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incredibbble tweets component class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Twitter_Feeds
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
     * Twitter Consumer Key.
     * 
     * @since  1.0.0
     * @access protected
     * @var    string
     */
    protected $key;


    /**
     * Twitter Consumer Key Secret
     * 
     * @since  1.0.0
     * @access protected
     * @var    string
     */
    protected $key_secret;


    /**
     * Twitter Access Token
     * 
     * @since  1.0.0
     * @access protected
     * @var    string
     */
    protected $token;


    /**
     * Twitter Accent Token Secret
     * 
     * @since  1.0.0
     * @access protected
     * @var    string
     */
    protected $token_secret;


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
        $this->cache = incredibbble_get_option('twitter_api_cache', 15) * 60;
        $this->token = incredibbble_get_option('twitter_api_access_token');
        $this->token_secret = incredibbble_get_option('twitter_api_access_token_secret');
        $this->key   = incredibbble_get_option('twitter_api_key');
        $this->key_secret = incredibbble_get_option('twitter_api_key_secret');

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

        add_action('incredibbble_register_options', array($this, 'register_options'));

        add_action('incredibbble_options_updated', array($this, 'options_updated'));

        add_action('incredibbble_deactivated', array($this, 'clear'));

        add_shortcode($this->id, array($this, 'shortcode'));

        do_action('incredibbble_twitter_feeds_init');
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
        $attributes = shortcode_atts( array(
            'username' => null,
            'count'    => 5
        ), $attributes, $this->id);

        $tweets = $this->get($attributes['username'], $attributes['count']);

        return incredibbble()->view('shortcodes.twitter-feeds', compact('tweets', 'attributes'));
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
        $manager->add_section('twitter_api', array (
            'title'    => __('Twitter', 'incredibbble'),
            'panel'    => 'integrations',
            'priority' => 500
        ));

        $manager->add_field('twitter_api_key', array(
            'title'       => __('API Key', 'incredibbble'),
            'subtitle'    => __('Twitter Consumer Key', 'incredibbble'),
            'description' => __('Paste your consumer key here.', 'incredibbble'),
            'section'     => 'twitter_api',
            'type'        => 'text',
            'priority'    => 10
        ));

        $manager->add_field('twitter_api_key_secret', array(
            'title'       => __('API Secret', 'incredibbble'),
            'subtitle'    => __('Twitter Consumer Key Secret', 'incredibbble'),
            'description' => __('Paste your customer key secret here.', 'incredibbble'),
            'section'     => 'twitter_api',
            'type'        => 'text',
            'priority'    => 10
        ));

        $manager->add_field('twitter_api_access_token', array(
            'title'       => __('Access Token', 'incredibbble'),
            'subtitle'    => __('Twitter Access Token', 'incredibbble'),
            'description' => __('Paste your access token here.', 'incredibbble'),
            'section'     => 'twitter_api',
            'type'        => 'text',
            'priority'    => 10
        ));

        $manager->add_field('twitter_api_access_token_secret', array(
            'title'       => __('Access Token Secret', 'incredibbble'),
            'subtitle'    => __('Twitter Access Token Secret', 'incredibbble'),
            'description' => __('Paste your access token secret key here.', 'incredibbble'),
            'section'     => 'twitter_api',
            'type'        => 'text',
            'priority'    => 10
        ));

        $manager->add_field('twitter_api_cache', array(
            'title'       => __('Cache', 'incredibbble'),
            'subtitle'    => __('Cache expiration', 'incredibbble'),
            'description' => __('Please note that Twitter restrict request limit, only 180 requests of every 15 minutes are allowed. Minimum is 5 minutes.', 'incredibbble'),
            'section'     => 'twitter_api',
            'type'        => 'number',
            'attributes'  => array('min' => 5),
            'default'     => 15,
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
        if ($options->get('twitter_api_key') != $this->key) {
            $this->clear();
        }
        
        if ($options->get('twitter_api_key_secret') != $this->key_secret) {
            $this->clear();
        }
        
        if ($options->get('twitter_api_access_token') != $this->token) {
            $this->clear();
        }
        
        if ($options->get('twitter_api_access_token_secret') != $this->token_secret) {
            $this->clear();
        }

        if ($options->get('twitter_api_cache') != $this->cache / 60) {
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
        $headers = array();
        $params  = $this->params(array(
            'oauth_signature' => $this->signature($url)
        ));

        foreach ($params as $key => $value) {
            $headers[] = urlencode($key) . '="' . urlencode($value) . '"';
        }

        $header = 'Authorization: OAuth ' . implode(', ', $headers);

        $options = [
            CURLOPT_HTTPHEADER     => [$header, 'Expect:'],
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
     * Get user tweets.
     * 
     * @since  1.0.0
     * @access protected
     * @param  string  $username
     * @param  integer $count
     * @return array
     */
    public function get($username = false, $count = 5)
    {
        if (! $this->key || ! $this->key_secret || ! $this->token || ! $this->token_secret) {
            return;
        }

        $data = get_transient($this->id);

        if (! is_array($data)) {
            $data = array();
        }

        if (isset($data[$username. '_' . $count])) {
            return $this->parse($data[$username. '_' . $count]);;
        }
        
        if (absint($count) > 200) {
            $count = 5;
        }
        
        if (absint($count) < 1) {
            $count = 1;
        }

        $url   = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $query = array('count' => absint($count));
        
        if ($username) {
            $query['screen_name'] = $username;
        }

        $response = $this->request($url . '?' . http_build_query($query));

        if (! is_array($response) || empty($response)) {
            return;
        }

        if (isset($response['errors'])) {
            return sprintf('%1$s %2$s: %3$s',
                __('Error', 'incredibbble'),
                $response['errors'][0]['code'],
                $response['errors'][0]['message']
            );
        }

        $data[$username. '_' . $count] = $response;

        set_transient($this->id, $data, $this->cache);

        return $this->parse($response);
    }


    /**
     * Parse API response data.
     * 
     * @since  1.0.0
     * @access protected
     * @param  string  $username
     * @param  integer $count
     * @return array
     */
    public function parse($data)
    {
        $output = array();

        if (! is_array($data) || empty($data)) {
            return $output;
        }

        foreach ($data as $item) {
            $tweet = array();

            if (isset($item['user']) && ! empty($item['user'])) {
                $user = $item['user'];
                $tweet['user'] = sprintf('<a href="%s" rel="nofollow">%s</a>',
                    esc_url('https://twitter.com/' . $user['screen_name']),
                    '@' . $user['screen_name']
                );
            }

            if (isset($item['text']) && ! empty($item['text'])) {
                $text = $item['text'];

                foreach ($item['entities'] as $type => $entity) {
                    if (empty($entity)) {
                        continue;
                    }

                    foreach ($entity as $key => $value) {
                        $replace = '';
                        $with    = '';

                        switch ($type) {
                            case 'hashtags':
                                $replace = '#' . $value['text'];
                                $with = sprintf('<a href="%s" rel="nofollow">%s</a>',
                                    esc_url('https://twitter.com/search/?src=hash&q=' . $value['text']),
                                    '#' . $value['text']
                                );
                                break;

                            case 'user_mentions':
                                $replace = '@' . $value['screen_name'];
                                $with = sprintf('<a href="%s" rel="nofollow">%s</a>',
                                    esc_url('ttps://twitter.com/' . $value['screen_name']),
                                    '@' . $value['screen_name']
                                );
                                break;

                            case 'urls':
                                $replace = $value['url'];
                                $with = sprintf('<a href="%s" rel="nofollow">%s</a>',
                                    esc_url($value['url']),
                                    $value['display_url']
                                );
                                break;

                            case 'media':
                                $replace = $value['url'];
                                $with = sprintf('<a href="%s" rel="nofollow">%s</a>',
                                    esc_url($value['url']),
                                    $value['display_url']
                                );
                                break;
                            
                            default: break;
                        }

                        $text = str_replace($replace, $with, $text);
                    }
                }

                $tweet['text'] = $text;
            }

            if (isset($item['created_at']) && ! empty($item['created_at'])) {
                $tweet['timestamp']       = strtotime($item['created_at']);
                $tweet['human_time_diff'] = sprintf(_x('about %s ago', '%s = human-readable time difference', 'incredibbble'), human_time_diff(strtotime($item['created_at']))
                );
            }

            $output[] = $tweet;
        }

        return $output;
    }


    /**
     * Create a request parameters.
     * 
     * @since  1.0.0
     * @access protected
     * @param  array $data
     * @return array
     */
    protected function params($data = array())
    {
        $params = array_merge($data, array(
            'oauth_consumer_key'     => $this->key,
            'oauth_nonce'            => time(),
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_token'            => $this->token,
            'oauth_timestamp'        => time(),
            'oauth_version'          => '1.0'
        ));

        ksort($params);

        return $params;
    }


    /**
     * Create a request signature.
     * 
     * @since  1.0.0
     * @access protected
     * @param  string $url
     * @return array
     */
    protected function signature($url)
    {
        $endpoint = explode('?', $url);
        $params   = $this->params();
        $data     = array();

        if (count($endpoint) == 2) {
            parse_str($endpoint[1], $query);
            $params = $this->params($query);
        }

        foreach ($params as $key => $value) {
            $data[] = urlencode($key) . '=' . urlencode($value);
        }

        $data   = 'GET&' . urlencode($endpoint[0]) . '&' . urlencode(implode('&', $data));
        $secret = urlencode($this->key_secret) . '&' . urlencode($this->token_secret);

        return base64_encode(hash_hmac('sha1', $data, $secret, true));
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
        return incredibbble()->is_support('twitter_feeds');
    }

}


/**
 * Register tweet component.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
add_action('incredibbble_load_components', function($incredibbble) {
    $incredibbble->register_component('twitter_feeds', function () {
        return new Incredibbble_Twitter_Feeds('incredibbble_twitter_feeds');
    });
});