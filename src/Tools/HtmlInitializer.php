<?php


namespace BxHelper\Tools;


use BxHelper\Html\A;

class HtmlInitializer
{
    private $factories = [
        A::class =>  Afactory::class,
    ];

    public function __construct(string $className, string $content, array $params)
    {
        $attributes = $params['attributes'] ?? [];
        $element =  new $className()
    }
}