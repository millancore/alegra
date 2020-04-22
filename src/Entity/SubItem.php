<?php

namespace Alegra\Entity;

class SubItem extends Entity
{
    protected $quantity;

    /** @var BaseItem */
    protected $item;

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

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
     * Get the value of item
     */ 
    public function getItem()
    {
        return $this->item;
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