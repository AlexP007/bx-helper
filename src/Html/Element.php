<?php


namespace BxHelper\Html;


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