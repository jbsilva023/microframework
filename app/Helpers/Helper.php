<?php


namespace App\Helpers;


abstract class Helper
{
    public function mask($type, $value)
    {
        if ($value) {
            switch ($type) {
                case 'CNPJ':
                    return substr($value, 0, 2) . '.' . substr($value, 2, 3) .
                        '.' . substr($value, 5, 3) . '/' . substr($value, 8, 4)
                        . '-' . substr($value, 12);
                    break;
                case 'CPF':
                    return substr($value, 0, 3) . '.' . substr($value, 3, 3) .
                        '.' . substr($value, 6, 2) . '-' . substr($value, 8);
                    break;
                case 'TELEFONE':
                    break;
                case 'CEP':
                    return substr($value, 0, 5) . '-' . substr($value, 5);
                    break;
                default:
                    return $value;
                    break;
            }
        }

        return $value;
    }
}