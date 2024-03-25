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
                    <h2>Doação Monetária</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Solicitar Doação</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->

        <section class="donation-money py-5">
            <div class=" container tab-pane" id="tab-2">
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
                                <input type="text" id="qtd_doar" name="qtd_doar" placeholder="Quantidade a doar"
                                    value="{{ old('qtd_doar') }}" class="form-control"
                                    aria-label="Amount (to the nearest dollar)">
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

        </section>
    </main><!-- End #main -->
@endsection
