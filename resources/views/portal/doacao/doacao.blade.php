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
                                                        {{ Form::label('capa', 'Adicionar uma foto de capa', ['class' => 'mb-2']) }}
                                                        <div class="d-flex justify-content-center mb-4">
                                                            <img id="selectedAvatar" name="img_video"
                                                                src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                                                                class="rounded-circle"
                                                                style="width: auto; height: 150px; object-fit: cover;"
                                                                alt="example placeholder" />
                                                        </div>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="btn btn-rounded">
                                                                {{ Form::label('capa', 'Escolher Imagem', ['class' => 'form-label text-white m-1']) }}
                                                                <input type="file" name="capa"
                                                                    class="form-control d-none" id="capa"
                                                                    onchange="displaySelectedImage(event, 'selectedAvatar')" />
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

                                                    {{ Form::number('qtd_itens_doar', null, [
                                                        'class' => 'form-control',
                                                        'min' => '0',
                                                        'id' => 'qtd_itens_doar',
                                                        'placeholder' => 'Quantidade de itens a doar',
                                                    ]) }}
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
                                                <div class="form-group ml-3">
                                                    <label for="">Descricação</label>
                                                    <textarea class="form-control" name="descricao" id="descricao" name="message"
                                                        placeholder="Oi meu nome é Ana, estou arrecadando fundos para..." required>{{ old('descrica') }}</textarea>
                                                </div>

                                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                                    <label class="label-text" for="">Doador Anónimo?</label>
                                                    <div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_anonimo"
                                                                id="is_anonimo" value="1"
                                                                @if (old('is_anonimo') == '1') checked @endif>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_anonimo"
                                                                id="is_anonimo" value="0"
                                                                @if (old('is_anonimo') == '0') checked @endif>
                                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3 ml-2">

                                                    {{ Form::button('Submeter para Aprovação', ['type' => 'submit', 'class' => 'mr-2']) }}
                                                    {{ Form::button('Visualizar Doação', ['type' => 'submit', 'class' => 'mr-2']) }}
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
                            <div class="col-lg-12 order-2 order-lg-1">

                                <body class="animsition">
                                    <section class="bgwhite p-t-55 p-b-65">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                                                    <div class="leftbar p-r-20 p-r-0-sm">

                                                        <h4 class="m-text14 p-b-7">
                                                            Categories
                                                        </h4>
                                                        <ul class="p-b-54">
                                                            <li class="p-t-4">
                                                                <a href="#" class="s-text13 active1">
                                                                    All
                                                                </a>
                                                            </li>
                                                            <li class="p-t-4">
                                                                <a href="#" class="s-text13">
                                                                    Women
                                                                </a>
                                                            </li>
                                                            <li class="p-t-4">
                                                                <a href="#" class="s-text13">
                                                                    Men
                                                                </a>
                                                            </li>
                                                            <li class="p-t-4">
                                                                <a href="#" class="s-text13">
                                                                    Kids
                                                                </a>
                                                            </li>
                                                            <li class="p-t-4">
                                                                <a href="#" class="s-text13">
                                                                    Accesories
                                                                </a>
                                                            </li>
                                                        </ul>

                                                        <h4 class="m-text14 p-b-32">
                                                            Filters
                                                        </h4>
                                                        <div class="filter-price p-t-22 p-b-50 bo3">
                                                            <div class="m-text15 p-b-17">
                                                                Price
                                                            </div>
                                                            <div class="wra-filter-bar">
                                                                <div id="filter-bar"></div>
                                                            </div>
                                                            <div class="flex-sb-m flex-w p-t-16">
                                                                <div class="w-size11">

                                                                    <button
                                                                        class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
                                                                        Filter
                                                                    </button>
                                                                </div>
                                                                <div class="s-text3 p-t-10 p-b-10">
                                                                    Range: $<span id="value-lower">610</span> - $<span
                                                                        id="value-upper">980</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="filter-color p-t-22 p-b-50 bo3">
                                                            <div class="m-text15 p-b-12">
                                                                Color
                                                            </div>
                                                            <ul class="flex-w">
                                                                <li class="m-r-10">
                                                                    <input class="checkbox-color-filter"
                                                                        id="color-filter1" type="checkbox"
                                                                        name="color-filter1">
                                                                    <label class="color-filter color-filter1"
                                                                        for="color-filter1"></label>
                                                                </li>
                                                                <li class="m-r-10">
                                                                    <input class="checkbox-color-filter"
                                                                        id="color-filter2" type="checkbox"
                                                                        name="color-filter2">
                                                                    <label class="color-filter color-filter2"
                                                                        for="color-filter2"></label>
                                                                </li>
                                                                <li class="m-r-10">
                                                                    <input class="checkbox-color-filter"
                                                                        id="color-filter3" type="checkbox"
                                                                        name="color-filter3">
                                                                    <label class="color-filter color-filter3"
                                                                        for="color-filter3"></label>
                                                                </li>
                                                                <li class="m-r-10">
                                                                    <input class="checkbox-color-filter"
                                                                        id="color-filter4" type="checkbox"
                                                                        name="color-filter4">
                                                                    <label class="color-filter color-filter4"
                                                                        for="color-filter4"></label>
                                                                </li>
                                                                <li class="m-r-10">
                                                                    <input class="checkbox-color-filter"
                                                                        id="color-filter5" type="checkbox"
                                                                        name="color-filter5">
                                                                    <label class="color-filter color-filter5"
                                                                        for="color-filter5"></label>
                                                                </li>
                                                                <li class="m-r-10">
                                                                    <input class="checkbox-color-filter"
                                                                        id="color-filter6" type="checkbox"
                                                                        name="color-filter6">
                                                                    <label class="color-filter color-filter6"
                                                                        for="color-filter6"></label>
                                                                </li>
                                                                <li class="m-r-10">
                                                                    <input class="checkbox-color-filter"
                                                                        id="color-filter7" type="checkbox"
                                                                        name="color-filter7">
                                                                    <label class="color-filter color-filter7"
                                                                        for="color-filter7"></label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="search-product pos-relative bo4 of-hidden">
                                                            <input class="s-text7 size6 p-l-23 p-r-50" type="text"
                                                                name="search-product" placeholder="Search Products...">
                                                            <button
                                                                class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                                                                <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

                                                    <div class="flex-sb-m flex-w p-b-35">
                                                        <div class="flex-w">
                                                            <div
                                                                class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                                                <select class="selection-2" name="sorting">
                                                                    <option>Default Sorting</option>
                                                                    <option>Popularity</option>
                                                                    <option>Price: low to high</option>
                                                                    <option>Price: high to low</option>
                                                                </select>
                                                            </div>
                                                            <div
                                                                class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                                                <select class="selection-2" name="sorting">
                                                                    <option>Price</option>
                                                                    <option>$0.00 - $50.00</option>
                                                                    <option>$50.00 - $100.00</option>
                                                                    <option>$100.00 - $150.00</option>
                                                                    <option>$150.00 - $200.00</option>
                                                                    <option>$200.00+</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <span class="s-text8 p-t-5 p-b-5">
                                                            Showing 1–12 of 16 results
                                                        </span>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                                                            <div class="block2">
                                                                <div
                                                                    class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                                                    <img src="images/item-02.jpg" alt="IMG-PRODUCT">
                                                                    <div class="block2-overlay trans-0-4">
                                                                        <a href="#"
                                                                            class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                            <i class="icon-wishlist icon_heart_alt"
                                                                                aria-hidden="true"></i>
                                                                            <i class="icon-wishlist icon_heart dis-none"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <div class="block2-btn-addcart w-size1 trans-0-4">

                                                                            <button
                                                                                class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                                                Add to Cart
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="block2-txt p-t-20">
                                                                    <a href="product-detail.html"
                                                                        class="block2-name dis-block s-text3 p-b-5">
                                                                        Herschel supply co 25l
                                                                    </a>
                                                                    <span class="block2-price m-text6 p-r-5">
                                                                        $75.00
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                                                            <div class="block2">
                                                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                                                    <img src="images/item-03.jpg" alt="IMG-PRODUCT">
                                                                    <div class="block2-overlay trans-0-4">
                                                                        <a href="#"
                                                                            class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                            <i class="icon-wishlist icon_heart_alt"
                                                                                aria-hidden="true"></i>
                                                                            <i class="icon-wishlist icon_heart dis-none"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <div class="block2-btn-addcart w-size1 trans-0-4">

                                                                            <button
                                                                                class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                                                Add to Cart
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="block2-txt p-t-20">
                                                                    <a href="product-detail.html"
                                                                        class="block2-name dis-block s-text3 p-b-5">
                                                                        Denim jacket blue
                                                                    </a>
                                                                    <span class="block2-price m-text6 p-r-5">
                                                                        $92.50
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                                                            <div class="block2">
                                                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                                                    <img src="images/item-05.jpg" alt="IMG-PRODUCT">
                                                                    <div class="block2-overlay trans-0-4">
                                                                        <a href="#"
                                                                            class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                            <i class="icon-wishlist icon_heart_alt"
                                                                                aria-hidden="true"></i>
                                                                            <i class="icon-wishlist icon_heart dis-none"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <div class="block2-btn-addcart w-size1 trans-0-4">

                                                                            <button
                                                                                class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                                                Add to Cart
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="block2-txt p-t-20">
                                                                    <a href="product-detail.html"
                                                                        class="block2-name dis-block s-text3 p-b-5">
                                                                        Coach slim easton black
                                                                    </a>
                                                                    <span class="block2-price m-text6 p-r-5">
                                                                        $165.90
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                                                            <div class="block2">
                                                                <div
                                                                    class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
                                                                    <img src="images/item-07.jpg" alt="IMG-PRODUCT">
                                                                    <div class="block2-overlay trans-0-4">
                                                                        <a href="#"
                                                                            class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                            <i class="icon-wishlist icon_heart_alt"
                                                                                aria-hidden="true"></i>
                                                                            <i class="icon-wishlist icon_heart dis-none"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <div class="block2-btn-addcart w-size1 trans-0-4">

                                                                            <button
                                                                                class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                                                Add to Cart
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="block2-txt p-t-20">
                                                                    <a href="product-detail.html"
                                                                        class="block2-name dis-block s-text3 p-b-5">
                                                                        Frayed denim shorts
                                                                    </a>
                                                                    <span class="block2-oldprice m-text7 p-r-5">
                                                                        $29.50
                                                                    </span>
                                                                    <span class="block2-newprice m-text8 p-r-5">
                                                                        $15.90
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                                                            <div class="block2">
                                                                <div
                                                                    class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                                                    <img src="images/item-01.jpg" alt="IMG-PRODUCT">
                                                                    <div class="block2-overlay trans-0-4">
                                                                        <a href="#"
                                                                            class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                            <i class="icon-wishlist icon_heart_alt"
                                                                                aria-hidden="true"></i>
                                                                            <i class="icon-wishlist icon_heart dis-none"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <div class="block2-btn-addcart w-size1 trans-0-4">

                                                                            <button
                                                                                class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                                                Add to Cart
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="block2-txt p-t-20">
                                                                    <a href="product-detail.html"
                                                                        class="block2-name dis-block s-text3 p-b-5">
                                                                        Herschel supply co 25l
                                                                    </a>
                                                                    <span class="block2-price m-text6 p-r-5">
                                                                        $75.00
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                                                            <div class="block2">
                                                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                                                    <img src="images/item-14.jpg" alt="IMG-PRODUCT">
                                                                    <div class="block2-overlay trans-0-4">
                                                                        <a href="#"
                                                                            class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                            <i class="icon-wishlist icon_heart_alt"
                                                                                aria-hidden="true"></i>
                                                                            <i class="icon-wishlist icon_heart dis-none"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <div class="block2-btn-addcart w-size1 trans-0-4">

                                                                            <button
                                                                                class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                                                Add to Cart
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="block2-txt p-t-20">
                                                                    <a href="product-detail.html"
                                                                        class="block2-name dis-block s-text3 p-b-5">
                                                                        Denim jacket blue
                                                                    </a>
                                                                    <span class="block2-price m-text6 p-r-5">
                                                                        $92.50
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                                                            <div class="block2">
                                                                <div
                                                                    class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                                                    <img src="images/item-06.jpg" alt="IMG-PRODUCT">
                                                                    <div class="block2-overlay trans-0-4">
                                                                        <a href="#"
                                                                            class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                            <i class="icon-wishlist icon_heart_alt"
                                                                                aria-hidden="true"></i>
                                                                            <i class="icon-wishlist icon_heart dis-none"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <div class="block2-btn-addcart w-size1 trans-0-4">

                                                                            <button
                                                                                class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                                                Add to Cart
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="block2-txt p-t-20">
                                                                    <a href="product-detail.html"
                                                                        class="block2-name dis-block s-text3 p-b-5">
                                                                        Herschel supply co 25l
                                                                    </a>
                                                                    <span class="block2-price m-text6 p-r-5">
                                                                        $75.00
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                                                            <div class="block2">
                                                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                                                    <img src="images/item-08.jpg" alt="IMG-PRODUCT">
                                                                    <div class="block2-overlay trans-0-4">
                                                                        <a href="#"
                                                                            class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                            <i class="icon-wishlist icon_heart_alt"
                                                                                aria-hidden="true"></i>
                                                                            <i class="icon-wishlist icon_heart dis-none"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <div class="block2-btn-addcart w-size1 trans-0-4">

                                                                            <button
                                                                                class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                                                Add to Cart
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="block2-txt p-t-20">
                                                                    <a href="product-detail.html"
                                                                        class="block2-name dis-block s-text3 p-b-5">
                                                                        Denim jacket blue
                                                                    </a>
                                                                    <span class="block2-price m-text6 p-r-5">
                                                                        $92.50
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                                                            <div class="block2">
                                                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                                                    <img src="images/item-10.jpg" alt="IMG-PRODUCT">
                                                                    <div class="block2-overlay trans-0-4">
                                                                        <a href="#"
                                                                            class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                            <i class="icon-wishlist icon_heart_alt"
                                                                                aria-hidden="true"></i>
                                                                            <i class="icon-wishlist icon_heart dis-none"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <div class="block2-btn-addcart w-size1 trans-0-4">

                                                                            <button
                                                                                class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                                                Add to Cart
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="block2-txt p-t-20">
                                                                    <a href="product-detail.html"
                                                                        class="block2-name dis-block s-text3 p-b-5">
                                                                        Coach slim easton black
                                                                    </a>
                                                                    <span class="block2-price m-text6 p-r-5">
                                                                        $165.90
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                                                            <div class="block2">
                                                                <div
                                                                    class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
                                                                    <img src="images/item-11.jpg" alt="IMG-PRODUCT">
                                                                    <div class="block2-overlay trans-0-4">
                                                                        <a href="#"
                                                                            class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                            <i class="icon-wishlist icon_heart_alt"
                                                                                aria-hidden="true"></i>
                                                                            <i class="icon-wishlist icon_heart dis-none"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <div class="block2-btn-addcart w-size1 trans-0-4">

                                                                            <button
                                                                                class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                                                Add to Cart
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="block2-txt p-t-20">
                                                                    <a href="product-detail.html"
                                                                        class="block2-name dis-block s-text3 p-b-5">
                                                                        Frayed denim shorts
                                                                    </a>
                                                                    <span class="block2-oldprice m-text7 p-r-5">
                                                                        $29.50
                                                                    </span>
                                                                    <span class="block2-newprice m-text8 p-r-5">
                                                                        $15.90
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                                                            <div class="block2">
                                                                <div
                                                                    class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                                                    <img src="images/item-12.jpg" alt="IMG-PRODUCT">
                                                                    <div class="block2-overlay trans-0-4">
                                                                        <a href="#"
                                                                            class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                            <i class="icon-wishlist icon_heart_alt"
                                                                                aria-hidden="true"></i>
                                                                            <i class="icon-wishlist icon_heart dis-none"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <div class="block2-btn-addcart w-size1 trans-0-4">

                                                                            <button
                                                                                class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                                                Add to Cart
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="block2-txt p-t-20">
                                                                    <a href="product-detail.html"
                                                                        class="block2-name dis-block s-text3 p-b-5">
                                                                        Herschel supply co 25l
                                                                    </a>
                                                                    <span class="block2-price m-text6 p-r-5">
                                                                        $75.00
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                                                            <div class="block2">
                                                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                                                    <img src="images/item-15.jpg" alt="IMG-PRODUCT">
                                                                    <div class="block2-overlay trans-0-4">
                                                                        <a href="#"
                                                                            class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                            <i class="icon-wishlist icon_heart_alt"
                                                                                aria-hidden="true"></i>
                                                                            <i class="icon-wishlist icon_heart dis-none"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <div class="block2-btn-addcart w-size1 trans-0-4">

                                                                            <button
                                                                                class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                                                Add to Cart
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="block2-txt p-t-20">
                                                                    <a href="product-detail.html"
                                                                        class="block2-name dis-block s-text3 p-b-5">
                                                                        Denim jacket blue
                                                                    </a>
                                                                    <span class="block2-price m-text6 p-r-5">
                                                                        $92.50
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="pagination flex-m flex-w p-t-26">
                                                        <a href="#"
                                                            class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
                                                        <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <div class="btn-back-to-top bg0-hov" id="myBtn">
                                        <span class="symbol-btn-back-to-top">
                                            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <div id="dropDownSelect1"></div>
                                    <div id="dropDownSelect2"></div>
                            </div>
                        </div><!-- End Tab Content 3 -->

                    </div>

                </div>
        </section>
    </main><!-- End #main -->
@endsection

@section('js')
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}">
        < /> 
        {{--  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> --}}
            <
            script src = "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity = "sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin = "anonymous" >
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script>
        $('#descricao').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 150
        });
    </script>
@endsection
