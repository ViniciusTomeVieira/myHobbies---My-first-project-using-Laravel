<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome', 'cpf', 'rg', 'nasc', 'cep', 'rua', 'bairro', 'cidade', 'estado', 'numero',
    ];
}
