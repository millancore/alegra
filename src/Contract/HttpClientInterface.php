<?php

namespace Alegra\Contract;

use Alegra\Config;

interface HttpClientInterface
{
    public function request($method, $uri, array $options = []);
}