<?php

namespace JbSilva\Controllers;

class HomeController
{
    private $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function index()
    {
        return $this->params;
    }
}
