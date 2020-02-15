<?php


namespace BxHelper\Factory;


use BxHelper\Html\{BasicElement, Text};

/**
 * Class BasicFactory
 * @package BxHelper\Factory
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
abstract class BasicFactory
{
    /**
     * @var string
     */
    protected $class;

    /**
     * @var BasicElement
     */
    protected $element;

    /**
     * @var BasicElement
     */
    protected $content;

    /**
     * @var array
     */
    protected $attributes;

    public function __construct($content, array $attributes)
    {
        $this->setClass();

        if (is_a($content, BasicElement::class, true) ) {
            $this->content = $content;
        } else {
            $this->content = new Text($content);
        }

        $this->attributes = $attributes;

        $this->initElement();
    }

    abstract protected function setClass();

    abstract protected function initElement();
}