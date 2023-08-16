<!-- MODAL DELETAR -->                                                             
<div class="modal fade" id="modalDelete-{{$veiculo->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
            <p> Tem certeza que deseja excluir o veículo <b>{{$veiculo->modelo}}</b>?</p> 
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                <!-- Botão para efetuar a exclusão -->    
                <form action="{{route('modal.delete', $veiculo->id)}}" method="POST" style="display: inline;">   
                @csrf
                @method('DELETE')                                                                          
                <button type="submit" class="btn btn-primary">Excluir</button> 
                </form>      
            </div>
        </div>
    </div>
</div>
