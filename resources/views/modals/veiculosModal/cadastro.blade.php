<!-- MODAL CADASTRAR -->
<div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Veículo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">               

                
                    <div class="pb-2">                        
                        <p class="text-center text-body-secondary">Insira dados do veículo</p>
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

                

            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                <!-- Botão para efetuar o cadastro -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit" class="btn btn-primary">Cadastrar Veículo</button>
                </form>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p> {{ $message }} </p>
                </div>
            @endif

        </div>

    </div>
</div>