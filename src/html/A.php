<?php


namespace BxHelper\Html;


class A extends Element
{
   protected function init()
   {
       $this->setName('a');
       $this->setClosingTag(true);
   }
}