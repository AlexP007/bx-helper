<?php


namespace BxHelper\Html;


/**
 * Class Iframe
 * @package BxHelper\Html
 * @license MIT
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Iframe extends ElementWithContent
{
    protected function init()
    {
        $this->setName('iframe');
    }
}