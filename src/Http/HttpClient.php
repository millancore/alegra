<?php

namespace Alegra\Http;

use Alegra\Config;
use Alegra\Contract\HttpClientInterface;
use Alegra\Exception\HttpException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException;

class HttpClient implements HttpClientInterface
{
    private $client;
    
    public function __construct(Config $config)
    {
        $this->client = new Client([
            'base_uri' => $config->api,
            'timeout' => $config->timeout
        ]);
    }


    /**
     * Request
     *
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return 
     */
    public function request($method, $uri = null, array $options = [])
    {
        try {
            return $this->client->request($method, $uri, $options);
        } catch (TransferException $th) {
            throw new HttpException($th->getMessage());
        }
    }
}