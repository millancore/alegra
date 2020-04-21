<?php

namespace Alegra\Contract;

interface CarrierInterface
{
    public function send(RequestInterface $request);
}