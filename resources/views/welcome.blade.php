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

        .bg {
            background-color: #1e1e1e;
        }

        .bg .card-custom .card-custom-image {
            overflow: hidden;
        }

        .card-custom .card-custom-image img {
            transition: all 0.4s ease;
        }

        .card-custom:hover .card-custom-image img {
            transform: scale(1.1);
        }

        .shadow-effect {
            transition: all 0.5s;
        }

        .shadow-effect:hover {
            box-shadow: -4px 4px 0 0 #ef3b2d;
        }

        .bg-base {
            background-color: #f1f3f4;
            border-radius: 8px;
            height: 210px;
        }

        .link-custom {
            font-weight: 700;
            position: relative;
            text-decoration: none !important;
            color: #ef3b2d;
        }

        .link-custom::after {
            content: "";
            width: 0%;
            height: 2px;
            background-color: #ef3b2d;
            position: absolute;
            left: 0;
            top: 110%;
            transition: all 0.4s;
        }

        .link-custom:hover {
            color: #ef3b2d !important;
        }

        .link-custom:hover::after {
            width: 100%;
        }


        /* Default height for small devices */
        #intro-example {
            height: 400px;
        }

        /* Height for devices larger than 992px */
        @media (min-width: 992px) {
            #intro-example {
                height: 600px;
            }
        }

        #btnEntrar {
            border-radius: 0.25rem;
            border-color: #f1f3f4;
            border: 1px solid;
        }

        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #ff0007;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #ff0007, #d8363a, #dd3675, #b44593);
        }

        #btnRegistrar {
            border-radius: 0.25rem;
            color: #ef3b2d !important;
            border: 1px solid #ef3b2d;
            margin-left: 6px;
        }

        #btnRegistrar:hover {
            border-radius: 0.25rem;
            color: white !important;
            border: 1px solid transparent;
            margin-left: 6px;
            background-image: linear-gradient(to right, #ff0007, #d8363a, #dd3675, #b44593);
        }

        span {
            color: #ff0007 !important;
        }

        #txtCentral {
            margin-left: 25rem;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body class="antialiased">
    <!-- <header class="bg text-white">
        @auth
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 text-white">Veículos</a></li>
            <li><a href="#" class="nav-link px-2 text-white">Clientes</a></li>
            <li><a href="#" class="nav-link px-2 text-white">Registros</a></li>
        </ul>
        @endauth
        @guest
        <div class="navbar container text-center">
            <a class="navbar-brand" href="#">
                <img src="img/estacionai.png" alt="Logo" width="170" height="">
            </a>
             <a href="#"> Início </a> 
    <a href="{{ route('login') }}" class="btn btn-outline-light"> Login </a>
    </div>
    @endguest
    </header> -->
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="img/estacionai.png" alt="Logo" width="170" height="">
                </a>
                <div class="collapse navbar-collapse container align-items-center justify-content-end" id="navbarExample01">

                    <ul class="navbar-nav justify-content-end mb-2 mb-lg-0">
                        <!-- <li class="nav-item active">
                            <a class="nav-link text-danger" aria-current="page" href="#">Início</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link text-white" id="btnEntrar" href="{{ route('login') }}">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('cadastrar.usuario') }}">Registrar-se</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->

        <!-- Background image -->
        <div class="bg-image" style="background-image: url('https://img.freepik.com/fotos-gratis/conceito-de-transporte-de-veiculos-estacionados_23-2148959697.jpg?w=1380&t=st=1687215877~exp=1687216477~hmac=249b2cec1b4849862954c3e8c8c3013b115e55f3ecd870e17838150c91ecc19e'); background-size: cover; height: 400px;">
            <div class="mask h-100" style="background-color: rgba(0, 0, 0, 0.6);">
                <div class="d-flex container col-4 align-items-center h-100" id="txtCentral">
                    <div class="text-white">
                        <h1 class="mb-3">Estacion<span>Ai</span></h1>
                        <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis deleniti repellat dolorum saepe! Incidunt doloremque molestiae doloribus odio facere obcaecati, accusamus consequatur dolores maxime amet hic voluptatem assumenda? Velit, laudantium!</p>
                        <a class="btn text-white gradient-custom-2 btn-lg" href="#!" role="button">Consulte seu veiculo</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->
    </header>

    <br>

    <section id="portifolio" class="full-height px-lg-5">
        <div class="container">

            <div class="row pb-4" data-aos="fade-up">
                <div class="col-lg-8">
                </div>
            </div>

            <div class="row gy-4">

                <div class="col-md-3" data-aos="fade-up">
                    <div class="card-custom rounded-4 bg-base shadow-effect">
                        <div class="card-custom-image rounded-4">
                            <img class="rounded-4" src="assets/imagens/Criar-site-para-empresa.png" alt="">
                        </div>
                        <div class="card-custom-content p-4">
                            <h5 class="mb-4">Controle financeiro</h5>
                            <p class="text-brand mb-2">Lorem ipsum dolor sit amet consectetur adipisicing itel.</p>
                            <a href="#" class="link-custom">Saiba Mais</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-custom rounded-4 bg-base shadow-effect">
                        <div class="card-custom-image rounded-4">
                            <img class="rounded-4" src="assets/imagens/images.png" alt="">
                        </div>
                        <div class="card-custom-content p-4">
                            <h5 class="mb-4">Acompanhamento online</h5>
                            <p class="text-brand mb-2">Lorem ipsum dolor sit amet consectetur adipisicing itel.</p>
                            <a href="#" class="link-custom">Saiba Mais</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-custom rounded-4 bg-base shadow-effect">
                        <div class="card-custom-image rounded-4">
                            <img class="rounded-4" src="assets/imagens/images.png" alt="">
                        </div>
                        <div class="card-custom-content p-4">
                            <h5 class="mb-4">Automação de processos</h5>
                            <p class="text-brand mb-2">Lorem ipsum dolor sit amet consectetur adipisicing itel.</p>
                            <a href="#" class="link-custom">Saiba Mais</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" data-aos="fade-up" data-aos-delay="600">
                    <div class="card-custom rounded-4 bg-base shadow-effect">
                        <div class="card-custom-image rounded-4">
                            <img class="rounded-4" src="assets/imagens/images.jpg" alt="">
                        </div>
                        <div class="card-custom-content p-4">
                            <h5 class="mb-4">Controle financeiro</h5>
                            <p class="text-brand mb-2">Lorem ipsum dolor sit amet consectetur adipisicing itel.</p>
                            <a href="#" class="link-custom">Saiba Mais</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
</body>

</html>