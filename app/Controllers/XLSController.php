<?php


namespace App\Controllers;


use App\Models\Cartorios;
use App\Models\Enderecos;

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
        if (isset($_POST["import"])) {

            $allowedType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

            if (in_array($_FILES["file"]["type"], $allowedType)) {

                $targetPath = 'uploads/' . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

                $Reader = new \SpreadsheetReader($targetPath);

                $sheetCount = count($Reader->sheets());

                for ($i = 0; $i < $sheetCount; $i++) {
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
                }
            }

            return [
                $type = "error",
                $message = "Tipo de arquivo inválido. Upload Excel File."
            ];
        }
    }

    public function exportar()
    {
        
    }
}