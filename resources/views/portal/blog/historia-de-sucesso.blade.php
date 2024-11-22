@extends('layouts.app')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Histórias de Sucesso</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Histórias de Sucesso</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container">
                <div class="row gy-4 posts-list  py-5">

                    @forelse ($campanhas as $campanha)
                        <div class="row pb-3">
                            <div class="col-4 col-md-4 col-sm-12">
                                <div class="post-img-hist">
                                    <img src="{{ $campanha->imagem }}" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-8 col-md-8 col-sm-12">
                                <div class="meta-top">
                                    <h2 class="title">
                                        <a href="{{ route('campanha.show', $campanha->id) }}">{{ $campanha->titulo }}</a>
                                    </h2>
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="blog-details.html">{{ $campanha->criador->name }}</a></li>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-clock"></i> <a href="blog-details.html">
                                                <time datetime="2022-01-01">
                                                    {{ $campanha->created_at->format('M d,  Y') }}</time></a>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-chat-dots"></i> <a href="blog-details.html">
                                                {{ count($campanha->comentarios) }} Comentários</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="content">
                                    <p>
                                        {{ $campanha->descricao }}
                                    </p>
                                    <button class="btn-orange"><a href="{{ route('campanha.show', $campanha->id) }}">Ver Campanha</a></button>
                                </div>

                            </div>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
