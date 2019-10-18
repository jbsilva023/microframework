<?php

$router->get('/hello/{nome}', function ($params) {
    //return "Meu nome é " . $params[0];
    echo  "Meu nome é " . $params[0];
});
