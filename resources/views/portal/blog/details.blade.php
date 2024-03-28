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
                    <li><a class="scrollto" href="{{url('/')}}">Home</a></li>
                    <li><a class="scrollto" href="{{route('campanha.index')}}">Campanhas</a></li>
                    <li><a href="{{route('campanha.show' , $campanha->id)}}">Detalhes da campanha</a></li>
                </ol>
            </div>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section class="featured-services container">
        @if(session()->has('mensagem'))
            <div id="flash_message" class = "alert alert-success alert-dismissible" role="alert" aria-live="assertive" aria-atomic="true">
                <strong>{{session()->get('mensagem')}}</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </section>

    <section id="blog" class="blog">

        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8">
                    <article class="d-flex flex-column blog-details">

                        <div class="post-img">
                            <img src="{{$campanha->imagem}}" alt="" class="img-fluid">
                        </div>

                        <h2 class="title">{{$campanha->titulo}}</h2>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">{{$campanha->criador->name}}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">{{$campanha->created_at->format('M d,  Y') }}</time></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html"> {{$campanha->comentarios->count()}} Comentários</a></li>
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

                            <i class="bi bi-tags"></i>
                            <ul class="tags">
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>


                        </div><!-- End meta bottom -->
                        @can('edit' , $campanha)
                            <div class="read-more mt-auto align-self-end">
                                <a class="btn-edit" href="{{ route('campanha.edit' ,$campanha->id) }}">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                            </div>
                        @endcan
                    </article>

                    <div class="comments">

                        <h4 class="comments-count"> {{$campanha->comentarios->count()}} Comentários</h4>
                        @forelse ($campanha->comentarios as $comentario)
                            <div id="comment-2" class="comment">
                                <div class="d-flex">
                                    <div class="comment-img"><img src="assets/img/blog/comments-2.jpg" alt=""></div>
                                    <div>
                                        <h5><a href="">{{$comentario->criador->name}}</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                                        <time datetime="2020-01-01">{{$comentario->created_at->format('M d,  Y') }}</time>
                                        <p>
                                            {{$comentario->conteudo }}
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
                            <h3 class="sidebar-title">Search</h3>
                            <form action="" class="mt-3">
                                <input type="text">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->

                        <div class="sidebar-item categories">
                            <h3 class="sidebar-title">Categorias</h3>
                            <ul class="mt-3">
                                <li><a href="#">General <span>(25)</span></a></li>
                                <li><a href="#">Lifestyle <span>(12)</span></a></li>
                                <li><a href="#">Travel <span>(5)</span></a></li>
                                <li><a href="#">Design <span>(22)</span></a></li>
                                <li><a href="#">Creative <span>(8)</span></a></li>
                                <li><a href="#">Educaion <span>(14)</span></a></li>
                            </ul>
                        </div><!-- End sidebar categories-->

                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Publicações Recentes</h3>
                            <div class="mt-3 campanhasRecentes"></div>
                        </div><!-- End sidebar recent posts-->

                        <div class="sidebar-item tags">
                            <h3 class="sidebar-title">Tags</h3>
                            <ul class="mt-3">
                                <li><a href="#">App</a></li>
                                <li><a href="#">IT</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Mac</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Office</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Studio</a></li>
                                <li><a href="#">Smart</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
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
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/util.js')}}"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/campanhas-recentes/5',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('.campanhasRecentes').empty();
                response.data.forEach(function(campanha) {
                    var html = '<div class="post-item">';
                    html += '<img src="' + campanha.imagem + '" alt="" class="flex-shrink-0">';
                    html += '<div>';
                    html += '<h4><a href="blog-post.html">' + campanha.titulo + '</a></h4>';
                    html += '<time datetime="' + campanha.created_at + '">' + dataResumida(campanha.created_at) + '</time>';
                    html += '</div>';
                    html += '</div>';
                    $('.campanhasRecentes').append(html);
                });
            },
            error: function(xhr, status, error) {}
        });
    });
</script>
@endsection
{{-- @section('js')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@endsection --}}
