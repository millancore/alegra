<?php

namespace Alegra\Message;

use Alegra\Contract\RequestInterface;

class Request implements RequestInterface
{
    protected $uri;
    protected $method;
    protected $options;

    public function __construct(string $uri, string $method, array $options = [])
    {
        $this->uri = $uri;
        $this->method = strtoupper($method);
        $this->options = $options;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getOptions(): array
    {
        return $this->options;   
    }

    public function json()
    {
        $this->options['headers'][] = [
            'Accept' => 'application/json',
            'Content-type' => 'application/json',
        ];

        return $this;
    }

    public static function get(string $uri, array $options = [])
    {
        return new self($uri, 'GET', $options);
    }
    
}