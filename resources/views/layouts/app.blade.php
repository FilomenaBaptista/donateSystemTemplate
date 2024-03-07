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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{'assets/vendor/bootstrap/css/bootstrap.min.css'}}" rel="stylesheet">
        <link href="{{'assets/vendor/aos/aos.css'}}" rel="stylesheet">
        <link href="{{'assets/vendor/glightbox/css/glightbox.min.css'}}" rel="stylesheet">
        <link href="{{'assets/vendor/swiper/swiper-bundle.min.css'}}" rel="stylesheet">
        <link href="{{'assets/css/variables.css'}}" rel="stylesheet">
        <link href="{{'assets/css/main.css'}}" rel="stylesheet">
        
        

       {{--  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <link href="assets/css/variables.css" rel="stylesheet">
        <link href="assets/css/main.css" rel="stylesheet"> --}}

        <title>@yield('title', 'Nome do Projeto')</title>
        @yield('css')

    </head>

    <body>
        {{-- <header>
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">Sobre</a></li>
                </ul>
            </nav>
        </header> --}}
        @include('layouts.header')

        <main>
            @yield('content')
        </main>


        <!-- Rodapé do site -->
        @include('layouts.footer')

        <!-- Adicione os scripts JavaScript aqui -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
    </body>

</html>
