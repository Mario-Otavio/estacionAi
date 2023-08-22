<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculoRequest;
use App\Models\Veiculo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;


class VeiculoController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function dash()
    {
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
        $search = request('search'); // Obtém o valor da busca

        // Se houver uma busca, filtre os veículos, caso contrário, busque todos
        $query = Veiculo::whereNull('saida');
        if ($search) {
            $query->where('placa', 'like', '%' . $search . '%');
        }

        $veiculosTotal = $query->paginate(7); // Busca os veículos conforme a busca ou sem filtro
        $totalVeiculosGaragem = $query->count(); // Conta os veículos conforme a busca ou sem filtro

        return view('veiculos.garagem', compact('veiculosTotal', 'totalVeiculosGaragem', 'search'));
    }


    public function salvar(VeiculoRequest $request)
    {
        $placa = $request->input('placa');
        // Verificar se a placa já existe nos veículos ativos
        $placaExistenteAtivo = Veiculo::where('placa', $placa)->whereNull('saida')->first();
        if ($placaExistenteAtivo) {
            // A placa já existe nos veículos ativos, talvez exibir uma mensagem de aviso
            return redirect()->route('veiculo.salvar')->with('aviso', 'Esta placa já está ativa no sistema.');
        }
        // Verificar se a placa já existe nos veículos no histórico
        $placaExistenteHistorico = Veiculo::where('placa', $placa)->whereNotNull('saida')->first();
        if ($placaExistenteHistorico) {
            // Se a placa estiver no histórico, crie um novo registro para uma nova entrada
            $novoVeiculo = new Veiculo($request->all());
            $novoVeiculo->saida = null; // Definir a saída como nula
            $novoVeiculo->save();
            // Resto do seu código para impressão e redirecionamento
            return redirect()->route('veiculo.salvar')->with('sucesso', 'Veículo cadastrado novamente com sucesso!');
        }
        // Se não for encontrado nem nos veículos ativos nem no histórico, crie um novo registro
        $veiculo = new Veiculo($request->all());
        $veiculo->save();

        // Calcula a diferença de tempo em horas
        $entrada = Carbon::parse($veiculo->created_at);
        $agora = Carbon::now();
        $diferencaHoras = $agora->diffInHours($entrada);


        // Recupera a categoria do veículo
        $categoria = $veiculo->categoria;

        // Calcula o preço com base na categoria e no tempo de permanência
        $preco = $this->calcularPreco($categoria, $diferencaHoras);

        // Atualiza o preço no registro do veículo
        $veiculo->preco = $preco;
        $veiculo->save();


        // Dados do veículo para o ticket
        //$licensePlate = $veiculo->placa; // Altere para o nome do campo correto
        //$entryTime = now();

        // Renderize a visualização do ticket em HTML
        //$html = view('veiculos.ticket', compact('licensePlate', 'entryTime'))->render();

        // Conecte à impressora usando o endereço IP
        //$printerAddress = '10.1.1.35'; // Substitua pelo endereço IP da sua impressora
        //$printerPort = 9100; // Porta padrão para impressoras
        //$connector = new NetworkPrintConnector($printerAddress, $printerPort);
        //$printer = new Printer($connector);

        // Conecte à impressora local (use o nome da impressora correta)
        //$printerName = "NomeDaSuaImpressora";
        //$connector = new WindowsPrintConnector($printerName);
        //$printer = new Printer($connector);

        // Envie o HTML renderizado para a impressora
        // $printer->text($html);

        // Feche a conexão com a impressora
        //$printer->cut();
        // $printer->close();

        // Redirecione com uma mensagem de sucesso
        return redirect()->route('veiculo.salvar')
            ->with('sucesso', 'Veículo Cadastro com Sucesso!');
    }


    protected function calcularPreco($categoria, $tempoPermanenciaHoras)
    {
        // Aqui você deve implementar a lógica de cálculo de preços
        // com base na categoria e no tempo de permanência.
        // Você pode consultar a tabela de preços ou usar uma fórmula específica.
        // Retorne o valor calculado.

        // Exemplo: R$10 por hora para carros e R$5 por hora para motos
        if ($categoria === 'Carro') {
            return $tempoPermanenciaHoras * 10;
        } elseif ($categoria === 'Moto') {
            return $tempoPermanenciaHoras * 5;
        }
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
        return redirect()->to('/garagem')->with('sucesso', 'Veículo deletado com Sucesso!');
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
