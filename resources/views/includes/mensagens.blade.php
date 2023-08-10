@if ($mensagem = Session::get('sucesso'))
    <div class="card text-bg-success">                   
                <div class="card-body">
                    <h5 class="card-title">Parabéns!</h5>
                    <p class="card-text">{{ $mensagem }}</p>
                </div>        
    </div>
@endif