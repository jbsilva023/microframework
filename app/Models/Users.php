<?php


namespace App\Models;

use JbSilva\ORM\Model;

class Users extends Model
{
    public function enderecos()
    {
        return $this->hasMany(Enderecos::class);
    }

    public function endereco()
    {
        return $this->hasOne(Enderecos::class);
    }
}