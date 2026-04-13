<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Livro extends Model
{
    protected $fillable = [
        'nome',
        'autor',
        'descricao',
        'num_paginas',
        'data_publicacao'
    ];
    public function editora(){
        return $this->hasMany(Editora::class);
    }

    public function detalhes(){
        return $this->hasOne(Detalhes::class);
    }
}