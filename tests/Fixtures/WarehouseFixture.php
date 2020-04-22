<?php

namespace Alegra\Tests\Fixtures;

use Alegra\Entity\Warehouse;

class WarehouseFixture
{
    public static function getWarehoseAsArray()
    {
        return [
            'id' => '1',
            'name' => 'Bodega Norte',
            'observations' => '',
            'isDefault' => true,
            'address' => 'Dirección de la bodega Norte',
            'status' => 'active',
            'initialQuantity' => '320.0',
            'availableQuantity' => '150',
            'minQuantity' => '100',
            'maxQuantity' => '400',
        ];
    }

    public static function getInstance()
    {
        return new Warehouse(self::getWarehoseAsArray());
    }
}