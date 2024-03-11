@extends('layouts.app')

@section('content')
    <main id="main">


        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Solicitar Doação</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Solicitar Doação</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-activity icon"></i></div>
                            <h4><a href="" class="stretched-link">Criar Campanha</a></h4>
                            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                            <h4><a href="" class="stretched-link">Compartilhe a sua campanha</a></h4>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                            <h4><a href="" class="stretched-link">Publique atualizações e agradeça aos doadores </a></h4>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-broadcast icon"></i></div>
                            <h4><a href="" class="stretched-link">Configurar transferências bancárias</a></h4>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>
        </section><!-- End Featured Services Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container" data-aos="fade-up">

                <div class="tab-content">

                    <div class="tab-pane active show" id="tab-1">
                        <div class="row gy-4">
                            <div class="col-lg-12 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">

                                <section id="contact" class="contact">
                                    <div class="container">

                                        <div class="container">

                                            <div class="row gy-5 gx-lg-5">

                                                <div class="col-lg-4">

                                                    <div class="info">
                                                        <h3>Get in touch</h3>
                                                        <p>Et id eius voluptates atque nihil voluptatem enim in tempore
                                                            minima sit ad mollitia commodi minus.</p>

                                                        <div class="info-item d-flex">
                                                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                                                            <div>
                                                                <h4>Location:</h4>
                                                                <p>A108 Adam Street, New York, NY 535022</p>
                                                            </div>
                                                        </div><!-- End Info Item -->

                                                        <div class="info-item d-flex">
                                                            <i class="bi bi-envelope flex-shrink-0"></i>
                                                            <div>
                                                                <h4>Email:</h4>
                                                                <p>info@example.com</p>
                                                            </div>
                                                        </div><!-- End Info Item -->

                                                        <div class="info-item d-flex">
                                                            <i class="bi bi-phone flex-shrink-0"></i>
                                                            <div>
                                                                <h4>Call:</h4>
                                                                <p>+1 5589 55488 55</p>
                                                            </div>
                                                        </div><!-- End Info Item -->

                                                    </div>

                                                </div>

                                                <div class="col-lg-8">
                                                    <form action="forms/contact.php" method="post" role="form"
                                                        class="php-email-form">

                                                        <div class="col-md-12 form-group">
                                                            <label class="mb-2" for="">por que você está fazendo a
                                                                campanha?</label>
                                                            <input type="text" name="name" class="form-control"
                                                                id="name" placeholder="" required>
                                                        </div>
                                                        <div class="col-md-12 form-group mt-3 mt-md-0">
                                                            <label class="mb-2" for="">Quanto deseja arrecadar
                                                                ?</label>
                                                            <input type="email" class="form-control" name="email"
                                                                id="email" placeholder="Data de Nascimento" required>
                                                        </div>
                                                        <div class="col-md-12 form-group mt-3 mt-md-0">
                                                            <label class="mb-2" for="">Adicionar uma foto ou video
                                                                de capa</label>
                                                            <input type="email" class="form-control" name="email"
                                                                id="email" placeholder="Telefone" required>
                                                        </div>
                                                        <div class="col-md-12 form-group mt-3 mt-md-0">
                                                            <label class="mb-2" for="">Nome da Campanha</label>
                                                            <input type="email" class="form-control" name="email"
                                                                id="email" placeholder="Doe para ajudar" required>
                                                        </div>



                                                        <div class="form-group mt-3">
                                                            <label for="">Descreva a sua História</label>
                                                            <textarea class="form-control" name="message" placeholder="Oi meu nome é Ana, estou arrecadando fundos para..."
                                                                required></textarea>
                                                        </div>

                                                        <div class="text-center"><button class="mr-5"
                                                                type="submit">Visualizar campanha</button><button
                                                                type="submit">Publicar campanha</button></div>

                                                    </form>
                                                </div><!-- End Contact Form -->

                                            </div>

                                        </div>
                                </section>
                            </div>

                        </div><!-- End Tab Content 1 -->
                    </div>

                </div>
        </section>
    </main><!-- End #main -->
@endsection
