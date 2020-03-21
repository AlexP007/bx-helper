<?php


namespace BxHelper\Html;


/**
 * Class Element
 * @package BxHelper\Html
 * @license MIT
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
    private $content = null;

    final public function __construct(array $attributes, BasicElement $content = null)
    {
        if ($content) {
            $this->setContent($content);
        }
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
    protected final function setContent(BasicElement $content)
    {
        $this->content = $content;
    }

    protected final function getContent(): string
    {
        return $this->content ? $this->content->render() : '';
    }
}