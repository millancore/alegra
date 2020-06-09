<?php

namespace Alegra\Entity;

use Alegra\Contract\ArrayableInterface;
use Alegra\Contract\EntityInterface;
use Alegra\Support\Traits\FillAttributesTrait;

abstract class Entity implements EntityInterface
{
   use FillAttributesTrait;

   protected $attributes = [];

   public function __construct(array $attributes = [])
   {
       $this->fill($attributes);
   }

   /**
    * Dinamic get Entity propierties
    *
    * @param string $name
    * @return mixed
    */
   public function __get($name)
   {   
       if (!isset($this->attributes[$name])) {
           return null;
       }

       return $this->attributes[$name];
   }

   /**
    * Get Entities as Array
    *
    * @return array
    */
   public function toArray()
   {
       return array_map(function ($value) {
           return $value instanceof ArrayableInterface ? $value->toArray() : $value;
       }, $this->attributes);
   }

   /**
    * Get Entities as Json
    *
    * @return string
    */
   public function jsonSerialize()
   {
      return $this->toArray();

   }
}