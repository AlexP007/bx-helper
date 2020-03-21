<?php


namespace BxHelper\Html;


/**
 * Class Element
 * @package BxHelper\Html
 * @license MIT
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
abstract class ElementWithoutContent extends HtmlElement
{
    public final function render(): string
    {
        return "<{$this->name}" . $this->getAttributesString() . ">";
    }
}
