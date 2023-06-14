<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
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
//Rotas Veiculo
Route::get('/veiculo_listar', [
    VeiculoController::class,
    'listar'
])
    ->name('veiculo.listar');

Route::get('/cadastrar_veiculo', function () {
    return view('veiculos/cadastrar_veiculo');
})->name('veiculo.cadastrar');

Route::post('/cadastrar_veiculo', [
    VeiculoController::class,
    'salvar'
])
    ->name('veiculo.salvar');

//Rotas Usuario
Route::get('/cadastrar_usuario', function () {
    return view('usuario/cadastrar_usuario');
})->name('usuario.cadastro');

Route::post('/cadastrar_usuario', [
    UsuarioController::class,
    'Registrar'
])
    ->name('usuario.salvar');

Route::get('/formulario', function () {
    return view('formulario');
});
