<?php

namespace Alegra\Contract;

interface HttpClientInterface
{
    public function request($method, $uri, array $options = []);
}