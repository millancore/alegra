<?php

namespace Alegra\Message;

use Alegra\Contract\ResponseInterface;
use Alegra\Exception\HttpException;
use Alegra\Support\Traits\ArrayableTrait;

use function GuzzleHttp\json_decode;

class Response implements ResponseInterface
{
   use ArrayableTrait;

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
           $errorMessage = json_decode($this->body);
           throw new HttpException($errorMessage->error, $this->status);
       }

       return $this->body;
   }

   public function jsonSerialize()
   {
       return $this->toArray();
   }
   
}