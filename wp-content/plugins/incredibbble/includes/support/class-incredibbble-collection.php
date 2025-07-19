<?php

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * The incridibbble collection class.
 *
 * @package Incredibbble
 * @since   1.0.0
 */
class Incredibbble_Collection implements Countable, ArrayAccess, JsonSerializable
{

    /**
     * The item collection.
     * 
     * @since  1.0.0
     * @access protected
     * @var    array
     */
    protected $items = array();


    /**
     * The collection constructor
     * 
     * @since  1.0.0
     * @access public
     * @param  array  $items
     * @return void
     */
    public function __construct($items = array())
    {
        $this->fill($items);
    }


    /**
     * Add a set of items.
     * 
     * @since  1.0.0
     * @access public
     * @return array
     */
    public function fill($items)
    {
        if (is_array($items)) {
            $this->items = $items;
        }
    }


    /**
     * Get all items.
     * 
     * @since  1.0.0
     * @access public
     * @return array
     */
    public function all()
    {
        return $this->items;
    }


    /**
     * Add an item to collection
     *
     * @since  1.0.0
     * @access public
     * @param  string $key
     * @param  string $value
     * @return boolean
     */
    public function add($key, $value)
    {
        $this[$key] = $value;

        return $this->offsetExists($key);
    }


    /**
     * Determine if an item exists in the collection.
     *
     * @since  1.0.0
     * @access public
     * @param  string $key
     * @return boolean
     */
    public function has($key)
    {
        return $this->offsetExists($key);
    }


    /**
     * Get item by specified key.
     *
     * @since  1.0.0
     * @access public
     * @param  string $key
     * @return boolean
     */
    public function get($key)
    {
        return $this[$key];
    }


    /**
     * Remove an item from the collection by key.
     *
     * @since  1.0.0
     * @access public
     * @param  string  $key
     * @return boolean
     */
    public function delete($key)
    {
        $this->offsetUnset($key);

        return ! $this->has($key);
    }


    /**
     * Sort items.
     * 
     * @since  1.0.0
     * @access public
     * @param  mixed  $callback
     * @return object self
     */
    public function sort($callback)
    {
        if (is_callable($callback)) {
            uasort($this->items, $callback);
        }
        else {
            usort($this->items);
        }

        return $this;
    }


    /**
     * Execute a callback over each item.
     *
     * @since  1.0.0
     * @access public
     * @param  mixed $callback
     * @return void
     */
    public function each($callback)
    {
        if (! is_callable($callback)) {
            return;
        }

        array_map($callback, $this->items);
    }


    /**
     * Retrieve items without specified items.
     *
     * @since  1.0.0
     * @access public
     * @param  array $key
     * @return array
     */
    public function without($keys)
    {
        $output = array();

        foreach ($this->items as $key => $value)
        {
            if ( ! in_array($key, (array) $keys) )
            {
                $output[$key] = $value;
            }
        }

        return $output;
    }


    /**
     * Retrieve items with specified keys.
     *
     * @since  1.0.0
     * @access public
     * @param  array $key
     * @return array
     */
    public function only($keys)
    {
        $output = array();

        foreach ($items as $key => $value)
        {
            if ( in_array($key, (array) $keys) )
            {
                $output[$key] = $value;
            }
        }

        return $output;
    }


    /**
     * Remove all item from the collection.
     *
     * @since  1.0.0
     * @access public
     * @return array
     */
    public function clear()
    {
        $this->items = array();

        return $this;
    }


    /**
     * Check whether this collection is empty.
     *
     * @since  1.0.0
     * @access public
     * @return array
     */
    public function is_empty()
    {
        return empty($this->items);
    }


    /**
     * Count total items
     * 
     * @since  1.0.0
     * @access public
     * @return integer
     */
    public function count()
    {
        return count($this->items);
    }


    /**
     * Get all keys from the collection.
     *
     * @since  1.0.0
     * @access public
     * @return boolean
     */
    public function keys()
    {
        return array_keys($this->items);
    }


    /**
     * Get all values from the collection.
     *
     * @since  1.0.0
     * @access public
     * @return boolean
     */
    public function values()
    {
        return array_values($this->items);
    }


    /**
     * Reverse the items in the collection.
     *
     * @since  1.0.0
     * @access public
     * @return object self
     */
    public function reverse()
    {
        $this->items = array_reverse($this->items);

        return $this;
    }


    /**
     * Reverse the items in the collection.
     *
     * @since  1.0.0
     * @access public
     * @param  string $key
     * @param  mixed  $value
     * @return object self
     */
    public function where($key, $value)
    {
        return $this->filter(function ($item) use ($key, $value) {
            if (is_array($item)) {
                return $item[$key] === $value;
            }

            if (is_object($item)) {
                return $item->{$key} === $value;
            }
        });
    }

    /**
     * Run a filter over each of the items.
     *
     * @param  mixed $callback
     * @return static
     */
    public function filter(callable $callback = null)
    {
        if ($callback) {
            $return = array();

            foreach ($this->items as $key => $value) {
                if ($callback($value, $key)) {
                    $return[$key] = $value;
                }
            }

            return new static($return);
        }

        return new static(array_filter($this->items));
    }


    /**
     * Get an item by key.
     *
     * @since  1.0.0
     * @access public
     * @param  string  $key
     * @return boolean
     */
    public function offsetGet($key)
    {
        if ( $this->offsetExists($key) )
        {
            return $this->items[$key];
        }
    }


    /**
     * Set an item to the collection.
     *
     * @since  1.0.0
     * @access public
     * @param  string $key
     * @param  mixed  $value
     * @return void
     */
    public function offsetSet($key, $value)
    {
        $this->items[$key] = $value;
    }


    /**
     * Check if an item is exists.
     *
     * @since  1.0.0
     * @access public
     * @param  string $key
     * @return bool
     */
    public function offsetExists($key)
    {
        return array_key_exists($key, $this->items);
    }


    /**
     * Unset an item from the collection.
     *
     * @since  1.0.0
     * @access public
     * @param  string $key
     * @return void
     */
    public function offsetUnset($key)
    {
        unset($this->items[$key]);
    }


    /**
     * Return all items as a JSON encoded string.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function jsonSerialize()
    {
        return json_encode($this->items);
    }


    /**
     * Magically add an item to collection.
     *
     * @since  1.0.0
     * @access public
     * @param  string $key
     * @param  mixed  $value
     * @return void
     */
    public function __set($key, $value)
    {
        $this[$key] = $value;
    }


    /**
     * Magically get an item from collection.
     *
     * @since  1.0.0
     * @access public
     * @param  string  $key
     * @return boolean
     */
    public function __get($key)
    {
        return $this[$key];
    }

}