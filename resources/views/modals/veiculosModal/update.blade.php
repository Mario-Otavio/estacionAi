<!-- MODAL EDITAR -->                                                             
<div class="modal fade" id="modalEditar-{{$veiculo->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Veículo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">            
                <div class="mb-3">
                    <div class="card-body">
                        <div class="pb-2">
                            <p class="text-center">Insira novos dados do veículo</p>
                        </div>
                        <form action="{{route('modal.editar', $veiculo->id)}}" method="POST" enctype="multipart/form-data" style="display: inline;">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label for="placa" class="form-label">Placa</label>
                            <input type="text" name="placa" class="form-control" value="{{ $veiculo->placa }}" required>
                            <div class="invalid-feedback">Por favor,insira a placa do carro!</div>
                        </div>

                        <div class="col-12">
                            <label for="marca" class="form-label">Marca</label>
                            <input type="text" name="marca" class="form-control" value="{{ $veiculo->marca }}" required>
                            <div class="invalid-feedback">Por favor, insira a marca do carro!</div>
                        </div>

                        <div class="col-12">
                            <label for="modelo" class="form-label">Modelo</label>
                            <input type="text" name="modelo" class="form-control" value="{{ $veiculo->modelo }}" required>
                            <div class="invalid-feedback">Por favor, insira o modelo do carro!</div>
                        </div>                                                                           
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                <!-- Botão para efetuar a edição -->                                                                                      
                <button type="submit" class="btn btn-primary">Editar Veículo</button> 
                </form>      
            </div>
        </div>
    </div>
</div>
