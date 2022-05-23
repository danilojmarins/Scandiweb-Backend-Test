<?php

require_once("crud.php");

class Post extends CrudConfig
{
    public function insertData()
    {

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        if (isset($postdata) && !empty($postdata)) {
            $this->setSKU($request->SKU);
            $this->setName($request->Name);
            $this->setPrice($request->Price);
            $this->setSpecification($request->Specification);

            try {
                $qry = $this->Conn->prepare("INSERT INTO products(SKU, Name, Price, Specification) VALUES(?,?,?,?)");
                $qry->execute([$this->SKU, $this->Name, $this->Price, $this->Specification]);
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
