<?php

namespace Alegra\Entity;

class Price extends Entity
{
    protected $idPriceList;
    protected $name;
    protected $type;
    protected $price;
    protected $value;
    
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

    /**
     * Set the value of value
     *
     * @return  self
     */ 
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}