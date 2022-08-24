<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstrutoresController;
use App\Http\Controllers\AlunosController;
use App\Http\Controllers\TreinosController;
use App\Http\Controllers\EntrarController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/instrutores', InstrutoresController::Class)->except(['show']);

//Route::resource('/alunos', AlunosController::Class)->except(['show']);

Route::resource('/alunos', AlunosController::Class)->only(['index', 'create', 'store', 'destroy']);

Route::get('/alunos/{instrutores}/index', [AlunosController::Class, 'index'])->name('alunos.index');

Route::get('/alunos/index', [AlunosController::Class, 'index'])->name('alunos.index.2');

Route::resource('/treinos', TreinosController::Class)->except(['show']);

Route::get('/treinos/{alunos}/index', [TreinosController::Class, 'index'])->name('treinos.index');

Route::get('/treinos/index', [TreinosController::Class, 'index'])->name('treinos.index.2');

Route::get('treinos/{treino}/edit', [TreinosController::Class, 'edit'])->name('treinos.edit');

Route::get('/entrar', [EntrarController::Class, 'index'])->name('entrar.index');

Route::post('/entrar', [EntrarController::CLass, 'entrar'])->name('entrar.entrar');









