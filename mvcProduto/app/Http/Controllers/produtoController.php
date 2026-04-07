<?php

namespace App\Http\Controllers;
use App\Models\DetalhesProduto;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function listar(){
        $query = Produto::query();
        $produto = $query->get();
        return view('listar', compact('produto'));
    }

    public function add(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|string|max:255',
            'preco' => 'required|string|max:255'
        ]);

        Produto::create([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'preco' => $request->preco,
        ]);

        Detalhes::create([
            'descricao' => $request->descricao,
            'tamanho' => $request->tamanho,
            'peso' => $request->peso,
        ]);

        return redirect()->back()->with('success','Detalhes do produto cadastrados com sucesso!');
    }

    public function atualizar($id){
        $produtos =Produto::findOrFail($id);
        return view('atualizar', compact('produto'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|string|max:255',
            'preco' => 'required|string|max:255'

        ]);

        $produto = Produto::findOrFail($id);

        $produto->nome = $request->nome;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $request->preco;

        $produto->save();
        return redirect()->back()->with('success', 'Produto atualizado com sucesso');

    }
}