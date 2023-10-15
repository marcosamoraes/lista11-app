<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Achei16">

    <title>{{ config('app.name', 'Achei 16') }} - @yield('title')</title>

    @hasSection('description')
        <meta name="description" content="@yield('description')">
    @else
        <meta name="description" content="Guia de empresas em Ribeirão Preto/SP - http://www.achei16.com.br">
    @endif

    @hasSection('abstract')
        <meta name="abstract" content="@yield('abstract')">
    @else
        <meta name="abstract" content="guia, hotel, restaurante, empresas em Ribeirão Preto/SP.">
    @endif

    @hasSection('keywords')
        <meta name="keywords" content="@yield('keywords')">
    @else
        <meta name="keywords"
            content="hotel em Ribeirão Preto, achei 16, restaurante, academia, veículos, bar, som automotivo, restaurante em ribeirão preto, cinema, o que fazer em Ribeirão Preto, lojas,  ">
    @endif

    @hasSection('image')
        <meta property="og:image" content="@yield('image')">
    @else
        <meta property="og:image" content="/img/logo.webp">
    @endif

    <!-- Favicons-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="favicon.ico">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="favicon.ico">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="favicon.ico">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="favicon.ico">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- BASE CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css?v=2" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="/css/custom.css?v=2" rel="stylesheet">
</head>

<body>
    @include('sweetalert::alert')

    @include('components.header')

    @yield('content')

    @include('components.footer')

    <div id="toTop"></div><!-- Back to top button -->

    <div class="layer"></div><!-- Opacity Mask Menu Mobile -->

    <!-- COMMON SCRIPTS -->
    <script src="/js/common_scripts.min.js"></script>
    <script src="/js/common_func.js"></script>
    <script src="/assets/validate.js"></script>

    @stack('scripts')
</body>

</html>
