<?php

namespace Alegra\Event;

use Alegra\Contract\ListenerInterface;
use Alegra\Exception\HttpException;
use Psr\Log\LoggerInterface;

class LogListener implements ListenerInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onRequest($event)
    {
        $eventParams = $event->getParams();

        $request = $eventParams[0];
        $request->preventLogAuthData();

        $this->logger->info(sprintf(
            'Request %s: %s', $request->getRequestId(), var_export($request->toArray(), true)
        ));
    }

    public function onError($event)
    {
        $eventParams = $event->getParams();

        /** @var HttpException */
        $exception = $eventParams[0];
        $requestId = $eventParams[1];

        $this->logger->error(sprintf(
            'Error %s: Message: %s, File: %s, Line: %s, ErrorTrace:',
            $requestId,
            $exception->getMessage(),
            $exception->getFile(),
            $exception->getLine(),
            $exception->getTraceAsString()
         ));
    }

    public function onResponse($event)
    {
        $eventParams = $event->getParams();

        $response = $eventParams[0];
        $requestId = $eventParams[1];

        $this->logger->info(sprintf(
            'Response %s: %s', $requestId, var_export($response->toArray(), true)
        ));
    }

}