<?php

namespace Alegra\Message;

use Alegra\Contract\ResponseInterface;
use Alegra\Exception\HttpException;

class Response implements ResponseInterface
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

   public function getStatusCode()
   {
       return $this->status;
   }

   public function getHeaders()
   {
       return $this->headers;
   }

   public function getBody()
   {
       if ($this->status !== 200) {
           throw new HttpException($this->body, $this->status);
       }

       return $this->body;
   }
   
}