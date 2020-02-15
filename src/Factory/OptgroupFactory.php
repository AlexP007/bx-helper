<?php


namespace BxHelper\Factory;


use BxHelper\Html\{HtmlElement, Optgroup};

/**
 * Class OptgroupFactory
 * @package BxHelper\Factory
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class OptgroupFactory extends HtmlFactory
{
    public static function create(string $label = null, $content = null, array $params = []): HtmlElement
    {
        return new Optgroup(self::setAttributes($params, ['label' => $label]), self::setContent($content) );
    }
}