<?php


namespace BxHelper\Html;


use BxHelper\Collection\StringCollection;

/**
 * Class Element
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
abstract class EmptyElement
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var StringCollection
     */
    private $attributes = null;

    public final function __construct(array $attributes)
    {
        if (!empty($attributes) ) {
            $this->setAttributes($attributes);
        }

        $this->init();
    }

    /**
     * This function need to be implemented
     * by child to set name and closingTag
     * by calling setName() and setClosingTag()
     */
    protected abstract function init();

    /**
     * This function is setting
     * the name of the element
     */
    protected function setName(string $name)
    {
        $this->name = $name;
    }

    public function render(): string
    {
        return "<{$this->name}" . $this->getAttributesString() . ">";
    }

    private function setAttributes(array $attributes)
    {
        $collection = New StringCollection();
        $collection->setArrayToCollection($attributes);

        $this->attributes = $collection;
    }

    public function getAttribute(string $key): string
    {
        return $this->attributes->$key;
    }

    private function getAttributesString(): string
    {
        if (!$this->attributes) {
            return '';
        }

        $result = ' ';

        $attributes = $this->attributes->getCollectionAsArray();

        foreach ($attributes as $key => $value)
        {
            $attribute = strtolower($key);

            if (is_null($value) ) {
                $result .= "$attribute ";
            } else {
                $result .= "$attribute=\"$value\" ";
            }
        }

        return rtrim($result);
    }
}
