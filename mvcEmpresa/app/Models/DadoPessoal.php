<?php
class DadoPessoal extends Model
{
    protected $table = 'dados_pessoais';

    protected $fillable = [
        'cpf','rg','data_nascimento','cep','funcionario_id'
    ];

    public function funcionario(){
        return $this->belongsTo(Funcionario::class);
    }
}