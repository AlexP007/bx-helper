<?php


namespace BxHelper\Html;


/**
 * Class Input
 * @package BxHelper\Html
 * @license MIT
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Input extends ElementWithoutContent
{
    protected function init()
    {
        $this->setName('input');
    }
}
