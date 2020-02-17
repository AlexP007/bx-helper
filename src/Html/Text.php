<?php


namespace BxHelper\Html;


use BxHelper\Registry\HtmlConfig;

/**
 * Class Text
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Text extends BasicElement
{
    /**
     * @var string
     */
    private $content;

    /**
     * @var bool
     */
    private $useFilter = true;

    public function __construct(string $content, bool $useFilter = null)
    {
        $this->setContent($content);

        if (is_bool($useFilter) ) {
            $this->useFilter = $useFilter;
        }
    }

    public function render(): string
    {
        return $this->getContent();
    }

    private final function setContent(string $content)
    {
        $this->content = $content;
    }

    private final function getContent(): string
    {
        if ($this->useFilter) {
            $contentFilter = HtmlConfig::get('content-filter');

            if (isset($contentFilter) && is_callable($contentFilter)) {
                return call_user_func($contentFilter, $this->content);
            }
        }

        return $this->content;
    }
}
