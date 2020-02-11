<?php


namespace BxHelper\Helper;


use BxHelper\Html\{A, Input, Label, Option, Select, Button};
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

    public static function a(string $content, string $href = null, array $params = []): string
    {
        $attributes = $params['attributes'] ?? [];

        if ($href) {
            $attributes['href'] = $href;
        }

        $a = new A($attributes);
        $a->setContent($content);

        return $a->renderHtml();
    }

    public static function Label(string $content, string $for = null, array $params = []): string
    {
        $attributes = $params['attributes'] ?? [];

        if ($for) {
            $attributes['for'] = $for;
        }

        $label = new Label($attributes);
        $label->setContent($content);

        return $label->renderHtml();
    }

    public static function input(string $type, string $name, string $value = null, array $params = []): string
    {
        $attributes = $params['attributes'] ?? [];

        $attributes['type'] = $type;

        if ($name) {
            $attributes['name'] = $name;
        }

        if ($value) {
            $attributes['value'] = $value;
        }

        $input = new Input($attributes);

        if (!empty($params['label']) ) {
            return Label::withLabel($input, $params['label']);
        }

        return $input->renderHtml();
    }

    public static function hidden(string $name, string $value = null, array $params = []): string
    {
        return self::input('hidden', $name, $value, $params);
    }

    public static function text(string $name, string $value = null, array $params = []): string
    {
        return self::input('text', $name, $value, $params);
    }

    public static function submit(string $name, string $value = null, array $params = []): string
    {
        return self::input('submit', $name, $value, $params);
    }

    public static function checkbox(string $name, string $value = null, array $params = []): string
    {
        return self::input('checkbox', $name, $value, $params);
    }

    public static function email(string $name, string $value = null, array $params = []): string
    {
        return self::input('email', $name, $value, $params);
    }

    public static function password(string $name, string $value = null, array $params = []): string
    {
        return self::input('password', $name, $value, $params);
    }

    public static function file(string $name, string $value = null, array $params = []): string
    {
        return self::input('file', $name, $value, $params);
    }

    public static function reset(string $name, string $value = null, array $params = []): string
    {
        return self::input('reset', $name, $value, $params);
    }

    public static function search(string $name, string $value = null, array $params = []): string
    {
        return self::input('search', $name, $value, $params);
    }

    public static function radio(string $name, string $value = null, array $params = []): string
    {
        return self::input('radio', $name, $value, $params);
    }

    public static function option(string $content, string $value = null, array $params = []): string
    {
        $attributes = $params['attributes'] ?? [];

        if ($value) {
            $attributes['value'] = $value;
        }

        $option = new Option($attributes);
        $option->setContent($content);

        return $option->renderHtml();
    }

    public static function select(string $name, array $options = [],  array $params = []): string
    {
        $attributes = $params['attributes'] ?? [];

        if ($name) {
            $attributes['name'] = $name;
        }

        $select = new Select($attributes);

        empty($options) or $select->setContent(Option::renderFromArray($options) );

        if (!empty($params['label']) ) {
            return Label::withLabel($select, $params['label']);
        }

        return $select->renderHtml();
    }

    public static function button(string $name = null, string $content = null, string $type = null, array $params = [] ): string
    {
        $attributes = $params['attributes'] ?? [];

        if ($name) {
            $attributes['name'] = $name;
        }

        if ($type) {
            $attributes['type'] = $type;
        }

        $button = new Button($attributes);

        if ($content) {
            $button->setContent($content);
        }

        return $button->renderHtml();
    }
}
