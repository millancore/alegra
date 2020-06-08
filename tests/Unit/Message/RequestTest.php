<?php

use Alegra\Auth\Authentication;
use Alegra\Message\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    private $request;

    public function setUp() : void
    {
        $this->request = Request::get('/items/12', [], 'ID123')
                        ->addAuth(new Authentication('testUser', 'testToken'))
                        ->addJsonHeaders();
    }

    public function testRequest()
    {
        $this->assertEquals('/items/12', $this->request->getUri());
    }


    public function testArrayableRequest()
    {   
        $expectRequestArray = [
            'uri' => '/items/12',
            'method' => 'GET',
            'options' => [
                'auth' => [
                    'testUser',
                    'testToken',
                ],
                'headers' =>[
                    'Accept' => 'application/json',
                    'Content-type' => 'application/json',
                ],
            ],
            'requestId' => 'ID123',
        ];

        $this->assertEquals($expectRequestArray, $this->request->toArray());
    }

    public function testJsonEncodeRequest()
    {
        $this->assertJson(json_encode($this->request));
    }

}