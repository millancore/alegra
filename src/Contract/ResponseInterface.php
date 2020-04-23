<?php

namespace Alegra\Contract;

interface ResponseInterface
{
    public function getStatusCode();
    public function getHeaders();
    public function getBody();
}