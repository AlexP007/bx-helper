<?php


namespace BxHelper\Factory;


use BxHelper\Html\{HtmlElement, Button};

/**
 * Class ButtonFactory
 * @package BxHelper\Factory
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class ButtonFactory extends HtmlFactory
{
    public static function create(string $name = null, $content = null, string $type = null, array $params = []): HtmlElement
    {
        return new Button(self::setAttributes($params, ['name' => $name, 'type' => $type]), self::setContent($content) );
    }
}
