<?php

namespace Alegra\Message;


class ItemRequest extends Request
{
   protected $uri = '/items/';

   public function __construct($uri, $method, $options)
   {
       $this->uri .= $uri;
       $this->method = strtoupper($method);
       $this->options = $options;

   }
}