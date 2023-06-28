    <!DOCTYPE html>
    <html lang=" {{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset=" utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EstacionAi</title>
        <!-- Main CSS  -->
        <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">


        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Vendor CSS -->
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


    </head>

    <body>

        <!-- <header class=" bg text-white">
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

        <!-- ======= Header ======= -->
        <header id="header" class="d-flex align-items-center">
            <div class=" container d-flex align-items-center justify-content-between">

                <h1 class="logo"><a href="/"><img src="img/estacionai2.png" alt="Logo" width="" height=""></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto " href="/">Inicio</a></li>
                        <li><a class="nav-link scrollto" href="#pricing">Planos</a></li>
                        <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li>
                        <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li> -->
                        <a class="nav-link scrollto" id="btnLogin" href="{{ route('login') }}">Login</a>
                        <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="#">Drop Down 1</a></li>
                                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="#">Deep Drop Down 1</a></li>
                                        <li><a href="#">Deep Drop Down 2</a></li>
                                        <li><a href="#">Deep Drop Down 3</a></li>
                                        <li><a href="#">Deep Drop Down 4</a></li>
                                        <li><a href="#">Deep Drop Down 5</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Drop Down 2</a></li>
                                <li><a href="#">Drop Down 3</a></li>
                                <li><a href="#">Drop Down 4</a></li>
                            </ul>
                        </li> -->
                        <a class="nav-link scrollto" id="btnRegistrar" href="cadastrar_usuario">Registrar-se</a>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">
            <div class="container" data-aos-delay="100">
                <h1>Bem-Vindo ao Estacion<span>Ai</span></h1>
                <h2 class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis deleniti repellat dolorum saepe! Incidunt doloremque molestiae doloribus odio facere obcaecati, accusamus consequatur dolores maxime amet hic voluptatem assumenda? Velit, laudantium!</h2>
                <div class="d-flex">
                    <a href="#" class="btn-get-started scrollto" data-bs-toggle="modal" data-bs-target="#verticalycentered">Consulte seu Veículo</a>
                    <!-- Modal -->
                    <div class="modal fade" id="verticalycentered" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><strong>Consulte seu Veículo</strong></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="card-body col-11 ms-3 p-xs-5 p-md-5 mx-md-4">
                                    <form action="{{ route('login.usuario') }}" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <input type="text" id="username" class="form-control" placeholder="Placa" />
                                        </div>
                                        <div class="text-center pt-1 pb-1">
                                            <a href="#" class="btn" id="btnConsultarModal" data-bs-toggle="modal" data-bs-target="#verticalycentered">consultar</a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal-->

                </div>
            </div>
        </section><!-- End Hero -->

        <main id="main">

            <!-- ======= Featured Services Section ======= -->
            <section id="featured-services" class="featured-services">
                <div class="container" data-aos="fade-up">

                    <div class="row">
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                <div class="icon"><i class="bx bx-dollar-circle"></i></div>
                                <h4 class="title"><a href="">Controle financeiro</a></h4>
                                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon"><i class="bx bx-broadcast"></i></div>
                                <h4 class="title"><a href="">Acompanhamento online</a></h4>
                                <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon"><i class="bx bx-cog"></i></div>
                                <h4 class="title"><a href="">Automação de processos</a></h4>
                                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon"><i class="bx bx-world"></i></div>
                                <h4 class="title"><a href="">Nemo Enim</a></h4>
                                <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                            </div>
                        </div>

                    </div>

                </div>
            </section><!-- End Featured Services Section -->

            <!-- ======= Pricing Section ======= -->
            <section id="pricing" class="pricing">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Planos de assinatura</h2>
                        <h3>Confira nossos <span>Preços</span></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum delectus neque quasi explicabo sit non repudiandae, iusto porro tenetur.</p>
                    </div>

                    <div class="row">

                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="box">
                                <h3>Gratuíto</h3>
                                <h4><sup>$</sup>0<span> /Grátis</span></h4>
                                <ul>
                                    <li>Aida dere</li>
                                    <li>Nec feugiat nisl</li>
                                    <li>Nulla at volutpat dola</li>
                                    <li class="na">Pharetra massa</li>
                                    <li class="na">Massa ultricies mi</li>
                                </ul>
                                <div class="btn-wrap">
                                    <a href="#" class="btn-buy">Assinar plano</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                            <div class="box featured">
                                <h3>Básico</h3>
                                <h4><sup>$</sup>19<span> / Mensal</span></h4>
                                <ul>
                                    <li>Aida dere</li>
                                    <li>Nec feugiat nisl</li>
                                    <li>Nulla at volutpat dola</li>
                                    <li>Pharetra massa</li>
                                    <li class="na">Massa ultricies mi</li>
                                </ul>
                                <div class="btn-wrap">
                                    <a href="#" class="btn-buy">Assinar plano</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                            <div class="box">
                                <h3>Intermediário</h3>
                                <h4><sup>$</sup>29<span> / Semestral</span></h4>
                                <ul>
                                    <li>Aida dere</li>
                                    <li>Nec feugiat nisl</li>
                                    <li>Nulla at volutpat dola</li>
                                    <li>Pharetra massa</li>
                                    <li>Massa ultricies mi</li>
                                </ul>
                                <div class="btn-wrap">
                                    <a href="#" class="btn-buy">Assinar plano</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                            <div class="box">
                                <span class="advanced">Exclusivo</span>
                                <h3>Premium</h3>
                                <h4><sup>$</sup>49<span> / Anual</span></h4>
                                <ul>
                                    <li>Aida dere</li>
                                    <li>Nec feugiat nisl</li>
                                    <li>Nulla at volutpat dola</li>
                                    <li>Pharetra massa</li>
                                    <li>Massa ultricies mi</li>
                                </ul>
                                <div class="btn-wrap">
                                    <a href="#" class="btn-buy">Assinar plano</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section><!-- End Pricing Section -->
        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h3>Estacion<span>Ai</span></h3>
                            <p>
                                Av. XV de Novembro, 303 - Porto <br>
                                Cuiabá - MT, 78020-300 <br>
                                <br><br>
                                <strong>Phone:</strong> (65) 99999-9999<br>
                                <strong>Email:</strong> info@example.com<br>
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Links Úteis</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Inicio</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Sobre nós</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Serviços</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Termos de serviço</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Política de Privacidade</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Nossos Serviços</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i href="#">Controle financeiro</li>
                                <li><i class="bx bx-chevron-right"></i href="#">Acompanhamento online</li>
                                <li><i class="bx bx-chevron-right"></i href="#">Automação de processos</li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Redes Sociais</h4>
                            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                            <div class="social-links mt-3">
                                <!-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a> -->
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> -->
                                <!-- <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container py-3">
                <div class="copyright">
                    &copy; Copyright <strong><span>EstacionAi</span></strong> Todos os direitos reservados
                </div>
            </div>
        </footer><!-- End Footer -->
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>

    </body>

    </html>