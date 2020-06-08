<?php

namespace Alegra\Entity;

class PriceList extends Entity
{
    protected $id;
    protected $name;
    protected $status;
    protected $type;
    protected $percentage;
    protected $main;

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
     * Set the value of percentage
     *
     * @return  self
     */ 
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * Set the value of main
     *
     * @return  self
     */ 
    public function setMain($main)
    {
        $this->main = $main;

        return $this;
    }
}