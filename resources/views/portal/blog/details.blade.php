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
                        <li><a href="{{ route('campanha.show', $campanha->id) }}">Detalhes da campanha</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Details Section ======= -->
        <section class="featured-services container">
            @if (session()->has('mensagem'))
                <div id="flash_message" class="alert alert-success alert-dismissible" role="alert" aria-live="assertive"
                    aria-atomic="true">
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
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="blog-details.html">{{ $campanha->criador->name }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="blog-details.html"><time
                                                datetime="2020-01-01">{{ $campanha->created_at->format('M d,  Y') }}</time></a>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                            href="blog-details.html"> {{ $campanha->comentarios->count() }} Comentários</a>
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
                                    <a class="btn-edit bg-danger" href="{{ route('campanha.destroy', $campanha->id) }}">
                                        <i class="bi bi-trash-fill"></i> Deletar
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

                                            <h5><a href="">{{ $comentario->criador->name }}</a> <a href="#"
                                                    class="reply"><i class="bi bi-reply-fill"></i> Responder</a></h5>
                                            <time
                                                datetime="2020-01-01">{{ $comentario->created_at->format('M d,  Y') }}</time>
                                            <p>
                                                {{ $comentario->conteudo }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse

                            @auth
                                <div class="reply-form">

                                    <h4>Adicionar Comentário</h4>

                                    <form action="/comentarios" method="POST">
                                        @csrf
                                        <input type="hidden" value="Campanha" name="tipo">
                                        <input type="hidden" value="{{ $campanha->id }}" name="id">
                                            <div class="row">
                                                <div class="col form-group">
                                                    <textarea name="conteudo" class="form-control" placeholder="Seu Commentário*"></textarea>

                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Comentar</button>

                                    </form>
                                </div>
                            @endauth
                        </div>

                    </div>
                    
                    
                    <div class="col-lg-4">

                        <div class="sidebar">
                            <div class="sidebar-item search-form">
                                <h3 class="sidebar-title">30.000 kz Arrecadados da Meta 345.000kz</h3>
    
                            </div><!-- End sidebar search formn-->
                            <div class="progress mt-3">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
    
                            <span class="qtd_doacoes_view">4,5K doações</span>
                            <div class="botao-doar py-3">
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Doar Agora
                                </button>
    
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
    
    
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
    
                                            <div class="modal-body">
                                                <section class="donation-money">
                                                    <div class=" container tab-pane" id="tab-2">
                                                        <div class="row gy-4">
                                                            <div class="col-lg-12">
                                                                    role="form" class="php-email-form">
                                                                    <div class="post-img-pagamento">
                                                                        <img src="{{ $campanha->imagem }}" alt=""
                                                                            class="img-fluid">
                                                                    </div>
                                                                    <h5>Você está apoiando a Campanha:
                                                                        {{ $campanha->titulo }}</h5>
                                                                    <p> Sua doação beneficiará: {{ $campanha->criador->name }}</p>
                                                
                                                                    <div class="formas-de-pagamento">
                                                                        <form action="{{route('campanha.efectuarDoacao')}}"  method="POST" id="payment-form">
                                                                            @csrf
                                                                            <div class="col-md-12 input-group mb-3 mt-3 mt-md-0 p-0">
                                                                                <span class="input-group-text">AKZ</span>
                                                                                <input type="text" id="qtd_doar" name="qtd_doar"
                                                                                    placeholder="Quantidade a doar"
                                                                                    value="{{ old('qtd_doar') }}"
                                                                                    class="form-control"
                                                                                    aria-label="Amount (to the nearest dollar)">
                                                                                <span class="input-group-text">.00</span>
            
                                                                            </div>
                                                                            <p> Forma de pagamento</p>
                                                                            <div class="accordion" id="accordionExample">
                                                                                <div class="accordion-item">
                                                                                    <h2 class="accordion-header"
                                                                                        id="headingOne">
                                                                                        <button class="accordion-button ml-2"
                                                                                            type="button"
                                                                                            data-bs-toggle="collapse"
                                                                                            data-bs-target="#collapseOne"
                                                                                            aria-expanded="true"
                                                                                            aria-controls="collapseOne"
                                                                                            onclick="selectRadio('flexRadioDefault1')"><input
                                                                                                class="form-check-input"
                                                                                                type="radio"
                                                                                                name="flexRadioDefault"
                                                                                                id="flexRadioDefault1"
                                                                                                value="Transferência Bancária">
                                                                                            Transferência Bancária
                                                                                        </button>
                                                                                    </h2>
                                                                                    <div id="collapseOne"
                                                                                        class="accordion-collapse collapse"
                                                                                        aria-labelledby="headingOne"
                                                                                        data-bs-parent="#accordionExample">
                                                                                        <div class="accordion-body">
                                                                                            <strong class="mb-2">Nome do
                                                                                                Beneficiário.</strong>
                                                                                            AO06004400006729503010102 .
                                                                                            <label class="mt-2"
                                                                                                for="">Anexar
                                                                                                comprovativo</label>
                                                                                            <input type="file"
                                                                                                class="form-control"
                                                                                                id="customFile" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                               
                                                                               
                                                                                <div class="accordion-item">
                                                                                    <h2 class="accordion-header"
                                                                                        id="headingTwo">
                                                                                        <button
                                                                                            class="accordion-button ml-2 collapsed"
                                                                                            type="button"
                                                                                            data-bs-toggle="collapse"
                                                                                            data-bs-target="#collapseTwo"
                                                                                            aria-expanded="false"
                                                                                            aria-controls="collapseTwo"
                                                                                            onclick="selectRadio('flexRadioDefault2')"><input
                                                                                                class="form-check-input"
                                                                                                type="radio"
                                                                                                name="flexRadioDefault"
                                                                                                id="flexRadioDefault2"
                                                                                                value="Transferência Express">
                                                                                            Transferência Express
                                                                                        </button>
                                                                                    </h2>
                                                                                    <div id="collapseTwo"
                                                                                        class="accordion-collapse collapse"
                                                                                        aria-labelledby="headingTwo"
                                                                                        data-bs-parent="#accordionExample">
                                                                                        <div class="accordion-body">
                                                                                            <strong>Número do
                                                                                                Benficiario.</strong>922 56 78
                                                                                            98
    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="accordion-item">
                                                                                    <h2 class="accordion-header"
                                                                                        id="headingTree">
                                                                                        <button
                                                                                            class="accordion-button collapsed"
                                                                                            type="button"
                                                                                            data-bs-toggle="collapse"
                                                                                            data-bs-target="#collapseTree"
                                                                                            aria-expanded="false"
                                                                                            aria-controls="collapseTree"
                                                                                            onclick="selectRadio('flexRadioDefault3')"><input
                                                                                                class="form-check-input mr-2"
                                                                                                type="radio"
                                                                                                name="flexRadioDefault"
                                                                                                id="flexRadioDefault3"
                                                                                                value="Cartão">
                                                                                            Cartão
                                                                                        </button>
                                                                                    </h2>
                                                                                    <div id="collapseTree"
                                                                                        class="accordion-collapse collapse"
                                                                                        aria-labelledby="headingTree"
                                                                                        data-bs-parent="#accordionExample">
                                                                                        <div class="accordion-body">
                                                                                            <div class="form-group">
                                                                                                <label for="card_number">Número do Cartão</label>
                                                                                                <input type="text" name="card_number" id="card_number" class="form-control" minlength="16" maxlength="16">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="card_expiry">Validade (MM/AA)</label>
                                                                                                <input type="text" name="card_expiry" id="card_expiry" class="form-control" minlength="5" maxlength="5">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="cvv">CVV</label>
                                                                                                <input type="text" name="cvv" id="cvv" class="form-control" minlength="3" maxlength="4">
                                                                                            </div>
    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
    
                                                                            </div>
                                                                            <div class="modal-footer mt-4">
                                                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                                                                <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">Cancelar</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                   
                                                                    
    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End sidebar categories-->
    
                            <div class="share-link mb-3">
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}&text=Confira%20este%20site"
                                    target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}"
                                    class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="https://www.instagram.com/?url={{ urlencode(Request::url()) }}" class="instagram"><i
                                        class="bi bi-instagram"></i></a>
                                <a href="https://plus.google.com/share?url={{ urlencode(Request::url()) }}"
                                    class="google-plus"><i class="bi bi-skype"></i></a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(Request::url()) }}&title=Confira%20este%20site"
                                    target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
    
                            <div class="sidebar-item recent-doacoes">
                                <i class="bi bi-graph-up"></i>
                                <strong class="sidebar-title">4,3K pessoas acabaram de doar</strong>
                            </div>
    
                            <div class="sidebar-item recent-posts">
                                <h3 class="sidebar-title">Publicações Recentes</h3>
                                <div class="mt-3 campanhasRecentes"></div>
                            </div>
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
        function selectRadio(radioId) {
            document.getElementById(radioId).checked = true;
            updateCardFields();
        }
        function updateCardFields() {
            const cardFields = ['card_number', 'card_expiry', 'cvv'];
            const isCardSelected = document.getElementById('flexRadioDefault3').checked;
            cardFields.forEach(field => {
                document.getElementById(field).required = isCardSelected;
                document.getElementById(field).disabled = !isCardSelected;
            });
        }
        function validateForm(event) {
            const paymentMethods = document.getElementsByName('flexRadioDefault');
            let isMethodSelected = false;
            paymentMethods.forEach(method => {
                if (method.checked) {
                    isMethodSelected = true;
                }
            });

            if (!isMethodSelected) {
                event.preventDefault();
                alert('Por favor, selecione um método de pagamento.');
            }
        }
        $(document).ready(function() {
            var dados = {
                route: "{{ route('campanha.show', 0) }}",
                limit: 5,
                excepto_id: "{{ $campanha->id }}"
            };
            campanhaRecentes(dados)
            // Adicionar eventos change para os rádios
            document.getElementById('flexRadioDefault1').addEventListener('change', updateCardFields);
            document.getElementById('flexRadioDefault2').addEventListener('change', updateCardFields);
            document.getElementById('flexRadioDefault3').addEventListener('change', updateCardFields);
            document.getElementById('payment-form').addEventListener('submit', validateForm);

            updateCardFields();
        });
    </script>
@endsection
