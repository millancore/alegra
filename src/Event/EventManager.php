<?php

namespace Alegra\Event;

use Alegra\Contract\ListenerInterface;
use Laminas\EventManager\EventManager as LaminasEvenManager;

class EventManager extends LaminasEvenManager
{
    public function addListener(ListenerInterface $listener)
    {
        $this->attach('alegra.request', [$listener, 'onRequest']);
        $this->attach('alegra.error', [$listener, 'onError']);
        $this->attach('alegra.response', [$listener, 'onResponse']);
    }

}