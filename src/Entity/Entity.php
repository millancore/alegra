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

   public function jsonSerialize()
   {
      return $this->toArray();

   }
}