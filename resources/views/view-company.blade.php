@extends('layouts.app')

@section('title', "{$company->name} - {$company->city}/{$company->state} - {$company->categories[0]->name}")

@section('image', $company->image ? env('PAINEL_URL') . '/storage/' . $company->image : '/img/logo.webp')
@section('description', $company->description)
@section('abstract', $company->tags->pluck('name')->implode(','))
@section('keywords', $company->tags->pluck('name')->implode(','))

@section('content')
    <main>
        <div class="container margin_detail">
            <div class="row">
                <div class="col-lg-7">
                    <div class="detail_page_head clearfix">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="/">Início</a></li>
                                <li><a href="/empresas?cat={{ $company->categories[0]->id }}">{{ $company->categories[0]->name }}</a></li>
                                <li>{{ $company->name }}</li>
                            </ul>
                        </div>
                        <div class="title">
                            <h1>{{ $company->name }} {!! $company->opening_24h ? '<span class="badge bg-danger" style="font-size: 8px">ABERTO 24H</span>' : false !!}</h1>
                            {{ "{$company->city}/{$company->state}" }} - <a
                                href="https://www.google.com/maps/place/{{ $company->fullAddress }}"
                                target="blank">Ver localização</a>
                                <ul class="tags">
                                    <li>Tags:</li>
                                    @foreach ($company->tags as $tag)
                                        <li><a href="#0" class="text-capitalize">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            </p>
                        </div>
                        @if ($company->rating)
                            <div class="rating">
                                <div class="score"><span><em>{{ $company->reviews()->count() }} Avaliações</em></span><strong>{{ number_format($company->rating, 1) }}</strong></div>
                            </div>
                        @endif
                    </div>
                    <!-- /detail_page_head -->

                    <div class="owl-carousel owl-theme carousel_1 magnific-gallery">
                        <div class="item" style="border:1px solid black; display: flex; justify-content: center; align-items: center">
                            <a href="{{ $company->image ? env('PAINEL_URL') . '/storage/' . $company->image : '/img/logo.webp' }}" class="w-50" title="Photo title" data-effect="mfp-zoom-in">
                                <img src="{{ $company->image ? env('PAINEL_URL') . '/storage/' . $company->image : '/img/logo.webp' }}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /carousel -->

                    <div class="tabs_detail">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab"
                                    role="tab">Informações</a>
                            </li>
                            <li class="nav-item">
                                <a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab"
                                    role="tab">Avaliações</a>
                            </li>
                        </ul>

                        <div class="tab-content" role="tablist">
                            <div id="pane-A" class="card tab-pane fade show active" role="tabpanel"
                                aria-labelledby="tab-A">
                                <div class="card-header" role="tab" id="heading-A">
                                    <h5>
                                        <a data-bs-toggle="collapse" href="#collapse-A"
                                            aria-expanded="true" aria-controls="collapse-A">
                                            Informações
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-A" class="collapse show" role="tabpanel" aria-labelledby="heading-A">
                                    <div class="card-body info_content">
                                        <h2>{{ "{$company->name} em {$company->city}/{$company->state}" }}</h2>
                                        <p>{{ $company->description }}</p>
                                        <div class="add_bottom_45"></div>
                                        @if ($company->images)
                                            <h2>Galeria de Fotos</h2>
                                            <div class="pictures magnific-gallery clearfix">
                                                @foreach ($company->images as $image)
                                                    <figure><a href="{{ env('PAINEL_URL') }}/storage/{{ $image }}" title="Photo title"
                                                            data-effect="mfp-zoom-in"><img src="{{ env('PAINEL_URL') }}/storage/{{ $image }}"
                                                                data-src="{{ env('PAINEL_URL') }}/storage/{{ $image }}" class="lazy"
                                                                alt=""></a></figure>
                                                @endforeach
                                            </div>
                                        @endif
                                        <!-- /pictures -->

                                        <div class="other_info">
                                            <h2>Entre em contato com a {{ $company->name }}</h2>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h3>Endereço</h3>
                                                    <p>{{ $company->fullAddress }}<br><a
                                                            href="https://www.google.com/maps/place/{{ $company->fullAddress }}"
                                                            target="blank"><strong>Ver localização</strong></a></p>
                                                    @if ($company->facebook || $company->instagram || $company->youtube || $company->google_my_business || $company->waze || $company->ifood || $company->olx)
                                                        <strong>Nos siga nas redes sociais</strong><br>
                                                        <p class="follow_us_detail">
                                                            @if ($company->facebook)
                                                                <a target="_blank" href="{{ str()->startsWith($company->facebook, 'http') ? $company->facebook : 'https://' . $company->facebook }}">
                                                                    <i class="fa-brands fa-square-facebook" style="color: #1877f2"></i>
                                                                </a>
                                                            @endif
                                                            @if ($company->instagram)
                                                                <a target="_blank" href="{{ str()->startsWith($company->instagram, 'http') ? $company->instagram : 'https://' . $company->instagram }}">
                                                                    <i class="fa-brands fa-square-instagram" style="color: #c32aa3"></i>
                                                                </a>
                                                            @endif
                                                            @if ($company->youtube)
                                                                <a target="_blank" href="{{ str()->startsWith($company->youtube, 'http') ? $company->youtube : 'https://' . $company->youtube }}">
                                                                    <i class="fa-brands fa-square-youtube" style="color: #ff0000"></i>
                                                                </a>
                                                            @endif
                                                            @if ($company->google_my_business)
                                                                <a target="_blank" href="{{ str()->startsWith($company->google_my_business, 'http') ? $company->google_my_business : 'https://' . $company->google_my_business }}">
                                                                    <i class="fa-brands fa-google-plus" style="color: #db4437"></i>
                                                                </a>
                                                            @endif
                                                            @if ($company->waze)
                                                                <a target="_blank" href="{{ str()->startsWith($company->waze, 'http') ? $company->waze : 'https://' . $company->waze }}">
                                                                    <i class="fa-brands fa-waze" style="color: #0072c6"></i>
                                                                </a>
                                                            @endif
                                                            @if ($company->ifood)
                                                                <a target="_blank" href="{{ str()->startsWith($company->ifood, 'http') ? $company->ifood : 'https://' . $company->ifood }}">
                                                                    <img src="/img/ifood.png" height="20" alt="">
                                                                </a>
                                                            @endif
                                                            @if ($company->olx)
                                                                <a target="_blank" href="{{ str()->startsWith($company->olx, 'http') ? $company->olx : 'https://' . $company->olx }}">
                                                                    <img src="/img/olx.png" height="20" alt="">
                                                                </a>
                                                            @endif
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col-md-4">
                                                    <h3>Horário de Funcionamento</h3>
                                                    <p>{{ $company->opening_hours }}</p>
                                                    @if ($company->google_street_view)
                                                        <a href="{{ str()->startsWith($company->google_street_view, 'http') ? $company->google_street_view : 'https://' . $company->google_street_view }}" target="_blank" rel="noopener noreferrer">
                                                            <img src="/img/street-view.webp" alt="" height="100">
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="col-md-4">
                                                    <h3>Métodos de Pagamento</h3>
                                                    <p>{{ $company->payment_methods }}</p>
                                                    @if ($company->email)
                                                        <strong>E-mail</strong><br>
                                                        <p><a target="_blank" href="mailto:{{ $company->email }}">{{ $company->email }}</a></p>
                                                    @endif
                                                    @if ($company->site)
                                                        <strong>Site</strong><br>
                                                        <p><a target="_blank" href="{{ str()->startsWith($company->site, 'http') ? $company->site : 'https://' . $company->site }}">{{ $company->site }}</a></p>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- /row -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab -->

                            <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                                <div class="card-header" role="tab" id="heading-B">
                                    <h5>
                                        <a class="collapsed" data-bs-toggle="collapse" href="#collapse-B"
                                            aria-expanded="false" aria-controls="collapse-B">
                                            Avaliações
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                                    <div class="card-body reviews">

                                        <div id="reviews">
                                            @if ($company->reviews()->count() > 0)
                                                @foreach ($company->reviews as $review)
                                                    <div class="review_card">
                                                        <div class="row">
                                                            <div class="col-md-2 user_info">
                                                                <figure><img src="/img/avatar.jpg" alt=""></figure>
                                                                <h5>{{ $review->name }}</h5>
                                                            </div>
                                                            <div class="col-md-10 review_content">
                                                                <div class="clearfix add_bottom_15">
                                                                    <span class="rating">{{ $review->rating }}<small>/10</small></span>
                                                                    <em>Publicado {{ $review->created_at->diffForHumans() }}</em>
                                                                </div>
                                                                <h4>{{ $review->title }}</h4>
                                                                <p>{{ $review->message }}</p>
                                                            </div>
                                                        </div>
                                                        <!-- /row -->
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="alert alert-warning" role="alert">
                                                    Não há nenhuma avaliação para essa empresa ainda.
                                                </div>
                                            @endif
                                        </div>
                                        <!-- /reviews -->
                                        <div class="text-end"><a href="{{ route('company.review', $company->slug) }}" class="btn_1">Deixe uma avaliação</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /tab-content -->
                    </div>
                    <!-- /tabs_detail -->
                </div>
                <!-- /col -->

                <div class="col-lg-5" id="sidebar_fixed">
                    <div class="box_booking mobile_fixed">
                        <div class="head">
                            <h3>Entre em Contato</h3>
                            <a href="#0" class="close_panel_mobile"><i class="icon_close"></i></a>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            <form method="post" action="{{ route('company.contact', ['company' => $company->slug]) }}" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" id="name"
                                        class="form-control" placeholder="Nome Completo">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email"
                                        class="form-control" placeholder="E-mail">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="whatsapp" id="whatsapp"
                                        class="form-control" placeholder="Celular">
                                </div>
                                <div class="form-group add_bottom_15">
                                    <textarea class="form-control" name="message" id="message" placeholder="Mensagem"></textarea>
                                </div>
                                <div class="btn_1_mobile" style="position: relative;">
                                    <input class="btn_3 full-width" type="submit" value="Enviar mensagem"
                                        id="submit-message">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /box_booking -->
                    <div class="btn_reserve_fixed"><a href="#0" class="btn_3 full-width">Enviar mensagem</a></div>

                    <a href="tel:{{ preg_replace('/\D/', '', $company->phone) }}" class="btn_2 full-width" target="_blank" style="margin-bottom: 20px">
                        <i class="icon_phone"></i>
                        {{ $company->phone }}
                    </a>
                    <a href="https://wa.me/+55{{ preg_replace('/\D/', '', $company->phone2 ?? $company->phone) }}?text=Olá, vim através do Achei16." class="btn_1 full-width" target="_blank" style="margin-bottom: 20px">
                        <i class="fa-brands fa-whatsapp"></i>
                        {{ $company->phone2 ?? $company->phone }}
                    </a>

                    <ul class="share-buttons">
                        <li><a class="fb-share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"><i class="social_facebook"></i> Compartilhar</a></li>
                        <li><a class="twitter-share" target="_blank" href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode('Confira esta empresa no Achei16: ' . $company->name) }}"><i class="social_twitter"></i> Compartilhar</a></li>
                    </ul>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->

    </main>
    <!-- /main -->
@endsection

@push('scripts')
    <!-- SPECIFIC CSS -->
    <link href="/css/detail-page.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/411831a5a4.js" crossorigin="anonymous"></script>
    <!-- SPECIFIC SCRIPTS -->
    <script src="/js/sticky_sidebar.min.js"></script>
    <script src="/js/specific_detail.js"></script>
    <script src="/js/jquery.mask.min.js"></script>
    <script src="/js/custom.js"></script>
    @endpush
