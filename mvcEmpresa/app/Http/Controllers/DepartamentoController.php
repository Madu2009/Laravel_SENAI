<?php
namespace App\Http\Controllers;
use App\Models\Departamento;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function add(Request $request){
  
        $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:255|unique:departamentos,sigla',
            'orcamento' =>'required|',
            'data_criacao'=>'required|date|max:255',
        ]);

        Departamento::create([
            'nome' => $request->nome,
            'sigla' => $request->sigla,
            'orcamento' => $request->orcamento,
            'data_criacao' => $request->data_criacao
        ]);

        return redirect()->back()->with('success','Departamento cadastrado com sucesso!');

    }
}