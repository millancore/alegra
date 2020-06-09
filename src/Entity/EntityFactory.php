<?php

namespace Alegra\Entity;

use Alegra\Support\Collection;

class EntityFactory
{

    /**
     * Create from Json
     *
     * @param string $json
     * @param string $entity
     * @return void
     */
    public static function fromJson(string $json, string $entity, $isCollection = false)
    {
        return self::build(json_decode($json), $entity, $isCollection);
    }

    /**
     * Create Recursive Entities from Array
     *
     * @param array $arrayEntity
     * @param string $entity
     * @param boolean $isCollection
     * @return Entity|Collection
     */
    public static function build($data, string $entity, bool $isCollection = false)
    {
        if ($isCollection) {
            $collection = new Collection;
            array_map(function($item) use ($collection, $entity){
                return $collection->add(new $entity(
                    self::resolver(get_object_vars($item))
                ));
            }, $data);

            return $collection;
        }

        return new $entity(
            self::resolver(get_object_vars($data))
        );
    }


    /**
     * Resolve recursive Entities
     *
     * @param array $arrayEntity
     * @return void
     */
    public static function resolver($data)
    {   
        foreach ($data as $key => $value) {            
            if (is_array($value)) {
                $data[$key] = self::build($value, self::getEntityClass($key), true);
            }

            if (is_object($value)) {
                $data[$key] = self::build($value, self::getEntityClass($key), false);
            }
        }
        
        return $data;
    }


    private static function getEntityClass(string $entity)
    {
        if ($entity == 'warehouses') {
            $entity = 'warehouse';
        }

        return '\\Alegra\Entity\\'.ucfirst($entity);
    }


}
