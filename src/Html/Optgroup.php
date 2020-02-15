<?php


namespace BxHelper\Html;


class Optgroup extends ElementWithContent
{
    protected function init()
    {
        $this->setName('optgroup');
    }

    public static function create(string $label, BasicElement $content, array $attributes): string
    {
        if ($label) {
            $attributes['label'] = $label;
        }

        $optgroup = new Optgroup($attributes, $content);
        return $optgroup->render();
    }
}
