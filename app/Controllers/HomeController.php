<?php

namespace App\Controllers;

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
        $user = new Users;
        $users = $user->all();

        return $this->view('inicio', ['users' => $users]);
    }
}
