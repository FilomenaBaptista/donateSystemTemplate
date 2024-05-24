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
                    <h2>Solicitar Doação</h2>
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

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container" data-aos="fade-up">

                <div class="tab-content">

                    <div class="tab-pane active show" id="tab-1">
                        <div class="row gy-4">
                            <div class="col-lg-12 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">

                                <section id="contact" class="contact">
                                    <div class="container py-3 mb-4">

                                        <div class="container">

                                            <div class="row gy-5 gx-lg-5">
                                                <div class="col-lg-4">
                                                    @if (isset($campanha))
                                                    {{ Form::model($campanha, ['route' => ['campanha.update', $campanha->id], 'class' => 'form', 'method' => 'put']) }}
                                                @else
                                                    {!! Form::open(['route' => 'campanha.store', 'class' => 'php-email-form', 'files' => 'true']) !!}
                                                @endif

                                                    <div class="info">
                                                        <h3>Crie uma Campanha</h3>
                                                        <p>Para criar uma campanha siga os passos destritos a baixo, as campanhas passam por um processo de aprovação depois de serem submetidas.</p>
                                                        <div class="col-md-12 form-group mt-3 mt-md-0">
                                                            {{ Form::label('capa_legenda', 'Adicionar uma foto de capa para sua campanha*', ['class' => 'mb-2']) }}
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
    
                                                                    <input type="file" name="capa"
                                                                        class="form-control d-none" id="capa"
                                                                        onchange="displaySelectedImage(event, 'selectedAvatar')" />
                                                                </div>
                                                            </div>
    
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-lg-8">
                                                 

                                                   <div class="row">
                                                    <div class="col">
                                                        {{ Form::hidden('imagem', null, ['class' => 'form-control', 'id' => 'imagem', 'readonly' => 'true']) }}
                                                        {{ Form::label('titulo', 'Título da Campanha', ['class' => 'mb-2']) }}
                                                        @error('titulo')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        {{ Form::text('titulo', null, [
                                                            'class' => 'form-control',
                                                            'required' => '',
                                                            'minlength' => '10',
                                                            'id' => 'titulo',
                                                            'placeholder' => 'Comida para necessitados',
                                                        ]) }}
                                                    </div>
                                                    <div class="col">
                                                        {{ Form::label('categoria_id', 'Categoria', ['class' => 'mb-2 col-md-12']) }}
                                                        {{ Form::select('categoria_id', $categorias, null, [
                                                            'class' => 'form-control',
                                                            'required' => '',
                                                            'id' => 'categoria_id',
                                                            'placeholder' => 'Selecione a Categoria',
                                                        ]) }}
                                                    </div>
                                                   </div>

                                                    <div class="col-md-12 input-group mb-3 mt-3 mt-md-0">
                                                        {{ Form::label('quantia', 'Valor a arrecadar?', ['class' => 'mb-2 label-money']) }}
                                                        <span class="input-group-text">AKZ</span>
                                                        {{ Form::number('quantia', null, [
                                                            'class' => 'form-control',
                                                            'min' => '0',
                                                            'id' => 'quantia',
                                                            'placeholder' => '',
                                                        ]) }}<span
                                                            class="input-group-text">.00</span>
                                                    </div>
                                                  
                                                    <div class="form-group mt-3">
                                                        <label for="">Descricação*</label>
                                                        @error('descricao')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        {{--  @if ($errors->has('descricao'))
                                                        <span class="has-error">
                                                            {{ $errors->first('descricao') }}
                                                        </span>
                                                    @endif --}}
                                                        <textarea class="form-control" name="descricao" id="descricao" required>
@if (isset($campanha)) {!! $campanha->descricao !!}
@else
{{ old('descricao') }} @endif
</textarea>

                                                    </div>

                                                    <div class="mt-3">
                                                        {{ Form::button('Publicar campanha', ['type' => 'submit']) }}
                                                    </div>


                                                    {!! Form::close() !!}
                                                </div><!-- End Contact Form -->

                                            </div>

                                        </div>
                                </section>
                            </div>

                        </div><!-- End Tab Content 1 -->
                    </div>

                </div>
            </div><!-- End Breadcrumbs -->

            <!-- End Featured Services Section -->

            <!-- ======= Features Section ======= -->

        </section>
    </main><!-- End #main -->
@endsection



@section('js')
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
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
