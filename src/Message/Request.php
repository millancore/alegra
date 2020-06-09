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

    public function __construct(string $uri, string $method, array $options = [], $requestId = null)
    {
        $this->uri = $uri;
        $this->method = strtoupper($method);
        $this->options = $options;
        $this->setRequesId($requestId);
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

    public function setRequesId( string $requestId = null)
    {
        if (is_null($requestId)) {
            $this->requestId = uniqid();
            return;
        }

        $this->requestId = $requestId;
    }

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function addQueryParams(array $query)
    {
        $this->options['query'] =  $query;

        return $this;
    }

    public function addJsonHeaders()
    {
        $this->options['headers'] = [
            'Accept' => 'application/json',
            'Content-type' => 'application/json',
        ];

        return $this;
    }

    public function addAuth(AuthenticationInterface $auth)
    {
        $this->options['auth'] = [
            $auth->getUser(),
            $auth->getToken()
        ];
 
        return $this;
    }

    public function preventLogAuthData()
    {
        if(isset($this->options['auth'])){
            $this->options['auth']['password'] = "*********";
        }
    }

    /**
     * GET Request
     *
     * @param string $uri
     * @param array $options
     * @param int|string $requestId
     * @return self
     */
    public static function get(string $uri, array $options = [], $requestId = null)
    {
        return new self($uri, 'GET', $options, $requestId);
    }

    /**
     * POST Request
     *
     * @param string $uri
     * @param array $options
     * @param int|string $requestId
     * @return self
     */
    public static function post(string $uri, array $options = [], $requestId = null)
    {
        return new self($uri, 'POST', $options, $requestId);
    }

    /**
     * PUT Request
     *
     * @param string $uri
     * @param array $options
     * @param int|string $requestId
     * @return self
     */
    public static function put(string $uri, array $options = [], $requestId = null)
    {
        return new self($uri, 'PUT', $options, $requestId);
    }


    /**
     * DELETE Request
     *
     * @param string $uri
     * @param array $options
     * @param int|string $requestId
     * @return self
     */
    public static function delete(string $uri, array $options = [], $requestId = null)
    {
        return new self($uri, 'DELETE', $options, $requestId);
    }

    
    /**
     * Request as Json
     *
     * @return string
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

}