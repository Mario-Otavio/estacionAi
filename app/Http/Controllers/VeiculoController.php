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
        return redirect()->route('veiculo.salvar')
            ->with('success', 'Veículo Cadastro com Sucesso!');
    }

    public function listar()
    {
        $veiculos = Veiculo::all(); //vem do banco
        return view('veiculos/dashboard', ['veiculos' => $veiculos]);
    }

    public function show(Veiculo $veiculo)
    {
        $veiculoRecuperado = Veiculo::findOrFail($veiculo->id);
        return view('veiculos/veiculo_show', ['veiculo' => $veiculoRecuperado]);
    }

    public function edit(Veiculo $veiculo)
    {
        return view('veiculos/editar_veiculo', ['veiculo' => $veiculo]);
    }

    public function update(VeiculoRequest $request, Veiculo $veiculo)
    {

        $veiculo->update($request->all());
        return redirect('/dashboard')
            ->with('success', 'Veículo editado com Sucesso!');
    }

    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();
        return redirect('/dashboard')
            ->with('success', 'Veículo deletado com Sucesso!');
    }
}
