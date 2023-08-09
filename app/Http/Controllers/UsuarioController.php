<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UsuarioController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view("usuario/cadastrar_usuario");
    }
    public function salvar(UsuarioRequest $request)
    {
        User::create($request->all());
        return redirect()->route('login')
            ->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function listar()
    {
        $usuario = User::all(); // busca todos os registros do banco

        return view('usuario/perfil', ['usuario' => $usuario]);
    }

    public function show(User $usuario)
    {
        $usuarioRecuperado = User::findOrFail($usuario->id);
        return view('usuario/show_usuario', ['usuario' => $usuarioRecuperado]);
    }

    public function edit(User $usuario)
    {
        return view('usuario/editar_usuario', []);
    }

    public function update(UsuarioRequest $request, User $usuario)
    {

        $usuario->update($request->all());
        return redirect()->route('usuario.listar')
            ->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuario.listar')->with('sucess', 'Usuario deletado com sucesso!');
    }
}
