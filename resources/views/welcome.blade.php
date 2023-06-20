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

        .card-custom .card-custom-image {
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
            background-color: #c1c1c1;
            border-radius: 8px;
            height: 210px;
        }

        .link-custom {
            font-weight: 700;
            position: relative;
            text-decoration: none;
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
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body class="antialiased">
    <header class="bg-dark text-white">
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
            <!-- <a href="#"> Início </a> -->
            <a href="{{ route('login') }}" class="btn btn-outline-light"> Login </a>
        </div>
        @endguest
    </header>
    <div>
        <img src="img/estacionamento.png" alt="Estacionamento" width="" height="600">
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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