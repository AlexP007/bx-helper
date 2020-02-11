<?php


namespace BxHelper\Collection;


/**
 * Class Collection
 * @package BxHelper\Collection
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Collection
{
    protected $collection = [];

    public function __set(string $name, $value)
    {
        $this->collection[$name] = $value;
    }

    public function __get(string $name)
    {
        return $this->collection[$name];
    }

    public function setArrayToCollection(array $values)
    {
        foreach ($values as $key => $value)
        {
            $this->$key = $value;
        }
    }

    public function getCollectionAsArray(): array
    {
        $result = [];

        foreach ($this->collection as $key => $val) {
            $result[$key] = $this->$key;
        }

        return $result;
    }
}