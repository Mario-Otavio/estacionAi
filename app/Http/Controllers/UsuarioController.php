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
<<<<<<< HEAD
        return redirect()->route('usuario.salvar')
            ->with('success', 'sucesso...');
=======
        return redirect()->route('usuario.cadastro')
            ->with('success', 'Usuário cadastrado com sucesso!');
>>>>>>> df2eaafdb9e2667c288479b47501fffc76d789d8
    }

    public function listar()
    {
<<<<<<< HEAD
        $Usuarios = Usuario::all();

        return view('usuario/usuario_listar', ['Usuarios' => $Usuarios]);
=======
        $Usuarios = Usuario::all(); //vem do banco
        return view('Usuarios/usuario_listar', ['Usuarios' => $Usuarios]);
>>>>>>> df2eaafdb9e2667c288479b47501fffc76d789d8
    }
}
