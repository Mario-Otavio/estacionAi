@extends('layouts.main')
@section('title', 'Garagem')
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
            <a class="nav-link" href="garagem">
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
        <h1>Garagem</h1>
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
            <div class="col-lg-12">
                <div class="row">

                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-6 col-xl-12">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Total veículos <span>| Hoje</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-car-front-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            {{ $totalVeiculosGaragem }}
                                        </h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-3 col-md-6 col-xl-12">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Valores</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <p class="bi bi-car-front-fill"> R$20,00</p>
                                        <p class="bi bi-bicycle"> R$10,00</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!-- End Customers Card -->

                    <!-- Cadastrar Card -->
                    <div class="col-xxl-3 col-xl-12">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Cadastrar Veículo</h5>

                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="#modalCadastro" class="bi bi-plus-circle-fill" id="btnCadastrar" data-bs-toggle="modal"></a>
                                        @include('modals.veiculosModal.cadastro')
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- End Cadastrar Card -->

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="row g-2 align-items-center" method="GET" action="">
                                    <div class="col-lg-10 col-md-9">
                                        <div class="form-floating">
                                            <input type="text" name="search" class="form-control" id="floatingInput" placeholder="Digite uma placa">
                                            <label for="floatingInput">Digite uma placa</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-3">
                                        <div class="text-center">
                                            <button type="submit" id="btnPesquisar" class="btn btn-primary">Pesquisar <i class="bi bi-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End Search Bar -->

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title">Total Veículos <span>| hoje</span></h5>

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Nº</th>
                                            <th scope="col" class="text-center">Categoria</th>
                                            <th scope="col" class="text-center">Placa</th>
                                            <th scope="col" class="text-center">Modelo</th>
                                            <th scope="col" class="text-center">Tempo</th>
                                            <th scope="col" class="text-center">Ações</th>
                                            <th scope="col" class="text-center">Saída</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($veiculosTotal as $veiculo)
                                        <tr class="align-middle">
                                            <td scropt="row" class="text-center">{{ $loop->index + 1 }}</td>
                                            <!-- <td scope="row" class="text-center"> {{ $veiculo->id }} </td> -->
                                            <td class="text-center"> {{ $veiculo->categoria }} </td>
                                            <td class="text-primary text-center"> {{ $veiculo->placa }} </td>
                                            <td class="text-center"> {{ $veiculo->modelo }} </td>
                                            <td class="text-center"><span class="timer" data-entrada="{{ $veiculo->created_at }}"></span></td>
                                            <!--  <td><span class="badge bg-success">Aprovado</span></td> -->
                                            <td class="text-center">
                                                <a href="#modalShow-{{$veiculo->id}}" class="btn btn-info bi bi-file-text" id="btn-grid-info" data-bs-toggle="modal"></a>
                                                @include('modals.veiculosModal.show')
                                                <a href="#modalEditar-{{$veiculo->id}}" class="btn btn-secondary bi bi-pencil-square" id="btn-grid" data-bs-toggle="modal"></a>
                                                @include('modals.veiculosModal.update')
                                                <a href="#modalDelete-{{$veiculo->id}}" class="btn btn-primary modal-trigger bi bi-trash" id="btn-grid" data-bs-toggle="modal"></a>
                                                @include('modals.veiculosModal.delete')
                                            </td>
                                            <td class="text-center">
                                                <a href="#modalConfimacao-{{$veiculo->id}}" class="btn btn-warning  text-white" data-bs-toggle="modal"> Saída <i class="bi bi-box-arrow-right"></i></a>
                                                @include('modals.veiculosModal.confirmacao')
                                            </td>

                                        </tr>
                                        @endforeach
                                        @include('includes.msgAviso')
                                        @include('includes.mensagens')
                                    </tbody>

                                </table>
                                {{ $veiculosTotal->links('pagination::bootstrap-5') }}

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


</body>

</html>