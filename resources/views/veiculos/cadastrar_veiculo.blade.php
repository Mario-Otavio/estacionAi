<?php
date_default_timezone_set('America/Sao_Paulo');


?>
@extends('layouts.main')
@section('title', 'Cadastrar veículo')
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
        <a class="nav-link" href="cadastrar_veiculo">
            <i class="bi bi-card-list"></i>
            <span>Cadastrar Veículo</span>
        </a>
    </li><!-- End Registrar Veículo Nav -->

</ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">
    <div class="pagetitle pb-4">
        <h1>Cadastro de Veículos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
                <li class="breadcrumb-item active">registro</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <section class="section register d-flex flex-column align-items-center justify-content-center py-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                       <!-- <div class="d-flex justify-content-center py-4">
                            <a href="" class="logo d-flex align-items-center w-auto">
                                 <img src="assets/img/logo.png" alt="logo">
                                <h1 class="d-none d-lg-block">Estacion<span>Ai</span></h1>
                            </a>
                        </div> -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Cadastrar Veículo</h5>
                                    <p class="text-center small">Insira dados do veículo</p>
                                </div>

                                <form action="{{ route('veiculo.salvar') }}" method="POST" class="row g-3 needs-validation" novalidate>

                                    <div class="col-12">
                                        <label for="categoria" class="form-label">Categoria</label>
                                        <select id="inputState" name="categoria" class="form-select" required>
                                            <option selected>Carro</option>
                                            <option>Moto</option>
                                        </select>
                                    </div>

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

                                    <div class="col-12 pb-3">
                                        <label for="modelo" class="form-label">Modelo</label>
                                        <input type="text" name="modelo" class="form-control" required>
                                        <div class="invalid-feedback">Por favor, insira o modelo do carro!</div>
                                    </div>

                                    <div class="col-12 pb-1">
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
<br><br>


<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>

</html>