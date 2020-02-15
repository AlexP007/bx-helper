<?php


namespace BxHelper\Factory;


use BxHelper\Html\{HtmlElement, Option, SetOfElements};

/**
 * Class OptionFactory
 * @package BxHelper\Factory
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class OptionFactory extends HtmlFactory
{
    public static function create($content = null, string $value = null, array $params = []): HtmlElement
    {
        return new Option(self::setAttributes($params, ['value' => $value]), self::setContent($content) );
    }

    public static function fromArray(array $array): string
    {
        $resultSet = new SetOfElements();

        foreach ($array as $key => $item) {
            self::ensureParameter(is_array($item), 'Options must be arrays');

            if (is_string($key) ) {
                $setOfOptions = self::fromArray($item['options']);
                $resultSet->set(OptgroupFactory::create($key, $setOfOptions, $item['attributes'] ?? []) );
            } else {
                $resultSet->set(self::create($item['content'], $item['value'], $item['params'] ?? []) );
            }
        }

        return $resultSet;
    }
}