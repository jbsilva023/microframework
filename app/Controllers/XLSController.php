<?php


namespace App\Controllers;

use App\Helpers\Helper;
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
                    $rows[$row][$columns[$col]] = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                }
            }

            array_shift($rows);

            try {
                foreach ($rows as $row) {
                    $cartorio = new Cartorios;

                    $documento = strlen($row['documento']) > 11 ?
                        str_pad($row['documento'], 14, '0', STR_PAD_RIGHT) :
                        $row['documento'];

                    $cartorio = $cartorio->findByColumn(['documento', $documento]);

                    $cartorio->nome = $row['nome'];
                    $cartorio->razao = $row['razao'];
                    $cartorio->telefone = Helper::unmask($row['telefone']);
                    $cartorio->email = $row['email'];
                    $cartorio->tipo_documento = strlen($row['documento']) > 11 ? 2 : 1;
                    $cartorio->documento = $documento;
                    $cartorio->tabeliao = $row['tabeliao'];
                    $cartorio->status = $row['status'] === "SIM" ? 1 : 0;
                    $cartorio = $cartorio->save();

                    if ($cartorio->id) {
                        $endereco = $cartorio->endereco();
                        $endereco->cep = Helper::unmask($row['cep']);
                        $endereco->nome = $row['endereco'];
                        $endereco->bairro = $row['bairro'];
                        $endereco->cidade = $row['cidade'];
                        $endereco->uf = $row['uf'];
                        $endereco->cartorio_id = $cartorio->id;
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
                return [
                    'title' => 'Erro!',
                    'msg' => "Não foi possível importar registros.<br/><b>Erro:</b> {$e->getMessage()}",
                    'type' => 'error',
                    'reload' => false
                ];
            }
        }

        return [
            'title' => 'Erro!',
            'msg' => "Faça upload de um arquivo .XLS ou XLSX.",
            'type' => 'error',
            'reload' => false
        ];
    }

    public function exportar()
    {
        echo 'chegou aqui';
    }
}