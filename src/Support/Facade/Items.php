<?php

namespace Alegra\Support\Facade;

use Alegra\Client\ItemsClient;

class Items extends Facade
{
    static function getClient(): string
    {
        return ItemsClient::class;
    }
}