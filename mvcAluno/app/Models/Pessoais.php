<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoais extends Model
{
    protected $fillable = [
        'telefone',
        'data_nascimento',
        'endereco',
        'idade'
    ];

}