<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- Calling Tailwindcss with Vite --}}
  @vite('resources/css/app.css')

  {{-- Font Awesome CDN --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  {{-- <link rel="shortcut icon" href="{{ asset('images/logo/nisuma-icon.png') }}" type="image/x-icon"> --}}
  <title>Recruitment BCAinsurance</title>
</head>
<body>

    {{-- Header --}}
    @include('layout.global.navbar')

    {{-- Website Content --}}
    @yield('content')
    
    {{-- Footer --}}
    @include('layout.global.footer')

    {{-- Jquery CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>