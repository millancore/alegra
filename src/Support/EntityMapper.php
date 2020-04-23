<?php

namespace Alegra\Support;

/**
 * @Annotation
 */
class EntityMapper
{
   public $type;
   public $entity;

   public function getEntity()
   {
      return '\\Alegra\Entity\\'.$this->entity;
   }

   public function isCollection()
   {
      return $this->type == 'Collection';
   }
}