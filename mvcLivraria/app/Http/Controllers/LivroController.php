<?php
namespace App\Http\Controllers;
use App\Models\Livro;
use App\Models\Editoras;
use App\Models\Detalhes;

use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function listar(){
        $livros = Livro::with(['editora', 'detalhes'])->get();
        return view('listarLivro', compact('livros'));
    }

    public function cadastro(){
        $editoras = Editoras::get();
        return view('cadastroLivro', compact('editoras'));
    }

    public function add(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'num_paginas' => 'required|numeric',
            'data_publicacao' => 'required|date',
            'editora_id' => 'nullable|exists:editoras,id' 
        ]);

        $livro = Livro::create([
            'nome' => $request->nome,
            'autor' => $request->autor,
            'descricao' => $request->descricao,
            'num_paginas' => $request->num_paginas,
            'data_publicacao' => $request->data_publicacao,
            'editora_id' => $request->editora_id
        ]);

        Detalhes::create([
            'custo' => $request->custo,
            'preco_venda' => $request->preco_venda,
            'imposto' => $request->imposto,
            'livro_id' => $livro->id
        ]);

        return redirect()->back()->with('success','Livro cadastrado com sucesso!');

    }
    public function atualizar($id){
        $livro = Livro::findOrFail($id);
        $editoras = Editoras::get();
        return view('atualizarLivro', compact('livro','editoras'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'num_paginas' => 'required|numeric',
            'data_publicacao' => 'required|date',
            'editora_id' => 'nullable|exists:editoras,id'
        ]);

        $livro = Livro::findOrFail($id); 
        $detalhe = Detalhes::where('livro_id', $livro->id)->first();

        $livro->nome = $request->nome; 
        $livro->autor = $request->autor; 
        $livro->descricao = $request->descricao; 
        $livro->num_paginas = $request->num_paginas; 
        $livro->data_publicacao = $request->data_publicacao; 
        $livro->editora_id = $request->editora_id; 

        $livro->save(); 

        $detalhe->custo = $request->custo;
        $detalhe->preco_venda = $request->preco_venda;
        $detalhe->imposto = $request->imposto;

        $detalhe->save();

        return redirect()->back()->with('success','Livro atualizado com suceso');
    }

}