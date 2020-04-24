<?php

namespace Alegra\Tests\Helpers;

use Alegra\Contract\HttpClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class TestHttpClient implements HttpClientInterface
{
    private $response;
    private $exception = false;
    private $exceptionMesagge;

    /**
     * Request Helper Client
     *
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return Response
     */
    public function request($method, $uri, array $options = [])
    {
        if ($this->exception) {
            return new RequestException(
                $this->exceptionMesagge, 
                new Request($method, $uri, $options)  
            );
        }

        return $this->response;
    }

    /**
     * Set expectResponse 
     *
     * @param Response $response
     * @return void
     */
    public function expectResponse(Response $response)
    {
        $this->response = $response;
    }

    /**
     * Set expectException
     *
     * @param string $exceptionMesagge
     * @return void
     */
    public function expectException(string $exceptionMesagge)
    {
        $this->exception = true;
        $this->requestException = $exceptionMesagge;
    }

}