<?php
namespace App\Http\Controllers;
use App\Models\Funcionario;
use App\Models\Departamento;

use Illuminate\Http\Request;

class PessoaisController extends Controller
{
    public function listar(){

        $pessoais = Pessoal::with('funcionario')->get();
        return view('listar', compact('funcionarios'));
    }

    public function cadastro(){
        $departamentos = Departamento::get();
        return view('cadastro', compact('departamentos'));
    }

    public function add(Request $request){
        $request->validate([
            'cpf' => 'required|string|max:255',
            'rg' => 'required|string|max:255|unique:alunos,email',
            'data_nascimento' => 'nullable|exists:turmas,id',
            'cep' => 'required|string|max:255',
            'funcionario_id' => 'required|string|max:255',
        ]);

        Funcionario::create([
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'data_nascimento' => $request->data_nascimento,
            'cep' => $request->cep,
            'funcionario_id' => $request->funcionario_id
            
        ]);

        return redirect()->back()->with('success','Funcionário cadastrado com sucesso!');

    }

    public function atualizar($id){
        $funcionario = Funcionario::findOrFail($id); 
        
        return view('atualizar', compact('funcionario'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'cpf' => 'required|string|max:255',
            'rg' => "required|string|max:255|unique:funcionarios,rg,$id",
            'data_nascimento' => 'required|string|max:255',
            'cep' => 'required|string|max:255',
            'funcionario_id' => 'required|string|max:255',
        ]);

        $funcionario = Funcionario::findOrFail($id); 

        $funcionario->cpf = $request->cpf; 
        $funcionario->rg = $request->rg; 
        $funcionario->data_nascimento = $request->data_nascimento; 
        $funcionario->cep = $request->cep; 
        $funcionario->funcionario_id = $request->funcionario_id; 

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