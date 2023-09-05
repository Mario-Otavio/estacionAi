@extends('layouts.main')
@section('title', 'Perfil')
@section('conteudo')

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="dashboard">
        <i class="bi bi-grid"></i>
        <span>Painel</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-heading">Paginas</li>

    <li class="nav-item">
      <a class="nav-link" href="perfil">
        <i class="bi bi-person"></i>
        <span>Perfil</span>
      </a>
    </li><!-- End Perfil Nav -->

    <li class="nav-item">
            <a class="nav-link collapsed" href="precificacao">
            <i class="bi bi-cash-stack"></i>
                <span>Precificação</span>
            </a>
        </li><!-- End Precificação Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="garagem">
        <i class="bi bi-car-front"></i>
        <span>Garagem</span>
      </a>
    </li><!-- End Garagem Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="historico">
        <i class="bi bi-list-columns-reverse"></i>
        <span>Histórico</span>
      </a>
    </li><!-- End Histórico Nav -->

  </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Perfil</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
        <li class="breadcrumb-item">Usuário</li>
        <li class="breadcrumb-item active">Perfil</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="assets/imge/team/team-3.jpg" alt="Profile" class="rounded-circle">

            <h2></h2>
            <h3><b>{{auth()->user()->name}}</b></h3>
            <h3>{{auth()->user()->empresa}}</h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Visão Geral</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Perfil</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Alterar Senha</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Sobre</h5>
                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                <h5 class="card-title">Detalhes do perfil</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nome completo</div>
                  <div class="col-lg-9 col-md-8">{{auth()->user()->name}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Empresa</div>
                  <div class="col-lg-9 col-md-8">{{auth()->user()->empresa}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Trabalho</div>
                  <div class="col-lg-9 col-md-8">Web Designer</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Endereço</div>
                  <div class="col-lg-9 col-md-8">{{auth()->user()->endereco}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Telefone</div>
                  <div class="col-lg-9 col-md-8">{{auth()->user()->telefone}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">E-mail</div>
                  <div class="col-lg-9 col-md-8">{{auth()->user()->email}}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form action="{{ route('usuario.update', auth()->user()->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto de perfil</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="assets/imge/team/team-3.jpg" alt="Profile">
                      <div class="pt-2">
                        <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="name" class="col-md-4 col-lg-3 col-form-label">Nome completo</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" value="{{auth()->user()->name}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="empresa" class="col-md-4 col-lg-3 col-form-label">Empresa</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="empresa" type="text" class="form-control" value="{{auth()->user()->empresa}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="endereco" class="col-md-4 col-lg-3 col-form-label">Endereço</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="endereco" type="text" class="form-control" value="{{auth()->user()->endereco}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="telefone" class="col-md-4 col-lg-3 col-form-label">Telefone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="telefone" type="text" class="form-control" value="{{auth()->user()->telefone}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="email" class="col-md-4 col-lg-3 col-form-label">E-mail</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" value="{{auth()->user()->email}}">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Salvar alteração</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>



              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form>

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Senha atual</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nova senha</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirmar senha</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Salvar alteração</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<br><br><br><br>

@endsection