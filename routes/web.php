<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;


// Cria um filtro por grupo de autenticação
// aqueles que tiverem liberados acessa direto
// o que estiver dentro de @auth vai precisar autenticar.

Route::middleware(['auth'])->group(function () {
    //Rotas Veículo
    Route::delete('/veiculos/{veiculo}', [VeiculoController::class, 'destroy'])->name('modal.delete');
    Route::get('/veiculos/editar_veiculo/{veiculo}', [VeiculoController::class, 'edit'])->name('modal.edit');
    Route::put('/veiculos/update/{veiculo}', [VeiculoController::class, 'update'])->name('modal.editar');
    Route::get('/veiculo_show/{veiculo}', [VeiculoController::class, 'show'])->name('modal.show');
    Route::get('/veiculos/{veiculo}', [VeiculoController::class, 'show'])->name('modal.showHistorico');
    Route::put('/veiculos/confirmacao/{veiculo}', [VeiculoController::class, 'saidaVeiculo'])->name('modal.confirmacao');
    Route::get('/dashboard', [VeiculoController::class, 'index']);
    Route::get('/garagem', [VeiculoController::class, 'listar']);
    Route::post('/garagem', [VeiculoController::class, 'salvar'])->name('veiculo.salvar');
    Route::get('/historico', [VeiculoController::class, 'todosVeiculos'])->name('veiculo.historico');
    Route::get('/atualizar-precos', [VeiculoController::class, 'atualizarPrecosEmTempoReal']);
    Route::put('/saida-veiculo/{id}', [VeiculoController::class, 'saidaVeiculo'])->name('veiculo.saida');

    //Rostas Precificação
    Route::get('/precificacao', [VeiculoController::class, 'mostrarFormPrecificacao'])->name('veiculos.precificacao');
    Route::post('/precificacao', [VeiculoController::class, 'addPrecificarCategorias'])->name('veiculos.addPrecificarCategorias');
    Route::put('/veiculos/precificacao', [VeiculoController::class, 'editarValores'])->name('veiculos.editarValores');
    Route::delete('/veiculos/precificacao/{preco}', [VeiculoController::class, 'deletarCategorias'])->name('veiculos.deletarCategorias');

    //Rotas Usuário
    Route::get('/perfil', [UsuarioController::class, 'listar'])->name('usuario.listar');
    Route::put('/perfil/{usuario}', [UsuarioController::class, 'update'])->name('usuario.update');

    //Rota Cadastro de veículo
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
