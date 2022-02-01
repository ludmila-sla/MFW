<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LivroController;
use App\Http\Controllers\UserController;


Route::get('/', [LivroController::class, 'index'])->name('welcome');
Route::get('/dashboard', [LivroController::class, 'dashboard']);
Route::post('/dashboard', [LivroController::class, 'dashboard']);

Route::get('/escrever/escrever', [LivroController::class, 'create'])->middleware('auth');
Route::get('/ler/verlivro/{id}', [LivroController::class, 'show'])->middleware('auth');
Route::get('/ler/leitura/{id}/{capid}', [LivroController::class, 'lercap'])->middleware('auth');
Route::post('/ler/leitura/{id}/{capid}', [LivroController::class, 'lercap'])->middleware('auth');

Route::get('/ler/curtir/{id}/{capid}', [LivroController::class, 'curtir'])->middleware('auth');
Route::post('/ler/curtir/{id}/{capid}', [LivroController::class, 'curtir'])->middleware('auth');

Route::post('/ler/comentar/{id}/{capid}', [LivroController::class, 'comentar'])->middleware('auth');

Route::get('/escrever/novocap/{id}', [LivroController::class, 'criar'])->middleware('auth');

Route::post('/escrever/novocap/{id}', [LivroController::class, 'salvar'])->middleware('auth');


Route::post('/ler', [LivroController::class, 'store'])->middleware('auth');

Route::get('/editarlivro', [LivroController::class, 'editarlivro'])->middleware('auth');
Route::post('/editarlivro', [LivroController::class, 'editarlivro'])->middleware('auth');

Route::get('/escrever/edit/{id}', [LivroController::class, 'edit'])->middleware('auth');
Route::post('/escrever/update/{id}', [LivroController::class, 'update'])->middleware('auth');
Route::delete('/escrever/{id}', [LivroController::class, 'destroy'])->middleware('auth');

Route::get('/escrever/editcap/{id}/{idcap}', [LivroController::class, 'editcap'])->middleware('auth');
Route::post('/escrever/updatecap/{id}/{idcap}', [LivroController::class, 'updatecap'])->middleware('auth')->name('uploadcap');
Route::delete('/escrever/delete/{id}', [LivroController::class, 'destroycap'])->middleware('auth');

Route::get('/ler/biblioteca', [LivroController::class, 'showbiblioteca'])->middleware('auth');
Route::delete('/ler/biblioteca/{id}', [LivroController::class, 'destroylista'])->middleware('auth');
Route::get('/ler/biblioteca/{id}', [LivroController::class, 'addlista'])->middleware('auth');


Route::get('/prof/editprofile', [UserController::class, 'edit'])->middleware('auth');
Route::post('/prof/editprofile', [UserController::class, 'adduser'])->middleware('auth');





Route::get('/prof/myprofile', [UserController::class, 'show'])->middleware('auth');
Route::post('/prof/myprofile', [UserController::class, 'show'])->middleware('auth');

Route::get('/prof/verprof/{id}', [UserController::class, 'showprof'])->middleware('auth');


Route::get('/profile/show', function () {
    return view('profile/show');
});
Route::get('/prof/carteira', function () {
    return view('prof/carteira');
});
Route::get('/dashboard', [LivroController::class, 'dashboard'])->middleware('auth');

