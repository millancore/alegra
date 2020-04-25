<?php

use Alegra\Client\CategoryClient;
use Alegra\Support\Facade\Category;
use PHPUnit\Framework\TestCase;

class CategoryFacadeTest extends TestCase
{
    public function testCallFromCategoryFacade()
    {
        $this->assertEquals(CategoryClient::class, Category::getClient());
    }
}