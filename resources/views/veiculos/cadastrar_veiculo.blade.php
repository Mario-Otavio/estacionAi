@extends('layouts.main')
@section('title', 'Cadastrar veículo')
@section('content')


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Cadastro de Veículos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
                <li class="breadcrumb-item active">registro</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <section class="section register min-vh-70 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="" class="logo d-flex align-items-center w-auto">
                                <!-- <img src="assets/img/logo.png" alt="logo"> -->
                                <h1 class="d-none d-lg-block">Estacion<span>Ai</span></h1>
                            </a>
                        </div>

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Cadastrar Veículo</h5>
                                    <p class="text-center small">Insira dados do veículo</p>
                                </div>

                                <form action="{{ route('veiculo.salvar') }}" method="POST" class="row g-3 needs-validation" novalidate>
                                    <div class="col-12">
                                        <label for="placa" class="form-label">Placa</label>
                                        <input type="text" name="placa" class="form-control" required>
                                        <div class="invalid-feedback">Por favor,insira a placa do carro!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="marca" class="form-label">Marca</label>
                                        <input type="text" name="marca" class="form-control" required>
                                        <div class="invalid-feedback">Por favor, insira a marca do carro!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="modelo" class="form-label">Modelo</label>
                                        <input type="text" name="modelo" class="form-control" required>
                                        <div class="invalid-feedback">Por favor, insira o modelo do carro!</div>
                                    </div>

                                    <div class="col-12 pb-4">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <button class="btn btn-primary w-100" type="submit">Cadastrar</button>
                                    </div>
                                    @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p> {{ $message }} </p>
                                    </div>
                                    @endif

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main><!-- End #main -->
<br><br><br>

@endsection