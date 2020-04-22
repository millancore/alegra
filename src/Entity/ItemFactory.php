<?php

namespace Alegra\Entity;

use Alegra\Support\EntityMapper;
use Doctrine\Common\Annotations\AnnotationReader;
use ReflectionClass;

class ItemFactory
{
   public static function fromJson(string $jsonResponse)
   {
        $reflectionClass = new ReflectionClass(BaseItem::class);

        $rawEntity = json_decode($jsonResponse, true);

        $notations = [];
        $reader = new AnnotationReader();
        foreach ($rawEntity as $key => $value) {
            $notations[] = $reader->getPropertyAnnotation(
                  $reflectionClass->getProperty($key),
                  EntityMapper::class
            );
        }

        var_export($notations);
        die;
   }
}