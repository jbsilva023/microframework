<?php

require __DIR__ . '/vendor/autoload.php';

use JbSilva\Router\Router;
use JbSilva\DI\Resolver;

$path_info = $_SERVER['PATH_INFO'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$router = new Router($path_info, $method);

require __DIR__ . '/router.php';

$result = $router->run();

$data = (new Resolver)->method($result['callback'], [
    'params' => $result['params']
]);




