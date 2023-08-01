<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>EstacionAi</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
@include('layouts.navbar')

<section>
<div class="container">
<div class="container-sm px-4 text-center">
<div class="card" style="width: 18rem;margin: 100 auto;">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">Detalhes Veiculo {{$veiculo->placa}}</h5>
    <ul class="list-group">
        <li class="list-group-item"><b>ID:</b> {{$veiculo->id}}</li>
        <li class="list-group-item"><b>Placa do veiculo:</b> {{$veiculo->placa}}</li>
        <li class="list-group-item"><b>Marca do veiculo:</b> {{$veiculo->marca}}</li>
        <li class="list-group-item"><b>Modelo do veiculo:</b> {{$veiculo->modelo}}</li>
        <li class="list-group-item"><b>Entrada: </b>{{$veiculo->created_at}}</li>
        <li class="list-group-item"><b>Entrada: </b>{{$veiculo->updated_at}}</li>
    </ul>
    <a href="/dashboard" class="btn btn-primary">Voltar para iniciar</a>
  </div>
</div>
</div>
</div>
</section>
</body>

</html>