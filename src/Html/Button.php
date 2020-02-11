<?php


namespace BxHelper\Html;

/**
 * Class Button
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Button extends Element
{
    protected function init()
    {
        $this->setName('button');
    }
}