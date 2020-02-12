<?php


namespace BxHelper\Html;


class Optgroup extends Element
{
    protected function init()
    {
        $this->setName('optgroup');
    }

    public static function render(string $label, string $content, array $attributes = []): string
    {
        if ($label) {
            $attributes['label'] = $label;
        }

        $optgroup = new Optgroup($attributes);
        $optgroup->setContent($content);

        return $optgroup->renderHtml();
    }
}