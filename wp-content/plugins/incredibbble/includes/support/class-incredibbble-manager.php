<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incredibbble manager class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
abstract class Incredibbble_Manager
{

    /**
     * Unique options identifier.
     * 
     * @since  1.0.0
     * @access protected
     * @var    string
     */
    protected $id;


    /**
     * Panel collection.
     * 
     * @since  1.0.0
     * @access protected
     * @var    Incredibbble_Collection
     */
    protected $panels;


    /**
     * Section collection.
     * 
     * @since  1.0.0
     * @access protected
     * @var    Incredibbble_Collection
     */
    protected $sections;


    /**
     * Field collection.
     * 
     * @since  1.0.0
     * @access protected
     * @var    Incredibbble_Collection
     */
    protected $fields;


    /**
     * The config constructor.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $id
     * @return void
     */
    public function __construct($id)
    {
        $this->id       = $id;
        $this->panels   = new Incredibbble_Collection;
        $this->sections = new Incredibbble_Collection;
        $this->fields   = new Incredibbble_Collection;
    }


    /**
     * Get ID.
     * 
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function get_id()
    {
        return $this->id;
    }


    /**
     * Add item to panel collection.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $id
     * @param  array  $args
     * @return self
     */
    public function add_panel($id, array $args = array())
    {
        $panel = new Incredibbble_Panel($this, sanitize_key($id), $args);

        $this->panels->add($id, $panel);

        return $this;
    }


    /**
     * Determine whether a specified panel exists.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $id
     * @return boolean
     */
    public function has_panel($id)
    {
        return $this->panels->has($id);
    }


    /**
     * Get a specified panel.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $id
     * @return boolean
     */
    public function get_panel($id)
    {
        return $this->panels->get($id);
    }


    /**
     * Get all panels.
     * 
     * @since  1.0.0
     * @access public
     * @return Incredibbble_Collection
     */
    public function panels()
    {
        $panels = $this->panels;
        
        // $panels->reverse()->sort('incredibbble_compare_priority');

        return $panels;
    }


    /**
     * Add item to section collection.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $id
     * @param  array  $args
     * @return self
     */
    public function add_section($id, array $args = array())
    {
        if (isset($args['panel']) && $this->has_panel($args['panel'])) {
            $section = new Incredibbble_Section($this, sanitize_key($id), $args);

            $this->sections->add($id, $section);
        }

        return $this;
    }


    /**
     * Determine whether a specified section exists.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $id
     * @return boolean
     */
    public function has_section($id)
    {
        return $this->sections->has($id);
    }


    /**
     * Get a specified section.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $id
     * @return boolean
     */
    public function get_section($id)
    {
        return $this->sections->get($id);
    }


    /**
     * Get all sections.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $panel
     * @return Incredibbble_Collection
     */
    public function sections($panel = null)
    {
        if ($panel) {
            $sections = $this->sections->where('panel', $panel);
        }
        else {
            $sections = $this->sections;
        }
        
        // $sections->reverse()->sort('incredibbble_compare_priority');

        return $sections;
    }


    /**
     * Add item to field collection.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $id
     * @param  array  $args
     * @return self
     */
    public function add_field($id, array $args = array())
    {
        if (! isset($args['type']) || ! incredibbble()->has_control($args['type'])) {
            $args['type'] = 'text';
        }

        $control = incredibbble()->get_control($args['type']);

        if (isset($args['section']) && $this->has_section($args['section'])) {
            $field = new $control($this, sanitize_key($id), $args);
            
            $field->attributes = $this->set_control_attributes($field);

            $this->fields->add($id, $field);
        }

        return $this;
    }


    /**
     * Determine whether a specified field exists.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $id
     * @return boolean
     */
    public function has_field($id)
    {
        return $this->fields->has($id);
    }


    /**
     * Get a specified field.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $id
     * @return boolean
     */
    public function get_field($id)
    {
        return $this->fields->get($id);
    }


    /**
     * Get all fields.
     * 
     * @since  1.0.0
     * @access public
     * @param  string $section
     * @return Incredibbble_Collection
     */
    public function fields($section = null)
    {
        if ($section) {
            $fields = $this->fields->where('section', $section);
        }
        else {
            $fields = $this->fields;
        }

        // $fields->reverse()->sort('incredibbble_compare_priority');

        return $fields;
    }


    /**
     * Rearange all panels, sections and fields.
     * 
     * @since  1.0.0
     * @access public
     * @return Incredibbble_Collection
     */
    public function rebuild()
    {
        $this->panels->reverse()->sort('incredibbble_compare_priority');

        foreach ($this->panels->all() as $panel) {
            $panel->sections = $this->sections($panel->id);
            $panel->sections->reverse()->sort('incredibbble_compare_priority');

            if ($panel->sections->is_empty()) {
                $this->panels->delete($panel->id);
            }

            foreach ($panel->sections->all() as $section) {
                $section->fields = $this->fields($section->id);
                $section->fields->reverse()->sort('incredibbble_compare_priority');

                if ($section->fields->is_empty()) {
                    $panel->sections->delete($section->id);
                }
            }
        }

        return $this->panels;
    }


    /**
     * Get fields default values.
     * 
     * @since  1.0.0
     * @access public
     * @return array
     */
    public function defaults()
    {
        $values = array();

        foreach ($this->fields->all() as $field) {
            $values[$field->id] = $field->default;
        }

        return $values;
    }


    /**
     * Set control attributes.
     * 
     * @since  1.0.0
     * @access protected
     * @param  Incredibbble_Control $control
     * @return array
     */
    abstract protected function set_control_attributes(Incredibbble_Control $control);

}