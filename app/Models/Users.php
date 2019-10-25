<?php


namespace App\Models;


use JbSilva\ORM\Connection;
use JbSilva\ORM\Drivers\Mysql;
use JbSilva\ORM\Model;

class Users extends Model
{
    public function __construct()
    {
        $this->setDriver(new Mysql());
    }
}