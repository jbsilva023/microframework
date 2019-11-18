<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Models\Cartorios;
use App\Models\Enderecos;

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
        $cartorios = $cartorio->paginate(10, $page, ['id', 'DESC']);

        return $this->view('app.inicio', ['cartorios' => $cartorios['data'], 'paginator' => $cartorios['paginator']]);
    }

    public function show()
    {
        $id = $_POST['id'];
        $cartorio = new Cartorios;
        $cartorio = $cartorio->find($id);
        $ufs = $this->getUfs();

        return $this->view('app.form-update-cartorio', ['cartorio' => $cartorio, 'ufs' => $ufs]);
    }

    public function create()
    {
        $ufs = $this->getUfs();
        return $this->view('app.form-novo-cartorio', ['ufs' => $ufs]);
    }

    public function store()
    {
        $cartorio = new Cartorios;
        $cartorio->beginTransaction();

        try {
            $cartorio->nome = $_POST['nome'];
            $cartorio->tabeliao = $_POST['tabeliao'];
            $cartorio->email = $_POST['email'];
            $cartorio->documento = Helper::unmask($_POST['documento']);
            $cartorio->tipo_documento = $_POST['tipo_documento'];
            $cartorio->telefone = Helper::unmask($_POST['telefone']);
            $cartorio->razao = $_POST['razao'];
            $cartorio->save();

            $endereco = new Enderecos;
            $endereco->nome = $_POST['endereco'];
            $endereco->cep = Helper::unmask($_POST['cep']);
            $endereco->uf = $_POST['uf'];
            $endereco->bairro = $_POST['bairro'];
            $endereco->cidade = $_POST['cidade'];
            $endereco->cartorio_id = $cartorio->id;
            $endereco->save();

            $cartorio->commit();

            return [
                'title' => 'Sucesso!',
                'msg' => 'Registro cadastrado com sucesso.',
                'type' => 'success',
                'reload' => true,
            ];

        } catch (\Exception $e) {
            $cartorio->rollBack();

            return [
                'title' => 'Erro!',
                'msg' => "Não foi possível cadastrar o registro. <br/>Erro: {$e->getMessage()}",
                'type' => 'error',
                'reload' => true,
            ];
        }
    }

    public function update()
    {
        $cartorio = new Cartorios;
        $cartorio = $cartorio->find($_POST['id']);
        $cartorio->beginTransaction();

        if ($cartorio) {
            try {
                $cartorio->nome = $_POST['nome'];
                $cartorio->tabeliao = $_POST['tabeliao'];
                $cartorio->email = $_POST['email'];
                $cartorio->documento = Helper::unmask($_POST['documento']);
                $cartorio->tipo_documento = $_POST['tipo_documento'];
                $cartorio->telefone = Helper::unmask($_POST['telefone']);
                $cartorio->razao = $_POST['razao'];
                $cartorio->save();

                $endereco = $cartorio->endereco();
                $endereco->nome = $_POST['endereco'];
                $endereco->cep = Helper::unmask($_POST['cep']);
                $endereco->uf = $_POST['uf'];
                $endereco->bairro = $_POST['bairro'];
                $endereco->cidade = $_POST['cidade'];
                $endereco->save();

                $cartorio->commit();

                return [
                    'title' => 'Sucesso!',
                    'msg' => 'Registro atualizado com sucesso.',
                    'type' => 'success',
                    'reload' => true
                ];

            } catch (\Exception $e) {
                $cartorio->rollBack();

                return [
                    'title' => 'Erro!',
                    'msg' => "Não foi possível atualizar o registro. <br/>Erro: {$e->getMessage()}",
                    'type' => 'error',
                    'reload' => true
                ];
            }
        }

        $cartorio->rollBack();
        return [
            'title' => 'Erro!',
            'msg' => "Não foi possível localizar o registro.",
            'type' => 'error',
            'reload' => true
        ];
    }

    public function delete()
    {
        $cartorio = new Cartorios;
        $cartorio = $cartorio->find($_POST['id']);

        if ($cartorio) {
            $cartorio->delete();

            return [
                'title' => 'Sucesso!',
                'msg' => 'Registro removido com sucesso.',
                'type' => 'success',
                'reload' => true
            ];
        }

        return [
            'title' => 'Erro!',
            'msg' => "Não foi possível localizar o registro.",
            'type' => 'error',
            'reload' => true
        ];
    }

    protected function getUfs(): array
    {
        return [
            ["name" =>"AC", "description" => "Acre"],
            ["name" => "AL", "description" => "Alagoas"],
            ["name" => "AP", "description" => "Amapá"],
            ["name" => "AM", "description" => 'Amazonas'],
            ["name" => "BA", "description" => "Bahia"],
            ["name" =>"CE", "description" => "Ceará"],
            ["name" => "DF", "description" => "Distrito Federal"],
            ["name" => "ES", "description" => "Espírito Santo"],
            ["name" => "GO", "description" => "Goiás"],
            ["name" => "MA", "description" => "Maranhão"],
            ["name" => "MT", "description" => "Mato Grosso"],
            ["name" => "MS", "description" => "Mato Grosso do Sul"],
            ["name" => "MG", "description" => "Minas Gerais"],
            ["name" => "PA", "description" => "Pará"],
            ["name" => "PB", "description" => "Paraíba"],
            ["name" =>"PR", "description" => "Paraná"],
            ["name" => "PE", "description" => "Pernambuco"],
            ["name" => "PI", "description" => "Piauí"],
            ["name" => "RJ", "description" => "Rio de Janeiro"],
            ["name" => "RN", "description" => "Rio Grande do Norte"],
            ["name" =>"RS", "description" => "Rio Grande do Sul"],
            ["name" => "RO", "description" => "Rondônia"],
            ["name" => "RR", "description" => "Roraima"],
            ["name" => "SC", "description" => "Santa Catarina"],
            ["name" => "SP", "description" => "São Paulo"],
            ["name" =>"SE", "description" => "Sergipe"],
            ["name" => "TO", "description" => "Tocantins"],
            ["name" => "EX", "description" => "Estrangeiro"]
        ];
    }
}
