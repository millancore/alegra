<?php

namespace Alegra\Entity\Countries\CRI;

use Alegra\Entity\Item as BaseItem;
use Alegra\Support\EntityMapper;

class Item extends BaseItem
{
    
    /**
     * @EntityMapper(entity="Reference")
     * @var Reference
     */
    protected $reference;
    
    protected $tariffHeading;


    /**
     * Set the value of reference
     *
     * @param Reference $reference
     *
     * @return self
     */ 
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Set the value of tariffHeading
     *
     * @return self
     */ 
    public function setTariffHeading($tariffHeading)
    {
        $this->tariffHeading = $tariffHeading;

        return $this;
    }
}