<?php

class Dvd
{
    public $DvdSpeci;

    public function __construct($DvdSpeci = "")
    {
        $this->DvdSpeci = $DvdSpeci;
    }


    public function setDvdSpeci($DvdSpeci)
    {
        $this->DvdSpeci = $DvdSpeci;
    }
    public function getDvdSpeci()
    {
        return $this->DvdSpeci;
    }
}