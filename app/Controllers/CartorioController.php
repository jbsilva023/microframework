<?php

namespace App\Controllers;

use App\Models\Cartorios;
use App\Models\Enderecos;
use App\Models\Users;

class CartorioController extends Controller
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

    public function show()
    {
        $id = $_POST['id'];
        $cartorio = new Cartorios;
        $cartorio = $cartorio->find($id);

        return $this->view('form-cartorio', ['cartorio' => $cartorio]);
    }
    
    public function create()
    {
        return $this->view('form-cartorio');
    }

    public function store()
    {
        $cartorio = new Cartorios;
        $cartorio->nome = $_POST['nome'];
        $cartorio->tabeliao = $_POST['tabeliao'];
        $cartorio->email = $_POST['email'];
        $cartorio->documento = $_POST['documento'];
        $cartorio->tipo_documento = $_POST['tipo_documento'];
        $cartorio->telefone = $_POST['telefone'];
        $cartorio->razao = $_POST['razao'];

        if ($cartorio->save()) {
            return [
                'title' => 'Sucesso!',
                'msg' => 'Registros cadastrado com sucesso.',
                'type' => 'success',
                'reload'=> true,
            ];
        }

        return [
            'title' => 'Erro!',
            'msg' => "Não foi possível importar os registros.",
            'type' => 'error',
            'reload'=> true,
        ];
    }

    public function update()
    {
        $cartorio = new Cartorios;
        $cartorio = $cartorio->find($_POST['id']);

        if ($cartorio) {
            $cartorio->nome = $_POST['nome'];
            $cartorio->tabeliao = $_POST['tabeliao'];
            $cartorio->email = $_POST['email'];
            $cartorio->documento = $_POST['documento'];
            $cartorio->tipo_documento = $_POST['tipo_documento'];
            $cartorio->telefone = $_POST['telefone'];
            $cartorio->razao = $_POST['razao'];

            if ($cartorio->save()) {
                return [
                    'title' => 'Sucesso!',
                    'msg' => 'Registros cadastrado com sucesso.',
                    'type' => 'success',
                    'reload'=> true,
                ];
            }

            return [
                'title' => 'Erro!',
                'msg' => "Não foi possível atualizar o registro.",
                'type' => 'error',
                'reload'=> true,
            ];
        }

        return [
            'title' => 'Erro!',
            'msg' => "Não foi possível localizar o registro.",
            'type' => 'error',
            'reload'=> true,
        ];
    }

    public function delete()
    {
        
    }
}
