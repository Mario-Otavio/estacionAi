<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view("usuario/cadastrar_usuario");
    }
    public function salvar(UsuarioRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'empresa' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'quantidade_vagas' => 'required|integer|min:1', // Validação para quantidade_vagas
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $userData = [
            'name' => $request->input('name'),
            'empresa' => $request->input('empresa'),
            'telefone' => $request->input('telefone'),
            'endereco' => $request->input('endereco'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'desired_parking_spaces' => $request->input('quantidade_vagas'),
        ];

        User::create($userData);
        return redirect()->route('login')
            ->with('sucesso', 'Usuário cadastrado com sucesso!');
    }

    public function listar()
    {
        $usuario = User::all(); // busca todos os registros do banco

        return view('usuario/perfil', ['usuario' => $usuario]);
    }

    public function show(User $usuario)
    {
        $usuarioRecuperado = User::findOrFail($usuario->id); //buscar registro por id
        return view('usuario/perfil', ['usuario' => $usuarioRecuperado]);
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

    public function occupiedParkingSpaces()
    {
        return $this->hasMany(User::class, 'ocupado_by_user_id');
    }
}
