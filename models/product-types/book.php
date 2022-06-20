<?php

class Book
{
    public $BookSpeci;

    public function __construct($BookSpeci = "")
    {
        $this->BookSpeci = $BookSpeci;
    }


    public function setBookSpeci($BookSpeci)
    {
        $this->BookSpeci = $BookSpeci;
    }
    public function getBookSpeci()
    {
        return $this->BookSpeci;
    }
}