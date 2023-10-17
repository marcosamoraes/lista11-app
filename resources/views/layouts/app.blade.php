<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Lista11">

    <title>{{ config('app.name', 'Lista 11') }} - @yield('title')</title>

    @hasSection('description')
        <meta name="description" content="@yield('description')">
    @else
        <meta name="description" content="Guia de empresas">
    @endif

    @hasSection('abstract')
        <meta name="abstract" content="@yield('abstract')">
    @else
        <meta name="abstract" content="guia, hotel, restaurante, empresas.">
    @endif

    @hasSection('keywords')
        <meta name="keywords" content="@yield('keywords')">
    @else
        <meta name="keywords" content="hotel, achei 16, restaurante, academia, veículos, bar, som automotivo, restaurante em ribeirão preto, cinema, o que fazer, lojas">
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

    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/plugins.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/color.css">
</head>

<body>
    @include('sweetalert::alert')
    <!--loader-->
    <div class="loader-wrap">
        <div class="loader-inner">
            <div class="loader-inner-cirle"></div>
        </div>
    </div>
    <!--loader end-->
    <!-- main start  -->
    <div id="main">
        @include('components.header')

        <!-- wrapper-->
        <div id="wrapper">
            @yield('content')
        </div>
        <!-- wrapper end-->

        @include('components.footer')

        <a class="to-top"><i class="fas fa-caret-up"></i></a>
    </div>
    <!-- Main end -->

    <!--=============== scripts  ===============-->
    <script src="js/jquery.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY_HERE&libraries=places&callback=initAutocomplete"></script>
    <script src="js/map-single.js"></script>

    @stack('scripts')
</body>

</html>
