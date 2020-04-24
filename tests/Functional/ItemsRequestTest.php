<?php

use Alegra\Alegra;
use Alegra\Entity\BaseItem;
use Alegra\Entity\Inventory;
use Alegra\Entity\ItemCategory;
use Alegra\Support\Collection;
use Alegra\Support\Facade\Items;
use Alegra\Tests\Helpers\TestHttpClient;
use Alegra\Tests\Helpers\TestLogger;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class ItemsRequestTest extends TestCase
{
    /** @var TestHttpClient */
    private $client;
    private $logger;

    public function setUp() : void
    {
        /** @var Alegra */
       $alegra = Alegra::setCredentials([
            'email' => 'test@alegra.com',
            'token' => 'tokeTestAlegraApiAccess'
        ]);

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
        $product = Items::get(12);
        
        # Validate Logger
        $this->assertTrue($this->logger->isLogged());

        # Validate Entities 
        $this->assertInstanceOf(BaseItem::class, $product);
        $this->assertInstanceOf(Inventory::class, $product->inventory);
        $this->assertInstanceOf(ItemCategory::class, $product->itemCategory);
        $this->assertInstanceOf(Collection::class, $product->price);
        $this->assertInstanceOf(Collection::class, $product->tax);
    }
}