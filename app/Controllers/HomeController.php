<?php

namespace App\Controllers;

use App\Models\Cartorios;
use App\Models\Enderecos;
use App\Models\Users;

class HomeController extends Controller
{
    private $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function index()
    {
        $cartorio = new Cartorios;
        $cartorios = $cartorio->all();

        return $this->view('inicio', ['cartorio' => $cartorios]);
    }
}
