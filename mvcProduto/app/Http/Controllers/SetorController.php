<?php

namespace App\Http\Controllers;
use App\Models\Setores;

use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function listar(){
        $query = Setor::query();
        $setores = $query->get();
        return view('listar', compact('setores'));
    }

    public function add(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'n_corredor' => 'required|string|max:255|unique:setores'
        ]);

        Setores::create([
            'nome' => $request->nome,
            'n_corredor' => $request->n_corredor,
        ]);

        return redirect()->back()->with('success','Setor cadastrado com sucesso!');
    }

    public function atualizar($id){
        $setor =Setor::findOrFail($id);
        return view('atualizar', compact('setor'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'n_corredor' => "required|string|max:255|unique:setores,$id"

        ]);

        $setor = Setores::findOrFail($id);

        $setor->nome = $request->nome;
        $setor->n_corredor = $request->n_corredor;

        $setor->save();
        return redirect()->back()->with('success', 'Setor atualizado com sucesso');
    }

     public function deletar($id){
        $setor = Setor::findOrFail($id);
        $setor->delete();

        return redirect()->route('setor.listar')->with('success', 'Setor excluido com sucesso');

    }
}