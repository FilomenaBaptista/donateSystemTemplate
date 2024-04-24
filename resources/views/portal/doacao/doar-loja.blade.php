@extends('layouts.app')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Doar pela Loja</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Solicitar Doação</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->

        <section class="donation-loja py-5">

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
                                                            Todas
                                                        </a>
                                                    </li>
                                                    <li class="p-t-4">
                                                        <a href="#" class="s-text13">
                                                            Bebidas
                                                        </a>
                                                    </li>
                                                    <li class="p-t-4">
                                                        <a href="#" class="s-text13">
                                                            Culinaria
                                                        </a>
                                                    </li>
                                                    <li class="p-t-4">
                                                        <a href="#" class="s-text13">
                                                            Frescos
                                                        </a>
                                                    </li>
                                                </ul>
                                              
                                                <div class="search-product pos-relative bo4 of-hidden">
                                                    <input class="s-text7 size6 p-l-23 p-r-50" type="text"
                                                        name="search-product" placeholder="Search Products...">
                                                    <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                                                        <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                                                    <div class="block2">
                                                        <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                                            <img src="assets/img/LEITE-GORDO-MIMOSA-1L.png" alt="IMG-PRODUCT">
                                                            <div class="block2-overlay trans-0-4">
                                                                <a href="#"
                                                                    class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                    <i class="icon-wishlist icon_heart_alt"
                                                                        aria-hidden="true"></i>
                                                                    <i class="icon-wishlist icon_heart dis-none"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                                
                                                            </div>
                                                        </div>
                                                        <span>Fornecedor: Angoalisar</span>
                                                        <div class="block2-txt p-t-20">
                                                           
                                                            <a href="product-detail.html"
                                                                class="block2-name dis-block s-text3 p-b-5">
                                                                LEITE-GORDO-MIMOSA-1L
                                                            </a>
                                                           
                                                        </div>

                                                    </div>
                                                    <span class="block2-price m-text6 p-r-5">
                                                        kz1400
                                                    </span>
                                                    <div class="block2-btn-addcart w-size1 trans-0-4">

                                                        <button
                                                            class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                            Comprar
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                                                    <div class="block2">
                                                        <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                                            <img src="assets/img/ACUCAR-BRANCO-TIO-LUCAS-1KG-UN.jpg" alt="IMG-PRODUCT">
                                                            <div class="block2-overlay trans-0-4">
                                                                <a href="#"
                                                                    class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                    <i class="icon-wishlist icon_heart_alt"
                                                                        aria-hidden="true"></i>
                                                                    <i class="icon-wishlist icon_heart dis-none"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                                
                                                            </div>
                                                        </div>
                                                        <span>Fornecedor: Angoalisar</span>
                                                        <div class="block2-txt p-t-20">
                                                           
                                                            <a href="product-detail.html"
                                                                class="block2-name dis-block s-text3 p-b-5">
                                                                ACUCAR-BRANCO-TIO-LUCAS-1KG-UN
                                                            </a>
                                                           
                                                        </div>

                                                    </div>
                                                    <span class="block2-price m-text6 p-r-5">
                                                        kz1400
                                                    </span>
                                                    <div class="block2-btn-addcart w-size1 trans-0-4">

                                                        <button
                                                            class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                            Comprar
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                                                    <div class="block2">
                                                        <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                                            <img src="assets/img/arroz.jpg" alt="IMG-PRODUCT">
                                                            <div class="block2-overlay trans-0-4">
                                                                <a href="#"
                                                                    class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                    <i class="icon-wishlist icon_heart_alt"
                                                                        aria-hidden="true"></i>
                                                                    <i class="icon-wishlist icon_heart dis-none"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                                
                                                            </div>
                                                        </div>
                                                        <span>Fornecedor: Angoalisar</span>
                                                        <div class="block2-txt p-t-20">
                                                           
                                                            <a href="product-detail.html"
                                                                class="block2-name dis-block s-text3 p-b-5">
                                                                Arroz tio Lucas
                                                            </a>
                                                           
                                                        </div>

                                                    </div>
                                                    <span class="block2-price m-text6 p-r-5">
                                                        kz1400
                                                    </span>
                                                    <div class="block2-btn-addcart w-size1 trans-0-4">

                                                        <button
                                                            class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                            Comprar
                                                        </button>
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
    </main>
