<?php


namespace App\Models;

use JbSilva\ORM\Model;

class Cartorios extends Model
{
    public function enderecos()
    {
        return $this->hasMany(Enderecos::class);
    }
}