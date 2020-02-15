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
class Label extends ElementWithContent
{
    protected function init()
    {
        $this->setName('label');
    }

    public static function create(BasicElement $content = null, string $for = null, array $params = []): string
    {
        $attributes = $params['attributes'] ?? [];

        if ($for) {
            $attributes['for'] = $for;
        }

        $label = new Label($attributes, $content);
        return $label->render();
    }

    public static function withLabel(BasicElement $elt, array $params)
    {
        $inputId = $elt->getAttribute('id');
        self::ensureParameter($inputId, 'To create label you need to specify id for input');

        $positionBefore = $params['position'] === 'before' ? true : false;
        $content = $params['content'] ? new Text($params['content'], $params['useFilter']) : null;

        $label = self::create($content, $inputId, $params);

        return $positionBefore ? $label . $elt->render() : $elt->render() . $label;
    }
}
