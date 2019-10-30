<?php


namespace App\Controllers;


use App\Models\Cartorios;
use App\Models\Enderecos;
use App\Models\Users;

class XMLController extends Controller
{
    private $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function importar()
    {

        $xml = simplexml_load_file($_FILES["arquivo"]['tmp_name']);

        foreach ($xml as $item) {
            $cartorio = new Cartorios;
            $cartorio->nome = $item->nome;
            $cartorio->razao = $item->razao;
            $cartorio->tipo_documento = $item->tipo_documento;
            $cartorio->documento = $item->documento;
            $cartorio->tabeliao = $item->tabeliao;
            $cartorio->status = $item->ativo;

            if ($cartorio->save()) {
                $endereco = new Enderecos;
                $endereco->cep = $item->cep;
                $endereco->nome = $item->endereco;
                $endereco->bairro = $item->bairro;
                $endereco->cidade = $item->cidade;
                $endereco->uf = $item->uf;
                $endereco->user_id = $cartorio->id;
                $endereco->save();
            }
        }
    }
}