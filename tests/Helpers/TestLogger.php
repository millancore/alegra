<?php

namespace Alegra\Tests\Helpers;

use Psr\Log\AbstractLogger;

class TestLogger extends AbstractLogger
{

    private $level;
    private $message;
    private $context;

    public function log($level, $message, array $context = array())
    {
        $this->level = $level;
        $this->message = $message;
        $this->context  = $context;
    }

    /**
     * Get the value of level
     */ 
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get the value of context
     */ 
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Valid log
     *
     * @return boolean
     */
    public function isLogged()
    {
        return !is_null($this->message);
    }
}