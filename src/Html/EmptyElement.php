<?php


namespace BxHelper\Html;


use BxHelper\Collection\StringCollection;

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
    public final function __construct(array $attributes)
    {
        if (!empty($attributes) ) {
            $this->setAttributes($attributes);
        }

        $this->init();
    }

    public function render(): string
    {
        return "<{$this->name}" . $this->getAttributesString() . ">";
    }
}
