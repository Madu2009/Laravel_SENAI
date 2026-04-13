<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EditoraController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/livro/listar', [LivroController::class, 'listar'])->name('livro.listar');

Route::get('/livro/cadastrar',[LivroController::class, 'cadastro']
)->name('livro.cadastro');

Route::post('/livro/salvar',[LivroController::class, 'add'])->name('livro.salvar');

Route::get('/livro/{id}/atualizar',[LivroController::class, 'atualizar'])->name('livro.atualizar');

Route::put('/livro/{id}/update',[LivroController::class, 'update'])->name('livro.update');


Route::post('/editora/listar',[EditoraController::class, 'listar'])->name('editora.listar');

Route::get('/editora/cadastrar',[EditoraController::class, 'cadastro']
)->name('editora.cadastro');

Route::post('/editora/salvar',[EditoraController::class, 'add'])->name('editora.salvar');
