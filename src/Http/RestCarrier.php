<?php

namespace Alegra\Http;

use Alegra\Contract\HttpClientInterface;
use Alegra\Contract\RequestInterface;
use Alegra\Exception\HttpException;
use Laminas\EventManager\EventManagerInterface;

class RestCarrier
{
    private $client;
    private $eventManager;

    public function __construct(
         HttpClientInterface $client,
         EventManagerInterface $eventManager
    )
    {
        $this->client = $client;
        $this->eventManager = $eventManager;
    }


    /**
     * Send Request to Alegra API
     *
     * @param RequestInterface $request
     * @return
     */
    public function send(RequestInterface $request)
    {
        #Launch Request Event
        $this->eventManager->trigger('http.request', null, [$request]);
        try {
            $response = $this->client->request(
                $request->getMethod(),
                $request->getUri(),
                $request->getOptions()
            );
        } catch (HttpException $exception) {
            #Launch Error Event
            $this->eventManager->trigger('http.error', null, [$exception, $request]);
            throw $exception;
        }

        #Launch Response Event
        $this->eventManager->trigger('http.response', null, [$request, $response]);
        
        return $response;
    }

}
