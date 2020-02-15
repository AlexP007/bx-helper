<?php


namespace BxHelper\Factory;


use BxHelper\Html\{BasicElement, Input};

/**
 * Class InputFactory
 * @package BxHelper\Factory
 * license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class InputFactory extends HtmlFactory
{
    public static function create(string $type = null, string $name = null, string $value = null, array $params = []): BasicElement
    {
        self::ensureParameter($type, 'For input yor must specify type');

        $input = new Input(self::setAttributes($params, [
            'type' => $type,
            'name' => $name,
            'value' => $value,
        ]));

        if (!empty($params['label']) ) {
            return LabelFactory::withLabel($input, $params['label']);
        }

        return $input;
    }
}