<?php


namespace App\Controllers;


use App\Models\Cartorios;
use App\Models\Enderecos;
use PHPExcel_Cell;
use PHPExcel_IOFactory;
use SpreadsheetReader;

class XLSController extends Controller
{
    private $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function index()
    {
        return $this->view('app.form-upload-excel');
    }

    /**
     * @return array
     */
    public function importar()
    {
        $allowedType = [
            'application/vnd.ms-excel',
            'text/xls',
            'text/xlsx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ];

        $columns = [
            'nome',
            'razao',
            'documento',
            'cep',
            'endereco',
            'bairro',
            'cidade',
            'uf',
            'telefone',
            'email',
            'tabeliao',
            'status'
        ];

        if (in_array($_FILES["arquivo"]["type"], $allowedType)) {
            $reader = PHPExcel_IOFactory::createReader('Excel2007');
            $reader->setReadDataOnly(true);

            $phpExcel = $reader->load($_FILES['arquivo']['tmp_name']);
            $worksheet = $phpExcel->getActiveSheet();

            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

            $rows = [];

            for ($row = 1; $row <= $highestRow; ++$row) {
                for ($col = 0; $col < $highestColumnIndex; $col++) {
                    $rows[0][$columns[$col]] = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                }
            }

            try {
                foreach ($rows as $row) {
                    $cartorio = new Cartorios;
                    $cartorio->nome = $row['nome'];
                    $cartorio->razao = $row['razao'];
                    $cartorio->tipo_documento = $row['tipo_documento'];
                    $cartorio->documento = $row['documento'];
                    $cartorio->tabeliao = $row['tabeliao'];
                    $cartorio->status = $row['status'];
                    $cartorio = $cartorio->save();

                    if ($cartorio->id) {
                        $endereco = new Enderecos;
                        $endereco->cep = $row['cep'];
                        $endereco->nome = $row['endereco'];
                        $endereco->bairro = $row['bairro'];
                        $endereco->cidade = $row['cidade'];
                        $endereco->uf = $row['uf'];
                        $endereco->cartorio_id = $cartorio['id'];
                        $endereco->save();
                    }
                }

                return [
                    'title' => 'Sucesso!',
                    'msg' => 'Registro importados com sucesso.',
                    'type' => 'success',
                    'reload' => true
                ];

            } catch (\Exception $e) {

            }
        }

        return [
            'title' => 'Erro!',
            'msg' => "Faça o upload de um arquivo com a extensão .XLS ou XLSX. ",
            'type' => 'error',
            'reload' => true
        ];
    }

    public function exportar()
    {

    }
}