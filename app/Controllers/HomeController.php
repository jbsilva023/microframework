<?php

namespace App\Controllers;

class HomeController extends Controller
{
    private $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function index()
    {
        return $this->view('inicio', ['name' => 'Jonas Barbosa']);
    }
}
