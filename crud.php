<?php

abstract class CrudConfig
{
    protected $SKU;
    protected $Name;
    protected $Price;
    protected $Specification;
    protected $Conn;

    public function __construct($SKU = "", $Name = "", $Price = "", $Specification = "")
    {

        $this->SKU = $SKU;
        $this->Name = $Name;
        $this->Price = $Price;
        $this->Specification = $Specification;

        $this->Conn = new PDO(
            "mysql:host=localhost;dbname=id18927621_scandiweb_test",
            "id18927621_root",
            "Gg5wQ@C|J!kR<Pvw",
            [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
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


    /* GET */
    abstract public function fetchAll();

    /* POST */
    abstract public function insertData();

    /* DELETE */
    abstract public function deleteData();


    public function cors()
    {

        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
                header("Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS");
            }

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
            }

            exit(0);
        }
    }
}
