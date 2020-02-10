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
            $positionBefore = $labelParams['position'] === 'before' ? true : false;

            $this->setLabelPositionBefore($positionBefore);

            $this->setLabel(
                $labelParams['content'] ?? '',
                $labelParams['attributes'] ?? [],
                $labelParams['options'] ?? []
            );
        }
    }

    public function render(): string
    {
        if ($this->labelPositionBefore) {
            return $this->label->render() . parent::render();
        }

        return parent::render() . $this->label->render();
    }

    private function setLabelPositionBefore(bool $positionBefore)
    {
        $this->labelPositionBefore = $positionBefore;
    }

    private function setLabel(string $content, array $attributes, array $options)
    {
        $inputId = $this->getAttribute('id');
        self::ensureParameter($inputId, 'To create label you need to specify id for input');

        $attributes['for'] = $inputId;

        $label = new Label($attributes, $options);

        if ($content) {
            $label->setContent($content);
        };

        $this->label = $label;
    }
}