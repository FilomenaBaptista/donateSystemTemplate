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
                <h2>Campanhas</h2>
                <ol>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a class="scrollto" href="{{ route('campanha.index') }}">Campanhas</a></li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog py-5">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8">

                    <div class="row gy-4 posts-list">
                        @forelse ($campanhas as $campanha)
                        <div class="col-lg-6">
                            <article class="d-flex flex-column">

                                <div class="post-img">
                                    <img src="{{$campanha->imagem}}" alt="Sem foto de capa" class="img-fluid">
                                </div>

                                <h2 class="title">
                                    <a href="{{ route('campanha.show' ,$campanha->id) }}">{{$campanha->titulo}}</a>
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-person"></i> <a href="blog-details.html">{{$campanha->criador->name}}</a>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-clock"></i> <a href="blog-details.html">
                                                <time datetime="2022-01-01"> {{$campanha->created_at->format('M d,  Y') }}</time></a>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-chat-dots"></i> <a href="blog-details.html">
                                                {{count($campanha->comentarios)}} Comentários</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="content">
                                    <p>
                                        {!!Str::limit($campanha->descricao, 150)!!}
                                    </p>
                                </div>
                                <div class="read-more mt-auto align-self-end">
                                    <a href="{{ route('campanha.show' ,$campanha->id) }}">Leia mais</a>
                                </div>
                            </article>
                        </div><!-- End post list item -->
                        @empty
                        <h1 style=" margin-top: 300px;text-align: center;color: #0EA2BD;">Nenhuma campanha disponível</h1>
                        @endforelse
                    </div><!-- End blog posts list -->

                    @isset($campanhas[0])
                    <div class="blog-pagination">
                        {{ $campanhas->links('paginacao.custom-pagination') }}
                    </div>
                    @endisset



                </div>

                <div class="col-lg-4">

                    <div class="sidebar">
                        <div class="sidebar-item search-form">
                            <h3 class="sidebar-title">Pesquisar</h3>
                            {!! Form::open(['route' => 'campanha.index','method' => 'GET', 'class'=> 'mt-3']) !!}
                                <input type="text" name="search" id="search" value="{{session()->get('search')}}">
                                {{ Form::button('',['type'=>'submit','class' => 'bi bi-search'])}}
                            {!! Form::close() !!}
                          
                        </div><!-- End sidebar search formn-->

                        <div class="sidebar-item categories">
                            <h3 class="sidebar-title">Categorias</h3>
                            <ul class="mt-3">
                                @foreach ($categorias as $categoria)
                                <li><a href="#">{{ $categoria->name }} <span>({{ $categoria->campanhas_count }})</span></a></li>
                            @endforeach
                            </ul>
                        </div><!-- End sidebar categories-->

                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Publicações Recentes</h3>
                            <div class="mt-3 campanhasRecentes"></div>
                        </div><!-- End sidebar recent posts-->
                     <!-- End sidebar tags-->
                    </div><!-- End Blog Sidebar -->

                </div>

            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->
@endsection

@section('js')
<script src="{{asset('js/util.js')}}"></script>
<script>
    $(document).ready(function() {
        var dados = {
            route: "{{ route('campanha.show',0) }}",
            limit: 5
        };
        campanhaRecentes(dados)
    });
</script>
@endsection
