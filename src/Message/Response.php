<?php

namespace Alegra\Message;

use GuzzleHttp\Psr7\Response as PsrResponse;

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

   public static function fromGuzzleResponse(PsrResponse $response)
   {
       return new static(
           $response->getStatusCode(),
           $response->getHeaders(),
           (string) $response->getBody(),
       );
   }
   

}