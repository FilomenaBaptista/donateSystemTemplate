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
        <!-- Vendor CSS Files -->

        <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> 
      {{--   <link href="{{asset('css//bootstrap.4.4.1.min.css')}}" rel="stylesheet"> --}}
        <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/variables.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
        <link href="{{asset('css/my-style.css')}}" rel="stylesheet">

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
        <script>
           // $('#flash_message').fadeIn(3500, 'swing').delay(500).fadeOut(1000);
        </script> 
    </body>

</html>
