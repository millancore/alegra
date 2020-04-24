<?php

namespace Alegra\Entity;


class Warehouse extends Entity
{
    protected $id;
    protected $name;
    protected $observations;
    protected $isDefault;
    protected $address;
    protected $status;
    protected $initialQuantity;
    protected $availableQuantity;
    protected $minQuantity;
    protected $maxQuantity;

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the value of observations
     *
     * @return  self
     */ 
    public function setObservations($observations)
    {
        $this->observations = $observations;

        return $this;
    }

    /**
     * Set the value of isDefault
     *
     * @return  self
     */ 
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;

        return $this;
    }


    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress(string $address)
    {
        $this->address = $address;

        return $this;
    }


    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }


    /**
     * Set the value of initialQuantity
     *
     * @return  self
     */ 
    public function setInitialQuantity(string $initialQuantity)
    {
        $this->initialQuantity = $initialQuantity;

        return $this;
    }

    /**
     * Set the value of availableQuantity
     *
     * @return  self
     */ 
    public function setAvailableQuantity(string $availableQuantity)
    {
        $this->availableQuantity = $availableQuantity;

        return $this;
    }

    /**
     * Set the value of minQuantity
     *
     * @return  self
     */ 
    public function setMinQuantity(string $minQuantity)
    {
        $this->minQuantity = $minQuantity;

        return $this;
    }

    /**
     * Set the value of maxQuantity
     *
     * @return  self
     */ 
    public function setMaxQuantity(string $maxQuantity)
    {
        $this->maxQuantity = $maxQuantity;

        return $this;
    }
}