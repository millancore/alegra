<?php

namespace Alegra\Entity;

use Alegra\Contract\MappableInterface;
use Alegra\Support\Collection;
use Alegra\Support\EntityMapper;

class Inventory extends Entity implements MappableInterface
{
    protected $unit;
    protected $availableQuantity;
    protected $unitCost;
    protected $initialQuantity;

    /**
     * @EntityMapper(type="Collection", entity="Warehouse")
     * @var Collection
     */
    protected $warehouses;

    /**
     * Initilize Collections
     *
     * @return void
     */
    public function initialize()
    {
        $this->warehouses = new Collection();
    }

    /**
     * Get the value of unit
     */ 
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set the value of unit
     *
     * @return  self
     */ 
    public function setUnit($unit)
    {
        $this->unit = $unit;

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
    public function setAvailableQuantity($availableQuantity)
    {
        $this->availableQuantity = $availableQuantity;

        return $this;
    }

    /**
     * Get the value of unitCost
     */ 
    public function getUnitCost()
    {
        return $this->unitCost;
    }

    /**
     * Set the value of unitCost
     *
     * @return  self
     */ 
    public function setUnitCost($unitCost)
    {
        $this->unitCost = $unitCost;

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
    public function setInitialQuantity($initialQuantity)
    {
        $this->initialQuantity = $initialQuantity;

        return $this;
    }


    /**
     * Set the value of warehouses
     *
     * @param  Collection  $warehouses
     *
     * @return  self
     */ 
    public function setWarehouses(Collection $warehouses)
    {
        $this->warehouses = $warehouses;

        return $this;
    }


    public function addWarehouse(Warehouse $warehouse)
    {
        $this->warehouses->add($warehouse);
    }

}
