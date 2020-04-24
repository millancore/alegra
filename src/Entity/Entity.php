<?php

namespace Alegra\Entity;

use Alegra\Contract\EntityInterface;
use Alegra\Support\Traits\{ArrayableTrait, FillAttributesTrait};

abstract class Entity implements EntityInterface
{
   use FillAttributesTrait,
   ArrayableTrait;

   public function __construct(array $attributes = [])
   {
       if (method_exists($this, 'initialize')) {
           call_user_func([$this, 'initialize']);
       }

       $this->fill($attributes);
   }

   /**
    * Dinamic get Entity propierties
    *
    * @param string $name
    * @return void
    */
   public function __get($name)
   {
       return $this->{$name};
   }

   public function jsonSerialize()
   {
      return $this->toArray();

   }
}