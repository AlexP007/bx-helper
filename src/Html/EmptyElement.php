<?php


namespace BxHelper\Html;


/**
 * Class Element
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
abstract class EmptyElement extends BasicElement
{
    public final function render(): string
    {
        return "<{$this->name}" . $this->getAttributesString() . ">";
    }
}
