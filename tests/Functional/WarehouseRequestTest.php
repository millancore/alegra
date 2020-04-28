<?php

use Alegra\Entity\Warehouse as EntityWarehouse;
use Alegra\Support\Collection;
use Alegra\Support\Facade\Warehouse;
use Alegra\Tests\Fixtures\AlegraFixture;
use Alegra\Tests\Helpers\TestHttpClient;
use Alegra\Tests\Helpers\TestLogger;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class WarehouseRequestTest extends TestCase
{
    private $client;
    private $logger;

    public function setUp() : void
    {
        $alegra = AlegraFixture::getInstance();

        $this->client = new TestHttpClient();
        $this->logger = new TestLogger();

        $alegra->setClient($this->client);
        $alegra->setLogger($this->logger);
    }

    public function testGetWarehouseById()
    {
        $jsonResponse = file_get_contents(FIXTURES.'Warehouse/WarehouseResponse.json');

        $this->client->expectResponse(
            new Response(200, 
                ['Content-type' => 'application/json'],
                $jsonResponse
            )
        );

        $warehouse = Warehouse::getById(12);

        $this->assertInstanceOf(EntityWarehouse::class, $warehouse);
        $this->assertEquals(12, $warehouse->id);
        $this->assertEquals('Bodega Sur', $warehouse->name);
        $this->assertEquals('Bodega ubicada en la zona sur', $warehouse->observations);
        $this->assertEquals(false, $warehouse->isDefault);
        $this->assertNull($warehouse->address);
        $this->assertEquals('active', $warehouse->status);
    }

    public function testGetWarehouseList()
    {
        $jsonResponse = file_get_contents(FIXTURES.'Warehouse/WarehousesResponse.json');

        $this->client->expectResponse(
            new Response(200, 
                ['Content-type' => 'application/json'],
                $jsonResponse
            )
        );

        $warehouseCollection = Warehouse::getList();

        $this->assertInstanceOf(Collection::class, $warehouseCollection);
        $this->assertEquals(2, $warehouseCollection->count());
    }
}