<?php

require_once("../models/crud.php");
require_once("../models/product.php");
require_once("../models/product-types/dvd.php");
require_once("../models/product-types/book.php");
require_once("../models/product-types/furniture.php");

class Post extends CrudConfig
{
    public function insertData()
    {

        $product = new Product();
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        if (isset($postdata) && !empty($postdata)) {
            $product->setSKU($request->SKU);
            $product->setName($request->Name);
            $product->setPrice($request->Price);
            if ($request->Type == "DVD") {
                $dvd = new Dvd();
                $dvd->setDvdSpeci($request->DvdSpeci);
                $product->setSpecification("Size: " . $dvd->getDvdSpeci() . " MB");
            } elseif ($request->Type == "Book") {
                $book = new Book();
                $book->setBookSpeci($request->BookSpeci);
                $product->setSpecification("Weight: " . $book->getBookSpeci() . " KG");
            } elseif ($request->Type == "Furniture") {
                $furniture = new Furniture();
                $furniture->setFurnitH($request->FurnitH);
                $furniture->setFurnitW($request->FurnitW);
                $furniture->setFurnitL($request->FurnitL);
                $product->setSpecification($furniture->getFurnitH() . " CM x " . $furniture->getFurnitW() . " CM x " . $furniture->getFurnitL() . " CM");
            }

            try {
                $qry = $this->Conn->prepare("INSERT INTO products(SKU, Name, Price, Specification) VALUES(?,?,?,?)");
                $qry->execute([$product->SKU, $product->Name, $product->Price, $product->Specification]);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    public function fetchAll()
    {
    }

    public function deleteData()
    {
    }
}

$post = new Post();
$post->cors();
$post->insertData();
