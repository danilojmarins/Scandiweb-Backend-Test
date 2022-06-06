<?php

require_once("../models/crud.php");
require_once("../models/product.php");

class Delete extends CrudConfig
{
    public function deleteData()
    {

        $product = new Product();
        if (isset($_GET['SKU'])) {
            $product->setSKU($_GET['SKU']);

            try {
                $qry = $this->Conn->prepare("DELETE FROM products WHERE SKU = ?");
                $qry->execute([$product->SKU]);
                return $qry->getData();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function fetchAll()
    {
    }

    public function insertData()
    {
    }
}


$delete = new Delete();
$delete->cors();
$delete->deleteData();
