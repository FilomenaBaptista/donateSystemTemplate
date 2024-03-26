
@extends('layouts.app')

@section('content')
  <section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div id="overlay"> </div>
    <img src="assets/img/donation.jpg" class="img-fluid animated">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
      <h2>Bem vindo ao <span> Kukurisa</span></span></h2>
      <p>O Seu espaço para fazer a diferença: juntos, transformamos vidas.</p>
      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Faça uma doação </a>
      </div>
    </div>
 
  </section>

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2> Sobre nós</h2></h2>
        </div>

        <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-5">
            <div class="about-img">
              <img src="assets/img/about.jpg" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-7">
            <h3 class="pt-0 pt-lg-5">Um pouco sobre nós</h3>

            <!-- Tab Content -->
            <div class="tab-content">

              <div class="tab-pane fade show active" id="tab1">

                <div class="d-flex align-items-center mt-4">
               
                </div>
                <p>Bem-vindo ao nosso site de arrecadação de fundos on-line, onde você pode compartilhar facilmente sua história, projeto ou causa.</p>

                <div class="d-flex align-items-center mt-4">
                 
               
                </div>
                <p> Nosso objetivo é ajudá-lo a alcançar o máximo de apoio possível para sua causa, seja por meio de mensagens de texto ou redes sociais. Junte-se a nós como voluntário e apoie as causas que mais importam para você.</p>

                <div class="d-flex align-items-center mt-4">
                 
                </div>
                <p> Cada pequena contribuição faz a diferença. Faça sua doação aqui - lembre-se, o que pode parecer pouco para você pode significar muito para quem precisa..</p>
                <p> Juntos, podemos fazer um impacto positivo significativo...</p>

              </div><!-- End Tab 1 Content -->


            </div>

          </div>

        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= On Focus Section ======= -->
    <section id="onfocus" class="onfocus">
      <div class="container-fluid p-0" data-aos="fade-up">

        <div class="row g-0">
          <div class="col-lg-6 video-play position-relative">
            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
          </div>
          <div class="col-lg-6">
            <div class="content d-flex flex-column justify-content-center h-100">
              <h3>Voluptatem dignissimos provident quasi corporis</h3>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
              </ul>
              <a href="#" class="read-more align-self-start"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End On Focus Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">
        <h1 class="py-5 text-white">Doações Em Destaque</h1>

        <div class="testimonials-slider swiper">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                
                <p class="text-black">
                  <i class="bi bi-quote quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="imag-card">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                </div>
                
                <h3>Jena Karlis</h3>
              
                <div class="content-card"><p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p></div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
               
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
               
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
               
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content px-xl-5">
              <h3>Perguntas  <strong>Frequentes</strong></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            </div>

            <div class="accordion accordion-flush px-xl-5" id="faqlist">

              <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    <i class="bi bi-question-circle question-icon"></i>
                    Que tipos de itens eu posso doar?
                  </button>
                </h3>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    <i class="bi bi-question-circle question-icon"></i>
                    Como faço para receber o dinheiro arregacadado?
                  </button>
                </h3>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
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
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    <i class="bi bi-question-circle question-icon"></i>
                    Alguém pode criar uma campanha para mim?
                  </button>
                </h3>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    <i class="bi bi-question-circle question-icon"></i>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                    <i class="bi bi-question-circle question-icon"></i>
                    Como funciona o processo de entrega?
                  </button>
                </h3>
                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                  </div>
                </div>
              </div><!-- # Faq item-->

            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/faq.jpg");'>&nbsp;</div>
        </div>

      </div>
    </section><!-- End F.A.Q Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Campanhas</h2>
          <p>Postadas recentemente</p>
        </div>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="post-box">
              <div class="post-img"><img src="assets/img/blog/blog-1.jpg" class="img-fluid" alt=""></div>
              <div class="meta">
                <span class="post-date">Tue, December 12</span>
                <span class="post-author"> / Julia Parker</span>
              </div>
              <h3 class="post-title">Doações de Alimento</h3>
              <p>Produtos embalados e fechados com DLC (data de validade)
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
                Suplemento alimentar...</p>
              <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="post-box">
              <div class="post-img"><img src="assets/img/blog/blog-2.jpg" class="img-fluid" alt=""></div>
              <div class="meta">
                <span class="post-date">Fri, September 05</span>
                <span class="post-author"> / Mario Douglas</span>
              </div>
              <h3 class="post-title">Et repellendus molestiae qui est sed omnis voluptates magnam</h3>
              <p>Voluptatem nesciunt omnis libero autem tempora enim ut ipsam id. Odit quia ab eum assumenda. Quisquam omnis aliquid necessitatibus tempora consectetur doloribus...</p>
              <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="600">
            <div class="post-box">
              <div class="post-img"><img src="assets/img/blog/blog-3.jpg" class="img-fluid" alt=""></div>
              <div class="meta">
                <span class="post-date">Tue, July 27</span>
                <span class="post-author"> / Lisa Hunter</span>
              </div>
              <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
              <p>Quia nam eaque omnis explicabo similique eum quaerat similique laboriosam. Quis omnis repellat sed quae consectetur magnam veritatis dicta nihil...</p>
              <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Recent Blog Posts Section -->
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services py-5" class="featured-services">
      <div class="container">

          <div class="row gy-4 py-5">

              <h3 class="ganho">O que eu ganho sendo voluntário?</h3>

              <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
                  <div class="service-item position-relative">
                      <div class="icon"><i class="bi bi-activity icon"></i></div>
                      <h4><a href="" class="stretched-link text-center">Desenvolvimento</a></h4>
                      <p>de habilidades</p>
                  </div>
              </div><!-- End Service Item -->

              <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
                  <div class="service-item position-relative">
                      <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                      <h4><a href="" class="stretched-link text-center">CONEXÃO</a></h4>
                      <p class="text-center">Com outras histórias de vida</p>
                  </div>
              </div><!-- End Service Item -->

              <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
                  <div class="service-item position-relative">
                      <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                      <h4><a href="" class="stretched-link text-center">Conhecimento</a></h4>
                      <p></p>
                  </div>
              </div><!-- End Service Item -->

              <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                  <div class="service-item position-relative">
                      <div class="icon"><i class="bi bi-broadcast icon"></i></div>
                      <h4><a href="" class="stretched-link text-center">Trocas</a></h4>
                      <p>e novas perpectivas de experiências de vida</p>
                  </div>
              </div><!-- End Service Item -->

          </div>

      </div>
  </section>
  
  <!-- End Featured Services Section -->

  <section class="banner-description py-5" style="background-image: url('assets/img/voluntario-bk.jpg')">
      <div class="container">

          <div class="row gy-5 gx-lg-5">

              <div class="col-lg-12">

                  <div class="section-header">
                      <h2>Seja um Voluntário</h2>
                      <p>O voluntariado é sobre troca de experiência, conhecimento, serviço, apoio, carinho, amor,
                          existindo um ganho não apenas para a organização, mas também para o voluntário. É uma
                          experiência para todes - independe de gênero, raça ou etnia - que permite conhecer novas
                          realidades, se engajar em uma causa social, contribuir com suas habilidades, e até mesmo
                          desenvolver novas competências...</p>
                  </div>
              </div>
          </div>

      </div>

  </section>
    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-header">
          <h2>Sejá um Voluntário</h2>
          <p>Transforme a Compaixão em Ação. Sua Habilidade pode ser o Presente que Muda o Mundo!</p>
        </div>

      </div>
    </section>
    
    <!-- End Contact Section -->

  </main><!-- End #main -->
  @endsection