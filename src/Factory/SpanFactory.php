<?php


namespace BxHelper\Factory;


use BxHelper\Html\{BasicElement, Span};

/**
 * Class SpanFactory
 * @package BxHelper\Factory
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class SpanFactory extends HtmlFactory
{
    public static function create($content = null, string $class = null, array $params = []): BasicElement
    {
        return new Span(self::setAttributes($params, ['class' => $class]), self::setContent($content) );
    }
}