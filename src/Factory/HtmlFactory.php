<?php


namespace BxHelper\Factory;


use BxHelper\Html\{BasicElement, HtmlElement, Text};
use BxHelper\Exception\LogicException;
use BxHelper\Traits\Thrower;

/**
 * Class BasicFactory
 * @package BxHelper\Factory
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
abstract class HtmlFactory
{
    use Thrower;

    public abstract static function create(): HtmlElement;

    protected static function setAttributes(array $params, $otherAttributes = [])
    {
        $attributes = $params['attributes'] ?? [];

        foreach ($otherAttributes as $key => $value)
        {
            if (!is_null($value) ) {
                $attributes[$key] = $value;
            }
        }

        return $attributes;
    }

    /**
     * @param $content
     * @return BasicElement
     * @throws LogicException
     */
    protected static function setContent($content): BasicElement
    {
        if ($content instanceof BasicElement) {
            return $content;
        } elseif (is_string($content) ) {
            return new Text($content);
        } else {
            throw new LogicException('Content could be only Element or string');
        }
    }
}