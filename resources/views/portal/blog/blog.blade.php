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
            <li>Campanhas</li>
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

                @foreach ($campanhas as $campanha)
                <div class="col-lg-6">
                    <article class="d-flex flex-column">

                    <div class="post-img">
                        <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                    </div>

                    <h2 class="title">
                        <a href="blog-details.html">{{$campanha->titulo}}</a>
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
                        {{Str::limit($campanha->descricao, 150)}}
                        </p>
                    </div>
                    </article>
                </div><!-- End post list item -->
                @endforeach
            </div><!-- End blog posts list -->
            {{ $campanhas->links('paginacao.custom-pagination') }}
         

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
  <script src="{{ asset('js/util.js') }}"></script>
    <script>
        $(document).ready(function() {
            jQuery.ajax({
            url: '/campanhas-recentes/5',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                jQuery('.campanhasRecentes').empty();
                response.data.forEach(function(campanha) {
                    var html = '<div class="post-item">';
                    html += '<img src="assets/img/blog/blog-recent-1.jpg" alt="" class="flex-shrink-0">';
                    html += '<div>';
                    html += '<h4><a href="blog-post.html">' + campanha.titulo + '</a></h4>';
                    html += '<time datetime="' + campanha.created_at + '">' + dataResumida( campanha.created_at) + '</time>';
                    html += '</div>';
                    html += '</div>';
                    jQuery('.campanhasRecentes').append(html);
                });
            },
            error: function(xhr, status, error) {
            }
          });
      });
    </script>
  @endsection