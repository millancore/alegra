<?php

namespace Alegra\Message;

use Alegra\Contract\AuthenticationInterface;
use Alegra\Contract\RequestInterface;
use Alegra\Support\Traits\ArrayableTrait;

class Request implements RequestInterface
{
    use ArrayableTrait;

    protected $uri;
    protected $method;
    protected $options;

    # this is used to associate responses and errors in logs
    protected $requestId;

    public function __construct(string $uri, string $method, array $options = [])
    {
        $this->uri = $uri;
        $this->method = strtoupper($method);
        $this->options = $options;
        $this->requestId = uniqid();
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

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function addJsonHeaders()
    {
        $this->options['headers'][] = [
            'Accept' => 'application/json',
            'Content-type' => 'application/json',
        ];

        return $this;
    }

    public function addAuth(AuthenticationInterface $auth)
    {
        $this->options['auth'] = [
           'user' => $auth->getUser(),
           'password' => $auth->getToken()
        ];
 
        return $this;
    }

    public function preventLogAuthData()
    {
        if(isset($this->options['auth'])){
            $this->options['auth']['password'] = "*********";
        }
    }

    public static function get(string $uri, array $options = [])
    {
        return new self($uri, 'GET', $options);
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

}