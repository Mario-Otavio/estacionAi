<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;


// Cria um filtro por grupo de autenticação
// aqueles que tiverem liberados acessa direto
// o que estiver dentro de @auth vai precisar autenticar.
Route::group(['middleware' => ['web']], function () {

    Route::middleware(['auth'])->group(function () {
        



    Route::delete('/veiculos/{veiculo}', [VeiculoController::class, 'destroy'])->name('modal.delete');
    Route::get('/veiculos/editar_veiculo/{veiculo}', [VeiculoController::class, 'edit'])->name('modal.edit');
    Route::put('/veiculos/update/{veiculo}', [VeiculoController::class, 'update'])->name('modal.editar');
    Route::get('/veiculo_show/{veiculo}', [VeiculoController::class, 'show'])->name('veiculo.show');
    Route::get('/dashboard', [VeiculoController::class, 'index']);
    Route::get('/garagem', [VeiculoController::class, 'listar']);
    Route::get('/perfil', [UsuarioController::class, 'listar']);
        Route::get('/cadastrar_veiculo', function () {
        return view('veiculos/cadastrar_veiculo');
    })->name("cadastrar.veiculo");
    Route::get('/cadastrar_usuario', function () {
        return view('usuario/cadastrar_usuario');
    })->name("cadastrar.usuario");

    Route::post('/cadastrar_usuario', [UsuarioController::class, 'salvar'])->name('usuario.salvar');
    Route::post('/cadastrar_veiculo', [VeiculoController::class, 'salvar'])->name('veiculo.salvar');

});
    //Rota Index
    Route::get('/', function () {
        return view('welcome');
    });


    //Rotas Login
    Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth')->withoutMiddleware(['auth']);
    Route::get('/login', [LoginController::class, 'show'])->name('login');
});

