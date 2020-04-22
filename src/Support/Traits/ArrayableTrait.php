<?php

namespace Alegra\Support\Traits;

use Alegra\Contract\ArrayableInterface;

trait ArrayableTrait
{
    public function toArray()
    {
        return array_map(function ($value) {
            return $value instanceof ArrayableInterface ? $value->toArray() : $value;
        }, get_object_vars($this));
    }
}
