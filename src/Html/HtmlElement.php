<?php


namespace BxHelper\Html;


use BxHelper\Collection\StringCollection;
use BxHelper\Domain\Value;

/**
 * Class HtmlElement
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
abstract class HtmlElement extends BasicElement
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var StringCollection
     */
    private $attributes = null;

    public function __construct(array $attributes)
    {
        if (!empty($attributes) ) {
            $this->setAttributes($attributes);
        }

        $this->init();
    }

    /**
     * This function need to be implemented
     * by child to set name by calling setName()
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

    protected function setAttributes(array $attributes)
    {
        $collection = new StringCollection();
        $collection->setArrayToCollection($attributes);

        $this->attributes = $collection;
    }

    public function getAttribute(string $key): string
    {
        if ($key === 'value') {
            return $this->getValue($this->attributes->$key);
        }
        return $this->attributes->$key;
    }

    protected function getAttributesString(): string
    {
        if (!$this->attributes) {
            return '';
        }

        $result = ' ';

        foreach ($this->attributes->getIterator() as $key => $value) {
            $attribute = strtolower($key);

            if (is_null($value) ) {
                $result .= "$attribute ";
            } else {
                if ($key === 'value') {
                    $value = $this->getValue($value);
                }
                $result .= "$attribute=\"$value\" ";
            }
        }

        return rtrim($result);
    }

    private function getValue(string $value)
    {
        return (new Value($value) )->getValue();
    }
}