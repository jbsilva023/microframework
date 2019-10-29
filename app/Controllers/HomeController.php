<?php

namespace App\Controllers;

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
        $user = new Users;
        $endereco = new Enderecos;
        $endereco = $endereco->find(4);
//        $users = $user->find(6);
//        $users = $user->all();

        var_dump($endereco->user()); die;
//        var_dump($user->enderecos()); die;
        /*$user->nome = 'João da Silva';
        $user->tabeliao = 'Jonas Barbosa';
        $user->email = 'joao.silva@gmail.com';
        $user->documento = '02551049100';
        $user->telefone = '6196400223';
        $user->razao = '4º Serventia de teste';*/

//        $user = $user->endereco;
//       $user = $user->delete();


        return $this->view('inicio', ['users' => $users]);
    }
}
