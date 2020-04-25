<?php

use Alegra\Client\PriceListClient;
use Alegra\Support\Facade\PriceList;
use PHPUnit\Framework\TestCase;

class PriceListFacadeTest extends TestCase
{
    public function testCallFromPriceListFacade()
    {
        $this->assertEquals(PriceListClient::class, PriceList::getClient());
    }
}