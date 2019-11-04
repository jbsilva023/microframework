<?php

$app->get('/inicio', 'CartorioController@index');
$app->post('/arquivo/importar', 'XMLController@importar');
