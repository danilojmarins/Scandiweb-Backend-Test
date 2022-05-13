<?php

require_once("crud.php");

$data = new CrudConfig();
$data->cors();
$json_data = $data->fetchAll();
echo json_encode($json_data);
