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
        <section id="featured-services py-5" class="featured-services">
            <div class="container">

                <div class="row gy-4 py-5">

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
        </section>
        
        <!-- End Featured Services Section -->

        <section class="banner-description py-5" style="background-image: url('assets/img/voluntario-bk.jpg')">
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

        </section>

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            

            <div class="container py-5">

                <div class="row gy-5 gx-lg-5">

                    <div class="col-lg-6">

                        <div class="img-voluntario">
                            <img src="assets/img/voluntariao.jpg" alt="">

                        </div>

                    </div>

                    <div class="col-lg-6">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form action="{{ route('register') }}" method="post" role="form" class="php-email-form">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="user_name" value="voluntario" class="form-control"
                                    id="user_name">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Nome Completo"  value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="date" class="form-control"  value="{{ old('data_nascimento') }}" name="data_nascimento" id="data_nascimento"
                                        placeholder="Data de Nascimento" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="text" class="form-control"  value="{{ old('telefone') }}" name="telefone" id="telefone"
                                        placeholder="Telefone" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control"  value="{{ old('email') }}"  name="email" id="email"
                                        placeholder="Email" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="password" class="form-control"  value="{{ old('password') }}" name="password" id="password"
                                        placeholder="Senha" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="text" class="form-control"  value="{{ old('endereço') }}" name="endereço" id="endereço"
                                        placeholder="Endereço" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                <select class="form-select" aria-label="Default select example" name="profissao" id="profissao">
                                    <option {{ old('profissao') ? '' : 'selected' }} disabled>Selecione a Profissão</option>
                                    <option value="Professor" {{ old('profissao') == 'Professor' ? 'selected' : '' }}>Professor</option>
                                    <option value="Enfermeiro" {{ old('profissao') == 'Enfermeiro' ? 'selected' : '' }}>Enfermeiro</option>
                                    <option value="Cozinheira" {{ old('profissao') == 'Cozinheira' ? 'selected' : '' }}>Cozinheira</option>
                                </select>
                                   
                                </div>
                                <div class="col-md-6 form-group mt-md-0">
                                    <label class="label-text" for="">Trabalha actualmente?</label>
                                   <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_trabalhador" id="is_trabalhador" 
                                            value="1" @if(old('is_trabalhador') == '1') checked @endif>
                                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_trabalhador" id="is_trabalhador"
                                        value="0" @if(old('is_trabalhador') == '0') checked @endif>
                                        <label class="form-check-label" for="inlineRadio2">Não</label>
                                    </div>
                                   </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <textarea class="form-control" name="sobre" placeholder="Descreva o que você poderia fazer" required>{{ old('sobre') }}</textarea>
                            </div>
                            <div class="text-left pt-3"><button type="submit">Cadastrar</button></div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>
        </section><!-- End Contact Section -->
    </main><!-- End #main -->
@endsection
