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

        /*$user->nome = 'João Barbosa';
        $user->tabeliao = 'Jonas Barbosa';
        $user->email = 'joao.silva023@gmail.com';
        $user->documento = '02551049105';
        $user->telefone = '6192251021';
        $user->razao = '2º Serventia de teste';

        $user = $user->save();
        var_dump($user); die;*/

        return $this->view('inicio', ['users' => $users]);
    }
}
