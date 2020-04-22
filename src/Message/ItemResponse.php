<?php

namespace Alegra\Message;

use Alegra\Contract\ResponseInterface;
use Alegra\Entity\ItemFactory;

class ItemResponse extends Response implements ResponseInterface
{
    public function parse()
    {
        return ItemFactory::fromJson($this->body);
    }
}