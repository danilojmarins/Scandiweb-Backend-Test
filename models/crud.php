<?php

abstract class CrudConfig
{

    protected $Conn;

    public function __construct()
    {

        $this->Conn = new PDO(
            "mysql:host=localhost;dbname=id18927621_scandiweb_test",
            "id18927621_root",
            "Gg5wQ@C|J!kR<Pvw",
            [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
    }


    /* GET */
    abstract public function fetchAll();

    /* POST */
    abstract public function insertData();

    /* DELETE */
    abstract public function deleteData();


    public function cors()
    {

        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');
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
