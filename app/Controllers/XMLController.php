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
        var_dump($_REQUEST, $this->params); die;
        $fileXML = simplexml_load_file($_FILES['arquivo']);
    }
}