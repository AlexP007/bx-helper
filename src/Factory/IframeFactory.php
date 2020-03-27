<?php


namespace BxHelper\Factory;


use BxHelper\Html\{BasicElement, Iframe};

/**
 * Class IframeFactory
 * @package BxHelper\Factory
 * @license MIT
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class IframeFactory extends HtmlFactory
{
    public static function create($url = null, $class = null, $params = []): BasicElement
    {
        $attributes = $params['attributes'] ?? [];

        if (!isset($attributes['style']) ) {
            $attributes['style'] = 'width: 100%; height: 100%';
        }

        $attributes = array_merge($attributes, [
            'class'           => $class,
            'src'             => $url,
            'scrolling'       => 'no',
            'allowfullscreen' => true,
        ]);

        return new Iframe(self::setAttributes($params, $attributes));
    }
}