<?php

use Alegra\Entity\BaseItem;
use Alegra\Entity\Inventory;
use Alegra\Entity\ItemCategory;
use Alegra\Support\Collection;
use Alegra\Support\Facade\Item;
use Alegra\Entity\Item as EntityItem;
use Alegra\Tests\Helpers\TestHttpClient;
use Alegra\Tests\Helpers\TestLogger;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Alegra\Exception\ValidationException;
use Alegra\Tests\Fixtures\AlegraFixture;

class ItemsRequestTest extends TestCase
{
    /** @var TestHttpClient */
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

    public function testGetItemById()
    {
        $jsonResponse = file_get_contents(FIXTURES.'Items/ItemResponse.json');

        $this->client->expectResponse(
            new Response(200, 
                ['Content-type' => 'application/json'],
                $jsonResponse
            )
        );

        /**@var BaseItem */
        $product = Item::get(12);
        
        # Validate Logger
        $this->assertTrue($this->logger->isLogged());

        # Validate Entities 
        $this->assertInstanceOf(EntityItem::class, $product);
        $this->assertInstanceOf(Inventory::class, $product->inventory);
        $this->assertInstanceOf(ItemCategory::class, $product->itemCategory);
        $this->assertInstanceOf(Collection::class, $product->price);
        $this->assertInstanceOf(Collection::class, $product->tax);
    }

    public function testGetListEmptyOptions()
    {
        $jsonResponse = file_get_contents(FIXTURES.'Items/ItemsResponse.json');

        $this->client->expectResponse(
            new Response(200, 
                ['Content-type' => 'application/json'],
                $jsonResponse
            )
        );

        $itemsCollection = Item::all();

        $this->assertInstanceOf(Collection::class, $itemsCollection);
        $this->assertEquals(3, $itemsCollection->count());
    }

    public function testGetListInvalidOptions()
    {
        $this->expectException(ValidationException::class);
        
        $jsonResponse = file_get_contents(FIXTURES.'Items/ItemsResponse.json');

        $this->client->expectResponse(
            new Response(200, 
                ['Content-type' => 'application/json'],
                $jsonResponse
            )
        );

         Item::all([
            'invalid' => 12   
        ]);
    }
}