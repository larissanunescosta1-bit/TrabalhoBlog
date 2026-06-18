<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PostagemController;
use App\Http\Controllers\ComentarioController;

Route::get('/', [PostagemController::class, 'index'])
    ->name('raiz');

# ROTAS DE CATEGORIA ==========================================================
Route::get('/categoria',                 [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/categoria/create',          [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('/categoria',                [CategoriaController::class, 'store'])->name('categoria.store');
Route::get('/categoria/{id}/view',       [CategoriaController::class, 'view'])->name('categoria.view');
Route::post('/categoria/{id}/update',    [CategoriaController::class, 'update'])->name('categoria.update');
Route::get('/categoria/{id}/destroy',    [CategoriaController::class, 'destroy'])->name('categoria.destroy');
Route::get('/categoria/search',          [CategoriaController::class, 'search'])->name('categoria.search');

# ROTAS DE POSTAGEM ===========================================================
Route::get('/postagem/create', [PostagemController::class, 'create'])->name('postagem.create');
Route::post('/postagem',                 [PostagemController::class, 'store'])->name('postagem.store');

# ROTAS DE COMENTARIO =========================================================
Route::get('/comentario/create',         [ComentarioController::class, 'create'])->name('comentario.create');
Route::post('/comentario',               [ComentarioController::class, 'store'])->name('comentario.store');