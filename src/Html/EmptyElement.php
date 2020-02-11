<?php


namespace BxHelper\Html;


use BxHelper\Collection\{
    Collection,
    StringCollection
};

/**
 * Class Element
 * @package BxHelper\Html
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
     * @var bool
     *
     * If closingTag exists
     */
    protected $closingTag = false;

    /**
     * @var StringCollection
     */
    private $attributes = null;

    /**
     * @var Collection
     */
    private $options = null;

    public final function __construct(array $attributes, array $options)
    {
        if (!empty($attributes) ) {
            $this->setAttributes($attributes);
        }

        if (!empty($options) ) {
            $this->setOptions($options);
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

    protected function getAttribute(string $key): string
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

    private function setOptions(array $options)
    {
        $collection = New Collection();
        $collection->setArrayToCollection($options);

        $this->options = $collection;
    }

    protected function getOption(string $key)
    {
        return $this->options->$key;
    }
}