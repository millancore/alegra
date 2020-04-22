<?php

namespace Alegra\Message;

abstract class Response
{
   protected $status;
   protected $headers;
   protected $body;

   public function __construct(
        int $status,
        array $headers = [],
        $body = null
   )
   {
       $this->status = $status;
       $this->headers = $headers;
       $this->body = $body;
   }

   public function getStatus()
   {
       return $this->status;
   }
   
}