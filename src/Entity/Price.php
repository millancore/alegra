<?php

namespace Alegra\Entity;

class Price extends Entity
{
    protected $idPriceList;
    protected $name;
    protected $price;
    
    /**
     * Set the value of idPriceList
     *
     * @return  self
     */ 
    public function setIdPriceList($idPriceList)
    {
        $this->idPriceList = $idPriceList;

        return $this;
    }
    
    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
}