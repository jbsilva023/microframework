<?php


namespace App\Models;

use JbSilva\ORM\Model;

class Users extends Model
{
    public function endereco()
    {
        return $this->hasMany(Enderecos::class);
    }
}