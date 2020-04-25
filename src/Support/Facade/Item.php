<?php

namespace Alegra\Support\Facade;

use Alegra\Client\ItemClient;

class Item extends Facade
{
    static function getClient(): string
    {
        return ItemClient::class;
    }
}