@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Seu Carrinho</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (empty($cart))
        <p>Seu carrinho está vazio.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $item)
                    <tr>
                        <td><img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" width="50"></td>
                        <td>{{ $item['name']}}</td> 
                        <td>Kz {{ number_format(floatval($item['price']), 2) }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>
                            <form action="{{ route('cart.destroy', $item['product_id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
