@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar collapse-horizontal">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="dashboard">
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
            <a class="nav-link collapsed" href="garagem">
                <i class="bi bi-car-front"></i>
                <span>Garagem</span>
            </a>
        </li><!-- End Garagem Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="historico">
                <i class="bi bi-list-columns-reverse"></i>
                <span>Histórico</span>
            </a>
        </li><!-- End Histórico Nav -->
    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Painel Geral</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
                <li class="breadcrumb-item active">Painel</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- veículos Card -->
                    <div class="col-xxl-3 col-xl-12">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Vagas <span>| Disponiveis</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-car-front-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            {{ $vagasLivres }}
                                        </h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End veículos Card -->

                    <!-- veículos Card -->
                    <div class="col-xxl-3 col-xl-12">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Vagas <span>| Ocupadas</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-car-front-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            {{ $vagasOcupadas }}
                                        </h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End veículos Card -->

                    <!-- Valores Card -->
                    <div class="col-xxl-3 col-xl-12">

                        <div class="card info-card customers-card" style="background-color: #e0f8e9;">
                            <div class="card-body" style="background-color: #e0f8e9;">
                                <h5 class="card-title">Faturamento</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cash-coin"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class=""> R$ 2000,00</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Valores Card -->

                    <!-- mensalistas Card -->
                    <div class="col-xxl-3 col-xl-12">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Total mensalistas</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>145</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End mensalistas Card -->

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title">Registros recentes <span>| últimos 8</span></h5>

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Nº</th>
                                            <th scope="col" class="text-center">Categoria</th>
                                            <th scope="col" class="text-center">Placa</th>
                                            <th scope="col" class="text-center">Modelo</th>
                                            <th scope="col" class="text-center">Tempo</th>
                                            <th scope="col" class="text-center">Informações</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($veiculos as $veiculo)
                                        <tr class="align-middle text-center">
                                            <td scropt="row" class="text-center">{{ $loop->index + 1 }}</td>
                                            <!--<td scope="row"> {{ $veiculo->id }} </td> -->
                                            <td> {{ $veiculo->categoria }} </td>
                                            <td class="text-primary"> {{ $veiculo->placa }} </td>
                                            <td> {{ $veiculo->modelo }} </td>
                                            <td><span class="timer" data-entrada="{{ $veiculo->created_at }}"></span></td>
                                            <!--  <td><span class="badge bg-success">Aprovado</span></td> -->
                                            <td class="text-center">
                                                <a href="#modalShow-{{$veiculo->id}}" class="btn btn-info bi bi-file-text text-start" id="btn-grid-info" data-bs-toggle="modal"></a>
                                                @include('modals.veiculosModal.show')

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
            var entrada = new Date(horarioEntrada);
            var agora = new Date();
            var diferenca = Math.floor((agora - entrada) / 1000); // Diferença em segundos

            var horas = Math.floor(diferenca / 3600);
            var minutos = Math.floor((diferenca % 3600) / 60);
            var segundos = diferenca % 60;

            timerElement.textContent = horas.toString().padStart(2, '0') + ':' +
                minutos.toString().padStart(2, '0') + ':' +
                segundos.toString().padStart(2, '0');
        });
    }

    atualizarTimers(); // Atualize os timers imediatamente
    setInterval(atualizarTimers, 1000); // Atualize a cada segundo
</script>