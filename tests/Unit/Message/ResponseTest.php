<?php

use Alegra\Message\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    private $response;

    public function setUp() : void
    {
        $this->response = new Response(
            200, 
            ['Content-Type' => 'application/json'],
            '{"response": "responseData"}'
        );
    }

    public function testResponse()
    {
        $this->assertEquals(200, $this->response->getStatusCode());
        $this->assertEquals(['Content-Type' => 'application/json'], $this->response->getHeaders());
        $this->assertEquals('{"response": "responseData"}', $this->response->getBody());
    }

    public function testArrayableResponse()
    {
        $expectResponseArray = [
            'status' => 200,
            'headers' => ['Content-Type' => 'application/json'],
            'body' => '{"response": "responseData"}'
        ];

        $this->assertEquals($expectResponseArray, $this->response->toArray());
    }

    public function testJsonEncodeResponse()
    {
        $this->assertJson(json_encode($this->response));
    }

}