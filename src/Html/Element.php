<?php


namespace BxHelper\Html;

use BxHelper\Traits\Thrower,
    BxHelper\Collection\StringCollection,
    BxHelper\Exception\ParameterException;

/**
 * Class Element
 * @package BxHelper\Html
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
abstract class Element
{
    use Thrower;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     *
     * If closingTag exists
     */
    protected $closingTag;

    /**
     * @var StringCollection
     */
    private $attributes = null;

    /**
     * @var string
     *
     * Content of the element
     */
    private $content = null;

    public final function __construct(array $attributes = array() )
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

    /**
     * This function is setting bool:
     * is there a closingTag for
     * this element
     */
    protected function setClosingTag(bool $value)
    {
        $this->closingTag = $value;
    }

    public function render()
    {
        $openTag = "<{$this->name}";

        $attributesString = $this->getAttributes();
        $endTag = $this->closingTag ? "</$this->name>" : '';

        return $openTag . $attributesString . '>' . $this->content . $endTag;
    }

    public function setContent(string $content)
    {
        self::ensureParameter($this->closingTag, 'Single tags cannot have content');

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
}
