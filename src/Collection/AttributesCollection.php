<?php


namespace BxHelper\Collection;


/**
 * AttributesCollection
 * @package BxHelper
 * @license MIT
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 *
 * AttributesCollection value
 * could be only strings, null or true
 */
class AttributesCollection extends Collection
{
    public function __set(string $name, $value)
    {
        self::ensureParameter(
            is_string($value) || is_null($value),
            'Attributes can only be strings, null or true'
        );

        parent::__set($name, $value);
    }

    public function __get(string $name): string
    {
        return parent::__get($name);
    }
}
