<?php

use Dotenv\Dotenv;

$dotenv = new Dotenv(__DIR__);
$dotenv->load();

if (!isset(self::$conexao)) {
    $pdo = new \PDO($this->dns=getenv('DB_CONNECTION').':host='. getenv('DB_HOST') . ';dbname=' . getenv('DB_DATABASE'),
        getenv('DB_USERNAME'), getenv('DB_PASSWORD'), [PDO::ATTR_PERSISTENT => TRUE]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} else {
    return self::$conexao;
}
