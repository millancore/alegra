<?php

use Alegra\Entity\Inventory;
use Alegra\Tests\Fixtures\WarehouseFixture;
use PHPUnit\Framework\TestCase;

class InventoryTest extends TestCase
{
    public function testCreateInventory()
    {
        $dataAttributes = [
            'unit' => "piece",
            'availableQuantity' => 150,
            'unitCost' => 560,
            'initialQuantity' => 320
        ];

        $inventory = new Inventory($dataAttributes);
        $inventory->addWarehouse(WarehouseFixture::getInstance());
        
        $this->assertEquals($this->expectInventory(), $inventory->toArray());
    }

    public function expectInventory()
    {
        return [
            'unit' => 'piece',
            'availableQuantity' => 150,
            'unitCost' => 560,
            'initialQuantity' => 320,
            'warehouses' => [
              [
                'id' => 1,
                'name' => 'Bodega Norte',
                'observations' => '',
                'isDefault' => true,
                'address' => 'Dirección de la bodega Norte',
                'status' => 'active',
                'initialQuantity' => '320.0',
                'availableQuantity' => '150',
                'minQuantity' => '100',
                'maxQuantity' => '400',
              ],
            ],
        ];
    }
}