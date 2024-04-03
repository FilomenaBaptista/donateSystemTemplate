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
                <h2>Campanha</h2>
                <ol>
                    <li><a class="scrollto" href="{{ url('/') }}">Home</a></li>
                    <li><a class="scrollto" href="{{ route('campanha.index') }}">Campanhas</a></li>
                    <li>Detalhes da campanha</li>
                </ol>
            </div>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section class="featured-services container">
        @if (session()->has('mensagem'))
        <div id="flash_message" class="alert alert-success alert-dismissible" role="alert" aria-live="assertive" aria-atomic="true">
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
                            <img src="{{ $campanha->imagem }}" alt="" class="img-fluid">
                        </div>

                        <h2 class="title">{{ $campanha->titulo }}</h2>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">{{ $campanha->criador->name }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">{{ $campanha->created_at->format('M d,  Y') }}</time></a>
                                </li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html"> {{ $campanha->comentarios->count() }} Comentários</a>
                                </li>
                            </ul>
                        </div><!-- End meta top -->

                        <div class="content">
                            <p>
                                {!! $campanha->descricao !!}
                            </p>

                        </div><!-- End post content -->

                        <div class="meta-bottom">
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                <li><a href="#">Business</a></li>
                            </ul>
                        </div><!-- End meta bottom -->
                        @can('edit', $campanha)
                        <div class="read-more mt-auto align-self-end">
                            <a class="btn-edit" href="{{ route('campanha.edit', $campanha->id) }}">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                        </div>
                        @endcan
                    </article>

                    <div class="comments">
                        <h4 class="comments-count"> {{ $campanha->comentarios->count() }} Comentários</h4>
                        @forelse ($campanha->comentarios as $comentario)
                        <div id="comment-2" class="comment">
                            <div class="d-flex">
                                <div class="comment-img"><img src="assets/img/blog/comments-2.jpg" alt="">
                                </div>
                                <div>
                                    <h5><a href="">{{ $comentario->criador->name }}</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                                    <time datetime="2020-01-01">{{ $comentario->created_at->format('M d,  Y') }}</time>
                                    <p>
                                        {{ $comentario->conteudo }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse


                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="sidebar">
                        <div class="sidebar-item search-form">
                            <h3 class="sidebar-title">30.000 kz Arrecadados da Meta 345.000kz</h3>

                        </div><!-- End sidebar search formn-->
                        <div class="progress mt-3">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <span class="qtd_doacoes_view">4,5K doações</span>
                        <div class="botao-doar py-3">
                            <button class="btn">Doar Agora</button>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End sidebar categories-->

                        <div class="share-link mb-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>

                        <div class="sidebar-item recent-doacoes">
                            <i class="bi bi-graph-up"></i>
                            <strong class="sidebar-title">4,3K pessoas acabaram de doar</strong>
                        </div>

                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Publicações Recentes</h3>
                            <div class="mt-3 campanhasRecentes"></div>
                        </div><!-- End sidebar recent posts-->

                        <div class="sidebar-item tags">
                            <h3 class="sidebar-title">Tags</h3>
                            <ul class="mt-3">
                            </ul>
                        </div><!-- End sidebar tags-->

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
            route: "{{ route('campanha.show',0) }}",
            limit: 5,
            excepto_id: "{{$campanha->id}}" 
        };
        campanhaRecentes(dados)
    });
</script>
@endsection