<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculoRequest;
use App\Models\Veiculo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class VeiculoController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function dash(){
        return view('veiculos.dashboard');
    }

    public function index()
    {
        $veiculos = Veiculo::whereNull('saida')->latest()->take(8)->get(); // busca 8 registros do banco
        $totalVeiculos = Veiculo::whereNull('saida')->count();
        
        
        return view('veiculos.dashboard', compact('veiculos', 'totalVeiculos'));
    }

    public function todosVeiculos()
    {
        $todosVeiculos = Veiculo::paginate(10); // ou a quantidade desejada
        $contador = Veiculo::count();
        return view('veiculos.historico', compact('todosVeiculos', 'contador'));
    }

    public function listar()
    {       
        $search = request('search');
        if($search){
            $veiculos = Veiculo::where([
                ['placa','like','%'.$search.'%']
            ])->get();
        } else {
            $veiculos = Veiculo::all();          
            }

        $veiculosTotal = Veiculo::whereNull('saida')->paginate(7); // busca todos os registros do banco  
        $totalVeiculosGaragem = Veiculo::whereNull('saida')->count();
        return view('veiculos/garagem', ['veiculosTotal' => $veiculosTotal, 'totalVeiculosGaragem' => $totalVeiculosGaragem, 'search' => $search, 'veiculo' => $veiculos]);
    }

    public function filtro()
    {       
        $search = request('search');
        if($search){
            $veiculos = Veiculo::where(function ($query) use ($search) {
                $query->where('placa', 'like', '%' . $search . '%')
                      ->orWhere('modelo', 'like', '%' . $search . '%');
            })->get();
        } else {
            $veiculos = Veiculo::all();
        }
       
        return view('veiculos/garagem', ['search' => $search, 'veiculo' => $veiculos]);
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

    public function saidaVeiculo($id)
    {        
        $veiculo = Veiculo::findOrFail($id);

        if (!$veiculo) {
            // O carro não foi encontrado
            return redirect()->back()->with('error', 'Veículo não encontrado.');
        }
        
        // Registre o horário de saída do carro
        $veiculo->saida = Carbon::now();
        $veiculo->save();
        
        // Mova o carro para a tabela de histórico
        // Aqui você precisará ter um modelo e uma tabela separada para o histórico
        // Você pode criar um novo modelo chamado HistoricoVeiculo e uma tabela chamada historico_veiculos
        // E então, criar um novo registro na tabela de histórico com os detalhes do carro e a data de saída
        
        // Por fim, redirecione de volta para a página de garagem
        return redirect()->to('/garagem')->with('sucesso', 'Saída da garagem concluída com sucesso!');
    }

}
