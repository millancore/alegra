<?php

use Alegra\Entity\Category as EntityCategory;
use Alegra\Support\Collection;
use Alegra\Support\Facade\Category;
use Alegra\Tests\Fixtures\AlegraFixture;
use Alegra\Tests\Helpers\TestHttpClient;
use Alegra\Tests\Helpers\TestLogger;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class CategoryRequestTest extends TestCase
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

    public function testGetCategoryById()
    {
        $jsonResponse = file_get_contents(FIXTURES.'Category/CategoryResponse.json');

        $this->client->expectResponse(
            new Response(200, 
                ['Content-type' => 'application/json'],
                $jsonResponse
            )
        );

        $category = Category::getById(12);

        $this->assertInstanceOf(EntityCategory::class, $category);
        $this->assertEquals(12, $category->id);
        $this->assertEquals(1, $category->idParent);
        $this->assertEquals('Ventas', $category->name);
        $this->assertEquals('ingresos principales.', $category->description);
        $this->assertEquals('income', $category->type);
        $this->assertEquals(false, $category->readOnly);
    }

    public function testGetCategoryList()
    {
        $jsonResponse = file_get_contents(FIXTURES.'Category/CategoriesResponse.json');

        $this->client->expectResponse(
            new Response(200, 
                ['Content-type' => 'application/json'],
                $jsonResponse
            )
        );

        $categoryCollection = Category::getList();

        $this->assertInstanceOf(Collection::class, $categoryCollection);
        $this->assertEquals(3, $categoryCollection->count());
    }
}