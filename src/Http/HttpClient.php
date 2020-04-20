<?php

namespace Alegra\Http;

use Alegra\Config;
use Alegra\Contract\HttpClientInterface;
use Alegra\Exception\HttpException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException;

class HttpClient extends Client implements HttpClientInterface
{
    
    public function __construct(Config $config)
    {
        parent::__construct([
            'base_uri' => $config->api.$config->version,
            'timeout' => $config->timeout
        ]);
    }


    public function request($method, $uri, array $options = [])
    {
        try {
            return $this->request($method, $uri, $options);
        } catch (TransferException $th) {
            throw new HttpException($th->getMessage());
        }
    }
}