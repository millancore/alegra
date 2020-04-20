<?php

namespace Alegra\Contract;

interface RequestInterface
{
    public function getMethod() : string;

    public function getUri() : string;

    public function getOptions() : array;
}