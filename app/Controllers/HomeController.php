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
        $page = $_GET['page'] ?? 1;
        $cartorio = new Cartorios;
        $cartorios = $cartorio->paginate(10, $page);

        return $this->view('inicio', ['cartorios' => $cartorios['data'], 'paginator' => $cartorios['paginator']]);
    }
}
