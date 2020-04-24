<?php

namespace Alegra\Contract;

use JsonSerializable;

interface ResponseInterface extends ArrayableInterface, JsonSerializable
{
    public function getStatusCode();
    public function getHeaders();
    public function getBody();
}