<?php


namespace BxHelper\Html;


use BxHelper\Collection\StringCollection;

/**
 * Class BasicElement
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
abstract class BasicElement
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var StringCollection
     */
    private $attributes = null;

    /**
     * This function need to be implemented
     * by child to set name by calling setName()
     */
    protected abstract function init();

    protected abstract function render(): string;

    /**
     * This function is setting
     * the name of the element
     */
    protected function setName(string $name)
    {
        $this->name = $name;
    }

    protected function setAttributes(array $attributes)
    {
        $collection = New StringCollection();
        $collection->setArrayToCollection($attributes);

        $this->attributes = $collection;
    }

    public function getAttribute(string $key): string
    {
        return $this->attributes->$key;
    }

    protected function getAttributesString(): string
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