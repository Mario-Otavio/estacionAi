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
        //Rotas Veículo
        Route::delete('/veiculos/{veiculo}', [VeiculoController::class, 'destroy'])->name('modal.delete');
        Route::get('/veiculos/editar_veiculo/{veiculo}', [VeiculoController::class, 'edit'])->name('modal.edit');
        Route::put('/veiculos/update/{veiculo}', [VeiculoController::class, 'update'])->name('modal.editar');
        Route::get('/veiculo_show/{veiculo}', [VeiculoController::class, 'show'])->name('veiculo.show');
        Route::get('/dashboard', [VeiculoController::class, 'index']);
        Route::get('/garagem', [VeiculoController::class, 'listar']);
        Route::post('/cadastrar_veiculo', [VeiculoController::class, 'salvar'])->name('veiculo.salvar');

        //Rotas Usuário
        Route::get('/perfil', [UsuarioController::class, 'listar'])->name('usuario.listar');
        Route::put('/perfil/{usuario}', [UsuarioController::class, 'update'])->name('usuario.update');



        //Rota Cadstro de veículo
        Route::get('/cadastrar_veiculo', function () {
            return view('veiculos/cadastrar_veiculo');
        })->name("cadastrar.veiculo");
    });
    //Rota Index
    Route::get('/', function () {
        return view('welcome');
    });

    //Rota Cadastro de usuário
    Route::get('/cadastrar_usuario', function () {
        return view('usuario/cadastrar_usuario');
    })->name("cadastrar.usuario");
    Route::post('/cadastrar_usuario', [UsuarioController::class, 'salvar'])->name('usuario.salvar');

    //Rotas Login
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth')->withoutMiddleware(['auth']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
