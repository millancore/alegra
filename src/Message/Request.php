<?php

namespace Alegra\Message;

use Alegra\Contract\RequestInterface;

abstract class Request implements RequestInterface
{
    protected $uri;
    protected $method;
    protected $options;

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
    
}