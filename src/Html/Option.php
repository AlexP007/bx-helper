<?php


namespace BxHelper\Html;


/**
 * Class Option
 * @package BxHelper\Html
 * @license MIT
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Option extends ElementWithContent
{
    protected function init()
    {
        $this->setName('option');
    }
}
