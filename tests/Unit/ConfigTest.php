<?php

use Alegra\Config;
use Alegra\Exception\ConfigException;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testMissingOptions()
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage('The required options "email", "token" are missing.');

        new Config([]);
    }

    public function testInvalidEmailFormat()
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage('The option "email" with value "alegra@test" is invalid.');

        new Config([
            'email' => 'alegra@test',
            'token' => 'tokeTestAlgraApiAccess',
        ]);

    }

    public function testGetValidOptions()
    {
        $email = 'alegra@test.com';
        $token = 'tokeTestAlgraApiAccess';

        $config = new Config([
            'email' => $email,
            'token' => $token
        ]);

        $this->assertEquals($config->email, $email);
        $this->assertEquals($config->token, $token);
        $this->assertNull($config->invalid);
    }

}
