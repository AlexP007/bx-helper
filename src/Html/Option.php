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

    public static function create(string $content = null, string $value = null, array $params = []): string
    {
        $attributes = $params['attributes'] ?? [];

        if ($value) {
            $attributes['value'] = $value;
        }

        $option = new Option($attributes, $content);
        return $option->render();
    }

    public static function renderFromArray(array $array): string
    {
        $resultSet = new SetOfElements();

        foreach ($array as $key => $item) {
            self::ensureParameter(is_array($item), 'Options must be arrays');

            if (is_string($key) ) {
                $setOfOptions = self::renderFromArray($item['options']);
                $optionsString .= Optgroup::create($key, $setOfOptions, $item['attributes'] ?? []);
            } else {
                $optionParams = $item['params'] ?? [];
                $optionsString .= self::create($item['content'], $item['value'], $optionParams);
            }
        }

        return $set;
    }
}
