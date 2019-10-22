<?php

$app->get('/inicio', 'HomeController@index');
$app->post('/arquivo/importar', 'XMLController@importar');
