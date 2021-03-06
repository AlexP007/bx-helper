<?php


namespace BxHelper\Registry;


class HtmlConfig extends Registry
{
    protected function init()
    {
        $this->setAllowedKeysAndTypes([
            'content-filter' => 'is_callable',
            'value-filter' => 'is_callable',
        ]);
    }
}