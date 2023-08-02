<!-- MODAL SHOW -->                                                             
<div class="modal fade" id="modalShow-{{$veiculo->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes do veículo <b>{{$veiculo->placa}}</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item"><b>ID:</b> {{$veiculo->id}}</li>
                    <li class="list-group-item"><b>Placa do veiculo:</b> {{$veiculo->placa}}</li>
                    <li class="list-group-item"><b>Marca do veiculo:</b> {{$veiculo->marca}}</li>
                    <li class="list-group-item"><b>Modelo do veiculo:</b> {{$veiculo->modelo}}</li>
                    <li class="list-group-item"><b>Entrada: </b>{{$veiculo->created_at}}</li>
                    <li class="list-group-item"><b>Entrada: </b>{{$veiculo->updated_at}}</li>
                </ul> 
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-bs-dismiss="modal">Fechar</a>      
            </div>
        </div>
    </div>
</div>
