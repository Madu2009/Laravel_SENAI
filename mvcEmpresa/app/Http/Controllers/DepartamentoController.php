<?php
class DepartamentoController extends Controller
{
    public function index(){
        $departamentos = Departamento::all();
        return view('departamentos.index', compact('departamentos'));
    }

    public function create(){
        return view('departamentos.create');
    }

    public function store(Request $request){
        Departamento::create($request->all());
        return redirect('/departamentos');
    }
}