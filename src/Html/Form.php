<?php


namespace BxHelper\Html;


/**
 * Class Form
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Form extends ElementWithContent
{
    protected function init()
    {
        $this->setName('form');
    }

    public function begin()
    {
        ob_start();
    }

    public function end()
    {
        $content = ob_get_clean();
        $this->setContent(new Text($content, false) );

        return $this->render();
    }
}
