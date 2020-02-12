<?php


namespace BxHelper\Html;


/**
 * Class Label
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Label extends Element
{
    protected function init()
    {
        $this->setName('label');
    }

    public static function render(string $content = null, string $for = null, array $params = []): string
    {
        $attributes = $params['attributes'] ?? [];

        if ($for) {
            $attributes['for'] = $for;
        }

        $label = new Label($attributes);
        $label->setContent($content);

        return $label->renderHtml();
    }

    public static function withLabel(BasicElement $elt, array $params)
    {
        $inputId = $elt->getAttribute('id');
        self::ensureParameter($inputId, 'To create label you need to specify id for input');

        $positionBefore = $params['position'] === 'before' ? true : false;
        $content = $params['content'] ?? '';

        $label = self::render($content, $inputId, $params);

        return $positionBefore ? $label . $elt->renderHtml() : $elt->renderHtml() . $label;
    }
}
