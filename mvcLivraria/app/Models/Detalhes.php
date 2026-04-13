<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Detalhes extends Model
{
    protected $fillable = [
        'custo',
        'preco_venda',
        'imposto'
    ];
    public function livros(){
        return $this->hasOne(Livro::class);
}
}