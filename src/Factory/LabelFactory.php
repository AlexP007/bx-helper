<?php


namespace BxHelper\Factory;


use BxHelper\Html\{HtmlElement, Label, Text};

/**
 * Class LabelFactory
 * @package BxHelper\Factory
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class LabelFactory extends HtmlFactory
{
    public static function create(string $content = null, string $for = null, array $params = []): HtmlElement
    {
        return new Label(self::setAttributes($params, ['for' => $for]), self::setContent($content) );
    }

    public static function withLabel(HtmlElement $elt, array $params)
    {
        $inputId = $elt->getAttribute('id');
        self::ensureParameter($inputId, 'To create label you need to specify id for input');

        $positionBefore = $params['position'] === 'before' ? true : false;
        $content = $params['content'] ? new Text($params['content'], $params['useFilter']) : null;

        $label = self::create($content, $inputId, $params)->render();
        $elt = $elt->render();

        return $positionBefore ? $label . $elt : $elt . $label;
    }
}