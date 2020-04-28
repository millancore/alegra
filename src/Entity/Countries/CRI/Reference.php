<?php

namespace Alegra\Entity\Countries\CRI;

use Alegra\Entity\Entity;

class Reference extends Entity
{
    protected $reference;
    protected $type;

    /**
     * Set the value of reference
     *
     * @return  self
     */ 
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}