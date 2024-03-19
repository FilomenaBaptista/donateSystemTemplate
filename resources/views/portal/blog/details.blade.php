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
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8">
                    <article class="blog-details">

                        <div class="post-img">
                            <img src="{{$campanha->capa}}" alt="" class="img-fluid">
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
                                {{$campanha->descricao}}
                            </p>

                            <blockquote>
                                <p>
                                    Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.
                                </p>
                            </blockquote>

                            <img src="assets/img/blog/blog-inside-post.jpg" class="img-fluid" alt="">

                            <h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3>
                            <p>
                                Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel.
                                Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.
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

                    </article>

                    <div class="comments">

                        <h4 class="comments-count"> {{$campanha->comentarios->count()}} Comentários</h4>
                        <!-- End comment #1 -->

                        <div id="comment-2" class="comment">
                            <div class="d-flex">
                                <div class="comment-img"><img src="assets/img/blog/comments-2.jpg" alt=""></div>
                                <div>
                                    <h5><a href="">Aron Alvarado</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                                    <time datetime="2020-01-01">01 Jan,2022</time>
                                    <p>
                                        Ipsam tempora sequi voluptatem quis sapiente non. Autem itaque eveniet saepe. Officiis illo ut beatae.
                                    </p>
                                </div>
                            </div>

                            <div id="comment-reply-1" class="comment comment-reply">
                                <div class="d-flex">
                                    <div class="comment-img"><img src="assets/img/blog/comments-3.jpg" alt=""></div>
                                    <div>
                                        <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                                        <time datetime="2020-01-01">01 Jan,2022</time>
                                        <p>
                                            Enim ipsa eum fugiat fuga repellat. Commodi quo quo dicta. Est ullam aspernatur ut vitae quia mollitia id non. Qui ad quas nostrum rerum sed necessitatibus aut est. Eum officiis sed repellat maxime vero nisi natus. Amet nesciunt nesciunt qui illum omnis est et dolor recusandae.

                                            Recusandae sit ad aut impedit et. Ipsa labore dolor impedit et natus in porro aut. Magnam qui cum. Illo similique occaecati nihil modi eligendi. Pariatur distinctio labore omnis incidunt et illum. Expedita et dignissimos distinctio laborum minima fugiat.

                                            Libero corporis qui. Nam illo odio beatae enim ducimus. Harum reiciendis error dolorum non autem quisquam vero rerum neque.
                                        </p>
                                    </div>
                                </div>

                                <div id="comment-reply-2" class="comment comment-reply">
                                    <div class="d-flex">
                                        <div class="comment-img"><img src="assets/img/blog/comments-4.jpg" alt=""></div>
                                        <div>
                                            <h5><a href="">Sianna Ramsay</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                                            <time datetime="2020-01-01">01 Jan,2022</time>
                                            <p>
                                                Et dignissimos impedit nulla et quo distinctio ex nemo. Omnis quia dolores cupiditate et. Ut unde qui eligendi sapiente omnis ullam. Placeat porro est commodi est officiis voluptas repellat quisquam possimus. Perferendis id consectetur necessitatibus.
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- End comment reply #2-->
                            </div><!-- End comment reply #1-->
                        </div><!-- End comment #2-->
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
                    html += '<img src="' + campanha.capa + '" alt="" class="flex-shrink-0">';
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
