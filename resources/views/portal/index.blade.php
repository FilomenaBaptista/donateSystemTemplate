@extends('layouts.app')

@section('content')
    <section id="hero-animated" class="hero-animated d-flex align-items-center">
        <div id="overlay"> </div>

        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 justify-content-left align-items-center text-left position-relative"
                    data-aos="zoom-out">
                    <div class="container conteudo-home">
                        <h2>Bem vindo ao </h2>
                        <p> nosso site onde sua história, seu projeto, sua paixão ganham vida. Aqui, cada narrativa tem o
                            poder de tocar corações e cada iniciativa o potencial de mudar destinos..</p>
                        <p>O Seu espaço para fazer a diferença: juntos, transformamos vidas.</p>
                        <div class="d-flex">
                            <a href="#about" class="btn-get-started scrollto">Faça uma doação </a>
                        </div>
                    </div>
                    <div class="circulo-img">
                        <img class="img-fluid animated" src="assets/img/circulo-img.png" alt="" srcset="">
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-sm-12 align-items-center position-relative" data-aos="zoom-out">
                    <img class="w-100 img-fluid animated" src="assets/img/donate-pri.png" alt="" srcset="">
                </div>
            </div>

        </div>

    </section>
    <section class="Ajude-nes">
        <div class="donation-banner">
            <p class="text-center"> Ajude </p>
            <h2 class="text-center doe-hoje">Doe hoje e seja o motivo pelo qual a mudança começa. Juntos, podemos construir
                um futuro melhor!</h2>
            <div class="container mt-5">
                <div class="row">
                    <!-- Coluna 1 -->
                    <div class="col-md-4">
                        <div class="column-content">
                            <img class="pb-3" src="assets/img/doe.png" alt="">
                            <h3 class="h3-tittle">Toque Corações:</h3>
                            <p>sua doação leva calor e apoio a quem mais precisa.</p>
                        </div>
                    </div>

                    <!-- Coluna 2 -->
                    <div class="col-md-4">
                        <div class="column-content">
                            <img class="pb-3" src="assets/img/ilumine.png" alt="">
                            <h3 class="h3-tittle">Ilumine Vidas:</h3>
                            <p>mesmo um pequeno ato de bondade pode ser um grande raio de luz.</p>
                        </div>
                    </div>

                    <!-- Coluna 3 -->
                    <div class="col-md-4">
                        <div class="column-content">
                            <img class="pb-3" src="assets/img/ame.png" alt="">
                            <h3 class="h3-tittle">Compartilhe Abundância:</h3>
                            <p>o que você doa se multiplica em alegria e gratidão.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main id="main">
        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="fade-up">
                <h1 class="py-5">Doações Em Destaque</h1>

                <div class="testimonials-slider swiper">
                    <div class="swiper-wrapper">
                        @forelse ($doacoes as $doacao)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ $doacao->capa }}" alt="Sem foto de capa" class="img-fluid">
                                <h2 class="title">
                                    <a
                                        href="{{ route('doacao.show', $doacao->id) }}">{{ $doacao->anuncio }}</a>
                                </h2>
                                <h4><i class="bi bi-person"></i> <a href="blog-details.html">{{$doacao->criador->name}}</a> &amp; Founder</h4>

                                <p class="text-black">
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    {!! Str::limit($doacao->descricao, 150) !!}
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->
                        @empty
                        <h1 style=" margin-top: 300px;text-align: center;color: #0EA2BD;">Nenhuma campanha disponível</h1>
                    @endforelse

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->
        
        {{-- <section id="who-campnahas" class="s-who-campnahas">
            <div class="row section-header" data-aos="fade-up">
            </div>
            <div class="row who-campnahas">
                <div class="about-process process block-1-2 block-tab-full">
                    <div class="process__vline-left"></div>
                    <div class="process__vline-right"></div>
                    <div class="col-block process__col" data-item="1" data-aos="fade-up">
                        <div class="process__text">
                            <h4>Começe uma campanha</h4>
                            <ul>
                                <li>Definir a meta da campanha</li>
                                <li>Contar sua história</li>
                                <li>Incluir fotos ou vídeo</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-block process__col" data-item="2" data-aos="fade-up">
                        <div class="process__text">
                            <h4>Compartilhe com familiares e amigos</h4>
                            <ul>
                                <li> Enviar e-mails</li>
                                <li>Enviar mensagens de texto</li>
                                <li>Compartilhar nas redes sociais</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-block process__col" data-item="3" data-aos="fade-up">
                        <div class="process__text">
                            <h4>Gerencie doações</h4>
                            <ul>
                                <li>Aceitar doações</li>
                                <li>Agradecer aos doadores</li>
                                <li>Retirar fundos</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-block process__col" data-item="4" data-aos="fade-up">
                        <div class="process__text">
                            <h4>Configure transferência Bancária</h4>
                            <p>
                                Quos dolores saepe mollitia deserunt accusamus autem reprehenderit. Voluptas facere animi
                                explicabo non quis magni recusandae.
                                Numquam debitis pariatur omnis facere unde. Laboriosam minus amet nesciunt est. Et saepe eos
                                maxime tempore quasi deserunt ab.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts py-5" class="recent-blog-posts">

            <div class="container py-5" data-aos="fade-up">

                <div class="section-header">
                    <h2>Campanhas</h2>
                    <p>Postadas recentemente</p>
                </div>

                <div class="row">
                    @forelse ($campanhas as $campanha)
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="post-box">
                                <div class="post-img"><img src="{{ $campanha->capa }}" class="img-fluid" alt="">
                                </div>
                                <div class="meta">
                                    <span class="post-date">{{ $campanha->created_at->format('M d,  Y') }}</span>
                                    <span class="post-author"> {{ $campanha->criador->name }}</span>
                                </div>
                                <h3 class="post-title"> <a
                                        href="{{ route('campanha.show', $campanha->id) }}">{{ $campanha->titulo }}</a></h3>
                                <p> {!! Str::limit($campanha->descricao, 150) !!}</p>

                            </div>
                        </div>
                    @empty
                        <h1 style=" margin-top: 300px;text-align: center;color: #0EA2BD;">Nenhuma campanha disponível</h1>
                    @endforelse
                    <div class="campanha justify-content-center pt-3">
                        <button class="btn button-voluntario"><a href="{{ route('campanha.index') }}">Ver Todas</a></button>
                    </div>
                </div>
                
            </div>

        </section>

        <section class="voluntario">
            <div class="home-page-limestone">
                <div class="container">
                    <div class="row align-items-end">
                        <div class="coL-12 col-lg-6">
                            <div class="section-heading">
                                <h2 class="entry-title">Transforme a Compaixão em ação, desenvolva novas habilidades, ganhe experiências valiosas, sua Habilidade pode ser o Presente
                                    que Muda o Mundo!.</h2>
                               <p class="pt-3 pb-3 text-p-voluntario">O voluntariado é motivado por um desejo de contribuir para o bem-estar da comunidade ou de um grupo específico, seja por meio de ações sociais, ambientais, educacionais, de saúde, culturais, entre outras áreas.</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                           <img class="" src="assets/img/donate-pri.png" alt="" srcset="">
                        </div>
                        <div class="voluntario justify-content-center pt-3">
                            <button class="btn button-voluntario"><a class="text-center" href="{{ route('voluntario') }}">Seja um voluntário</a></button>
                        </div>
                    </div>
                    </div>
            </div>
        </section>



        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq py-5">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row gy-4 py-2">

                    <div
                        class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content px-xl-5">
                            <h3>Perguntas <strong>Frequentes</strong></h3>
                            <p>
                                Bem-vindos à nossa seção de Perguntas Frequentes! Aqui, você encontrará respostas para
                                algumas das dúvidas mais comuns sobre como participar, contribuir e se envolver em nossa
                                plataforma.
                        </div>

                        <div class="accordion accordion-flush px-xl-5" id="faqlist">

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-1">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Que tipos de itens eu posso doar?
                                    </button>
                                </h3>
                                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Você pode doar uma ampla gama de itens, incluindo alimentos não perecíveis, roupas
                                        em bom estado, eletrônicos funcionais, livros e brinquedos.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-2">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Como faço para receber o dinheiro arregacadado?
                                    </button>
                                </h3>
                                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Após o término de sua campanha de arrecadação, o valor total será transferido para a
                                        conta bancária que você especificou no momento do cadastro. Lembre-se de que pode
                                        levar alguns dias úteis para que os fundos estejam disponíveis em sua conta.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-3">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Doações de alimentos aceites no site
                                    </button>
                                </h3>
                                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Produtos embalados e fechados com data de validade
                                        As frutas
                                        Os vegetais


                                        Exemplos de doações autorizadas:
                                        Massa, arroz, cereais, açúcar e outros alimentos secos
                                        Bolos, barras de cereais, chocolate,…
                                        Chocolate em pó, chá, café, etc.
                                        Os produtos enlatados
                                        Compotas, mel e pastas para barrar
                                        Bebidas não alcoólicas (leite, suco de maçã, refrigerante, etc.)
                                        Latas de leite infantil
                                        Suplemento alimentar
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-4">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Alguém pode criar uma campanha para mim?
                                    </button>
                                </h3>
                                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Sim, é possível que outra pessoa crie uma campanha em seu nome, desde que tenha
                                        todas as informações necessárias e sua permissão para fazê-lo. Essa pode ser uma
                                        ótima maneira de receber apoio se você não se sentir confortável ou capaz de
                                        gerenciar uma campanha sozinho(a).
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-5">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Como funciona o processo de entrega?
                                    </button>
                                </h3>
                                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Após realizar sua doação, coordenaremos a entrega dos itens doados diretamente para
                                        a organização ou indivíduo beneficiado. Você receberá atualizações por e-mail sobre
                                        o status da entrega, garantindo transparência e rastreabilidade de sua contribuição.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                        </div>

                    </div>

                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                        style='background-image: url("assets/img/perFQA.jpg");'>&nbsp;</div>
                </div>

            </div>
        </section><!-- End F.A.Q Section -->

    </main><!-- End #main -->
@endsection
