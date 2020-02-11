<?php


namespace BxHelper\Html;


use BxHelper\Traits\Thrower;

/**
 * Class Option
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Option extends Element
{
    use Thrower;

    protected function init()
    {
        $this->setName('option');
    }

    public static function render(string $content, string $value = null, array $params = []): string
    {
        $attributes = $params['attributes'] ?? [];

        if ($value) {
            $attributes['value'] = $value;
        }

        $option = new Option($attributes);
        $option->setContent($content);

        return $option->renderHtml();
    }

    public static function renderFromArray(array $array): string
    {
        $optionsString = '';

        foreach ($array as $item) {
            self::ensureParameter(is_array($item), 'Options must be an array of arrays');

            $optionParams = $item['params'] ?? [];

            $optionsString .= self::render($item['content'], $item['value'], $optionParams);
        }

        return $optionsString;
    }
}