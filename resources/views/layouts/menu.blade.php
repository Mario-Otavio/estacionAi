<header class="p-3 bg-dark text-white">
    @auth
    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 text-white">Veículos</a></li>
        <li><a href="#" class="nav-link px-2 text-white">Clientes</a></li>
        <li><a href="#" class="nav-link px-2 text-white">Registros</a></li>
    </ul>
    @endauth
    @guest
    <div class="text-end">
        <a href="#"> Início </a>
        <a href="#" class="btn btn-outline-light"> Login </a>
    </div>
    @endguest
</header>
<!-- <section id="" class="full-height px-lg-5">
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
                        </p>
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
</section> -->