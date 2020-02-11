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
        return A::render($content, $href, $params);
    }

    public static function Label(string $content, string $for = null, array $params = []): string
    {
        return Label::render($content, $for, $params);
    }

    public static function input(string $type, string $name = null, string $value = null, array $params = []): string
    {
        return Input::render($type, $name, $value, $params);
    }

    public static function hidden(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('hidden', $name, $value, $params);
    }

    public static function text(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('text', $name, $value, $params);
    }

    public static function submit(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('submit', $name, $value, $params);
    }

    public static function checkbox(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('checkbox', $name, $value, $params);
    }

    public static function email(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('email', $name, $value, $params);
    }

    public static function password(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('password', $name, $value, $params);
    }

    public static function file(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('file', $name, $value, $params);
    }

    public static function reset(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('reset', $name, $value, $params);
    }

    public static function search(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('search', $name, $value, $params);
    }

    public static function radio(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('radio', $name, $value, $params);
    }

    public static function option(string $content, string $value = null, array $params = []): string
    {
        return Option::render($content, $value, $params);
    }

    public static function select(string $name, array $options = [],  array $params = []): string
    {
        return Select::render($name, $options, $params);
    }

    public static function button(string $name = null, string $content = null, string $type = null, array $params = []): string
    {
        return Button::render($name, $content, $type, $params);
    }
}
