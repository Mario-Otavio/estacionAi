<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\LoginController;
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

    //grupo autenticado
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/listar_veiculo', [VeiculoController::class, 'listar'])->name('veiculo.listar');

        Route::get('/edit_veiculo', [VeiculoController::class, 'edit'])->name('veiculo.edit');
        Route::get('/listar_veiculo', [VeiculoController::class, 'delete'])->name('veiculo.destroy');

        Route::get('/cadastrar_veiculo', function () {
            return view('veiculos/cadastrar_veiculo');
        })->name("veiculos.cadastrar");

        Route::post('/cadastrar_veiculo', [VeiculoController::class, 'salvar'])->name('veiculo.salvar');
    });


    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/login_usuario', [LoginController::class, 'show'])->name('login');
});
