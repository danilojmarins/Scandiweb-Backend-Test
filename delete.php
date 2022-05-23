<?php

require_once("crud.php");

class Delete extends CrudConfig
{
    public function deleteData()
    {

        if (isset($_GET['SKU'])) {
            $this->setSKU($_GET['SKU']);

            try {
                $qry = $this->Conn->prepare("DELETE FROM products WHERE SKU = ?");
                $qry->execute([$this->SKU]);
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
