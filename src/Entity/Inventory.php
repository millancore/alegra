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
     * Set the collection of warehouses
     *
     * @param  Collection  $warehouses
     * @return  self
     */ 
    public function setWarehouses(Collection $warehouses)
    {
        $this->warehouses = $warehouses;

        return $this;
    }


    /**
     * Add Warehose to Inventory
     *
     * @param Warehouse $warehouse
     * @return void
     */
    public function addWarehouse(Warehouse $warehouse)
    {
        $this->warehouses->add($warehouse);
    }

}
