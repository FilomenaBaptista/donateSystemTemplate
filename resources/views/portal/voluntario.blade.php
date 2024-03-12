@extends('layouts.app')

@section('content')
    <main id="main">


        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Voluntário</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Voluntário</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->

            <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container">
  
          <div class="row gy-4">

            <h3 class="ganho">O que eu ganho sendo voluntário?</h3>
  
            <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-activity icon"></i></div>
                <h4><a href="" class="stretched-link text-center">Desenvolvimento</a></h4>
                <p>de habilidades</p>
              </div>
            </div><!-- End Service Item -->
  
            <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                <h4><a href="" class="stretched-link text-center">CONEXÃO</a></h4>
                <p class="text-center">Com outras histórias de vida</p>
              </div>
            </div><!-- End Service Item -->
  
            <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                <h4><a href="" class="stretched-link text-center">Conhecimento</a></h4>
                <p></p>
              </div>
            </div><!-- End Service Item -->
  
            <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-broadcast icon"></i></div>
                <h4><a href="" class="stretched-link text-center">Trocas</a></h4>
                <p>e novas perpectivas de experiências de vida</p>
              </div>
            </div><!-- End Service Item -->
  
          </div>
  
        </div>
      </section><!-- End Featured Services Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="row gy-5 gx-lg-5">

                    <div class="col-lg-12">

                        <div class="section-header">
                            <h2>Seja um Voluntário</h2>
                            <p>O voluntariado é sobre troca de experiência, conhecimento, serviço, apoio, carinho, amor,
                                existindo um ganho não apenas para a organização, mas também para o voluntário. É uma
                                experiência para todes - independe de gênero, raça ou etnia - que permite conhecer novas
                                realidades, se engajar em uma causa social, contribuir com suas habilidades, e até mesmo
                                desenvolver novas competências...</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="container py-5">

                <div class="row gy-5 gx-lg-5">

                    <div class="col-lg-6">

                        <div class="img-voluntario">
                            <img src="assets/img/integration.jpg" alt="">

                        </div>

                    </div>

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="nome_voluntario" class="form-control" id="nome_voluntario"
                                        placeholder="Nome" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="data_nascimento" id="data_nascimento"
                                        placeholder="Data de Nascimento" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="telefone" id="telefone"
                                        placeholder="Telefone" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="endereço" id="endereço"
                                        placeholder="Endereço" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="profissao" id="profissao"
                                        placeholder="Profissão" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="trabalha_actualmente" id="trabalha-actualmente"
                                        placeholder="Trabalha actualmente?" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="area_de_interesse" id="area_de_interesse"
                                        placeholder="Área de Interesse?" required>
                                </div>
                            </div>

                       
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" placeholder="Descreva o que você poderia fazer" required></textarea>
                            </div>
                            <div class="text-center"><button type="submit">Cadastrar</button></div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>
        </section><!-- End Contact Section -->
    </main><!-- End #main -->
@endsection
