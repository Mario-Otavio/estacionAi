<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Cadastrar Usuário</title>
    <!-- CSS -->
    <link href="assets/css/estilo2.css" rel="stylesheet">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">



</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-12 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="/" class="logo d-flex align-items-center w-auto">
                                    <!-- <img src="assets/img/logo.png" alt="logo"> -->
                                    <h1 class="d-none d-lg-block">Estacion<span>Ai</span></h1>
                                </a>
                            </div>

                            <div class="card">

                                <div class="card-body">

                                    <div class="pb-1">
                                        <h5 class="card-title text-center pb-0 fs-4">Cadastre-se!</h5>
                                        <p class="text-center small">Insira seus dados e do estacionamento</p>
                                    </div>

                                    <form action="{{ route('usuario.salvar') }}" method="POST" class="row g-3 needs-validation" novalidate>
                                        @csrf
                                        <div class="col-md-7 col-sm-12">
                                            <label for="nome" class="form-label">Nome completo</label>
                                            <input type="text" name="name" class="form-control">
                                            <div class="invalid-feedback">Por favor,insira um nome!</div>
                                        </div>

                                        <div class="col-md-5">
                                            <label for="telefone" class="form-label">Telefone</label>
                                            <div class="input-group has-validation">
                                                <input type="telefone" name="telefone" class="form-control">
                                                <div class="invalid-feedback">Por favor, insira um Telefone!</div>
                                            </div>
                                        </div>

                                        <div class="col-md-7 col-sm-12">
                                            <label for="empresa" class="form-label">Nome do estacionamento</label>
                                            <div class="input-group has-validation">
                                                <input type="empresa" name="empresa" class="form-control">
                                                <div class="invalid-feedback">Por favor, insira um Email!</div>
                                            </div>
                                        </div>

                                        <div class="col-md-5 col-sm-12">
                                            <label for="quantidade_vagas" class="form-label">Quantidade de Vagas</label>
                                            <input type="number" name="quantidade_vagas" class="form-control">
                                            <div class="invalid-feedback">@error('quantidade_vagas') {{ $message }} @enderror</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="endereco" class="form-label">Endereço do estacionamento</label>
                                            <div class="input-group has-validation">
                                                <input type="endereco" name="endereco" class="form-control">
                                            </div>
                                        </div>



                                        <div class="col-md-12">
                                            <label for="email" class="form-label">Endereço de email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="email" name="email" class="form-control">
                                                <div class="invalid-feedback">Por favor, insira um Email!</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <label for="senha" class="form-label">Senha</label>
                                            <input type="password" name="password" class="form-control">
                                            <div class="invalid-feedback">@error('password') {{ $message }} @enderror</div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <label for="senha_confirmation" class="form-label">Confirme a senha</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>

                                        <div class="col-12 pb-2">
                                            <button class="btn btn-primary w-100" type="submit">Cadastrar</button>
                                        </div>
                                        @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p> {{ $message }} </p>
                                        </div>
                                        @endif

                                    </form>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>