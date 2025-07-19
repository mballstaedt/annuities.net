<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incridibbble section class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Section
{

    /**
     * Manager instance.
     * 
     * @since  1.0.0
     * @access public
     * @var    Incredibbble_Manager
     */
    public $manager;


    /**
     * Section id.
     * 
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $id;


    /**
     * Panel ID.
     * 
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $panel;


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
    }

}