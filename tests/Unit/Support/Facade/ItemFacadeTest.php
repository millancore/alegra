<?php

use Alegra\Client\ItemClient;
use Alegra\Support\Facade\Item;
use PHPUnit\Framework\TestCase;

class ItemFacadeTest extends TestCase
{
    public function testCallFromItemFacade()
    {
        $this->assertEquals(ItemClient::class, Item::getClient());
    }
}