<?php

class Product
{
    public $SKU;
    public $Name;
    public $Price;
    public $Specification;

    public function __construct($SKU = "", $Name = "", $Price = "", $Specification = "")
    {

        $this->SKU = $SKU;
        $this->Name = $Name;
        $this->Price = $Price;
        $this->Specification = $Specification;

    }

    /* SETTERS AND GETTERS */

    # SKU
    public function setSKU($SKU)
    {
        $this->SKU = $SKU;
    }
    public function getSKU()
    {
        return $this->SKU;
    }


    # Name
    public function setName($Name)
    {
        $this->Name = $Name;
    }
    public function getName()
    {
        return $this->Name;
    }


    # Price
    public function setPrice($Price)
    {
        $this->Price = $Price;
    }
    public function getPrice()
    {
        return $this->Price;
    }


    # Specification
    public function setSpecification($Specification)
    {
        $this->Specification = $Specification;
    }
    public function getSpecification()
    {
        return $this->Specification;
    }
}