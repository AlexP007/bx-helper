<?php


namespace BxHelper\Html;


use BxHelper\Traits\Thrower;
use BxHelper\Helper\Html;

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

    public static function renderFromArray(array $array): string
    {
        $optionsString = '';

        foreach ($array as $item) {
            self::ensureParameter(is_array($item), 'Options must be an array of arrays');

            $optionParams = $item['params'] ?? [];

            $optionsString .= Html::option($item['content'], $item['value'], $optionParams);
        }

        return $optionsString;
    }
}