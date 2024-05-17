@extends('layouts.app')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Doações de Bens Materiais</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Solicitar Doação</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->
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
        <section class="donation-material py-5">
            <div class="tab-pane active show " id="tab-1">
                <div class="row gy-4">
                    <div class="col-lg-12 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">

                        <section id="contact" class="contact">
                            <div class="container">
                                @if (isset($doacao))
                                    {{ Form::model($doacao, ['route' => ['doar.update', $doacao->id], 'class' => 'form', 'method' => 'put']) }}
                                @else
                                    {!! Form::open(['route' => 'doar.store', 'class' => 'php-email-form', 'files' => 'true']) !!}
                                @endif


                                <div class="row gy-5 gx-lg-5">

                                    <div class="col-lg-4">

                                        <div class="info">
                                            <h3>Foto principal</h3>

                                            <div class="col-md-12 form-group mt-3 mt-md-0">
                                                <div class="col-md-12 form-group mt-3 mt-md-0">
                                                    {{ Form::hidden('imagem', null, ['class' => 'form-control', 'id' => 'imagem', 'readonly' => 'true']) }}
                                                    {{ Form::label('capa_legenda', 'Adicionar uma foto de capa*', ['class' => 'mb-2']) }}
                                                    @error('imagem')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="d-flex justify-content-center mb-4">
                                                        <img id="selectedAvatar" name="img_video"
                                                            src="@if (isset($campanha)) {{ $campanha->imagem }} 
                                                            @else 
                                                                @if (null !== old('imagem')) 
                                                                    {{ old('imagem') }} 
                                                                @else 
                                                                    {{ asset('img/placeholder-avatar.jpg') }} @endif 
                                                        @endif"
                                                            class="rounded-circle"
                                                            style="width: auto; height: 150px; object-fit: cover;"
                                                            alt="example placeholder" />
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="btn btn-rounded">
                                                            {{ Form::label('capa', 'Escolher Imagem', ['class' => 'form-label text-white m-1']) }}

                                                            <input type="file" name="capa" class="form-control d-none"
                                                                id="capa"
                                                                onchange="displaySelectedImage(event, 'selectedAvatar')" />
                                                        </div>
                                                    </div>

                                                </div>

                                            </div><!-- End Info Item -->
                                        </div>

                                    </div>

                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col">
                                                {{ Form::text('anuncio', null, [
                                                    'class' => 'form-control',
                                                    'required' => '',
                                                    'minlength' => '10',
                                                    'id' => 'anuncio',
                                                    'placeholder' => 'Titulo do Anúncio',
                                                ]) }}
                                                @error('anuncio')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                {{ Form::select('categoria_id', $categorias, null, [
                                                    'class' => 'form-select',
                                                    'required' => '',
                                                    'id' => 'categoria_id',
                                                    'placeholder' => 'Selecione a Categoria',
                                                ]) }}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                {{ Form::number('qtd_itens_doar', null, [
                                                    'class' => 'form-control',
                                                    'min' => '0',
                                                    'id' => 'qtd_itens_doar',
                                                    'placeholder' => 'Quantidade de itens a doar',
                                                ]) }}
                                            </div>
                                            <div class="col">
                                                {{ Form::text('local', null, [
                                                    'class' => 'form-control',
                                                    'required' => '',
                                                    'minlength' => '10',
                                                    'id' => 'local',
                                                    'placeholder' => 'Local da Doação',
                                                ]) }}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <select class="form-select" aria-label="Default select example"
                                                    name="estado_artigo" id="estado_artigo" value="{{ old('estado') }}">
                                                    <option selected>Estado da doação</option>
                                                    <option value="1">Muito boa condição</option>
                                                    <option value="2">Estado médio</option>
                                                    <option value="3">Mal estado</option>
                                                    <option value="3">Não definível</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label class="label-text mt-2" for="">Doador Anónimo?</label>
                                                <div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="is_anonimo"
                                                            id="is_anonimo" value="1"
                                                            @if (old('is_anonimo') == '1') checked @endif>
                                                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="is_anonimo"
                                                            id="is_anonimo" value="0"
                                                            @if (old('is_anonimo') == '0') checked @endif>
                                                        <label class="form-check-label" for="inlineRadio2">Não</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="mt-1 mb-3 text-bold">Descricação</label>
                                                <textarea class="form-control" name="descricao" id="descricao" name="message"
                                                    placeholder="Oi meu nome é Ana, estou arrecadando fundos para..." required>{{ old('descrica') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-12 form-group">

                                                {{ Form::button('Submeter para Aprovação', ['type' => 'submit', 'class' => 'mr-2']) }}
                                                {{ Form::button('Publicar Doação', ['type' => 'submit']) }}
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div><!-- End Contact Form -->
                                </div>
                            </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div><!-- End Tab Content 1 -->

        </section>
    </main><!-- End #main -->
@endsection

@section('js')
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    {{--  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script>
        $('#descricao').summernote({
            placeholder: 'Faça uma descrição sobre a doação',
            tabsize: 2,
            height: 150
        });
    </script>
@endsection
