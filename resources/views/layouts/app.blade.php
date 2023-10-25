<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Lista 11 | Destacando sua empresa na internet.">
    <meta name=robots content="index, follow">

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
        <meta name="keywords" content="guia de empresas são paulo, apareça no google em são paulo, como aparecer no google, tour virtual google, desenvolvimento de site, marketing digital, gestão de redes sociais, divulgar empresa no google.">
    @endif

    @hasSection('image')
        <meta property="og:image" content="@yield('image')">
    @else
        <meta property="og:image" content="logo.webp">
    @endif

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('favicon.ico') }}">

    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/color.css') }}">
</head>

<body>
    <div id="alert-message"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var alert = document.getElementById('alert-message');
            var alertData = {!! json_encode(session('alert')) !!};

            if (alertData) {
                alert.innerHTML = '<div class="alert alert-' + alertData.type + '">' + alertData.message + '</div>';
                setTimeout(function() {
                    alert.innerHTML = '';
                }, 5000);
            }
        });
    </script>

    <style>
        .alert {
            padding: 10px;
            z-index: 99999999;
            margin-bottom: 10px;
            border: 1px solid transparent;
            border-radius: 4px;
            position: fixed;
            right: 15px;
            top: 15px;
            width: 350px;
            height: 50px;
            font-size: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-error {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
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

        <a href="#" class="to-top"><i class="fas fa-caret-up"></i></a>
    </div>
    <!-- Main end -->

    <link type="text/css" rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!--=============== scripts  ===============-->
    <script src="https://kit.fontawesome.com/411831a5a4.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    @stack('scripts')
</body>

</html>
