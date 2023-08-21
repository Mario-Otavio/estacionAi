@if ($mensagem = Session::get('aviso'))
<div class="card text-bg-danger">
    <div class="card-body">
        <h5 class="card-title">Atenção!</h5>
        <p class="card-text">{{ $mensagem }}</p>
    </div>
</div>
@endif