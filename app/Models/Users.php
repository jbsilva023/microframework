<?php


namespace App\Models;


use JbSilva\ORM\Connection;
use JbSilva\ORM\Drivers\MysqlPdo;
use JbSilva\ORM\Model;

class Users extends Model
{
    public function __construct()
    {
        $this->setDriver(new MysqlPdo(Connection::init()));
    }
}