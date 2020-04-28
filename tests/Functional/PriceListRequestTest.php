<?php

use Alegra\Entity\PriceList as EntityPriceList;
use Alegra\Support\Collection;
use Alegra\Support\Facade\PriceList;
use Alegra\Tests\Fixtures\AlegraFixture;
use Alegra\Tests\Helpers\TestHttpClient;
use Alegra\Tests\Helpers\TestLogger;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class PriceListRequestTest extends TestCase
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

    public function testGetPriceListById()
    {
        $jsonResponse = file_get_contents(FIXTURES.'PriceList/PriceListResponse.json');

        $this->client->expectResponse(
            new Response(200, 
                ['Content-type' => 'application/json'],
                $jsonResponse
            )
        );

        $priceList = PriceList::getById(12);

        $this->assertInstanceOf(EntityPriceList::class, $priceList);
        $this->assertEquals(12, $priceList->id);
        $this->assertEquals('Precios mayorista', $priceList->name);
        $this->assertEquals('active', $priceList->status);
        $this->assertEquals('percentage', $priceList->type);
        $this->assertEquals('10.00', $priceList->percentage);
    }

    public function testGetPriceList()
    {
        $jsonResponse = file_get_contents(FIXTURES.'PriceList/PriceListsResponse.json');

        $this->client->expectResponse(
            new Response(200, 
                ['Content-type' => 'application/json'],
                $jsonResponse
            )
        );

        $priceListCollection = PriceList::getList();

        $this->assertInstanceOf(Collection::class, $priceListCollection);
        $this->assertEquals(3, $priceListCollection->count());
    }
}