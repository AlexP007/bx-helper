<?php


namespace BxHelper\Html;

/**
 * Class H1
 * @package BxHelper\Html
 * @license MIT
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class H1 extends ElementWithContent
{
    protected function init()
    {
        $this->setName('h1');
    }
}
