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
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

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
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of observations
     */ 
    public function getObservations()
    {
        return $this->observations;
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
     * Get the value of isDefault
     */ 
    public function getIsDefault()
    {
        return $this->isDefault;
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
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
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
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
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
     * Get the value of initialQuantity
     */ 
    public function getInitialQuantity()
    {
        return $this->initialQuantity;
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
     * Get the value of availableQuantity
     */ 
    public function getAvailableQuantity()
    {
        return $this->availableQuantity;
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
     * Get the value of minQuantity
     */ 
    public function getMinQuantity()
    {
        return $this->minQuantity;
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
     * Get the value of maxQuantity
     */ 
    public function getMaxQuantity()
    {
        return $this->maxQuantity;
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