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

        if (in_array($_FILES["file"]["type"], $allowedType)) {
            $reader = PHPExcel_IOFactory::createReader('Excel2007');
            $reader->setReadDataOnly(true);

            $phpExcel = $reader->load($_FILES['file']['temp_name']);
            $worksheet = $phpExcel->getActiveSheet();

            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

            $rows = [];

            for ($row = 1; $row <= $highestRow; $row++) {
                for ($col = 0; $col < $highestColumnIndex; $col++) {
                    $rows[$col] = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                }
            }

            echo "<pre>";
            var_dump($rows);
            die;
//            $Reader = new SpreadsheetReader($targetPath);

//            $sheetCount = count($Reader->sheets());

            /*for ($i = 0; $i < $sheetCount; $i++) {
                $Reader->ChangeSheet($i);

                foreach ($Reader as $Row) {
                    $name = "";
                    if (isset($Row[0])) {
                        $name = mysqli_real_escape_string($conn, $Row[0]);
                    }

                    $description = "";
                    if (isset($Row[1])) {
                        $description = mysqli_real_escape_string($conn, $Row[1]);
                    }

                    if (!empty($name) || !empty($description)) {
                        $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
                        $result = mysqli_query($conn, $query);

                        if (!empty($result)) {
                            $type = "success";
                            $message = "Excel Data Imported into the Database";
                        } else {
                            $type = "error";
                            $message = "Problem in Importing Excel Data";
                        }
                    }
                }
            }*/
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