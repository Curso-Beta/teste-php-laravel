<?php

use Illuminate\Support\Facades\Route;


//rotas de cadastro do usuario
Route::get('/',[\App\Http\Controllers\WebController::class,'principal'])->name('index');
Route::get('/cadastro',[\App\Http\Controllers\WebController::class,'criaUsuario'])->name('index.form');
Route::post('/cadastro',[\App\Http\Controllers\WebController::class,'criaUsuario'])->name('index.cria');

//rotas de login do usuario
Route::get('/login/{erro?}',[\App\Http\Controllers\LoginController::class,'index'])->name('login.index');
Route::post('/login',[\App\Http\Controllers\LoginController::class,'autenticar'])->name('login.autenticar');

//rotas de login adm
Route::get('/adm',[\App\Http\Controllers\AdmController::class,'index'])->name('index.adm');
Route::post('/adm',[\App\Http\Controllers\AdmController::class,'autenticar'])->name('login.adm');


//rotas app
Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    Route::get('/home',[\App\Http\Controllers\AppController::class,'index'])->name('app.home');
    Route::get('/candidatura/{msg?}',[\App\Http\Controllers\AppController::class,'candidatura'])->name('app.candidatura');
    Route::get('/logout',[\App\Http\Controllers\LoginController::class,'logout'])->name('login.sair'); 
    Route::get('/adm/home',[\App\Http\Controllers\AdmController::class,'home'])->name('home.adm');
});
 
//rotas adm
Route::middleware('autenticacao:padrao')->prefix('/adm')->group(function(){
    Route::get('/home',[\App\Http\Controllers\AdmController::class,'home'])->name('home.adm');
    Route::get('/logout',[\App\Http\Controllers\AdmController::class,'logout'])->name('logout.adm'); 
    Route::get('/listarVagas',[\App\Http\Controllers\AdmController::class,'listarVagas'])->name('listarVagas.adm');
    Route::get('/criaAdm',[\App\Http\Controllers\AdmController::class,'criaAdm'])->name('criaAdm.adm');
    Route::post('/criaAdm',[\App\Http\Controllers\AdmController::class,'criaAdm'])->name('criaAdm.adm'); 

    Route::get('/listarUsuarios',[\App\Http\Controllers\AdmController::class,'listarUsuarios'])->name('listarUsuarios');
    Route::post('/listarUsuarios',[\App\Http\Controllers\AdmController::class,'listarUsuarios'])->name('listarUsuarios');
    Route::get('/editarUsuarios/{id?}',[\App\Http\Controllers\AdmController::class,'editarUsuarios'])->name('editarUsuarios');
    Route::post('/editarUsuarios/{id?}',[\App\Http\Controllers\AdmController::class,'editarUsuariosId'])->name('editarUsuariosId');
    Route::get('/excluirUsuarios/{id?}',[\App\Http\Controllers\AdmController::class,'excluirUsuariosId'])->name('excluirUsuariosId');

    Route::get('/vagas/listar',[\App\Http\Controllers\VagasController::class,'listar'])->name('listar.vaga');
    Route::post('/vagas/listar',[\App\Http\Controllers\VagasController::class,'listar'])->name('listar.vagas');
    Route::get('/vagas/adicionar',[\App\Http\Controllers\VagasController::class,'adicionar'])->name('adicionar.vaga');
    Route::post('/vagas/adicionar',[\App\Http\Controllers\VagasController::class,'adicionar'])->name('adicionar.vaga');
    Route::get('/vagas/editar/{id}',[\App\Http\Controllers\VagasController::class,'editar'])->name('editar.vaga');
    Route::post('/vagas/editar/{id}',[\App\Http\Controllers\VagasController::class,'editarId'])->name('editarId.vaga');
    Route::get('/vagas/excluir/{id}',[\App\Http\Controllers\VagasController::class,'excluir'])->name('excluir.vaga');     
});



