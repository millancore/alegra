<?php

namespace Alegra\Support\Facade;

use Alegra\Client\PriceListClient;

class PriceList extends Facade
{
    static function getClient(): string
    {
        return PriceListClient::class;
    }
}