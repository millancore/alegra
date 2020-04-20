<?php

namespace Alegra\Event;

use Laminas\EventManager\EventInterface;
use Laminas\EventManager\EventManagerInterface;
use Psr\Log\LoggerInterface;

class LogListener
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function attach(EventManagerInterface $eventManager)
    {
        $eventManager->attach('http.request', [$this, 'logRequest']);
        $eventManager->attach('http.error', [$this, 'LogError']);
        $eventManager->attach('http.response', [$this, 'LogResponse']);
    }

    public function logRequest(EventInterface $event)
    {
        var_dump($event);
    }

}