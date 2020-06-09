<?php

namespace Alegra\Support\Traits;

trait FillAttributesTrait
{
    private function fill(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->attributes[$key] = $value;
        }
    }
}