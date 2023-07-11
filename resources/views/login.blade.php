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

        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #ff0007, #d8363a, #dd3675, #b44593);
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }

        .btn-primary {
            border-color: transparent !important;
        }

        .btn-primary:hover {
            border-color: transparent !important;
            box-shadow: 0 0 11px rgba(34, 34, 34, .4);
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body class="antialiased">
    <!-- <section class="vh-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <a href="/"> <img src="img/estacionai2.png" style="width: 200px;" alt="logo"> </a>
                                        <h4 class="mt-1 mb-5 pt-3 pb-1">Nós somos a EstacionAi</h4>
                                    </div>

                                    <form action="{{ route('login.usuario') }}" method="POST">
                                    @csrf
                                        <p><strong>Por favor, faça seu login!</strong></p>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="email" class="form-control" placeholder="Nome de usuário" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="password" class="form-control" placeholder="Senha" />
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <input type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" value="Conecte-se" />
                                            <a class="text-muted" href="#!">Esqueceu sua senha?</a>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2 mr-2"><strong>Não tem uma conta?</strong></p>
                                            <a type="button" class="btn btn-outline-danger" href="cadastrar_usuario">Registrar</a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Somos mais que uma empresa!</h4>
                                    <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            @include('layouts.menu')
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
            @endauth
        </div>
        @endif

    @if (Route::has('login'))
    @auth
        <h1>Bem-Vindo</h1>
    @else
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <img src="{{ url('img/icone.png') }}" alt="" width="150" />
        </div>
        
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="container">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="msg">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login.usuario') }}">
                        @csrf
                        <div class="form-group">
                            <label for="username">E-mail</label>
                            <input type="text" class="form-control" id="email" placeholder="Digite o e-mail" name="email" />
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" placeholder="Digite sua senha" name="password" />
                        </div>
                        <input type="submit" class="btn btn-primary" value="Entrar">
                    </form>
                </div>
        </div>
    </div>
    @endauth
    @endif
</body>

</html>