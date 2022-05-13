<?php

class CrudConfig
{
    private $SKU;
    private $Name;
    private $Price;
    private $Specification;
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

    public function fetchAll()
    {

        try {
            $qry = $this->Conn->prepare("SELECT * FROM products ORDER BY SKU");
            $qry->execute();
            return $qry->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /* POST */

    public function insertData()
    {

        try {
            $qry = $this->Conn->prepare("INSERT INTO products(SKU, Name, Price, Specification) VALUES(?,?,?,?)");
            $qry->execute([$this->SKU, $this->Name, $this->Price, $this->Specification]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /* DELETE */

    public function deleteData()
    {

        try {
            $qry = $this->Conn->prepare("DELETE FROM products WHERE SKU = ?");
            $qry->execute([$this->SKU]);
            return $qry->getData();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function cors()
    {

        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');    // cache for 1 day
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
