<?php


namespace BxHelper\Html;


use BxHelper\Interfaces\Content;

/**
 * Class Element
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
abstract class ElementWithContent extends HtmlElement
{
    /**
     * @var BasicElement
     *
     * Content of the element
     */
    private $content;

    final public function __construct(array $attributes, BasicElement $content = null)
    {
        $this->setContent($content);
        parent::__construct($attributes);
    }

    public final function render(): string
    {
        return "<{$this->name}" . $this->getAttributesString() . ">"
            . $this->getContent() . "</$this->name>";
    }

    /**
     * @param BasicElement $content
     */
    private final function setContent(BasicElement $content)
    {
        $this->content = $content;
    }

    private final function getContent(): string
    {
        return $this->content->render();
    }
}