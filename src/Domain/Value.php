<?php


namespace BxHelper\Domain;


use BxHelper\Registry\HtmlConfig;

/**
 * Class Value
 * @package BxHelper\Domain
 * @license MIT
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Value
{
    /**
     * @var string
     */
    private $value;

    /**
     * @var bool
     */
    private $useFilter = true;

    public function __construct(string $value, bool $useFilter = null)
    {
        $this->value = $value;

        if (is_bool($useFilter) ) {
            $this->useFilter = $useFilter;
        }
    }

    public function getValue(): string
    {
        if ($this->useFilter) {
            $contentFilter = HtmlConfig::get('value-filter');

            if (isset($contentFilter) && is_callable($contentFilter)) {
                return call_user_func($contentFilter, $this->value);
            }
        }

        return $this->value;
    }
}