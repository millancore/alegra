<?php

namespace Alegra\Client;

use Alegra\Contract\CarrierInterface;

abstract class Client
{
    protected $carrier;

    public function __construct(CarrierInterface $carrier)
    {
        $this->carrier = $carrier;
    }
}