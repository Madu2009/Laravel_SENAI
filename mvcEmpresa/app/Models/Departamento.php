<?php
class Departamento extends Model
{
    protected $fillable = ['nome','sigla','orcamento','data_criacao'];

    public function funcionarios(){
        return $this->hasMany(Funcionario::class);
    }
}