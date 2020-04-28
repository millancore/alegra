<?php

namespace Alegra\Entity\Countries\MEX;

use Alegra\Entity\Item as BaseItem;

class Item extends BaseItem
{
    protected $productKey;

    /**
     * Set the value of productKey
     *
     * @return  self
     */ 
    public function setProductKey($productKey)
    {
        $this->productKey = $productKey;

        return $this;
    }
}