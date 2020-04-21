<?php

namespace Alegra\Message;

use Alegra\Contract\ResponseInterface;

class ItemResponse extends Response implements ResponseInterface
{
    public function parse()
    {
        return ItemFactory::fromJson($this->body);
    }
}