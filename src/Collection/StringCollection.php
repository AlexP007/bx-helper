<?php


namespace BxHelper\Collection;


/**
 * Class Collection
 * @package BxHelper
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 *
 * String value collection that
 * could set string prefix
 * and postfix
 */
class StringCollection extends Collection
{
    private $prefix = '';
    private $postfix = '';

    public final function __construct(string $prefix = null, string $postfix = null)
    {
        $this->prefix = $prefix;
        $this->postfix = $postfix;
    }

    public function __set(string $name, $value)
    {
        self::ensureParameter(is_string($value), 'StringCollection can only contain strings');

        parent::__set($name, $value);
    }

    public function __get(string $name): string
    {
        $value = parent::__get($name);

        $prefix = $this->prefix;
        $postfix = $this->postfix;

        return $prefix . $value . $postfix;
    }
}
