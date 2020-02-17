<?php


namespace BxHelper\Helper;


use BxHelper\Factory\{AFactory,
    ButtonFactory,
    FormFactory,
    InputFactory,
    LabelFactory,
    OptgroupFactory,
    OptionFactory,
    SelectFactory};

use BxHelper\Html\Form;
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

    public static function a(string $content = null, string $href = null, array $params = []): string
    {
        return AFactory::create($content, $href, $params)->render();
    }

    public static function Label(string $content = null, string $for = null, array $params = []): string
    {
        return LabelFactory::create($content, $for, $params)->render();
    }

    public static function input(string $type, string $name = null, string $value = null, array $params = []): string
    {
        return InputFactory::create($type, $name, $value, $params)->render();
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

    public static function option(string $content = null, string $value = null, array $params = []): string
    {
        return OptionFactory::create($content, $value, $params)->render();
    }

    public static function optgroup(string $label, string $content, array $params = []): string
    {
       return OptgroupFactory::create($label, $content, $params)->render();
    }

    public static function select(string $name = null, $content = null,  array $params = []): string
    {
        return SelectFactory::create($name, $content, $params)->render();
    }

    public static function button(string $name = null, string $content = null, string $type = null, array $params = []): string
    {
        return ButtonFactory::create($name, $content, $type, $params)->render();
    }

    public static function form($params = [] ): Form
    {
        return FormFactory::create(null, $params);
    }
}
