<?php

namespace Alegra\Support\Traits;

trait FillAttributesTrait
{
    public function fill(array $attributes)
    {
        foreach ($attributes as $name => $value) {
            $this->{'set'.ucfirst($name)}($value);
        }
    }
}