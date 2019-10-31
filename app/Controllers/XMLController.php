<?php


namespace App\Controllers;


use App\Models\Cartorios;
use App\Models\Enderecos;

class XMLController extends Controller
{
    private $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * @return false|string
     */
    public function importar()
    {
        try {
            $xml = simplexml_load_file($_FILES["arquivo"]['tmp_name']);

            foreach ($xml as $item) {
                $cartorio = new Cartorios;
                $cartorio->nome = $item->nome;
                $cartorio->razao = $item->razao;
                $cartorio->tipo_documento = $item->tipo_documento;
                $cartorio->documento = $item->documento;
                $cartorio->tabeliao = $item->tabeliao;
                $cartorio->status = $item->ativo;
                $cartorio = $cartorio->save();

                if ($cartorio->id) {
                    $endereco = new Enderecos;
                    $endereco->cep = $item->cep;
                    $endereco->nome = $item->endereco;
                    $endereco->bairro = $item->bairro;
                    $endereco->cidade = $item->cidade;
                    $endereco->uf = $item->uf;
                    $endereco->cartorio_id = $cartorio->id;
                    $endereco->save();
                }
            }

            return [
                'title' => 'Sucesso!',
                'msg' => 'Registros importados com sucesso.',
                'type' => 'success',
                'reload'=> true,
            ];
        } catch (\Exception $e) {
            return [
                'title' => 'Erro!',
                'msg' => 'Não foi possível importar os registros.',
                'type' => 'error',
                'reload'=> true,
            ];
        }

    }
}