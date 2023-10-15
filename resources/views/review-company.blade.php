@extends('layouts.app')

@section('title', 'Ribeirão Preto - Restaurante, hotel, bares, lojas, oficina, som e muito mais...')

@section('content')
    <main class="bg_gray pattern">
        <div class="container margin_60_40" style="z-index: 1; position: relative">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form method="POST">
                        <div class="box_general write_review">
                            <h1 class="add_bottom_15">Escreva uma avaliação para "{{ $company->name }}"</h1>

                            <div class="row">
                                <div class="col-md-12 add_bottom_25">
                                    <div class="add_bottom_15">Dê uma nota de 0 a 10</div>
                                    <input type="range" min="0" max="10" step="1" value="10"
                                        data-orientation="horizontal" id="rating" name="rating">
                                    <label for="rating">10</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Nome</label>
                                <input class="form-control" type="text" name="name" required
                                    placeholder="Seu nome">
                            </div>
                            <div class="form-group">
                                <label>Título</label>
                                <input class="form-control" type="text" name="title" required
                                    placeholder="Se pudesse resumir em uma sentença, o que diria?">
                            </div>
                            <div class="form-group">
                                <label>Sua avaliação</label>
                                <textarea class="form-control" style="height: 180px;" name="message"
                                    placeholder="Escreva sua avaliação para ajudar outras pessoas a saberem mais sobre essa empresa."></textarea>
                            </div>
                            <button type="submit" class="btn_1">Enviar avaliação</button>
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
    <link href="/css/review.css" rel="stylesheet">

    <!-- SPECIFIC SCRIPTS -->
    <script src="/js/specific_review.js"></script>

    <script>
        $(document).on('change', '[name="rating"]', function () {
            $('label[for="rating"]').text($(this).val());
        })
    </script>
@endpush
