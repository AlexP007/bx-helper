<?php


namespace BxHelper\Html;

/**
 * Class Input
 * @package BxHelper\Html
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class Input extends Element
{
    /**
     * @var Label
     */
    private $label;

    /**
     * @var bool
     */
    private $labelPositionBefore;

    protected function init()
    {
        $this->setName('input');

        $labelParams = $this->getOption('label');

        if (isset($labelParams) ) {
            $position = $labelParams['position'] === 'before' ? true : false;

            $this->setLabel(
                $position,
                $labelParams['content'],
                $labelParams['attributes'],
                $labelParams['options']
            );
        }
    }

    private function setLabel(bool $positionBefore = true, string $content = null, array $attributes = [], array $options = [])
    {
        $inputId = $this->getOption('id');
        self::ensureParameter($inputId, 'To create label you need to specify id for input');

        $attributes['for'] = $inputId;

        $this->labelPositionBefore = $positionBefore;

        $label = new Label($attributes, $options);

        if ($content) {
            $label->setContent($content);
        };

        $this->label = $label->render();
    }
}