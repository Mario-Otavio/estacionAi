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
        return redirect()->route('usuario.salvar')
            ->with('success', 'sucesso...');
    }

    public function listar()
    {
        $Usuario = Usuario::all();

        return view('usuario/usuario_listar', ['Usuarios' => $Usuario]);
    }
}
