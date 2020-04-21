<?php

namespace Alegra\Contract;

interface RequestInterface
{
    public function getUri() : string;

    public function getMethod() : string;

    public function getOptions() : array;
}