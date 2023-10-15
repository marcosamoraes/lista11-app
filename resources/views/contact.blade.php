@extends('layouts.app')

@section('title', 'Ribeirão Preto - Restaurante, hotel, bares, lojas, oficina, som e muito mais...')

@section('content')
    <main>
        <div class="hero_single inner_pages background-image" data-background="url(img/home_section_1.webp)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>Contato</h1>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
        </div>
        <!-- /hero_single -->

        <div class="container margin_60_40">
            <h5 class="mb_5">Deixe uma mensagem</h5>
            <div class="row">
                <div class="col-12 add_bottom_25">
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Nome Completo" id="name"
                                name="name">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="email" placeholder="E-mail" id="email"
                                name="email">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Whatsapp" id="whatsapp"
                                name="whatsapp">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" style="height: 150px;" placeholder="Mensagem" id="message"
                                name="message"></textarea>
                        </div>
                        <div class="form-group">
                            <input class="btn_1 full-width" type="submit" value="Enviar" id="submit-contact">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
@endsection

@push('scripts')
    <!-- SPECIFIC CSS -->
    <link href="css/contacts.css" rel="stylesheet">
    <script src="/js/jquery.mask.min.js"></script>
    <script src="/js/custom.js"></script>
@endpush
