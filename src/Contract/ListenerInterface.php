<?php

namespace Alegra\Contract;

interface ListenerInterface
{
    public function onRequest($event);
    
    public function onError($event);

    public function onResponse($event);
}