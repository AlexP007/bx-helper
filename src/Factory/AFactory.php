<?php


namespace BxHelper\Factory;


use BxHelper\Html\{BasicElement, A};

/**
 * Class AFactory
 * @package BxHelper\Factory
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class AFactory extends HtmlFactory
{
    public static function create($content = null, string $href = null, array $params = []): BasicElement
    {
        return new A(self::setAttributes($params, ['href' => $href]), self::setContent($content) );
    }
}