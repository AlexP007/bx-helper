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

    public static function render(string $name = null, $content = null, array $params = []): string
    {
        self::ensureParameter(is_array($content) || is_string($content), 'Select::render 2nd parameter $content could only be string or array');

        $attributes = $params['attributes'] ?? [];

        if ($name) {
            $attributes['name'] = $name;
        }

        $select = new Select($attributes);

        if (is_array($content) && !empty($content) ) {
            $select->setContent(Option::renderFromArray($content) );
        } else {
            $select->setContent($content);
        };

        if (!empty($params['label']) ) {
            return Label::withLabel($select, $params['label']);
        }

        return $select->renderHtml();
    }
}
