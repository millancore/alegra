<?php

namespace Alegra\Event;

use Alegra\Contract\ListenerInterface;
use Laminas\EventManager\EventManager as LaminasEvenManager;

class EventManager extends LaminasEvenManager
{
    /**
     * Atach Listener
     *
     * @param ListenerInterface $listener
     * @return void
     */
    public function addListener(ListenerInterface $listener)
    {
        $this->attach('alegra.request', [$listener, 'onRequest']);
        $this->attach('alegra.error', [$listener, 'onError']);
        $this->attach('alegra.response', [$listener, 'onResponse']);
    }

    /**
     * Dispatch Event
     *
     * @param string $eventName
     * @param array $argv
     * @return void
     */
    public function dispatch(string $eventName, $argv = [])
    {
        $this->trigger($eventName, null, $argv);
    }

}