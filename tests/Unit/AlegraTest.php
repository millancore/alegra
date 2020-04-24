<?php

use Alegra\Alegra;
use Alegra\Exception\AlegraException;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

class AlegraTest extends TestCase
{

    public function testInvalidGetInstance()
    {
        # Destroy previous instance of Alegra, created by other tests
        Alegra::destroy();

        $this->expectException(AlegraException::class);
        $this->expectExceptionMessage('You must configure Alegra::setCredentials');

        Alegra::getInstance();
    }

    public function testInstanceAlegraSDK()
    {
        #Destroy previous instance of Alegra, created by other tests
        Alegra::destroy();

        Alegra::setCredentials([
            'email' => 'test@alegra.com',
            'token' => 'tokeTestAlgraApiAccess'
        ]);

        $this->assertInstanceOf(Alegra::class, Alegra::getInstance());
    }

}
