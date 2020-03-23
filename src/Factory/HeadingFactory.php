<?php


namespace BxHelper\Factory;


use BxHelper\Html\BasicElement;
use BxHelper\Html\{H1, H2, H3, H4, H5, H6};

/**
 * Class HeadingFactory
 * @package BxHelper\Factory
 * @license MIT
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class HeadingFactory extends HtmlFactory
{

    public static function create($type = 'h1', string $content = null, array $params = []): BasicElement
    {
        switch ($type) {
            case 'h1':
                return new H1(self::setAttributes($params), self::setContent($content) );
            case 'h2':
                return new H2(self::setAttributes($params), self::setContent($content) );
            case 'h3':
                return new H3(self::setAttributes($params), self::setContent($content) );
            case 'h4':
                return new H4(self::setAttributes($params), self::setContent($content) );
            case 'h5':
                return new H5(self::setAttributes($params), self::setContent($content) );
            case 'h6':
                return new H6(self::setAttributes($params), self::setContent($content) );
            default:
                self::ensureParameter(false, "No such heading of type $type");
        }
    }
}
