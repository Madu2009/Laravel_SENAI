<?php
namespace App\Http\Controllers;
use App\Models\Funcionario;
use App\Models\Departamento;

use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function listar(){
        $funcionario = Funcionario::with('departamento')->get();
        return view('listar', compact('funcionarios'));
    }

    public function cadastro(){
        $departamentos = Departamento::get();
        return view('cadastro', compact('departamentos'));
    }

    public function add(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:alunos,email',
            'sobrenome' => 'nullable|exists:turmas,id',
            'cargo' => 'required|string|max:255',
            'data_admissao' => 'required|date|max:255',
            'salario' => 'required|number|max:255',
        ]);
        Funcionario::create([
            'nome' =>$request->nome,
            'email' => $request->email,
            'sobrenome' => $request->sobrenome,
            'cargo' =>$request->cargo,
            'data_admissao' =>$request->data_admissao,
            'salario' =>$request->salario
        ]);

        return redirect()->back()->with('success','Funcionario Cadastrado com sucesso!');

    }

    public function atualizar($id){
        $funcionario = Funcionario::findOrFail($id); 
        return view('atualizar', compact('funcionario'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:alunos,email',
            'sobrenome' => 'nullable|exists:turmas,id',
            'cargo' => 'required|string|max:255',
            'data_admissao' => 'required|date|max:255',
            'salario' => 'required|number|max:255',
        ]);

        $funcionario = Funcionario::findOrFail($id); 

        $funcionario->nome = $request->nome; 
        $funcionario->email = $request->email; 
        $funcionario->sobrenome = $request->sobrenome; 
        $funcionario->cargo = $request->cargo; 
        $funcionario->data_admissao = $request->data_admissao; 
        $funcionario->salario = $request->salario; 

        $funcionario->save(); 
        return redirect()->back()->with('success','Funcionário atualizado com suceso');
    }

    public function deletar($id){
        $funcionario = Funcionario::findOrFail($id); 
        $funcionario->delete(); 

        return redirect()->route('funcionario.listar')
            ->with('success','Funcionário excluído com sucesso!');
    }

}