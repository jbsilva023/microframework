<?php

require __DIR__ . '/vendor/autoload.php';

$path_info = $_SERVER['PATH_INFO'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$router = new JbSilva\Router\Router($path_info, $method);

$router->get('/hello/{nome}', function ($params) {
   return "Meu nome é " . $params[0];
});

$result = $router->run();
$result['callback']($result['params']);

