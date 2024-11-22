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
                        <ul class="nav nav-tabs row gy-4 d-flex name-user-perfil">
                            <li> <a  class="nav-link scrollto lik-user">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(explode(' ', Auth::user()->name)[1] ?? '', 0, 1)) }}
                               
                            </a> 
                            </li>
                          
                        </ul>

                        <article class="blog-details">
                            <div class="tab-content">
                                @forelse ($users as $user)
                                    <div class="tab-pane active show" id="tab-1">
                                        <div class="row gy-12">
                                            <div class="col-lg-12 order-2 order-lg-1" data-aos="fade-up"
                                                data-aos-delay="100">

                                                <div class="detalhes-contacto">
                                                    <form>
                                                        <div class="col-md-12 form-group mt-3 mt-md-0">
                                                            <div class="form-group row">
                                                                <h1>Informações pessoais</h1>
                                                                <div class="col-sm-10">
                                                                    <button type="button"
                                                                        class="btn btn-primary btn-lg">Editar</button>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="staticEmail" class="col-sm-2 col-form-label">Nome</label>
                                                                <div class="col-sm-10">
                                                                    <div>
                                                                        <span>{{ $user->name }}</span>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            <div class="form-group row">
                                                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                                                <div class="col-sm-10">
                                                                    <div>
                                                                        <span>{{ $user->email }}</span>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            <div class="form-group row">
                                                                <label for="staticEmail" class="col-sm-2 col-form-label">Telefone</label>
                                                                <div class="col-sm-10">
                                                                    <div>
                                                                        <span>{{ $user->telefone }}</span>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            <div class="form-group row">
                                                                <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
                                                                <div class="col-sm-10">
                                                                    <div>
                                                                        <span>{{ $user->senha }}</span>
                                                                    </div>
                                                                </div>
                                                              </div>

                                                            <button class="mt-4">Deletar Conta</button>
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
                                @empty
                                    <h1 style=" margin-top: 300px;text-align: center;color: #0EA2BD;">Nenhuma campanha
                                        disponível</h1>
                                @endforelse
                            </div>

                    </div>


                    </article><!-- End blog post -->
                </div>

            </div>
        </section><!-- End Blog Details Section -->


    </main><!-- End #main -->
@endsection
