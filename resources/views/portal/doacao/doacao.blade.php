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
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Doações</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row g-5">

                    <div class="col-lg-8">

                        <div class="row gy-4 posts-list">
                            @forelse ($doacoesFisicas as $doacaoFisica)
                                <div class="col-lg-6">
                                    <article class="d-flex flex-column">

                                        <div class="post-img">
                                            <!--  <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid"> -->
                                            <img src="{{ $doacaoFisica->capa }}" alt="Sem foto de capa" class="img-fluid">
                                        </div>

                                        <div class="content">
                                            <p>
                                                {!! Str::limit($doacaoFisica->descricao, 150) !!}
                                            </p>
                                        </div>
                                        {{-- <div class="read-more mt-auto align-self-end">
                                    <a href="{{ route('doacaoFisica.show' ,$doacaoFisica->id) }}">Leia mais</a>
                                </div> --}}
                                    </article>
                                </div><!-- End post list item -->
                            @empty
                                <h1 style=" margin-top: 300px;text-align: center;color: #0EA2BD;">Nenhuma Doação disponível
                                </h1>
                            @endforelse
                        </div><!-- End blog posts list -->

                        @isset($doacao[0])
                            <div class="blog-pagination">
                                {{ $doacao->links('paginacao.custom-pagination') }}
                            </div>
                        @endisset

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
                                    @foreach ($categorias as $categoria)
                                        <li><a href="#">{{ $categoria->name }}
                                                <span>({{ $categoria->doacao_fisicas_count }})</span></a></li>
                                    @endforeach
                                </ul>
                            </div><!-- End sidebar categories-->

                            <div class="sidebar-item recent-posts">
                                <h3 class="sidebar-title">Publicações Recentes</h3>
                                <div class="mt-3 campanhasRecentes"></div>
                            </div><!-- End sidebar recent posts-->

                        </div><!-- End Blog Sidebar -->

                    </div>

                </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection

@section('js')
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/util.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/doacao-recentes/5',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('.doacaoRecentes').empty();
                    response.data.forEach(function(doacaoFisica) {
                        var html = '<div class="post-item">';
                        html += '<img src="' + doacaoFisica.capa +
                            '" alt="" class="flex-shrink-0">';
                        html += '<div>';
                        html += '<h4><a href="blog-post.html">' + doacaoFisica.titulo +
                            '</a></h4>';
                        html += '<time datetime="' + doacaoFisica.created_at + '">' +
                            dataResumida(doacaoFisica.created_at) + '</time>';
                        html += '</div>';
                        html += '</div>';
                        $('.doacaoRecentes').append(html);
                    });
                },
                error: function(xhr, status, error) {}
            });
        });
    </script>
@endsection
