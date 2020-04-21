<?php

use Alegra\Client\ItemsClient;
use Alegra\Support\Facade\Items;
use PHPUnit\Framework\TestCase;

class ItemsTest extends TestCase
{
    public function testCallFromFacadeItems()
    {
        $this->assertEquals(ItemsClient::class, Items::getClient());
    }
}