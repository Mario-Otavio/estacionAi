<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculoRequest;
use App\Models\Veiculo;
use App\Models\User;
use App\Models\Preco;
use App\Models\Pagamento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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

        $user = Auth::user();
        $totalVagas = $user->desired_parking_spaces;
        $vagasOcupadas = Veiculo::where('user_id', $user->id)->whereNull('saida')->count();
        $vagasLivres = $totalVagas - $vagasOcupadas;

        // gráfico pizza
        // Busque os dados do gráfico
        $catData = Preco::all();

        // Inicialize os arrays para os rótulos (categorias) e os totais
        $catCategoria = [];
        $catTotal = [];

        // Preencha os arrays com os dados
        foreach ($catData as $cat) {
            $catCategoria[] = $cat->categoria;
            $catTotal[] = Veiculo::where('id', $cat->id)->count();
        }

        // Converta os arrays em JSON para passá-los para a view
        $catLabel = json_encode($catCategoria);
        $catTotal = json_encode($catTotal);

        return view('veiculos.dashboard', compact('veiculos', 'totalVeiculos', 'totalVagas', 'vagasOcupadas', 'vagasLivres', 'catLabel', 'catTotal'));
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
        $tabelaPrecos = Preco::all(); // Isso busca todos os preços do banco de dados
        $categorias = Preco::all();
        return view('veiculos.garagem', compact('veiculosTotal', 'totalVeiculosGaragem', 'search', 'tabelaPrecos', 'categorias'));
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

        $usuario = User::findOrFail(auth()->user()->id); // Obtém o usuário logado
        $totalVagas = $usuario->desired_parking_spaces;
        // Verificar se o número de vagas ocupadas excede o limite definido pelo usuário
        $vagasOcupadas = $usuario->veiculos->whereNull('saida')->count(); // Conta os veículos ativos do usuário
        if ($vagasOcupadas >= $totalVagas) {
            return redirect()->route('veiculo.salvar')->with('aviso', 'Você atingiu o limite de vagas permitido!');
        }

        // Se não for encontrado nem nos veículos ativos nem no histórico, crie um novo registro
        $veiculo = new Veiculo($request->all());
        // Defina o user_id
        $veiculo->user_id = auth()->user()->id;
        $veiculo->save();

        // Atualiza o status da vaga como ocupada
        $veiculo->VagasOcupadas = true;
        $veiculo->save();

        // Atualiza o status da vaga como ocupada
        $veiculo->saida = null; // Atribui null à saída
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

        // Recupera todas as categorias da tabela "preco"
        $categorias = Preco::all();

        // Redirecione com uma mensagem de sucesso
        return redirect()->route('veiculo.salvar')
            ->with('sucesso', 'Veículo Cadastro com Sucesso!');
    }

    public function atualizarPrecosEmTempoReal()
    {
        $veiculos = Veiculo::whereNull('saida')->get(); // Recupere todos os veículos ativos

        foreach ($veiculos as $veiculo) {
            $entrada = Carbon::parse($veiculo->created_at);
            $agora = Carbon::now();
            $diferencaMinutos = $agora->diffInMinutes($entrada);

            $categoria = $veiculo->categoria;
            $tabelaPrecos = $this->getTabelaPrecos($categoria);
            $preco = $this->calcularPreco($tabelaPrecos, $diferencaMinutos);

            // Atualize o preço no registro do veículo
            $veiculo->preco = $preco;
            $veiculo->save();
        }

        // Após atualizar os preços, retorne os veículos atualizados em formato JSON
        return response()->json($veiculos);
    }


    protected function calcularPreco($tabelaPrecos, $diferencaMinutos)
    {
        // Obtenha o preço por hora da tabela de preços
        $precoPorMinuto  = $tabelaPrecos / 60;
        // Calcula o preço total com base na quantidade de horas de permanência
        $precoTotal = $precoPorMinuto  * $diferencaMinutos;

        return $precoTotal;
    }

    protected function getTabelaPrecos($categoria)
    {
        $preco = Preco::where('categoria', $categoria)->first();

        if ($preco) {
            return $preco->valor_por_hora;
        } else {
            // Lide com o caso em que a categoria não foi encontrada na tabela de preços.
            // Você pode retornar um valor padrão ou lançar uma exceção, dependendo da lógica do seu aplicativo.
            return 0; // Altere isso para o valor padrão desejado.
        }
    }

    public function show(Veiculo $veiculo)
    {
        $veiculoRecuperado = Veiculo::findOrFail($veiculo->id);
        return view('veiculos/veiculo_show', ['veiculo' => $veiculoRecuperado]);
    }


    public function edit(Veiculo $Veiculo)
    {
        //$categorias = Categoria::all(); // Recupere todas as categorias
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


    public function saidaVeiculo(Request $request, $id)
    {
        $veiculo = Veiculo::findOrFail($id);

        if (!$veiculo) {
            // O carro não foi encontrado
            return redirect()->back()->with('error', 'Veículo não encontrado.');
        }

        // Registre o horário de saída do carro
        $veiculo->saida = Carbon::now();
        $veiculo->save();

        // Cálculo do valor de pagamento
        $entrada = Carbon::parse($veiculo->created_at);
        $saida = Carbon::parse($veiculo->saida);
        $diferencaMinutos = $saida->diffInMinutes($entrada);

        $categoria = $veiculo->categoria; // Certifique-se de substituir pela lógica correta para obter a categoria
        $tabelaPrecos = $this->getTabelaPrecos($categoria);
        $valorPagamento = $this->calcularPreco($tabelaPrecos, $diferencaMinutos);

        // Validação do campo forma_pagamento
        $request->validate([
            'forma_pagamento' => 'required', // Certifique-se de que o campo seja obrigatório
        ]);

        // Registrar o pagamento
        $formaPagamento = $request->input('forma_pagamento');

        Pagamento::create([
            'veiculo_id' => $veiculo->id,
            'forma_pagamento' => $formaPagamento,
            'valor' => $valorPagamento,
        ]);
        // Por fim, redirecione de volta para a página de garagem
        return redirect()->to('/garagem')->with('sucesso', 'Saída da garagem concluída com sucesso!');
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function mostrarFormPrecificacao()
    {
        $precos = Preco::all();
        $veiculo = Veiculo::all();
        $categoria_id =  $precos->pluck('categoria', 'id')->all();
        return view('veiculos.precificacao', compact('veiculo', 'precos', 'categoria_id'));
    }

    public function addPrecificarCategorias(Request $request)
    {
        $categoriaCarro = $request->input('categoria_carro');
        $valorCarro = $request->input('valor_carro');
        $categoriaMoto = $request->input('categoria_moto');
        $valorMoto = $request->input('valor_moto');

        $preco = new Preco;
        $preco->categoria = $request->input('categoria_carro');
        $preco->valor_por_hora = $request->input('valor_carro');
        $preco->save();

        return redirect()->route('veiculos.precificacao')->with('sucesso', 'Categoria e Preço salvo com sucesso!');
    }

    public function editarValores(Request $request)
    {
        // Valida os dados da solicitação
        $request->validate([
            'categoria' => 'required|exists:preco,id',
            'valor' => 'required|numeric|min:0'
        ]);

        // Encontra a categoria selecionada
        $preco = Preco::find($request->input('categoria'));

        // Atualiza o preço da categoria selecionada
        $preco->valor_por_hora = $request->input('valor');
        $preco->save();

        // Redireciona de volta para o formulário com uma mensagem de sucesso
        return redirect()->route('veiculos.precificacao')->with('sucesso', 'Preço atualizado com sucesso!');
    }

    public function deletarCategorias(Preco $preco)
    {
        // Delete the specified Preco record
        $preco->delete();

        // Redirect back to the form with a success message
        return redirect()->back()->with('sucesso', 'Categoria deletada com sucesso!');
    }
}
