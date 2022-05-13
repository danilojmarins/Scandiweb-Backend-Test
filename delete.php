<?php

require_once("crud.php");

$delete = new CrudConfig();
$delete->cors();

if (isset($_GET['SKU'])) {
    $delete->setSKU($_GET['SKU']);
    $delete->deleteData();
}
