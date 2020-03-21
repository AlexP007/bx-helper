<?php


namespace BxHelper\Helper;


use BxHelper\Factory\{AFactory,
    ButtonFactory,
    FormFactory,
    InputFactory,
    LabelFactory,
    OptgroupFactory,
    OptionFactory,
    DivFactory,
    SpanFactory,
    SelectFactory};

use BxHelper\Html\Form;
use BxHelper\Traits\Thrower;

/**
 * Class Html
 * @package BxHelper\Helper
 * @license MIT
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Html
{
    private static $instance;

    use Thrower;
    
    private final function __construct()
    {
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function a(string $content = null, string $href = null, array $params = []): string
    {
        return AFactory::create($content, $href, $params)->render();
    }

    public function div(string $content = null, string $class = null, array $params = []): string
    {
        return DivFactory::create($content, $class, $params)->render();
    }

    public function span(string $content = null, string $class = null, array $params = []): string
    {
        return SpanFactory::create($content, $class, $params)->render();
    }

    public function label(string $content = null, string $for = null, array $params = []): string
    {
        return LabelFactory::create($content, $for, $params)->render();
    }

    public function input(string $type, string $name = null, string $value = null, array $params = []): string
    {
        return InputFactory::create($type, $name, $value, $params)->render();
    }

    public function hidden(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('hidden', $name, $value, $params);
    }

    public function text(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('text', $name, $value, $params);
    }

    public function submit(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('submit', $name, $value, $params);
    }

    public function checkbox(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('checkbox', $name, $value, $params);
    }

    public function email(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('email', $name, $value, $params);
    }

    public function password(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('password', $name, $value, $params);
    }

    public function file(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('file', $name, $value, $params);
    }

    public function reset(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('reset', $name, $value, $params);
    }

    public function search(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('search', $name, $value, $params);
    }

    public function radio(string $name = null, string $value = null, array $params = []): string
    {
        return self::input('radio', $name, $value, $params);
    }

    public function option(string $content = null, string $value = null, array $params = []): string
    {
        return OptionFactory::create($content, $value, $params)->render();
    }

    public function optgroup(string $label, string $content, array $params = []): string
    {
       return OptgroupFactory::create($label, $content, $params)->render();
    }

    public function select(string $name = null, $content = null,  array $params = []): string
    {
        return SelectFactory::create($name, $content, $params)->render();
    }

    public function button(string $name = null, string $content = null, string $type = null, array $params = []): string
    {
        return ButtonFactory::create($name, $content, $type, $params)->render();
    }

    public function form($params = [] ): Form
    {
        return FormFactory::create(null, $params);
    }
}
