<?php


namespace BxHelper\Factory;


use BxHelper\Html\{BasicElement, Form};

class FormFactory extends HtmlFactory
{
    public static function create(string $content = null, array $params = []): BasicElement
    {
        return new Form(self::setAttributes($params), self::setContent($content) );
    }
}
