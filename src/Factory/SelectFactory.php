<?php


namespace BxHelper\Factory;


use BxHelper\Html\{BasicElement, Select};

/**
 * Class SelectFactory
 * @package BxHelper\Factory
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class SelectFactory extends HtmlFactory
{
    public static function create($name = null, $content = null,  array $params = []): BasicElement
    {
        is_null($content) or self::ensureParameter(
            is_array($content) || is_string($content),
            'Select::render 2nd parameter $content could only be string or array'
        );

        if (is_array($content) ) {

            if (isset($params['prompt']) ) {
                array_unshift($content, [
                    'content' => $params['prompt'],
                    'value' => '',
                    'attributes' => ['disabled' => null, 'selected' => null]
                ]);
            }
            $content = OptionFactory::fromArray($content);
        }

        $select = new Select(self::setAttributes($params, ['name' => $name]) , self::setContent($content) );

        if (!empty($params['label']) ) {
            return LabelFactory::withLabel($select, $params['label']);
        }

        return $select;
    }
}
