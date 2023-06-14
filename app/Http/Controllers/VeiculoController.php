<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculoRequest;
use App\Models\Veiculo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class VeiculoController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view("veiculos/cadastrar_veiculo");
    }
    public function salvar(VeiculoRequest $request)
    {
        Veiculo::create($request->all());
        return redirect()->route('veiculo.cadastrar')
            ->with('success', 'sucesso...');
    }

    public function listar()
    {
        $veiculos = Veiculo::all();
        return view('veiculos/veiculo_listar', ['veiculos' => $veiculos]);
    }
}
