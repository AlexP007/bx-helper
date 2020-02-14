<?php


namespace BxHelper\Html;

/**
 * Class Button
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Button extends ElementWithContent
{
    protected function init()
    {
        $this->setName('button');
    }

    public static function render(string $name = null, string $content = null, string $type = null, array $params = []): string
    {
        $attributes = $params['attributes'] ?? [];

        if ($name) {
            $attributes['name'] = $name;
        }

        if ($type) {
            $attributes['type'] = $type;
        }

        $button = new Button($attributes);

        if ($content) {
            $button->setContent($content);
        }

        return $button->renderHtml();
    }
}