@extends('layouts.main')
@section('title', 'Precificação')
@section('conteudo')

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
        <h1>Adição e Precificação de categorias</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
                <li class="breadcrumb-item active">Preços</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row justify-content-center">

            <div class="col-xl-6">
                <br><br><br>

                <div class="card">
                    <div class="card-body pb-0"><!-- Bordered Tabs -->

                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Adicionar / Precificar</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Preços</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#delecao">Deletar categoria</button>
                            </li>
                        </ul>

                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <form class="pt-3" action="{{ route('veiculos.addPrecificarCategorias') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="categoria_carro" class="form-label">Categoria do Veículo</label>
                                        <input type="text" name="categoria_carro" id="campo_input" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="valor_carro" class="form-label">Valor por hora</label>
                                        <input type="number" name="valor_carro" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary col-12">Salvar</button>
                                </form>
                                @include('includes.mensagens')
                            </div>


                            <div class="tab-pane fade profile-edit" id="profile-edit">
                                <form class="pt-3" action="{{ route('veiculos.editarValores') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="categoria_carro" class="form-label">Selecione a categoria</label>
                                        <select name="categoria" class="form-select">
                                            @foreach($precos as $preco)
                                            <option value="{{ $preco->id }}" {{ $categoria_id == $preco->id ? 'selected' : '' }}>
                                                {{ $preco->categoria }}
                                            </option>
                                            @endforeach
                                            <br>
                                            @include('includes.mensagens')
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="valor_carro" class="form-label">Editar valor</label>
                                        <input type="number" name="valor" class="form-control" value="{{ old('valor', $precos->isEmpty() ? '' : $precos->first()->valor_por_hora) }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary col-12">Salvar Alteração</button>
                                </form>
                            </div>
                         

                            <div class="tab-pane fade pt-3" id="delecao">
                                <div class="mb-3">
                                    <label class="form-label">Selecione uma categoria</label>
                                    <select id="category-select" class="form-select">
                                        @foreach ($precos as $preco)
                                        <option value="{{ $preco->id }}">{{ $preco->categoria }}</option>
                                        @endforeach
                                    </select>
                                </div>                                
                                <!-- Delete button -->
                                @if (count($precos) > 0)
                                <button href="#modalDeleteCategorias-{{$preco->id}}" id="delete-button" class="btn btn-primary col-12 mb-3" data-bs-toggle="modal" >Deletar</button>
                                @foreach ($precos as $preco)
                                @include('modals.veiculosModal.deleteCategoria')
                                @endforeach
                                @endif
                            </div>

                        </div>
                    </div><!-- End Bordered Tabs -->
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection

@php
$precosJson = json_encode($precos);
@endphp

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoriaSelect = document.querySelector('[name="categoria"]');
        const valorInput = document.querySelector('[name="valor"]');
        const precos = {!! $precosJson !!};

        // Função para atualizar o valor com base na categoria selecionada
        function atualizarValor(categoriaId) {
            const selectedPreco = precos.find(preco => preco.id == categoriaId);
            if (selectedPreco) {
                valorInput.value = selectedPreco.valor_por_hora;
            }
        }

        // Adiciona um event listener ao elemento "categoria" select
        categoriaSelect.addEventListener('change', function() {
            atualizarValor(this.value);
        });
    });
</script>

<script>
    // Obtém o elemento de entrada
    var campoInput = document.getElementById('campo_input');

    // Adiciona um evento de escuta para o evento 'input'
    campoInput.addEventListener('input', function() {
        // Converte o valor do campo para minúsculas e atualiza o valor do campo
        this.value = this.value.toLowerCase();
    });
</script>

<script>
    // Get references to the category select and delete button elements
    const categorySelect = document.querySelector('#category-select');
    const deleteButton = document.querySelector('#delete-button');

    // Update the href attribute of the delete button when the selected category changes
    categorySelect.addEventListener('change', () => {
        const selectedCategoryId = categorySelect.value;
        deleteButton.setAttribute('href', `#modalDeleteCategorias-${selectedCategoryId}`);
    });

    // Trigger the change event on the category select to set the initial href value of the delete button
    categorySelect.dispatchEvent(new Event('change'));
</script>

