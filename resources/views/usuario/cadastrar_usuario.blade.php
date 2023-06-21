<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

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
</head>

<body>
    <section class="vh-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-6">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-12">
                                <div class="card-body p-md-5 mx-md-4">
                                    
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p> {{ $message }} </p>
                                    </div>
                                    @endif

                                    <div class="text-center">
                                        <a href="/"> <img src="img/estacionai2.png" style="width: 200px;" alt="logo"> </a>
                                    </div>

                                    <form action="{{ route('usuario.salvar') }}" method="POST">
                                        <p class="text-center"><strong>Cadastre-se!</strong></p>

                                        <div class="form-outline mb-1">
                                            <label class="form-label">Nome completo</label>
                                            <input type="text" name="name" class="form-control" placeholder="username" />
                                        </div>

                                        <div class="mb-1">
                                            <label class="form-label">Endereço de email</label>
                                            <input type="email" class="form-control" name="email" placeholder="name@example.com">

                                        </div>

                                        <div class="form-outline">
                                            <label class="form-label">Senha</label>
                                            <input type="password" name="password" class="form-control" placeholder="password" />
                                        </div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <div class="text-center pt-4 mb-5 pb-1">
                                            <input class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" value="salvar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <h1 class="h1"> Cadastrar </h1>
                    <form action="{{ route('veiculo.salvar') }}" method="POST">
                        <label class=""> Nome </label>
                        <input type="text" name="placa" class="form-control" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="submit" value="Salvar" class="btn btn-primary" />
                    </form>

                </div>
        </div> -->


</body>

</html>