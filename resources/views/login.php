<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .container {}
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body class="antialiased">





    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="flex justify-center mb-3">
                <a href="{{ route('welcome') }}"> <img src="img/estacionai.png" class="m-3" width="300"> </a>
                <div class="row justify-content-center align-items-center">
                    <div class="shadow">
                        <div class="container">
                            <form action="POST">
                                <div class="form">
                                    <label for="username" class="form-label">Nome de usuário</label>
                                    <input type="text" class="form-control" id="username" placeholder="Digite o nome do usuário " />
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword5" class="form-label">Senha</label>
                                    <input type="password" class="form-control" id="senha" placeholder="Digite sua senha " />
                                </div>
                                <button type="submit" class="btn btn-primary mb-3">Entrar</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>


</body>

</html>