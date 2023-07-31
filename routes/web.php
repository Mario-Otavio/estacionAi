<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;


// Cria um filtro por grupo de autenticação
// aqueles que tiverem liberados acessa direto
// o que estiver dentro de @auth vai precisar autenticar.
Route::group(['middleware' => ['web']], function () {

    //grupo autenticado precisa estar todas as rotas de
    Route::group(['middleware' => ['auth']], function () {
    });
    Route::get('/veiculo_listar', [VeiculoController::class, 'listar'])->name('veiculo.listar');
    Route::get('/editar_veiculo', [VeiculoController::class, 'edit'])->name('veiculo.edit');
    Route::post('/veiculo_listar', [VeiculoController::class, 'destroy'])->name('veiculo.destroy');
    Route::get('/cadastrar_veiculo', function () {
        return view('veiculos/cadastrar_veiculo');
    })->name("cadastrar.veiculo");
    Route::get('/cadastrar_usuario', function () {
        return view('usuario/cadastrar_usuario');
    })->name("cadastrar.usuario");
    Route::get('/dashboard', [VeiculoController::class, 'listar']);
    Route::post('/cadastrar_usuario', [UsuarioController::class, 'salvar'])->name('usuario.salvar');
    Route::post('/cadastrar_veiculo', [VeiculoController::class, 'salvar'])->name('veiculo.salvar');
    
    
    //Rota Index
    Route::get('/', function () {
        return view('welcome');
    });

    
    //Rota Dashboard
    //Route::get('/dashboard', function () {
    //    return view('/dashboard');
    //})->name('dashboard');

    Route::post('/login', [LoginController::class, 'login'])->name('login.usuario');
    Route::get('/login', [LoginController::class, 'show'])->name('login');

    // Route::get('/login', [LoginController::class, 'authenticated'])->name('login.usuario');
});