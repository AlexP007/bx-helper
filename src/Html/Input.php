<?php


namespace BxHelper\Html;


/**
 * Class Input
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Input extends EmptyElement
{
    protected function init()
    {
        $this->setName('input');
    }

    public function render(): string
    {
        if ($this->labelPositionBefore) {
            return $this->label->render() . parent::render();
        }

        return parent::render() . $this->label->render();
    }
}