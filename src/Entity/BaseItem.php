<?php

namespace Alegra\Entity;

use Alegra\Contract\MappableInterface;
use Alegra\Support\Collection;
use Alegra\Support\EntityMapper;

class BaseItem extends Entity implements MappableInterface
{
    protected $id;
    protected $name;
    protected $description;
    protected $reference;

    /**
     * @EntityMapper(type="Collection", entity="PriceList")
     * @var Collection
     */
    protected $price;

    /**
     * @EntityMapper(type="Collection", entity="Tax")
     * @var Collection
     */
    protected $tax;

    /**
     * @EntityMapper(entity="Category")
     * @var Category
     */
    protected $category;

    /**
     * @EntityMapper(entity="Inventory")
     * @var Inventory
     */
    protected $inventory;

    /**
     * @var String
     */
    protected $status;

    /**
     * @EntityMapper(type="Collection", entity="SubItem")
     * @var Collection
     */
    protected $subitems;

    /**
     * @EntityMapper(entity="Warehouse")
     * @var Warehouse
     */
    protected $kitWarehouse;

    /**
     * @EntityMapper(entity="ItemCategory")
     * @var ItemCategory
     */
    protected $itemCategory;

    /**
     * Initialize Collections
     *
     * @return void
     */
    public function initialize()
    {
        $this->price = new Collection;
        $this->tax = new Collection;
        $this->subitems = new Collection;
    }

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
    public function setId($id)
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
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the value of decription
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of decription
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the value of reference
     */ 
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set the value of reference
     *
     * @return  self
     */ 
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * Get the value of price
     *
     * @return  Collection
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @param Collection $price
     * @return void
     */
    public function setPrice(Collection $price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Add priceList
     *
     * @param PriceList  $price
     * @return  self
     */ 
    public function addPrice(PriceList $priceList)
    {
        $this->price->add($priceList);
        return $this;
    }

    /**
     * Get the value of tax
     * @return  Collection
     */ 
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set the value of tax
     *
     * @param Collection $collectionTax
     * @return void
     */
    public function setTax(Collection $tax)
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * Add tax
     * @param Tax $tax
     * @return  self
     */ 
    public function addTax(Tax $tax)
    {
        $this->tax->add($tax);
        return $this;
    }

    /**
     * Get the value of category
     *
     * @return  Category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @param  Category  $category
     *
     * @return  self
     */ 
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of inventory
     *
     * @return  Inventory
     */ 
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * Set the value of inventory
     *
     * @param Inventory $inventory
     *
     * @return self
     */ 
    public function setInventory(Inventory $inventory)
    {
        $this->inventory = $inventory;

        return $this;
    }

    /**
     * Get the value of status
     *
     * @return  String
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @param String $status
     *
     * @return self
     */ 
    public function setStatus(String $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of subitems
     *
     * @return SubItem
     */ 
    public function getSubitems()
    {
        return $this->subitems;
    }

    /**
     * Set the value of subitems
     *
     * @param SubItem $subitems
     *
     * @return self
     */ 
    public function setSubitems(SubItem $subitem)
    {
        $this->subitems->add($subitem);

        return $this;
    }

    /**
     * Get the value of kitWarehouse
     *
     * @return Warehouse
     */ 
    public function getKitWarehouse()
    {
        return $this->kitWarehouse;
    }

    /**
     * Set the value of kitWarehouse
     *
     * @param Warehouse $kitWarehouse
     *
     * @return self
     */ 
    public function setKitWarehouse(Warehouse $kitWarehouse)
    {
        $this->kitWarehouse = $kitWarehouse;

        return $this;
    }

    /**
     * Get the value of itemCategory
     *
     * @return  ItemCategory
     */ 
    public function getItemCategory()
    {
        return $this->itemCategory;
    }

    /**
     * Set the value of itemCategory
     *
     * @param  ItemCategory  $itemCategory
     *
     * @return  self
     */ 
    public function setItemCategory(ItemCategory $itemCategory)
    {
        $this->itemCategory = $itemCategory;

        return $this;
    }
}