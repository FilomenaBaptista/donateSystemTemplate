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
                            <h4>Doar Bens Materiais</h4>
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

                                    
                                        {!! Form::open(['route' => 'doar.store', 'class' => 'php-email-form', 'files' => 'true']) !!}
                                            <div class="row gy-5 gx-lg-5">
                                            
                                                <div class="col-lg-4">
                                                    
                                                    <div class="info">
                                                        <h3>Foto principal</h3>
                                                        
                                                        <div class="col-md-12 form-group mt-3 mt-md-0">
                                                            {{Form::label('capa', 'Adicionar uma foto de capa', ['class' => 'mb-2'])}}
                                                            <div class="d-flex justify-content-center mb-4">
                                                                <img id="selectedAvatar" name="img_video" src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" class="rounded-circle" style="width: auto; height: 150px; object-fit: cover;" alt="example placeholder" />
                                                            </div>
                                                            <div class="d-flex justify-content-center">
                                                                <div class="btn btn-rounded">
                                                                    {{Form::label('capa', 'Escolher Imagem', ['class' => 'form-label text-white m-1'])}}
                                                                    <input type="file" name="capa" class="form-control d-none" id="capa" onchange="displaySelectedImage(event, 'selectedAvatar')" />
                                                                </div>
                                                            </div>
                                                        </div><!-- End Info Item -->
                                                    </div>

                                                </div>

                                                <div class="col-lg-8">

                                                    <div class="col-md-12 form-group">
                                                        {{-- {{ Form::label('titulo', 'Título da Campanha', ['class' => 'mb-2']) }} --}}
                                                        {{ Form::text('anuncio', null, [
                                                            'class' => 'form-control',
                                                            'required' => '',
                                                            'minlength' => '10',
                                                            'id' => 'anuncio',
                                                            'placeholder' => 'Titulo do Anúncio',
                                                        ]) }}

                                                    </div>

                                                    <div class="col-md-12 form-group mt-3 mt-md-0">

                                                        {{-- {{ Form::label('categoria_id', 'Categoria', ['class' => 'mb-2 col-md-12']) }} --}}
                                                        {{ Form::select('categoria_id', $categorias, null, [
                                                            'class' => 'form-select',
                                                            'required' => '',
                                                            'id' => 'categoria_id',
                                                            'placeholder' => 'Selecione a Categoria',
                                                        ]) }}

                                                    </div>

                                                    <div class="col-md-12 mb-3 mt-3 mt-md-0">
                                        
                                                        {{ Form::number('qtd_itens_doar',
                                                            null,
                                                            ['class' => 'form-control',
                                                            'min'=>'0', 'id'=>'qtd_itens_doar',
                                                            'placeholder' => 'Quantidade de itens a doar']
                                                        )}}
                                                    </div>

                                                    <div class="col-md-12 form-group mt-3 mt-md-0">
            
                                                        {{ Form::text('local', null, [
                                                            'class' => 'form-control',
                                                            'required' => '',
                                                            'minlength' => '10',
                                                            'id' => 'local',
                                                            'placeholder' => 'Local da Doação',
                                                        ]) }}


                                                    </div>

                                                    <div class="col-md-12 form-group mt-3 mt-md-0">

                                                        <select class="form-select" aria-label="Default select example"
                                                            name="estado_artigo" id="estado_artigo" value="{{ old('estado') }}">
                                                            <option selected>Estado da doação</option>
                                                            <option value="1">Muito boa condição</option>
                                                            <option value="2">Estado médio</option>
                                                            <option value="3">Mal estado</option>
                                                            <option value="3">Não definível</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <textarea class="form-control" id="descricao" name="descricao" placeholder="Descrição da doacão" required></textarea>
                                                    </div>
                                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                                        <label class="label-text" for="">Doador Anónimo?</label>
                                                       <div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_anonimo" id="is_anonimo" 
                                                                value="1" @if(old('is_anonimo') == '1') checked @endif>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_anonimo" id="is_anonimo"
                                                            value="0" @if(old('is_anonimo') == '0') checked @endif>
                                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                                        </div>
                                                       </div>
                                                    </div>
                                                    <div class="mt-3">
        
                                                        {{ Form::button('Submeter para Aprovação', ['type' => 'submit', 'class' => 'mr-5']) }}
                                                        {{ Form::button('Visualizar Doação', ['type' => 'submit', 'class' => 'mr-5']) }}
                                                        {{ Form::button('Publicar Doação', ['type' => 'submit']) }}

                                                    </div>

                                                </div><!-- End Contact Form -->
                                            </div>
                                        </div>
                                    </form>
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
                                            value="{{ old('name') }}" placeholder="Nome" required>
                                    </div>
                                    <div class="col-md-12 form-group mt-2 mt-md-0  mb-2">
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ old('email') }}" placeholder="Email" required>
                                    </div>
                                    <div class="col-md-12 form-group mt-2 mt-md-0  mb-2">
                                        <select class="form-select" aria-label="Default select example" name="causa"
                                            id="causa" value="{{ old('causa') }}">
                                            <option selected>Selecione a Causa</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>

                                    </div>

                                    <div class="col-md-12 input-group mb-3 mt-3 mt-md-0">


                                        <span class="input-group-text">AKZ</span>
                                        <input type="text" id="qtd_doar" name="qtd_doar"
                                            placeholder="Quantidade a doar" value="{{ old('qtd_doar') }}"
                                            class="form-control" aria-label="Amount (to the nearest dollar)">
                                        <span class="input-group-text">.00</span>

                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            value="{{ old('name') }}" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Transferência Bancária</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            value="{{ old('name') }}" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Transfência Express</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            value="{{ old('name') }}" id="inlineRadio3" value="option3">
                                        <label class="form-check-label" for="inlineRadio3">Face Pay</label>
                                    </div>

                                    <div class="mt-3"><button type="submit">Doar</button></div>
                                </form>
                            </div><!-- End Contact Form -->
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="assets/img/food-donate.jpg" alt="" class="img-fluid">
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
