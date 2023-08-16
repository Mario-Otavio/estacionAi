<!-- MODAL DELETAR -->                                                             
<div class="modal fade" id="modalConfimacao-{{$veiculo->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar Saída</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
            <p> Tem certeza que deseja dar saída ao veículo <b>{{$veiculo->modelo}}</b>?</p> 
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                <!-- Botão para efetuar a exclusão -->    
                <form action="{{route('modal.confirmacao', $veiculo->id)}}" method="POST" style="display: inline;">
                @csrf
                @method('PUT')                                                                         
                <button type="submit" class="btn btn-primary">Confirmar</button> 
                </form>      
            </div>
        </div>
    </div>
</div>
