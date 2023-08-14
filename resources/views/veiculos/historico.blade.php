@extends('layouts.main')
@section('title', 'Histórico')
@section('content')

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="dashboard">
                <i class="bi bi-grid"></i>
                <span>Painel</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Paginas</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="perfil">
                <i class="bi bi-person"></i>
                <span>Perfil</span>
            </a>
        </li><!-- End Perfil Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="cadastrar_veiculo">
                <i class="bi bi-card-list"></i>
                <span>Cadastrar Veículo</span>
            </a>
        </li><!-- End Registrar Veículo Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="garagem">
                <i class="bi bi-car-front"></i>
                <span>Garagem</span>
            </a>
        </li><!-- End Garagem Nav -->

        
        <li class="nav-item">
            <a class="nav-link" href="historico">
                <i class="bi bi-list-columns-reverse"></i>
                <span>Histórico</span>
            </a>
        </li><!-- End Histórico Nav -->

    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Histórico</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
                <li class="breadcrumb-item active">Veículos</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Total veículos <span>| Todos</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-car-front-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            {{ $contador }}
                                        </h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->
                                      

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filtro</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Hoje</a></li>
                                    <li><a class="dropdown-item" href="#">Este mês</a></li>
                                    <li><a class="dropdown-item" href="#">Este ano</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Total Veículos <span>| Todos</span></h5>

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Categoria</th>
                                            <th scope="col">Placa</th>
                                            <th scope="col">Modelo</th>
                                            <th scope="col">Tempo</th>
                                            <th scope="col">Informações</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($todosVeiculos as $veiculo)
                                        <tr class="align-middle">
                                            <!-- <td scropt="row">{{ $loop->index + 1 }}</td> -->
                                            <td scope="row"> {{ $veiculo->id }} </td>
                                            <td> {{ $veiculo->categoria }} </td>
                                            <td class="text-primary"> {{ $veiculo->placa }} </td>
                                            <td> {{ $veiculo->modelo }} </td>
                                            <td><span class="timer" data-entrada="{{ $veiculo->created_at }}" data-saida="{{ $veiculo->saida }}"></span></td>
                                          <!--  <td><span class="badge bg-success">Aprovado</span></td> -->
                                            <td>
                                                <a href="#modalShowHistorico-{{$veiculo->id}}" class="btn btn-info bi bi-file-text" id="btn-grid-info" data-bs-toggle="modal"></a>
                                                @include('modals.veiculosModal.showHistorico')                                              
                                            </td>
                                           
                                            
                                        </tr>
                                        @endforeach
                                        @include('includes.mensagens')
                                    </tbody>

                                </table>
                                {{ $todosVeiculos->links('pagination::bootstrap-5') }}
                            </div>

                        </div>
                    </div><!-- End Recent Sales -->
                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>

</main><!-- End #main -->
<br><br><br>


<script>
function atualizarTimers() {
        var timers = document.querySelectorAll('.timer');

        timers.forEach(function(timerElement) {
            var horarioEntrada = timerElement.getAttribute('data-entrada');
            var horarioSaida = timerElement.getAttribute('data-saida');
            
            if (horarioSaida) { // Verifica se o carro saiu
                var entrada = new Date(horarioEntrada);
                var saida = new Date(horarioSaida);
                var diferenca = Math.floor((saida - entrada) / 1000); // Diferença em segundos

                var horas = Math.floor(diferenca / 3600);
                var minutos = Math.floor((diferenca % 3600) / 60);
                var segundos = diferenca % 60;

                timerElement.textContent = horas.toString().padStart(2, '0') + ':' +
                                        minutos.toString().padStart(2, '0') + ':' +
                                        segundos.toString().padStart(2, '0');
            } else {
                // Neste caso, não atualize o timer, mantendo o valor travado.
            }
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
        atualizarTimers(); // Inicia a atualização dos timers quando a página é carregada
        setInterval(atualizarTimers, 1000); // Atualiza a cada segundo
    });


</script>


</body>

</html>