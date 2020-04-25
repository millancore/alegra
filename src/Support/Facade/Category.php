<?php

namespace Alegra\Support\Facade;

use Alegra\Client\CategoryClient;

class Category extends Facade
{
    static function getClient(): string
    {
        return CategoryClient::class;
    }
}