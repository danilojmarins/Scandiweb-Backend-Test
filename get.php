<?php

require_once("crud.php");

class Get extends CrudConfig
{
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

    public function deleteData()
    {
    }

    public function insertData()
    {
    }
}


$data = new Get();
$data->cors();
$json_data = $data->fetchAll();
echo json_encode($json_data);
