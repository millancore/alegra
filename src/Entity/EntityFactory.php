<?php

namespace Alegra\Entity;

use Alegra\Contract\MappableInterface;
use Alegra\Support\Collection;
use Alegra\Support\EntityMapper;
use Doctrine\Common\Annotations\AnnotationReader;
use ReflectionClass;

class EntityFactory
{

    /**
     * Create from Json
     *
     * @param string $json
     * @param string $entity
     * @return void
     */
    public static function fromJson(string $json, string $entity)
    {
        return self::fromArray(json_decode($json, true), $entity);
    }

    /**
     * Create Recursive Entities from Array
     *
     * @param array $arrayEntity
     * @param string $entity
     * @param boolean $isCollection
     * @return Entity|Collection
     */
    public static function fromArray(array $arrayEntity, string $entity, bool $isCollection = false)
    {
        $reflectionEntity = new ReflectionClass($entity);

        if ($isCollection) {
            $collection = new Collection;

            array_map(function($item) use ($reflectionEntity, $collection, $entity){
                return $collection->add(new $entity(
                    self::resolver($item, $reflectionEntity)
                ));
            }, $arrayEntity);

            return $collection;
        }

        return new $entity(self::resolver($arrayEntity, $reflectionEntity));

    }


    /**
     * Resolve recursive Entities
     *
     * @param array $arrayEntity
     * @param ReflectionClass $reflectionEntity
     * @return void
     */
    public static function resolver(array &$arrayEntity, ReflectionClass $reflectionEntity)
    {
        if (!$reflectionEntity->isSubclassOf(MappableInterface::class)) {
            return $arrayEntity;
        }

        $reader = new AnnotationReader();
        foreach ($arrayEntity as $key => $value) {
            $entityInfo = $reader->getPropertyAnnotation(
                $reflectionEntity->getProperty($key),
                EntityMapper::class
            );

            if (is_null($entityInfo)) {
                $arrayEntity[$key] = $value;
                continue;
            }

            $arrayEntity[$key] = self::fromArray(
                $value,
                $entityInfo->getEntity(),
                $entityInfo->isCollection()
            );
        }

        return $arrayEntity;
    }
}
