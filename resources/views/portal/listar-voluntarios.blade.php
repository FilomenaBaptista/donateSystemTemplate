@extends('layouts.app')

@section('content')
<main>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Lista de Voluntários</h2>
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/voluntario') }}">Cadastrar Voluntário</a></li>
                </ol>
            </div>
        </div>
    </div><!-- End Breadcrumbs -->

    <section id="shop-detail" class="shop-detail">
        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Endereço</th>
                                <th scope="col">Profissão</th>
                                <th scope="col">Trabalhador</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($voluntarios as $voluntario)
                                <tr>
                                    <th scope="row">
                                        {{ $voluntario->id }}
                                    </th>
                                    <td>{{ $voluntario->nome_usuario }}</td>
                                    <td>{{ $voluntario->endereço }}</td>
                                    <td>{{ $voluntario->profissao }}</td>
                                    <td>{{ $voluntario->is_trabalhador }}</td>
                                    <td>{{ $voluntario->sobre }}</td>
                                    <td>
                                        <button class="btn bg-primary color-white">
                                            Contactar
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <h1 style="margin-top: 300px; text-align: center; color: #0EA2BD;">Nenhuma campanha disponível</h1>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->
    </section>
</main>
@endsection
