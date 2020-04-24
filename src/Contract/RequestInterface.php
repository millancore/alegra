<?php

namespace Alegra\Contract;

use JsonSerializable;

interface RequestInterface extends ArrayableInterface, JsonSerializable
{
    public function getUri() : string;

    public function getMethod() : string;

    public function getOptions() : array;

    public function getRequestId();
}