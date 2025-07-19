<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incridibbble control abstract class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
abstract class Incredibbble_Control
{

    /**
     * Manager instance.
     * 
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $manager;


    /**
     * Section ID.
     * 
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $section;


    /**
     * Field id.
     * 
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $id;


    /**
     * Field type.
     * 
     * @since  1.0.0
     * @access public
     * @var    array
     */
    public $type = 'text';


    /**
     * Item title.
     * 
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $title;


    /**
     * Item subtitle.
     * 
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $subtitle;


    /**
     * Field description.
     * 
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $description;


    /**
     * Field attributes.
     * 
     * @since  1.0.0
     * @access public
     * @var    array
     */
    public $attributes = array();


    /**
     * Field choices.
     * 
     * @since  1.0.0
     * @access public
     * @var    array
     */
    public $choices = array();


    /**
     * Field settings.
     * 
     * @since  1.0.0
     * @access public
     * @var    array
     */
    public $settings = array();


    /**
     * Field customizer settings.
     * 
     * @since  1.0.0
     * @access public
     * @var    array
     */
    public $customizer = array();


    /**
     * Field default value.
     * 
     * @since  1.0.0
     * @access public
     * @var    mixed
     */
    public $default;


    /**
     * Item priority.
     * 
     * @since  1.0.0
     * @access public
     * @var    integer
     */
    public $priority = 10;


    /**
     * The constructor
     * 
     * @since  1.0.0
     * @access public
     * @param  Incredibbble_Manager $manager
     * @param  string $id
     * @param  array  $args
     * @return void
     */
    public function __construct(Incredibbble_Manager $manager, $id, array $args = array())
    {
        $this->id = $id;
        $this->manager = $manager;

        foreach ($args as $key => $value) {
            $this->{$key} = $value;
        }

        $this->default = $this->sanitize($this->default);
    }


    /**
     * Check whether field has a specified attribute.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $key
     * @return mixed
     */
    public function has_attr($key)
    {
        return isset($this->attributes[$key]);
    }


    /**
     * Get a specified field attribute.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $key
     * @return mixed
     */
    public function get_attr($key)
    {
        if ($this->has_attr($key)) {
            return $this->attributes[$key];
        }
    }


    /**
     * Sanitize value.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $value
     * @return string
     */
    abstract public function sanitize($value);


    /**
     * Get view render.
     * 
     * @since  1.0.0
     * @access public
     * @return string
     */
    abstract public function render($data = array());

}