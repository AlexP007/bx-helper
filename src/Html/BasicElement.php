<?php


namespace BxHelper\Html;


use BxHelper\Collection\StringCollection;
use BxHelper\Traits\Thrower;

/**
 * Class BasicElement
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
abstract class BasicElement
{
    use Thrower;

    /**
     * In this function you need to return
     * the html valid string of the element
     */
    public abstract function render(): string;
}