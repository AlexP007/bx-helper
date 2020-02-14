<?php


namespace BxHelper\Html;


/**
 * Class Option
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Option extends ElementWithContent
{
    protected function init()
    {
        $this->setName('option');
    }

    public static function render(string $content = null, string $value = null, array $params = []): string
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

        foreach ($array as $key => $item) {
            self::ensureParameter(is_array($item), 'Options must be arrays');

            if (is_string($key) ) {
                $options = self::renderFromArray($item['options']);
                $optionsString .= Optgroup::render($key, $options, $item['attributes'] ?? []);
            } else {
                $optionParams = $item['params'] ?? [];
                $optionsString .= self::render($item['content'], $item['value'], $optionParams);
            }
        }

        return $optionsString;
    }
}
