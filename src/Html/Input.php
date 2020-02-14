<?php


namespace BxHelper\Html;


/**
 * Class Input
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Input extends ElementWithoutContent
{
    protected function init()
    {
        $this->setName('input');
    }

    public static function render(string $type, string $name = null, string $value = null, array $params = []): string
    {
        $attributes = $params['attributes'] ?? [];

        $attributes['type'] = $type;

        if ($name) {
            $attributes['name'] = $name;
        }

        if ($value) {
            $attributes['value'] = $value;
        }

        $input = new self($attributes);

        if (!empty($params['label']) ) {
            return Label::withLabel($input, $params['label']);
        }

        return $input->renderHtml();
    }
}
