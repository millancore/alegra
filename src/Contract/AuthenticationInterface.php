<?php

namespace Alegra\Contract;

interface AuthenticationInterface
{
    public function getUser();

    public function getToken();
}