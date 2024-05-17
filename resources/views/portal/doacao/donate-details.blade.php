@extends('layouts.app')

@section('content')
    <style>
        ul.pagination {
            justify-content: center;
        }
    </style>

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Doações</h2>
                    <ol>
                        <li><a class="scrollto" href="{{ url('/') }}">Home</a></li>
                        <li><a class="scrollto" href="{{ route('doacao.index') }}">Doações</a></li>
                        <li><a href="{{ route('doacao.show', $doacao->id) }}">Detalhes da Doação</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- End Breadcrumbs -->
        <section class="featured-services container">
            @if (session()->has('error'))
                <div id="flash_error" class="alert alert-success alert-dismissible" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <strong>{{ session()->get('error') }}</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </section>
        <!-- ======= Blog Details Section ======= -->
        <section class="featured-services container">
            @if (session()->has('mensagem'))
                <div id="flash_message" class="alert alert-success alert-dismissible" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <strong>{{ session()->get('mensagem') }}</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </section>

        <section id="blog" class="blog py-4">

            <div class="container" data-aos="fade-up">

                <div class="row g-5">

                    <div class="col-lg-8">
                        <article class="d-flex flex-column blog-details">

                            <div class="post-img">
                                <img src="{{ $doacao->imagem }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="title">{{ $doacao->anuncio }}</h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="blog-details.html">{{ $doacao->criador->name }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="blog-details.html"><time
                                                datetime="2020-01-01">{{ $doacao->created_at->format('M d,  Y') }}</time></a>
                                    </li>
                                    {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                            href="blog-details.html"> {{ $doacao->comentarios->count() }} Comentários</a>
                                    </li> --}}
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                <p>
                                    {!! $doacao->descricao !!}
                                </p>

                            </div><!-- End post content -->

                            <div class="meta-bottom">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="#">{{ $doacao->criador->name }}</a></li>
                                </ul>
                            </div><!-- End meta bottom -->
                            @can('edit', $doacao)
                                <div class="read-more mt-auto align-self-end">
                                    <a class="btn-edit" href="{{ route('doacao.edit', $doacao->id) }}">
                                        <i class="bi bi-phone-fill"></i> Contactar Doador
                                    </a>
                                    <a class="btn-edit bg-orange" href="{{ route('doacao.edit', $doacao->id) }}">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <a class="btn-edit bg-danger" href="{{ route('doacao.edit', $doacao->id) }}">
                                        <i class="bi bi-trash-fill"></i> Deletar
                                    </a>
                                </div>
                            @endcan
                        </article>
                       
                        {{-- <div class="comments">
                            <h4 class="comments-count"> {{ $doacao->comentarios->count() }} Comentários</h4>
                          
                            @forelse ($doacao->comentarios as $comentario)
                                <div id="comment-2" class="comment">
                                    <div class="d-flex">
                                        <div class="comment-img"><img src="assets/img/blog/comments-2.jpg" alt="">
                                        </div>
                                        <div>
                                   
                                            <h5><a href="">{{ $comentario->criador->name }}</a> <a href="#"
                                                    class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                                            <time
                                                datetime="2020-01-01">{{ $comentario->created_at->format('M d,  Y') }}</time>
                                            <p>
                                                {{ $comentario->conteudo }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                            <div class="reply-form">

                                <h4>Adicionar Comentário</h4>
                                <form action="">
                                  <div class="row">
                                  <div class="row">
                                    <div class="col form-group">
                                      <textarea name="comment" class="form-control" placeholder="Seu Commentário*"></textarea>
                                    </div>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Comentar</button>
                
                                </form>
                
                              </div>
                        </div> --}}
                    </div>

                    <div class="col-lg-4">

                        <div class="sidebar">
                            <div class="sidebar-item search-form">
                                <h3 class="sidebar-title">2 <span>pessoas inscreveram-se para Doação</span></h3>

                            </div><!-- End sidebar search formn-->
                            <div class="progress mt-3 mb-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                    <!-- End sidebar categories-->
                            <div class="share-link mb-3">
                               <title>Compartilhar</title>
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>

                            <div class="sidebar-item recent-posts">
                                <h3 class="sidebar-title">Publicações Recentes</h3>
                                <div class="mt-3 doacoesRecentes"></div>
                            </div><!-- End sidebar recent posts-->

                        </div><!-- End Blog Sidebar -->

                    </div>

                </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection

@section('js')
    <script src="{{ asset('js/util.js') }}"></script>
    <script>
        $(document).ready(function() {
            var dados = {
                route: "{{ route('doacao.show', 0) }}",
                limit: 5,
                excepto_id: "{{ $doacao->id }}"
            };
            doacoesRecentes(dados)
        });
    </script>
@endsection
