<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
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

// Cria um filtro por grupo de autenticação
// aqueles que tiverem liberados acessa direto
// o que estiver dentro de @auth vai precisar autenticar.
Route::group(['middleware' => ['web']], function () {

    //grupo autenticado precisa estar todas as rotas de
    Route::group(['middleware' => ['auth']], function () {
    });
    Route::get('/veiculos', [VeiculoController::class, 'listar'])->name('veiculo.listar');
    Route::get('/editar_veiculo', [VeiculoController::class, 'edit'])->name('veiculo.edit');
    Route::get('/veiculo_listar', [VeiculoController::class, 'destroy'])->name('veiculo.destroy');
    Route::get('/cadastrar_veiculo', function () {
        return view('veiculos/cadastrar_veiculo');
    })->name("cadastrar.veiculo");

    Route::post('/cadastrar_veiculo', [VeiculoController::class, 'salvar'])->name('veiculo.salvar');

    Route::get('/cadastrar_usuario', function () {
        return view('usuario/cadastrar_usuario');
    })->name("cadastrar.usuario");
    Route::post('/cadastrar_usuario', [UsuarioController::class, 'salvar'])->name('usuario.salvar');
    // })

    //Rota Index
    Route::get('/', function () {
        return view('welcome');
    });

    //Rota Dashboard
    Route::get('/dashboard', function () {
        return view('/dashboard');
    })->name('dashboard');


    Route::post('/login', [LoginController::class, 'login'])->name('login.usuario');
    Route::get('/login', [LoginController::class, 'show'])->name('login');

    // Route::get('/login', [LoginController::class, 'authenticated'])->name('login.usuario');
});
