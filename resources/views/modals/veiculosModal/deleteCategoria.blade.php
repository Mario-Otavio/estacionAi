<!-- MODAL DELETAR CATEGORIA -->    
@foreach ($precos as $preco)                                                         
<div class="modal fade" id="modalDeleteCategorias-{{$preco->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar Deleção</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
            <p> Tem certeza que deseja deletar essa categoria?</p> 
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                <!-- Botão para efetuar a exclusão -->    
                <form action="{{ route('veiculos.deletarCategorias', $preco) }}" method="POST" style="display: inline;">   
                @csrf
                @method('DELETE')                                                                          
                <button type="submit" class="btn btn-primary">Deletar</button> 
                </form>      
            </div>
        </div>
    </div>
</div>
@endforeach