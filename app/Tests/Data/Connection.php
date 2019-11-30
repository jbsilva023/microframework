<?php


namespace App\Tests\Data;

abstract class Connection
{
    public static $pdo;

    //método conexão abre a conexão com o Banco
    public static function init()
    {
        $pdo = new \PDO('sqlite::memory:');
        $fh = \fopen(__DIR__ .  '/banco.sql', 'r');

        while ($line = \fread($fh, 4096)) {
            $pdo->exec($line);
        }

        \fclose($fh);
    }//fim método conecta
}