<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::create(__DIR__ . '/../../');
$dotenv->load();

$pdo = new \PDO(getenv('DB_CONNECTION').':host='. getenv('DB_HOST')
    . ';dbname=' . getenv('DB_DATABASE'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'),
    [PDO::ATTR_PERSISTENT => TRUE]);
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);