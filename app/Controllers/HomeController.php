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
        /*$user = $user->find(1);

        $user->nome = 'Jonas Barbosa da Silva';
        $user->tabeliao = 'João Felipe Ibiapina';
        $user->email = 'jbsilva023@gmail.com';
        $user->documento = '02551049105';
        $user->telefone = '6196470708';
        $user->razao = '1º Serventia de teste';

        $user = $user->save();
        var_dump($user->id); die;*/

        return $this->view('inicio', ['users' => $users]);
    }
}
