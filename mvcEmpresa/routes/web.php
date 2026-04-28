<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('funcionarios', FuncionarioController::class);
Route::resource('departamentos', DepartamentoController::class);