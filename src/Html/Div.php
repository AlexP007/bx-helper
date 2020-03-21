<?php


namespace BxHelper\Html;


/**
 * Class Div
 * @package BxHelper\Html
 * @license MIT
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Div extends ElementWithContent
{
    protected function init()
    {
        $this->setName('div');
    }
}