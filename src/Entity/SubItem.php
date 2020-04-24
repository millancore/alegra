<?php

namespace Alegra\Entity;

class SubItem extends Entity
{
    protected $quantity;

    /** @var BaseItem */
    protected $item;

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Set the value of item
     * 
     * @param BaseItem $name
     * @return  self
     */ 
    public function setItem(BaseItem $item)
    {
        $this->item = $item;

        return $this;
    }
}