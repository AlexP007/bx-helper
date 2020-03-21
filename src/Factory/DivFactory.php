<?php


namespace BxHelper\Factory;


use BxHelper\Html\{BasicElement, Div};

/**
 * Class DivFactory
 * @package BxHelper\Factory
 * @license MIT
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class DivFactory extends HtmlFactory
{
    public static function create($content = null, string $class = null, array $params = []): BasicElement
    {
        return new Div(self::setAttributes($params, ['class' => $class]), self::setContent($content) );
    }
}