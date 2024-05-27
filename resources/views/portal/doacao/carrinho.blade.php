@extends('layouts.app')

@section('content')
    <style>
        ul.pagination {
            justify-content: center;
        }
        .py-5 {
            padding-top: 0 !important;
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
                        <li><a href="{{ route('shop') }}">Loja</a></li>
                        <li>Carrinho</li>
                    </ol>
                </div>

            </div>
        </div>


        <section id="shop-detail" class="shop-detail">

           <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                @if (empty($cart))
                    <h1 style="text-align: center;color: #0EA2BD;">Seu carrinho está vazio.
                    </h1>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Produtos</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Quantidae</th>
                                <th scope="col">Total</th>
                                <th scope="col">Excluir</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                    <tr id="{{$item['product_id']}}" 
                                        data-product-id="{{$item['product_id']}}"
                                        data-product-name="{{ $item['name'] }}" 
                                        data-product-price="{{$item['price']}}" 
                                        data-product-image="{{ $item['image'] }}"
                                    >
                                        <th scope="row">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $item['image'] }}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="{{ $item['name'] }}">
                                            </div>
                                        </th>
                                        <td>
                                            <p class="mb-0 mt-4">{{ $item['name'] }}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0 mt-4">Kz {{ number_format($item['price'], 2, ',', '.') }}</p>
                                        </td>
                                        <td>
                                            <div class="input-group quantity mt-4" style="width: 100px;">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                                    <i class="bi bi-dash-lg"></i>
                                                    </button>
                                                </div>
                                                <input type="text" class="form-control form-control-sm text-center border-0" value="{{ $item['quantity'] }}" id="quantity-{{$item['product_id']}}">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-sm btn-
                                                    rounded-circle bg-light border">
                                                        <i class="bi bi-plus-lg"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 mt-4" id="total-{{$item['product_id']}}"> Kz {{ number_format(($item['price'] * $item['quantity']), 2, ',', '.') }}</p>
                                        </td>
                                        <td>
                                            <form action="{{ route('cart.destroy', $item['product_id']) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-md rounded-circle bg-light border mt-4" >
                                                    <i class="bi bi-x text-danger"></i>
                                                </button>
                                            </form>
                                        </td>
                                    
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <div class="mt-5">
                    <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
                </div>
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p class="mb-0">$96.00</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Envio</h5>
                                    <div class="">
                                        <p class="mb-0">Flat rate: $3.00</p>
                                    </div>
                                </div>
                                <p class="mb-0 text-end">Shipping to Ukraine.</p>
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                                <p class="mb-0 pe-4">$99.00</p>
                            </div>
                            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->
        </section>
        <!-- Fruits Shop End-->

    </main><!-- End #main -->
@endsection

@section('js')
    <script src="{{ asset('js/util.js') }}"></script>
    <script>
        function addRemItemCarrinho(button, action){
            const productElement = button.closest('[data-product-id]');
            const productId = productElement.getAttribute('data-product-id');
            const productName = productElement.getAttribute('data-product-name');
            const productPrice = productElement.getAttribute('data-product-price');
            const productImage = productElement.getAttribute('data-product-image');
            // Cria um objeto do produto
            const dados = {
                product_id: productId,
                name: productName,
                price: productPrice,
                image: productImage,
                via: 'ajax',
                action: action
            };
            return dados;
        }
    document.addEventListener('DOMContentLoaded', function() {
        // Seleciona todos os botões de adicionar ao carrinho
        const addToCartButtons = document.querySelectorAll('.bi-plus-lg');
        // Seleciona todos os botões de reduzir ao carrinho
        const remToCartButtons = document.querySelectorAll('.bi-dash-lg');

        addToCartButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                addCart(addRemItemCarrinho(button, '+'))
            });
        });
        remToCartButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                let dados = addRemItemCarrinho(button, '-')
                if(parseInt( $("#quantity-" + dados.product_id).val()) > 1){
                    addCart(dados)
                }
            });
        });
    });
</script>

        
    </script>
@endsection
