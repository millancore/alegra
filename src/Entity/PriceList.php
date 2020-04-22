<?php

namespace Alegra\Entity;

class PriceList extends Entity
{
    protected $idPriceList;
    protected $name;
    protected $price;
    
    /**
     * Get the value of idPriceList
     */ 
    public function getIdPriceList()
    {
        return $this->idPriceList;
    }

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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
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
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
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