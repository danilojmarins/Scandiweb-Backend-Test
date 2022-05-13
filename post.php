<?php

require_once("crud.php");
$post = new CrudConfig();
$post->cors();
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
if (isset($postdata) && !empty($postdata)) {
    $post->setSKU($request->SKU);
    $post->setName($request->Name);
    $post->setPrice($request->Price);
    $post->setSpecification($request->Specification);
    $post->insertData();
}
