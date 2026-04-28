<?php
class FuncionarioController extends Controller
{
    public function index(){
        $funcionarios = Funcionario::with(['departamento','dadosPessoais'])->get();
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create(){
        $departamentos = Departamento::all();
        return view('funcionarios.create', compact('departamentos'));
    }

    public function store(Request $request){

        $funcionario = Funcionario::create($request->only([
            'nome','sobrenome','cargo','email',
            'data_admissao','salario','departamento_id'
        ]));

        DadoPessoal::create([
            'cpf'=>$request->cpf,
            'rg'=>$request->rg,
            'data_nascimento'=>$request->data_nascimento,
            'cep'=>$request->cep,
            'funcionario_id'=>$funcionario->id
        ]);

        return redirect('/funcionarios');
    }

    public function edit($id){
        $funcionario = Funcionario::with('dadosPessoais')->findOrFail($id);
        $departamentos = Departamento::all();

        return view('funcionarios.edit', compact('funcionario','departamentos'));
    }

    public function update(Request $request, $id){
        $funcionario = Funcionario::findOrFail($id);

        $funcionario->update($request->all());

        $funcionario->dadosPessoais->update([
            'cpf'=>$request->cpf,
            'rg'=>$request->rg,
            'data_nascimento'=>$request->data_nascimento,
            'cep'=>$request->cep
        ]);

        return redirect('/funcionarios');
    }

    public function destroy($id){
        Funcionario::destroy($id);
        return redirect('/funcionarios');
    }
}