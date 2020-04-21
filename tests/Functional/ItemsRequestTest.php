<?php

use Alegra\Alegra;
use Alegra\Http\TestHttpClient;
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
            'token' => 'tokeTestAlgraApiAccess'
        ]);

        $this->client = new TestHttpClient();
        $alegra->setClient($this->client);
    }

    public function testGetItemById()
    {
        $this->client->expectResponse(
            new Response(200, 
                ['Content-type' => 'application/json'],
                file_get_contents(FIXTURES.'Items/ItemResponse.json')
            )
        );

        $product = Items::get(12);

        var_dump($product);
    }
}