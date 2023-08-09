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
    Route::group(['middleware' => ['auth']], function () {});    
    Route::delete('/veiculos/{veiculo}', [VeiculoController::class, 'destroy'])->name('modal.delete');
    Route::get('/veiculos/editar_veiculo/{veiculo}', [VeiculoController::class, 'edit'])->name('modal.edit');
    Route::put('/veiculos/update/{veiculo}', [VeiculoController::class, 'update'])->name('modal.editar');
    Route::get('/veiculo_show/{veiculo}', [VeiculoController::class, 'show'])->name('veiculo.show');
    Route::get('perfil', [UsuarioController::class, 'listar']);
    Route::get('/dashboard', [VeiculoController::class, 'index']);
    Route::get('/garagem', [VeiculoController::class, 'listar']);
    Route::get('/usuario/perfil', [UsuarioController::class, 'listar']);
    
    Route::get('/cadastrar_veiculo', function () {
        return view('veiculos/cadastrar_veiculo');
    })->name("cadastrar.veiculo");
    Route::get('/cadastrar_usuario', function () {
        return view('usuario/cadastrar_usuario');
    })->name("cadastrar.usuario");
    
    Route::post('/cadastrar_usuario', [UsuarioController::class, 'salvar'])->name('usuario.salvar');
    Route::post('/cadastrar_veiculo', [VeiculoController::class, 'salvar'])->name('veiculo.salvar');


    //Rota Index
    Route::get('/', function () {
        return view('welcome');
    });



    //Rota Garagem
    
    Route::post('/login', [LoginController::class, 'login'])->name('login.usuario');
    Route::get('/login', [LoginController::class, 'show'])->name('login');

});
