<?php


namespace BxHelper\Html;


/**
 * Class A
 * @package BxHelper\Html
 * @license Apache-2.0
 *
 * @author AlexP007
 * @email alex.p.panteleev@gmail.com
 * @link https://github.com/AlexP007/bx-helper
 */
class A extends Element
{
   protected function init()
   {
       $this->setName('a');
   }

   public static function render(string $content = null, string $href = null, array $params = []): string
   {
       $attributes = $params['attributes'] ?? [];

       if ($href) {
           $attributes['href'] = $href;
       }

       $a = new A($attributes);
       $a->setContent($content);

       return $a->renderHtml();
   }
}
