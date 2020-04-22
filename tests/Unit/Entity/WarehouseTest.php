<?php

use Alegra\Entity\Warehouse;
use PHPUnit\Framework\TestCase;

class WarehouseTest extends TestCase
{
    public function testCreateWarehouse()
    {
        $warehouse = new Warehouse($this->warehouseFromArray());

        $this->assertEquals($this->warehouseFromArray(), $warehouse->toArray());
    }

    public function warehouseFromArray()
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
}
