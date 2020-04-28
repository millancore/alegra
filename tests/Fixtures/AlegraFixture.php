<?php

namespace Alegra\Tests\Fixtures;

use Alegra\Alegra;
use Alegra\Support\Country;

class AlegraFixture 
{
    public static function getInstance(string $country = Country::COL)
    {
        Alegra::destroy();

       return Alegra::setCredentials([
            'email' => 'test@alegra.com',
            'token' => 'tokenTestAlegraApiAccess',
            'country' => $country
        ]); 
    }
}