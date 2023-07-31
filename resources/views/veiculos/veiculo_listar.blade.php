<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>EstacionAi</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
@include('layouts.navbar')
<div class="container">
<table class="table table-borderless">
    <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Placa</th>
                <th scope="col">Opções</th>
            </tr>
    </thead>
    @foreach ($veiculos as $veiculo)
    <tr>
    <th scope="row"> {{ $veiculo->id }} </th>
     <td> {{ $veiculo->placa }} </td>
     <td colspan="2">
        <form action="POST">
            <a class="btn btn-info" href="{{ route('veiculo.listar', $veiculo->id) }}"> Detalhes </a>
            <a class="btn btn-primary" href="{{ route('veiculo.edit', $veiculo->id) }}"> Editar </a>
            <button type="submit" class="btn btn-danger">
                @csrf
                @method('destroy')
                Delete
            </button>
        </form>
     </td>
    </tr>
    @endforeach
    </table>   
</div>
</body>

</html>