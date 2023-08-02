@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<main id="main" class="main">

            <div class="pagetitle">
                <h1>Painel</h1>
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
                    <div class="col-lg-8">
                        <div class="row">

                            <!-- Sales Card -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Total mensalistas</h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-people"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>145</h6>
                                                <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">de aumento</span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Sales Card -->

                            <!-- Revenue Card -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Veículos</h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-car-front-fill"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>
                                                    {{$veiculos->count()}}

                                                </h6>
                                                <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">de aumento</span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Revenue Card -->

                            <!-- Customers Card -->
                            <div class="col-xxl-4 col-xl-12">

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
                                        <h5 class="card-title">Últimos Veículos <span>| Hoje</span></h5>

                                        <table class="table table-borderless datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Placa</th>
                                                    <th scope="col">Modelo</th>
                                                    <th scope="col">Preço</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($veiculos as $veiculo)
                                                <tr>
                                                    <!-- <td scropt="row">{{ $loop->index + 1 }}</td> -->
                                                    <th scope="row"> {{ $veiculo->id }} </th>
                                                    <td class="text-primary"> {{ $veiculo->placa }} </td>
                                                    <td> {{ $veiculo->modelo }} </td>
                                                    <td>R$20</td>
                                                    <td><span class="badge bg-success">Aprovado</span></td>
                                                    <td colspan="2"> 
                                                            <a href="#modalShow-{{$veiculo->id}}" class="btn btn-info" data-bs-toggle="modal"> Detalhes </a>
                                                            @include('modals.veiculosModal.show')
                                                            <a href="#modalEditar-{{$veiculo->id}}" class="btn btn-secondary bi bi-pencil-square" data-bs-toggle="modal"></a>
                                                            @include('modals.veiculosModal.update')                                                           
                                                            <a href="#modalDelete-{{$veiculo->id}}" class="btn btn-primary modal-trigger bi bi-trash" data-bs-toggle="modal"></a>
                                                            @include('modals.veiculosModal.delete')                                                        
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @if ($message = Session::get('success'))
                                                <div class="alert alert-success">
                                                    <p> {{ $message }} </p>
                                                </div>
                                                @endif

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
    document.getElementById('confirmDeleteModal').addEventListener('shown.bs.modal', function () {
        // Quando o modal é aberto, definimos o foco para o botão "Cancelar"
        document.getElementById('btnCancelar').focus();
    });
</script>

</body>

</html>