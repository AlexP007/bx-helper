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
abstract class Element extends EmptyElement
{
    /**
     * @var string
     *
     * Content of the element
     */
    private $content = null;

    public function render(): string
    {
        return parent::render() . $this->content . "</$this->name>";
    }

    public function setContent(string $content)
    {
        $this->content = $content;
    }
}