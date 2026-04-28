<?php
class Funcionario extends Model
{
    protected $fillable = [
        'nome','sobrenome','cargo','email',
        'data_admissao','salario','departamento_id'
    ];

    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }

    public function dadosPessoais(){
        return $this->hasOne(DadoPessoal::class);
    }
}