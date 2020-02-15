<?php


namespace BxHelper\Html;


/**
 * Class SetOfElements
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class SetOfElements extends BasicElement
{
    private $elements = [];

    public function render(): string
    {
        return array_reduce($this->elements, function ($acc, $cur) {
            return $acc .= $cur->render();
        }, '');
    }

    public function set(BasicElement $elt)
    {
        $this->elements[] = $elt;
    }
}