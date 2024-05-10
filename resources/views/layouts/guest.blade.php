<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div class="logo-login">
                <img class="img-logo" src="{{ asset('assets/img/logo.png') }}" alt="KuKurisa">
            </div>
            {{ $slot }}
        </div>
    </div>
</body>

</html>

<style>
    .img-logo {
        height: auto;
        width: 255px;
        margin-bottom: 20px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .w-full.sm\:max-w-md.mt-6.px-6.py-4.bg-white.dark\:bg-gray-800.shadow-md.overflow-hidden.sm\:rounded-lg {
        padding: 60px;
    }

    button.inline-flex.items-center.px-4.py-2.bg-gray-800.dark\:bg-gray-200.border.border-transparent.rounded-md.font-semibold.text-xs.text-white.dark\:text-gray-800.uppercase.tracking-widest.hover\:bg-gray-700.dark\:hover\:bg-white.focus\:bg-gray-700.dark\:focus\:bg-white.active\:bg-gray-900.dark\:active\:bg-gray-300.focus\:outline-none.focus\:ring-2.focus\:ring-indigo-500.focus\:ring-offset-2.dark\:focus\:ring-offset-gray-800.transition.ease-in-out.duration-150.ms-3 {
        background: #21a0b7;
    }

    a.underline.text-sm.text-gray-600.dark\:text-gray-400.hover\:text-gray-900.dark\:hover\:text-gray-100.rounded-md.focus\:outline-none.focus\:ring-2.focus\:ring-offset-2.focus\:ring-indigo-500.dark\:focus\:ring-offset-gray-800 {
        color: #21a0b7;
    }
    .sm\:max-w-md {
        max-width: 34rem;
    }
    button.inline-flex.items-center.px-4.py-2.bg-gray-800.dark\:bg-gray-200.border.border-transparent.rounded-md.font-semibold.text-xs.text-white.dark\:text-gray-800.uppercase.tracking-widest.hover\:bg-gray-700.dark\:hover\:bg-white.focus\:bg-gray-700.dark\:focus\:bg-white.active\:bg-gray-900.dark\:active\:bg-gray-300.focus\:outline-none.focus\:ring-2.focus\:ring-indigo-500.focus\:ring-offset-2.dark\:focus\:ring-offset-gray-800.transition.ease-in-out.duration-150 {
        background: #21a0b7;
    }

    button.inline-flex.items-center.px-4.py-2.bg-gray-800.dark\:bg-gray-200.border.border-transparent.rounded-md.font-semibold.text-xs.text-white.dark\:text-gray-800.uppercase.tracking-widest.hover\:bg-gray-700.dark\:hover\:bg-white.focus\:bg-gray-700.dark\:focus\:bg-white.active\:bg-gray-900.dark\:active\:bg-gray-300.focus\:outline-none.focus\:ring-2.focus\:ring-indigo-500.focus\:ring-offset-2.dark\:focus\:ring-offset-gray-800.transition.ease-in-out.duration-150.ms-4 {
        background: #21a0b7;
    }
</style>
