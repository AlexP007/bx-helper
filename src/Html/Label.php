<?php


namespace BxHelper\Html;


/**
 * Class Label
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Label extends Element
{
    protected function init()
    {
        $this->setName('label');
    }
}