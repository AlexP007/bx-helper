<?php


namespace BxHelper\Html;


/**
 * Class Element
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
abstract class Element extends BasicElement
{
    /**
     * @var string
     *
     * Content of the element
     */
    private $content = null;

    public final function renderHtml(): string
    {
        return "<{$this->name}" . $this->getAttributesString() . ">"
            . $this->content . "</$this->name>";
    }

    /**
     * @param string $content
     */
    public final function setContent(string $content)
    {
        $this->content = $content;
    }
}