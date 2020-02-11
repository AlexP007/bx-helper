<?php


namespace BxHelper\Helper;


use BxHelper\Html\{A, Input, Label, Option};
use BxHelper\Traits\Thrower;

/**
 * Class Html
 * @package BxHelper\Helper
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Html
{
    use Thrower;

    private static function setParams(array $params)
    {
        $attributes = $params['attributes'] ?? [];
        $options = $params['options'] ?? [];

        return [$attributes, $options];
    }

    public static function a(string $content, string $href = null, array $params = []): string
    {
        [$attributes, $options] = self::setParams($params);

        if ($href) {
            $attributes['href'] = $href;
        }

        $elt = new A($attributes);
        $elt->setContent($content);

        return $elt->render();
    }

    public static function Label(string $content, string $for = null, array $params = []): string
    {
        [$attributes, $options] = self::setParams($params);

        if ($for) {
            $attributes['for'] = $for;
        }

        $elt = new Label($attributes);
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

        $elt = new Input($attributes);
        $label = '';

        if (!empty($options['label']) ) {
            $inputId = $elt->getAttribute('id');
            self::ensureParameter($inputId, 'To create label you need to specify id for input');

            $positionBefore = $options['label']['position'] === 'before' ? true : false;

            $label = self::Label($options['label']['content'], $inputId, $options['label']);

            if ($positionBefore) {
                return $label . $elt->render();
            }
        }

        return $elt->render() . $label;
    }

    public static function hidden($name, $value = null, array $params = []): string
    {
        return self::input('hidden', $name, $value, $params);
    }

    public static function text($name, $value = null, array $params = []): string
    {
        return self::input('text', $name, $value, $params);
    }

    public static function submit($name, $value = null, array $params = []): string
    {
        return self::input('submit', $name, $value, $params);
    }

    public static function checkbox($name, $value = null, array $params = []): string
    {
        return self::input('checkbox', $name, $value, $params);
    }

    public static function email($name, $value = null, array $params = []): string
    {
        return self::input('email', $name, $value, $params);
    }

    public static function password($name, $value = null, array $params = []): string
    {
        return self::input('password', $name, $value, $params);
    }

    public static function file($name, $value = null, array $params = []): string
    {
        return self::input('file', $name, $value, $params);
    }

    public static function reset($name, $value = null, array $params = []): string
    {
        return self::input('reset', $name, $value, $params);
    }

    public static function search($name, $value = null, array $params = []): string
    {
        return self::input('search', $name, $value, $params);
    }

    public static function radio($name, $value = null, array $params = []): string
    {
        return self::input('radio', $name, $value, $params);
    }

    public static function option($content, $value = null, array $params = []): string
    {
        [$attributes, $options] = self::setParams($params);

        if ($value) {
            $attributes['value'] = $value;
        }

        $elt = new Option($attributes);
        $elt->setContent($content);

        return $elt->render();
    }
}
