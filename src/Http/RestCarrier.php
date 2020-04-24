<?php

namespace Alegra\Http;

use Alegra\Contract\CarrierInterface;
use Alegra\Contract\HttpClientInterface;
use Alegra\Contract\RequestInterface;
use Alegra\Contract\ResponseInterface;
use Alegra\Event\EventManager;
use Alegra\Exception\HttpException;
use Alegra\Message\Response;

class RestCarrier implements CarrierInterface
{
    private $client;
    private $eventManager;

    public function __construct(
         HttpClientInterface $client,
         EventManager $eventManager
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
        #Dispatch Request Event
        $this->eventManager->dispatch('alegra.request', [$request]);
        try {
            /** @var ResponseInterface */
            $response = $this->client->request(
                $request->getMethod(),
                $request->getUri(),
                $request->getOptions()
            );
        } catch (HttpException $exception) {
            #Dispatch Error Event
            $this->eventManager->dispatch('alegra.error',
                 [$exception, $request->getRequestId()]
            );

            throw $exception;
        }
        
        $response = new Response(
            $response->getStatusCode(),
            $response->getHeaders(),
            (string) $response->getBody()
        );

        #Dispatch Response Event
        $this->eventManager->dispatch('alegra.response', 
            [$response, $request->getRequestId()]
        );

        return $response;
    }

}
