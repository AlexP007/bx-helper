<?php


namespace BxHelper\Collection;


use BxHelper\Traits\Thrower;

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
    use Thrower;

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
            self::ensureParameter(is_string($key), 'Collection keys can only be strings');
            $this->$key = $value;
        }
    }

    public function getIterator(): iterable
    {
        foreach ($this->collection as $key => $value) {
            $value = $this->$key;
            yield $key => $value;
        }
    }
}