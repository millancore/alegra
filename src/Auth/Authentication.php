<?php

namespace Alegra\Auth;

use Alegra\Contract\AuthenticationInterface;

class Authentication implements AuthenticationInterface
{
    private $user;
    private $token;

    public function __construct(string $user, string $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getToken()
    {
        return $this->token;
    }
}