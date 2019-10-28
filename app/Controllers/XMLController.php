<?php


namespace App\Controllers;


class XMLController extends Controller
{
    private $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function importar()
    {
        $fileXML = simplexml_load_file($_FILES['arquivo']);
    }
}