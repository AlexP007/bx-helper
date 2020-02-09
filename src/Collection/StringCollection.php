<?php


namespace BxHelper\Collection;

/**
 * Class Collection
 * @package BxHelper
 *
 * Коллекция строковых значений
 * с возможностью задания
 * префикса и постфикса
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