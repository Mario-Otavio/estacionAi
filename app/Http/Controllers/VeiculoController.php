<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculoRequest;
use App\Models\Veiculo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Carbon\Carbon;

class VeiculoController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dash(){
        return view('veiculos.dashboard');
    }

    public function index()
    {
        $veiculos = Veiculo::latest()->take(8)->get(); // busca 8 registros do banco
        $totalVeiculos = Veiculo::count();
        
        
        return view('veiculos.dashboard', compact('veiculos', 'totalVeiculos'));
    }

    public function listar()
    {
        $veiculosTotal = Veiculo::paginate(7); // busca todos os registros do banco
        $totalVeiculosGaragem = Veiculo::count();
        
        return view('veiculos/garagem', ['veiculosTotal' => $veiculosTotal, 'totalVeiculosGaragem' => $totalVeiculosGaragem]);
    }

    public function salvar(VeiculoRequest $request)
    {
        Veiculo::create($request->all());
        return redirect()->route('veiculo.salvar')
            ->with('sucesso', 'Veículo Cadastro com Sucesso!');
    }    

    public function show(Veiculo $veiculo)
    {        
        $veiculoRecuperado = Veiculo::findOrFail($veiculo->id);
        return view('veiculos/veiculo_show', ['veiculo' => $veiculoRecuperado]);
    }

    public function edit(Veiculo $Veiculo)
    {
        return view('veiculos/editar_veiculo', ['veiculo' => $Veiculo]);
    }

    public function update(VeiculoRequest $request, Veiculo $Veiculo)
    {

        $Veiculo->update($request->all());
        return redirect('/garagem')
            ->with('sucesso', 'Veículo editado com Sucesso!');
    }

    public function destroy(Veiculo $Veiculo)
    {
        $Veiculo->delete();
        return redirect()->to('/garagem') ->with('sucesso', 'Veículo deletado com Sucesso!');
    }
}
