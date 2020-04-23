<?php

use Alegra\Alegra;
use Alegra\Entity\BaseItem;
use Alegra\Entity\Inventory;
use Alegra\Entity\ItemCategory;
use Alegra\Http\TestHttpClient;
use Alegra\Support\Collection;
use Alegra\Support\Facade\Items;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class ItemsRequestTest extends TestCase
{
    /** @var TestHttpClient */
    private $client;

    public function setUp() : void
    {
       $alegra = Alegra::setCredentials([
            'email' => 'test@alegra.com',
            'token' => 'tokeTestAlegraApiAccess'
        ]);

        $this->client = new TestHttpClient();
        $alegra->setClient($this->client);
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

        $this->assertInstanceOf(BaseItem::class, $product);
        $this->assertInstanceOf(Inventory::class, $product->getInventory());
        $this->assertInstanceOf(ItemCategory::class, $product->getItemCategory());
        $this->assertInstanceOf(Collection::class, $product->getPrice());
        $this->assertInstanceOf(Collection::class, $product->getTax());
    }
}