<?php

class Furniture
{
    public $FurnitH;
    public $FurnitW;
    public $FurnitL;

    public function __construct($FurnitH = "", $FurnitW = "", $FurnitL = "")
    {
        $this->FurnitH = $FurnitH;
        $this->FurnitW = $FurnitW;
        $this->FurnitL = $FurnitL;
    }


    public function setFurnitH($FurnitH)
    {
        $this->FurnitH = $FurnitH;
    }
    public function getFurnitH()
    {
        return $this->FurnitH;
    }


    public function setFurnitW($FurnitW)
    {
        $this->FurnitW = $FurnitW;
    }
    public function getFurnitW()
    {
        return $this->FurnitW;
    }


    public function setFurnitL($FurnitL)
    {
        $this->FurnitL = $FurnitL;
    }
    public function getFurnitL()
    {
        return $this->FurnitL;
    }
}