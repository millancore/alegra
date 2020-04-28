<?php

namespace Alegra\Entity;

class Category extends Entity
{
    protected $id;
    protected $idParent;
    protected $name;
    protected $description;
    protected $type;
    protected $readOnly;
    protected $categoryRule;

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
     * Set the value of idParent
     *
     * @return  self
     */ 
    public function setIdParent($idParent)
    {
        $this->idParent = $idParent;

        return $this;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

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
     * Set the value of readOnly
     *
     * @return  self
     */ 
    public function setReadOnly($readOnly)
    {
        $this->readOnly = $readOnly;

        return $this;
    }

    /**
     * Set the value of categoryRule
     *
     * @return  self
     */ 
    public function setCategoryRule($categoryRule)
    {
        $this->categoryRule = $categoryRule;

        return $this;
    }
}