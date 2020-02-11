<?php


namespace BxHelper\Html;


use BxHelper\Traits\Thrower;
use BxHelper\Helper\Html;

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
    use Thrower;

    protected function init()
    {
        $this->setName('label');
    }

    public static function withLabel(EmptyElement $elt, array $params)
    {
        $inputId = $elt->getAttribute('id');
        self::ensureParameter($inputId, 'To create label you need to specify id for input');

        $positionBefore = $params['position'] === 'before' ? true : false;
        $content = $params['content'] ?? '';

        $label = Html::Label($content, $inputId, $params);

        if ($positionBefore) {
            return $label . $elt->render();
        }

        return $elt->render() . $label;
    }
}