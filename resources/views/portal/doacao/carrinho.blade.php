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
                            <tbody id="cart-items">
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

                @if (!empty($cart))
                    <div class="mt-5">
                    <h4> FACTURAÇÃO E ENVIO</h4>
                    <br>
                    </div>
                    <form action="{{ route('checkout.process') }}" method="POST" id="checkoutprocess">
                        @csrf
                        <div class="row g-4 justify-content-end">
                            <div class="col-8">
                            
                            
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="first_name" class="form-label">Nome</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', 'Rosimeuri Borges') }}" required>
                                            @error('first_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="last_name" class="form-label">Sobrenome</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}">
                                            @error('last_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="company" class="form-label">Empresa</label>
                                            <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}">
                                            @error('company')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="address_1" class="form-label">Endereço</label>
                                            <input type="text" class="form-control" id="address_1" name="address_1" placeholder="Mangueirinhas, R. dos Generais, Luanda" value="{{ old('address_1') }}" required>
                                            @error('address_1')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="city" class="form-label">Cidade</label>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="Luanda" value="{{ old('city') }}" required>
                                            @error('city')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="country" class="form-label">País</label>
                                            <input type="text" class="form-control" id="country" name="country" placeholder="Angola" value="{{ old('country') }}" required>
                                            @error('country')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', 'nimeuri@hotmail.com') }}" required>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone" class="form-label">Telefone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', '999 123 123') }}" required>
                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                            

                            </div>
                            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                                <div class="bg-light rounded">
                                    <div class="p-4">
                                        <h1 class="display-6 mb-4">Total <span class="fw-normal">do carrinho</span></h1>
                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="mb-0 me-4">Subtotal:</h5>
                                            <p class="mb-0" id="subtotal">Kz 0,00</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h5 class="mb-0 me-4">Envio</h5>
                                            <div class="">
                                                <p class="mb-0" id="envio">Kz 2.555,52</p>
                                            </div>
                                        </div>
                                        <p class="mb-0 text-end" id="enviar_para"></p>
                                    </div>
                                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                        <h5 class="mb-0 ps-4 me-4">Total</h5>
                                        <p class="mb-0 pe-4" id="total">Kz 0,00</p>
                                    </div>
                                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="submit" >Finalizar Compra</button>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                @endif
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
        
        function submitForm() {
            // Submete o formulário
            document.getElementById("checkoutprocess").submit();
        }

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
            updateSubTotal()
            $('#address_1').on('input blur', function() {
                $('#enviar_para').text($('#address_1').val() )
            });
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
