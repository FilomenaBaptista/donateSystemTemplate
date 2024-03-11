@extends('layouts.app')

@section('content')
    <main id="main">


        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Doacões</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Doacões</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container" data-aos="fade-up">

                <ul class="nav nav-tabs row gy-4 d-flex">

                    <li class="nav-item col-6 col-md-4 col-lg-4">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                            <i class="bi bi-binoculars color-cyan"></i>
                            <h4>Doar Bens alimentares</h4>
                        </a>
                    </li><!-- End Tab 1 Nav -->

                    <li class="nav-item col-6 col-md-4 col-lg-4">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                            <i class="bi bi-box-seam color-indigo"></i>
                            <h4>Valor monetário</h4>
                        </a>
                    </li><!-- End Tab 2 Nav -->

                    <li class="nav-item col-6 col-md-4 col-lg-4">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                            <i class="bi bi-brightness-high color-teal"></i>
                            <h4>Doar pela loja</h4>
                        </a>
                    </li><!-- End Tab 3 Nav -->

                    <!-- End Tab 6 Nav -->

                </ul>

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
                                                        <h3>Foto principal</h3>


                                                        <div class="info-item d-flex">
                                                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                                                            <div>
                                                              <img src="assets/img/Photo_placeholder.png" alt="">
                                                              <input type="file" id="image-file"
                                                              accept="image/x-png, image/jpeg" />
                                                            
                                                            </div>
                                                        </div><!-- End Info Item -->

                                                        <div class="info-item d-flex">
                                                            <i class="bi bi-envelope flex-shrink-0"></i>
                                                            <div>
                                                              <img src="assets/img/Photo_placeholder.png" alt="">
                                                              <input type="file" id="image-file"
                                                              accept="image/x-png, image/jpeg" />
                                                            
                                                            </div>
                                                        </div><!-- End Info Item -->

                                                        <div class="info-item d-flex">
                                                            <i class="bi bi-phone flex-shrink-0"></i>
                                                            <div>
                                                              <img src="assets/img/Photo_placeholder.png" alt="">
                                                              <input type="file" id="image-file"
                                                              accept="image/x-png, image/jpeg" />
                                                            
                                                            </div>
                                                        </div><!-- End Info Item -->

                                                    </div>

                                                </div>

                                                <div class="col-lg-8">
                                                    <form action="forms/contact.php" method="post" role="form"
                                                        class="php-email-form">

                                                        <div class="col-md-12 form-group">
                                                            <input type="text" name="name" class="form-control"
                                                                id="name" placeholder="Titulo do anúncio" required>
                                                        </div>
                                                        <div class="col-md-12 form-group mt-3 mt-md-0">
                                                            <select class="form-select" aria-label="Default select example">
                                                                <option selected>Selecione a categoria</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12 form-group mt-3 mt-md-0">
                                                            <input type="email" class="form-control" name="email"
                                                                id="email" placeholder="Local de Doação" required>
                                                        </div>
                                                        <div class="col-md-12 form-group mt-3 mt-md-0">
                                                            <select class="form-select" aria-label="Default select example">
                                                                <option selected>Estado da doação</option>
                                                                <option value="1">Muito boa condição</option>
                                                                <option value="2">Estado médio</option>
                                                                <option value="3">Mal estado</option>
                                                                <option value="3">Não definível</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group mt-3">
                                                            <textarea class="form-control" name="message" placeholder="Descrição da doacão" required></textarea>
                                                        </div>
                                                        <div class="my-3">
                                                            <div class="loading">Loading</div>
                                                            <div class="error-message"></div>
                                                            <div class="sent-message">Your message has been sent. Thank you!
                                                            </div>
                                                        </div>
                                                        <div class="text-center"><button type="submit">Send
                                                                Message</button></div>
                                                    </form>
                                                </div><!-- End Contact Form -->

                                            </div>

                                        </div>
                                </section>
                            </div>
                        </div>
                    </div><!-- End Tab Content 1 -->

                    <div class="tab-pane" id="tab-2">
                        <div class="row gy-4">

                            <div class="col-lg-8 py-5">
                                <form action="forms/contact.php" method="post" role="form" class="php-email-form">

                                    <div class="col-md-12 form-group mb-2">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Nome" required>
                                    </div>
                                    <div class="col-md-12 form-group mt-2 mt-md-0  mb-2">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Email" required>
                                    </div>
                                    <div class="col-md-12 form-group mt-2 mt-md-0  mb-2">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Selecionar Causa" required>
                                    </div>
                                    <div class="col-md-12 form-group mt-2 mt-md-0  mb-2">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Quantidade a doar" required>
                                    </div>
                                    <div class="col-md-12 form-group mt-2 mt-md-0  mb-2">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Área de Interesse?" required>
                                    </div>

                                    <div class="form-group mt-3">
                                        <textarea class="form-control" name="message" placeholder="Descreva o que você poderia fazer" required></textarea>
                                    </div>
                                    <div class="text-center"><button type="submit">Send Message</button></div>
                                </form>
                            </div><!-- End Contact Form -->
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="assets/img/features-2.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 2 -->

                    <div class="tab-pane" id="tab-3">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1">
                                <h3>Em construção</h3>
                                <p>
                                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum
                                </p>
                                <ul>
                                    <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in
                                        voluptate velit.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Provident mollitia neque rerum asperiores
                                        dolores quos qui a. Ipsum neque dolor voluptate nisi sed.</li>
                                </ul>
                                <p class="fst-italic">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="assets/img/features-3.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 3 -->

                    <div class="tab-pane" id="tab-4">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1">
                                <h3>Nostrum</h3>
                                <p>
                                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum
                                </p>
                                <p class="fst-italic">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                                <ul>
                                    <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in
                                        voluptate velit.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta
                                        storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                                </ul>
                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="assets/img/features-4.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 4 -->

                    <div class="tab-pane" id="tab-5">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1">
                                <h3>Adipiscing</h3>
                                <p>
                                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum
                                </p>
                                <p class="fst-italic">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                                <ul>
                                    <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in
                                        voluptate velit.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta
                                        storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                                </ul>
                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="assets/img/features-5.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 5 -->

                    <div class="tab-pane" id="tab-6">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1">
                                <h3>Reprehit</h3>
                                <p>
                                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum
                                </p>
                                <p class="fst-italic">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                                <ul>
                                    <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in
                                        voluptate velit.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta
                                        storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                                </ul>
                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="assets/img/features-6.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 6 -->

                </div>

            </div>
        </section>
    </main><!-- End #main -->
@endsection
