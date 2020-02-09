<?php


namespace BxHelper\Collection;


/**
 * Class Collection
 * @package BxHelper
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 *
 * String value collection that
 * could set  string prefix
 * and postfix
 */
class StringCollection
{
    private $collection = [];

    private $prefix = '';
    private $postfix = '';

    public final function __construct(string $prefix = null, string $postfix = null)
    {
        $this->prefix = $prefix;
        $this->postfix = $postfix;
    }

    public final function __set(string $name, string $value)
    {
        $this->collection[$name] = $value;
    }

    public function __get(string $name)
    {
        $value = $this->collection[$name];

        $prefix = $this->prefix;
        $postfix = $this->postfix;

        return $prefix . $value . $postfix;
    }

    public function setArrayToCollection(array $values)
    {
        foreach ($values as $key => $value)
        {
            $this->$key = $value;
        }
    }

    public function getCollectionAsArray()
    {
        $result = [];

        foreach ($this->collection as $key => $val) {
            $result[$key] = $this->$key;
        }

        return $result;
    }
}