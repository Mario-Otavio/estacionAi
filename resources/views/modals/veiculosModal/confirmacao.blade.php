<!-- MODAL DELETAR -->
<div class="modal fade" id="modalConfimacao-{{$veiculo->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    @csrf
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar Saída</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start pb-2">
                <p> Tem certeza que deseja dar saída ao veículo <b>{{$veiculo->placa}}</b>?</p>
                <p> Se "<b>SIM</b>", selecione a forma de pagamento!</p>
                <!-- Seleção de forma de pagamento -->
                <form action="{{route('modal.confirmacao', $veiculo->id)}}" method="POST" style="display: inline;">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="pb-2" for="forma_pagamento">Formas de Pagamento:</label>
                        <select name="forma_pagamento" class="form-select" required>
                            <option value="dinheiro">Dinheiro</option>
                            <option value="cartao">Crédito</option>
                            <option value="cartao">Débito</option>
                            <option value="pix">PIX</option>
                            <!-- Adicione outras opções de pagamento conforme necessário -->
                        </select>
                    </div>
            </div>
            <br>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                <!-- Botão para efetuar a exclusão -->

                <button type="submit" class="btn btn-primary">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>