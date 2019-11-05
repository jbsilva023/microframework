<?php
$app->get('/', function () {
    header('Location: /inicio');
});

$app->get('/inicio', 'CartorioController@index');
$app->post('/arquivo/importar', 'XMLController@importar');
