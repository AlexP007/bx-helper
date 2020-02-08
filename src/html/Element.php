<?php


namespace BxHelper\Html;

use BxHelper\Collection\StringCollection;
use BxHelper\Exception\ParameterException;

abstract class Element
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     *
     * Есть ли закрывающий тэг
     */
    protected $closingTag;

    /**
     * @var StringCollection
     */
    private $attributes = null;

    /**
     * @var string
     *
     * Содержимое
     */
    private $content;

    public final function __construct(array $attributes = array() )
    {
        if (!empty($attributes) ) {
            $this->setAttributes($attributes);
        }
    }

    public function render()
    {
        $openTag = "<{$this->name}";

        $attributesString = $this->getAttributes();
        $endTag = $this->closingTag ? "<$this->name>" : '';

        return $openTag . $attributesString . '>' . $this->content . $endTag;
    }

    public function setContent(string $content)
    {
        if ($this->closingTag) {
            throw new ParameterException('Single tags cannot have content');
        }

        $this->content = $content;
    }

    private function setAttributes(array $attributes)
    {
        $collection = New StringCollection();
        $collection->setArrayToCollection($attributes);

        $this->attributes = $collection;
    }

    private function getAttributes()
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

    protected abstract function setName();

    protected abstract function setClosingTag();
}