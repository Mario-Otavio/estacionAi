<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
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
        Usuario::create($request->all());
        return redirect()->route('usuario.cadastro')
            ->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function listar()
    {
        $Usuarios = Usuario::all(); //vem do banco
        return view('Usuarios/usuario_listar', ['Usuarios' => $Usuarios]);
    }

    public function show(Usuario $usuario)
    {
        $usuarioRecuperado = Usuario::findOrFail($usuario->id);
        return view('usuario/show_usuario', ['usuario' => $usuarioRecuperado]);
    }

    public function edit(Usuario $usuario)
    {
        return view('usuario/editar_usuario', []);
    }

    public function update(UsuarioRequest $request, Usuario $usuario)
    {

        $usuario->update($request->all());
        return redirect()->route('usuario.listar')
            ->with('success', 'Veículo atualizado com sucesso!');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuario.listar')->with('sucess', 'Usuario deletado com sucesso!');
    }
}
