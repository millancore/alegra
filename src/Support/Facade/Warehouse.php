<?php

namespace Alegra\Support\Facade;

use Alegra\Client\WarehouseClient;

class Warehouse extends Facade
{
    static function getClient(): string
    {
        return WarehouseClient::class;
    }
}