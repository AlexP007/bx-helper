<?php


namespace BxHelper\Html;


/**
 * Class Select
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Select extends Element
{
    protected function init()
    {
        $this->setName('select');
    }

    public static function render(string $name, array $options = [],  array $params = []): string
    {
        $attributes = $params['attributes'] ?? [];

        if ($name) {
            $attributes['name'] = $name;
        }

        $select = new Select($attributes);

        empty($options) or $select->setContent(Option::renderFromArray($options) );

        if (!empty($params['label']) ) {
            return Label::withLabel($select, $params['label']);
        }

        return $select->renderHtml();
    }
}