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
            <div class="container" data-aos="fade-up">

                <div class="row g-5">

                    <div class="col-lg-12">

                        <div class="row gy-4 posts-list">

                            <div class="col-lg-12">

                                <div class="row py-5">
                                    <div class="col-4">
                                        <div class="post-img">
                                            <img src="assets/img/onfocus-video-bg.jpg" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="blog-details.html">John Doe</a></li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-details.html"><time datetime="2022-01-01">Jan 1,
                                                            2022</time></a></li>
                                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                                        href="blog-details.html">12 Comments</a></li>
                                            </ul>
                                        </div>

                                        <div class="content">
                                            <p>
                                                Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam
                                                animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid
                                                dicta.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                        </div><!-- End blog posts list -->

                    </div>

                    <div class="col-lg-4">

                    </div>

                </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
