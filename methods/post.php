<?php

require_once("../models/crud.php");
require_once("../models/product.php");

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
            $product->setSpecification($request->Specification);

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
