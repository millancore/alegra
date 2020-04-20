<?php

use Alegra\Config;
use Alegra\Exception\ConfigException;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class ConfigTest extends TestCase
{
    public function testMissingOptions()
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage('The required options "email", "token" are missing.');

        $config = new Config([]);
    }

    public function testInvalidLoggerInstance()
    {

        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage('The option "logger" with value stdClass is invalid.');

        $config = new Config([
            'email' => 'alegra@test.com',
            'token' => 'tokeTestAlgraApiAccess',
            'logger' => new stdClass
        ]);

    }

    public function testInvalidEmailFormat()
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage('The option "email" with value "alegra@test" is invalid.');

        $config = new Config([
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
            'token' => $token,
            'logger' => new NullLogger
        ]);

        $this->assertInstanceOf(LoggerInterface::class, $config->logger);
        $this->assertEquals($config->email, $email);
        $this->assertEquals($config->token, $token);
    }
}
