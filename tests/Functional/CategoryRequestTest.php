<?php

use Alegra\Entity\Category as EntityCategory;
use Alegra\Exception\HttpException;
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

        $category = Category::get(12);

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

        $categoryCollection = Category::all();

        $this->assertInstanceOf(Collection::class, $categoryCollection);
        $this->assertEquals(3, $categoryCollection->count());
    }

    public function testCategoryNotFound()
    {
        $this->expectException(HttpException::class);
        $this->expectExceptionMessage('No se encontró en la aplicación la categoría que se está buscando');
        $this->expectExceptionCode(404);

        $jsonResponse = file_get_contents(FIXTURES.'Category/CategoryNotFoundResponse.json');

        $this->client->expectResponse(
            new Response(404,
                ['Content-type' => 'application/json'],
                $jsonResponse
            )
        );

        Category::get(12);
    }


    public function testFaltalErrorOnRequest()
    {
        $this->expectException(HttpException::class);
        $this->expectExceptionMessage('Fatal Error!!');
    
        
        $this->client->expectException('Fatal Error!!');
        $jsonResponse = file_get_contents(FIXTURES.'Category/CategoryResponse.json');

        $this->client->expectResponse(
            new Response(200, 
                ['Content-type' => 'application/json'],
                $jsonResponse
            )
        );

        Category::get(12);

    }
}