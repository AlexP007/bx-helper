<?php


namespace BxHelper\Helper;


use BxHelper\Html\ {
    A,
    Input
};


/**
 * Class Html
 * @package BxHelper\Helper
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Html
{
    private static function setParams(array $params)
    {
        $attributes = $params['attr'] ?? [];
        $options = $params['options'] ?? [];

        return [$attributes, $options];
    }

    public static function a(string $content, string $href, array $params = []): string
    {
        [$attributes, $options] = self::setParams($params);

        $attributes['href'] = $href;

        $elt = new A($attributes, $options);
        $elt->setContent($content);

        return $elt->render();
    }

    public static function input(string $type, string $name, string $value = null, array $params = []): string
    {
        [$attributes, $options] = self::setParams($params);

        $attributes['type'] = $type;

        if ($name) {
            $attributes['name'] = $name;
        }

        if ($value) {
            $attributes['value'] = $value;
        }

        $elt = new Input($attributes, $options);

        return $elt->render();
    }
}