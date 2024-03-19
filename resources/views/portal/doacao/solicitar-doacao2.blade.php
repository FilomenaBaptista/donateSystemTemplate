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
                            <h4><a href="" class="stretched-link">Publique atualizações e agradeça aos doadores </a>
                            </h4>
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
                                                            <label class="mb-2 col-md-12" for="">Motivo da Campanha?
                                                            </label>
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="motivo_campanha" id="motivo_campanha" value="{{ old('motivo_campanha') }}">
                                                                <option selected>Selecione a Causa</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>

                                                        </div>

                                                        <div class="col-md-12 input-group mb-3 mt-3 mt-md-0">
                                                            <label class="mb-2 label-money" for="">Valor a
                                                                arrecadar?</label>

                                                            <span class="input-group-text">AKZ</span>
                                                            <input type="text" id="val-arrecadar" name="val-arrecadar"
                                                                value="{{ old('val-arrecadar') }}" class="form-control"
                                                                aria-label="Amount (to the nearest dollar)">
                                                            <span class="input-group-text">.00</span>

                                                        </div>


                                                        <div class="col-md-12 form-group mt-3 mt-md-0">
                                                            <label class="mb-2" for="">Adicionar uma foto ou video
                                                                de capa</label>
                                                            <div class="d-flex justify-content-center mb-4">
                                                                <img id="selectedAvatar" name="img_video"
                                                                    src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                                                                    class="rounded-circle"
                                                                    style="width: auto; height: 350px; object-fit: cover;"
                                                                    alt="example placeholder" />
                                                            </div>
                                                            <div class="d-flex justify-content-center">
                                                                <div class="btn btn-rounded">
                                                                    <label class="form-label text-white m-1"
                                                                        for="customFile2">Escolher Imagem</label>
                                                                    <input type="file" class="form-control d-none"
                                                                        id="customFile2"
                                                                        onchange="displaySelectedImage(event, 'selectedAvatar')" />
                                                                </div>
                                                            </div>

                                                        </div>


                                                        <div class="col-md-12 form-group mt-3 mt-md-0">
                                                            <label class="mb-2" for="">Nome da Campanha</label>
                                                            <input type="name" class="form-control"
                                                                value="{{ old('nome_campanha') }}" name="nome_campanha"
                                                                id="nome_campanha" placeholder="Comida para necessitados"
                                                                required>
                                                        </div>

                                                        <div class="form-group mt-3">
                                                            <label for="">Descreva a sua História</label>
                                                            <textarea class="form-control" name="historia" id="historia" name="message" value="{{ old('historia') }}"
                                                                placeholder="Oi meu nome é Ana, estou arrecadando fundos para..." required></textarea>
                                                        </div>

                                                        <div class="text-center">
                                                            <button class="mr-5" type="submit">Visualizar
                                                                campanha</button><button type="submit">Publicar
                                                                campanha</button>
                                                        </div>

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
