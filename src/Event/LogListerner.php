<?php

namespace Alegra\Event;

use Laminas\EventManager\EventManagerInterface;
use Psr\Log\LoggerInterface;

class LogListener extends LoggerInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function attach(EventManagerInterface $eventManager)
    {
        $eventManager->attach('http.request', [$this, 'onRequest']);
        $eventManager->attach('http.error', [$this, 'onError']);
        $eventManager->attach('http.response', [$this, 'onResponse']);
    }

    public function onRequest($event)
    {
        var_dump($event);
    }

    public function onError($event)
    {

    }

    public function onResponse($event)
    {

    }

}