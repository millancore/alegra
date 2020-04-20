<?php

use Alegra\Alegra;
use Alegra\Exception\AlegraException;
use PHPUnit\Framework\TestCase;

class AlegraTest extends TestCase
{

    public function testInvalidGetInstance()
    {
        $this->expectException(AlegraException::class);
        $this->expectExceptionMessage('You must configure Alegra::setCredentials');

        Alegra::getInstance();
    }

    public function testInstanceAlegraSDK()
    {
        Alegra::setCredentials([]);

        $this->assertInstanceOf(Alegra::class, Alegra::getInstance());
    }



}

