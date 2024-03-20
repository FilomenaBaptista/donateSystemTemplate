<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Doação</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        
        <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/variables.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">

        <title>@yield('title', 'Nome do Projeto')</title>
        @yield('css')


    </head>

    <body>

        @include('layouts.header')

        <main>
            @yield('content')
        </main>


        <!-- Rodapé do site -->
        @include('layouts.footer')

        <!-- Adicione os scripts JavaScript aqui -->
        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
        <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
        <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
        <!-- Template Main JS File -->
        <script src="{{asset('assets/js/main.js')}}"></script>

        @yield('js')
    </body>

</html>
