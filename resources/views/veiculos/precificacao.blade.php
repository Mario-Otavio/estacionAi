@extends('layouts.main')
@section('title', 'Precificação')
@section('content')

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="dashboard">
                <i class="bi bi-grid"></i>
                <span>Painel</span>
            </a>
        </li><!-- End Painel Nav -->

        <li class="nav-heading">Paginas</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="perfil">
                <i class="bi bi-person"></i>
                <span>Perfil</span>
            </a>
        </li><!-- End Perfil Nav -->

        <li class="nav-item">
            <a class="nav-link" href="precificacao">
            <i class="bi bi-cash-stack"></i>
                <span>Precificação</span>
            </a>
        </li><!-- End Precificação Nav -->

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
        <h1>Precificação</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
                <li class="breadcrumb-item active">Preços</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row justify-content-center">
            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3"><!-- Bordered Tabs -->
                        
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Precificar Categorias</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Preços</button>
                            </li>   
                        </ul>

                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <form class="pt-3" action="{{ route('veiculos.precificacao') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="categoria_carro" class="form-label">Categoria do Veículo</label>
                                        <input type="text" name="categoria_carro" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="valor_carro" class="form-label">Valor por hora</label>
                                        <input type="number" name="valor_carro" class="form-control">
                                    </div>                                    
                                    <button type="submit" class="btn btn-primary col-12">Salvar</button>
                                </form>  
                            </div>
                        

                            <div class="tab-pane fade profile-edit" id="profile-edit">

                                <form class="pt-3" action="{{ route('veiculos.precificacao') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="categoria_carro" class="form-label">Selecione a categoria</label>
                                        <select name="categoria" class="form-select">
                                        @foreach($precos as $preco)
                                            <option value="{{ $preco->id }}">
                                                {{ $categoria_id == $preco->id ? 'selected' : '' }}>
                                                {{ $preco->categoria }}                                                
                                            </option>
                                        @endforeach
                                </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="valor_carro" class="form-label">Editar valor</label>
                                        <input type="number" name="valores" class="form-control" value="{{ $precos->where('id', $categoria_id)->first()->valor_por_hora }}">
                                    </div>                                
                                    <button type="submit" class="btn btn-primary col-12">Salvar Alterações</button>
                                </form>               

                            </div>    
                        </div>                    
                    </div><!-- End Bordered Tabs -->
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
