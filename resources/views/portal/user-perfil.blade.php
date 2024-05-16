@extends('layouts.app')


@section('content')
    <style>
        ul.pagination {
            justify-content: center;
        }

        .custom-file-upload {
            display: inline-block;
            cursor: pointer;
            font-size: 20px;
            color: #007bff;
            /* Cor azul */
        }

        /* Escondendo o input de file */
        #customFile {
            display: none;
        }
    </style>

    <main id="main">

        <!-- ======= Blog Details Section ======= -->
        <section id="Perfil-User-theme" class="blog">
            <div class="container perfil-user" data-aos="fade-up">

                <div class="row g-5">

                    <div class="col-lg-12">
                        <ul class="nav nav-tabs row gy-4 d-flex">

                            <li class="nav-item col-6 col-md-4 ">
                                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                                    <i class="bi bi-person-circle color-cyan"></i>
                                    <h4>Perfil Usuário</h4>
                                </a>
                            </li><!-- End Tab 1 Nav -->

                            <li class="nav-item col-6 col-md-4">
                                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                                    <i class="bi bi-box-seam color-indigo"></i>
                                    <h4>Notificações</h4>
                                </a>
                            </li>
                        </ul>

                        <article class="blog-details">



                            <div class="tab-content">

                                <div class="tab-pane active show" id="tab-1">
                                    <div class="row gy-12">
                                        <div class="col-lg-12 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">

                                            <div class="detalhes-contacto">
                                                <form>

                                                    <h2 class="title">Foto de perfil</h2>

                                                    <div class="col-md-12 form-group mt-3 mt-md-0">

                                                        @error('imagem')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <div class="d-flex justify-content-center mb-4">
                                                            <img id="selectedAvatar" name="img_video"
                                                                src="@if (isset($campanha)) {{ $campanha->imagem }} 
                                      @else 
                                          @if (null !== old('imagem')) 
                                              {{ old('imagem') }} 
                                          @else 
                                              {{ asset('img/placeholder-avatar.jpg') }} @endif 
                                  @endif"
                                                                class="rounded-circle"
                                                                style="width: auto; height: 150px; object-fit: cover;"
                                                                alt="example placeholder" />
                                                        </div>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="btn btn-rounded"><i class="bi bi-upload"></i>
                                                                {{ Form::label('capa', 'Escolher Imagem', ['class' => 'form-label text-white m-1']) }}

                                                                <input type="file" name="capa"
                                                                    class="form-control d-none" id="capa"
                                                                    onchange="displaySelectedImage(event, 'selectedAvatar')" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="userPInput1" class="userPInput1">Nome</label>
                                                            <div>
                                                                <span>Admin</span>
                                                                <button>editar</button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="userPInput1" class="userPInput1">Telefone</label>
                                                            <div>
                                                                <span>+244 916 345 602</span>
                                                                <button>editar</button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="userPInput1" class="userPInput1">Email</label>
                                                            <div>
                                                                <span>fbaptista2922@gmail.com</span>
                                                                <button>editar</button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="userPInput1" class="userPInput1">Senha</label>
                                                            <div>
                                                                <span>●●●●●●●●●●●●</span>
                                                                <button>editar</button>
                                                            </div>
                                                        </div>
                                                        <button>Deletar Conta</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Tab Content 1 -->

                                <div class="tab-pane" id="tab-2">
                                    <div class="row gy-12">
                                        <div class="col-lg-8 order-2 order-lg-1">


                                        </div>
                                       
                                    </div>
                                </div>

                            </div>

                    </div>

                    <div class="meta-bottom">

                        <ul class="cats">
                            <li><a href="#">Business</a></li>
                        </ul>


                        <ul class="tags">
                            <li><a href="#">Creative</a></li>
                            <li><a href="#">Tips</a></li>
                            <li><a href="#">Marketing</a></li>
                        </ul>
                    </div><!-- End meta bottom -->

                    </article><!-- End blog post -->
                </div>

            </div>
        </section><!-- End Blog Details Section -->


    </main><!-- End #main -->
@endsection
