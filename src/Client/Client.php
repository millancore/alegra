<?php

namespace Alegra\Client;

use Alegra\Contract\AuthenticationInterface;
use Alegra\Contract\CarrierInterface;

abstract class Client
{
    protected $carrier;
    protected $auth;

    public function __construct(
        CarrierInterface $carrier,
        AuthenticationInterface $auth
    )
    {
        $this->carrier = $carrier;
        $this->auth = $auth;
    }
}