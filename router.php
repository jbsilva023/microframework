<?php
$app->get('/', function () {
    header('Location: /inicio');
});

$app->get('/inicio', 'CartorioController@index');
$app->post('/cartorio/novo', 'CartorioController@create');
$app->post('/cartorio/inserir', 'CartorioController@store');
$app->post('/cartorio/detalhe', 'CartorioController@show');
$app->post('/cartorio/update', 'CartorioController@update');
$app->post('/cartorio/delete', 'CartorioController@delete');
$app->post('/arquivo/importar', 'XMLController@importar');
