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
                        <li>Loja</li>
                        <li><a href="{{ route('cart.index') }}">Carrinho</a></li>
                    </ol>
                </div>

            </div>
        </div>
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

            @if (session()->has('error'))
                <div id="flash_error" class="alert alert-danger alert-dismissible" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <strong>{{ session()->get('error') }}</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

        <section id="shop" class="shop">

        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite">
            <div class="container py-5">
                <h1 class="mb-4">Todos os produtos</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Categories</h4>
                                            <ul class="list-unstyled fruite-categorie">
                                                @forelse ($products as $product)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>{{$product['categories'][0]['name']}}</a>
                                                        <span>(3)</span>
                                                    </div>
                                                </li>
                                                @empty
                                                <h1 style=" margin-top: 300px;text-align: center;color: #0EA2BD;">Nenhuma Produto disponível
                                                </h1>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4 class="mb-2">Preço</h4>
                                            <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="500" value="0" oninput="amount.value=rangeInput.value">
                                            <output id="amount" name="amount" min-velue="0" max-value="500" for="rangeInput">0</output>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h4 class="mb-3">Produtos em Destaque </h4>
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                <img src="assets/img/maca.jpg" class="img-fluid rounded" alt="">
                                            </div>
                                            <div>
                                                <h6 class="mb-2">Maçã</h6>
                                                <div class="d-flex mb-2">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h5 class="fw-bold me-2">1.500,00 Kz</h5>
                                                    <h5 class="text-danger text-decoration-line-through">2.000,00 Kz</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                <img src="assets/img/laranjas.jpg" class="img-fluid rounded" alt="">
                                            </div>
                                            <div>
                                                <h6 class="mb-2">Laranja</h6>
                                                <div class="d-flex mb-2">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h5 class="fw-bold me-2">1.800,00 Kz</h5>
                                                    <h5 class="text-danger text-decoration-line-through">800,00 Kz</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                <img src="assets/img/bana.jfif" class="img-fluid rounded" alt="">
                                            </div>
                                            <div>
                                                <h6 class="mb-2">Banana</h6>
                                                <div class="d-flex mb-2">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h5 class="fw-bold me-2">700,00 Kz</h5>
                                                    <h5 class="text-danger text-decoration-line-through">5,00 Kz</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center my-4">
                                            <a href="#" class="btn border px-4 py-3 rounded-pill text-primary w-100">Ver Mais</a>
                                        </div>
                                    </div>
                                                                  </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center">
                                    @forelse ($products as $product)
                                        <div class="col-md-6 col-lg-6 col-xl-4" id="{{$product['id']}}">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{$product['images'][0]['src']}}" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                <div class="text-white px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{$product['categories'][0]['name']}}</div>
                                                <div class="p-4 border  border-top-0 rounded-bottom">
                                                    <h4>{{$product['name']}}</h4>
                                                    <p>
                                                        <a href="{{ route('shopdetail', $product['id']) }}">
                                                            {!!Str::limit( $product['description'], 83)!!}
                                                        </a>
                                                    </p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Kz {{ number_format($product['price'], 2, ',', '.') }} / kg</p>
                                                        <form action="{{ route('cart.store') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{$product['id']}}">
                                                            <input type="hidden" name="name" value="{{$product['name']}}">
                                                            <input type="hidden" name="price" value="{{$product['price']}}">
                                                            <input type="hidden" name="image" value="{{$product['images'][0]['src']}}">
                                                            <button type="submit" class="btn border rounded-pill px-3 text-primary">
                                                                <i class="bi bi-bag-check-fill me-2 text-primary"></i>Adicionar ao carrinho
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    <h1 style=" margin-top: 300px;text-align: center;color: #0EA2BD;">Nenhuma Produto disponível
                                    </h1>
                                    @endforelse
                                </div>
                                   {{--  <div class="col-12">
                                        <div class="pagination d-flex justify-content-center mt-5">
                                            <a href="#" class="rounded">&laquo;</a>
                                            <a href="#" class="active rounded">1</a>
                                            <a href="#" class="rounded">2</a>
                                            <a href="#" class="rounded">3</a>
                                            <a href="#" class="rounded">4</a>
                                            <a href="#" class="rounded">5</a>
                                            <a href="#" class="rounded">6</a>
                                            <a href="#" class="rounded">&raquo;</a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->
    </section>
    </main><!-- End #main -->
@endsection

@section('js')

@endsection
