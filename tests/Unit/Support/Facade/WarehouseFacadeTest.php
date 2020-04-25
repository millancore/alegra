<?php

use Alegra\Client\WarehouseClient;
use Alegra\Support\Facade\Warehouse;
use PHPUnit\Framework\TestCase;

class WarehouseFacadeTest extends TestCase
{
    public function testCallFromWarehouseFacade()
    {
        $this->assertEquals(WarehouseClient::class, Warehouse::getClient());
    }
}