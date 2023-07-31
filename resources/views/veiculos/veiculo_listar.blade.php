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

    <table class="table table-borderless datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>                                                    
                                                    <th scope="col">Cliente</th>
                                                    <th scope="col">Placa</th>
                                                    <th scope="col">Modelo</th>
                                                    <th scope="col">Preço</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                            @foreach($veiculos as $veiculo)
                                                <tr>
                                                   <!-- <td scropt="row">{{ $loop->index + 1 }}</td> -->
                                                    <th scope="row"> {{ $veiculo->id }} </th>
                                                    <td>Brandon Jacob</td>
                                                    <td class="text-primary"> {{ $veiculo->placa }} </td>
                                                    <td> {{ $veiculo->modelo }} </td>
                                                    <td>R$20</td>
                                                    <td><span class="badge bg-success">Aprovado</span></td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <th scope="row"><a href="#">#2147</a></th>
                                                    <td>Bridie Kessler</td>
                                                    <td class="text-primary">QCQ-2301</td>
                                                    <td>Moto</td>
                                                    <td>R$10</td>
                                                    <td><span class="badge bg-warning">Pendente</span></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><a href="#">#2049</a></th>
                                                    <td>Ashleigh Langosh</td>
                                                    <td class="text-primary">QCQ-2301</td>
                                                    <td>Carro</td>
                                                    <td>R$20</td>
                                                    <td><span class="badge bg-success">Aprovado</span></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><a href="#">#2644</a></th>
                                                    <td>Angus Grady</td>
                                                    <td class="text-primary">QCQ-2301</td>
                                                    <td>Carro</td>
                                                    <td>R$20</td>
                                                    <td><span class="badge bg-success">Aprovado</span></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><a href="#">#2644</a></th>                                                    
                                                    <td>Raheem Lehner</td>
                                                    <td class="text-primary">QCQ-2301</td>
                                                    <td>Carro</td>
                                                    <td>R$20</td>
                                                    <td><span class="badge bg-success">Aprovado</span></td>
                                                </tr>
                                                
                                            </tbody>
                                            
                                        </table>
</div>
</body>

</html>