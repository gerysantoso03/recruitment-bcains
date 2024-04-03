<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- Calling Tailwindcss with Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/flatpickr.css')

    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    {{-- CKEditor CDN --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

    {{-- Alpine JS CDN --}}
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

    {{-- <link rel="shortcut icon" href="{{ asset('images/logo/nisuma-icon.png') }}" type="image/x-icon"> --}}
    <title>Recruitment BCAinsurance</title>
</head>

<body class="flex soft-scrollbar">

    {{-- Navbar --}}
    @if (!(Route::currentRouteName() == 'login') && !(Route::currentRouteName() == 'register'))
        @include('layout.global.admin-sidebar')
    @endif
    <main class="flex flex-col w-full">
        @if (!(Route::currentRouteName() == 'login') && !(Route::currentRouteName() == 'register'))
            @include('layout.global.admin-navbar')
        @endif

        {{-- Website Content --}}
        @yield('content')
    </main>

    {{-- Livewire modal --}}
    @livewire('wire-elements-modal')
    {{-- Jquery CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite('resources/js/navbar.js')
</body>

</html>
