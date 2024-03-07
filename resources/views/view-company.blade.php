@extends('layouts.app')

@section('title', "{$company->name} - {$company->city}/{$company->state} - {$company->categories[0]->name}")

@section('image', $company->image ? env('ADMIN_URL') . '/storage/' . $company->image : '/img/logo.webp')
@section('description', $company->description)
@section('abstract', $company->tags->pluck('name')->implode(','))
@section('keywords', $company->tags->pluck('name')->implode(','))

@section('content')
    <style>
        .hidden-desktop {
            display: none;
        }

        @media (max-width: 768px) {
            .hidden-desktop {
                display: block;
            }
        }

        .hidden-mobile {
            display: block;
        }

        @media (max-width: 768px) {
            .hidden-mobile {
                display: none;
            }
        }
    </style>
    <!-- content-->
    <div class="content">
        <section class="listing-hero-section hidden-section" data-scrollax-parent="true" id="sec1">
            <div class="bg-parallax-wrap">
                <div class="bg par-elem "  data-bg="{{ $company->banner ? env('ADMIN_URL') . '/storage/' . $company->banner : asset('images/bg/banner1.webp') }}" data-scrollax="properties: { translateY: '30%' }"></div>
                <div class="overlay"></div>
            </div>
            <div class="container">
                <div class="list-single-header-item  fl-wrap">
                    <div class="row">
                        <div class="col-md-9">
                            <h1>{{ $company->name }} <span class="verified-badge"><i class="fal fa-check"></i></span></h1>
                            <div class="geodir-category-location fl-wrap">
                                <a target="_blank" href="https://www.google.com/maps/place/{{ $company->full_address }}" style="max-width: 300px">
                                    <i class="fas fa-map-marker-alt"></i>  {{ $company->full_address }}
                                </a>
                                <a href="https://wa.me/{{ preg_replace("/[^0-9]/", "", $company->phone) }}">
                                    <i class="fal fa-phone"></i>{{ $company->phone }}
                                </a>
                                <a href="mailto:{{ $company->email }}">
                                    <i class="fal fa-envelope"></i> {{ $company->email }}
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a class="fl-wrap list-single-header-column custom-scroll-link " href="#sec5">
                                <div class="listing-rating-count-wrap single-list-count">
                                    <div class="review-score">{{ number_format($company->rating, 1) }}</div>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ number_format($company->rating / 2, 1) }}"></div>
                                    <br>
                                    <div class="reviews-count">{{ $company->reviews()->count() }} Avaliações</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="list-single-header_bottom fl-wrap">
                    <a class="listing-item-category-wrap" href="#">
                        <div class="listing-item-category" style="width:0"></div>
                        <span>{{ $company->categories->pluck('name')->join(', ') }}</span>
                    </a>
                    @if ($company->opening_24h)
                        <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Aberto 24h</div>
                    @endif
                    <div class="list-single-stats">
                        <ul class="no-list-style">
                            <li><span class="viewed-counter"><i class="fas fa-eye"></i> {{ $company->visits }} Visualizações</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- scroll-nav-wrapper-->
        <div class="scroll-nav-wrapper fl-wrap">
            <div class="container">
                <nav class="scroll-nav scroll-init">
                    <ul class="no-list-style">
                        <li><a class="act-scrlink" href="#sec1"><i class="fal fa-images"></i> Topo</a></li>
                        <li><a href="#sec2"><i class="fal fa-info"></i>Detalhes</a></li>
                        <li><a href="#sec3"><i class="fal fa-image"></i>Galeria</a></li>
                        <li><a href="#sec5"><i class="fal fa-comments-alt"></i>Avaliações</a></li>
                    </ul>
                </nav>
                <div class="scroll-nav-wrapper-opt">
                    <a href="#" class="scroll-nav-wrapper-opt-btn showshare"> <i class="fas fa-share"></i> Compartilhar </a>
                    <div class="share-holder hid-share">
                        <div class="share-container  isShare"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- scroll-nav-wrapper end-->
        <section class="gray-bg no-top-padding">
            <div class="container">
                <div class="breadcrumbs inline-breadcrumbs fl-wrap">
                    <a href="{{ route('index') }}">Home</a>
                    <a href="{{ route('listing') }}">Locais</a>
                    <span>{{ $company->name }}</span>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <!-- list-single-main-wrapper-col -->
                    <div class="col-md-8">
                        <!-- list-single-main-wrapper -->
                        <div class="list-single-main-wrapper fl-wrap" id="sec2">
                            @if ($company->image)
                                <div class="list-single-main-media fl-wrap">
                                    <img src="{{ env('ADMIN_URL') . '/storage/' . $company->image  }}" class="respimg" alt="" style="max-width: 500px">
                                </div>
                            @endif
                            <!-- list-single-main-item -->
                            <div class="list-single-main-item fl-wrap block_box">
                                <div class="list-single-main-item-title">
                                    <h3>Descrição</h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <p>{{ $company->description }}</p>
                                </div>
                            </div>
                            @if ($company->images)
                                <!-- list-single-main-item-->
                                <div class="list-single-main-item fl-wrap block_box" id="sec3">
                                    <div class="list-single-main-item-title">
                                        <h3>Galeria</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="single-carousel-wrap fl-wrap lightgallery">
                                            <div class="sc-next sc-btn color2-bg"><i class="fas fa-caret-right"></i></div>
                                            <div class="sc-prev sc-btn color2-bg"><i class="fas fa-caret-left"></i></div>
                                            <div class="single-carousel fl-wrap full-height">
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper">
                                                        @foreach ($company->images as $image)
                                                            <!-- swiper-slide-->
                                                            <div class="swiper-slide">
                                                                <div class="box-item">
                                                                    <img  src="{{ env('ADMIN_URL') . '/storage/' . $image }}"   alt="">
                                                                    <a href="{{ env('ADMIN_URL') . '/storage/' . $image }}" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
                                                                </div>
                                                            </div>
                                                            <!-- swiper-slide end-->
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                            @endif
                            <!-- list-single-main-item end -->


                            @if ($company->companyApps)
                                <!-- list-single-main-item-->
                                <div class="list-single-main-item fl-wrap block_box" id="sec3">
                                    <div class="list-single-main-item-title">
                                        <h3>Conexões com aplicativos</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="single-carousel-wrap fl-wrap lightgallery" style="height: 100px">
                                            <div class="sc-next sc-btn color2-bg"><i class="fas fa-caret-right"></i></div>
                                            <div class="sc-prev sc-btn color2-bg"><i class="fas fa-caret-left"></i></div>
                                            <div class="single-carousel fl-wrap full-height">
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper">
                                                        @foreach ($company->companyApps as $companyApp)
                                                            <!-- swiper-slide-->
                                                            <div class="swiper-slide">
                                                                <div class="box-item">
                                                                    <a href="{{ $companyApp->url }}" rel="noreferrer">
                                                                        <img src="{{ env('ADMIN_URL') . '/storage/' . $companyApp->app->image  }}" alt="" width="100" height="100">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <!-- swiper-slide end-->
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                            @endif

                            @if ($company->photo_360_code)
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap block_box">
                                    <div class="list-single-main-item-title">
                                        <h3>Foto 360º</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="listing-features fl-wrap">
                                            {!! $company->photo_360_code !!}
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                            @endif

                            <!-- list-single-main-item -->
                            <div class="list-single-main-item fl-wrap block_box hidden-mobile" id="sec5">
                                <div class="list-single-main-item-title">
                                    <h3><span>{{ $company->reviews()->count() }}</span> Avaliações</h3>
                                </div>
                                <!--reviews-score-wrap-->
                                <div class="reviews-score-wrap fl-wrap" style="height: 130px">
                                    <div class="review-score-total">
                                        <span class="review-score-total-item">
                                            {{ number_format($company->rating, 1) }}
                                        </span>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ number_format($company->rating / 2, 1) }}"></div>
                                    </div>
                                </div>
                                @if ($company->reviews)
                                    @foreach($company->reviews as $review)
                                        <!-- reviews-score-wrap end -->
                                        <div class="list-single-main-item_content fl-wrap">
                                            <div class="reviews-comments-wrap" style="width: 100%">
                                                <!-- reviews-comments-item -->
                                                <div class="reviews-comments-item" style="padding: 0">
                                                    <div class="reviews-comments-item-text fl-wrap">
                                                        <div class="reviews-comments-header fl-wrap">
                                                            <h4 style="margin-top: 20px">
                                                                <a href="#">
                                                                    {{ $review->title }}
                                                                </a>
                                                            </h4>
                                                            <small style="float: left; margin-top: 5px">{{ $review->name }}</small>
                                                            <div class="review-score-user">
                                                                <span class="review-score-user_item" style="margin-left: 40px">{{ number_format($review->rating, 1) }}</span>
                                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ number_format($review->rating / 2, 1) }}"></div>
                                                            </div>
                                                        </div>
                                                        <p>" {{ $review->message }} "</p>
                                                    </div>
                                                </div>
                                                <!--reviews-comments-item end-->
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="reviews-comments-wrap">
                                            <div class="reviews-comments-item">
                                                <div class="reviews-comments-item-text fl-wrap">
                                                    <p>Nenhuma avaliação encontrada.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- list-single-main-item end -->
                            <!-- list-single-main-item -->
                            <div class="list-single-main-item fl-wrap block_box hidden-mobile" id="sec6">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>Deixe sua avaliação</h3>
                                </div>
                                <!-- Add Review Box -->
                                <div id="add-review" class="add-review-box">
                                    <!-- Review Comment -->
                                    <form id="add-comment" class="add-comment custom-form" name="rangeCalc" method="post" action={{ route('company.review.store', ['company' => $company->slug]) }}>
                                        @csrf
                                        <fieldset>
                                            <div class="review-score-form fl-wrap">
                                                <div class="review-range-container">
                                                    <!-- review-range-item-->
                                                    <div class="review-range-item">
                                                        <div class="range-slider-title" style="width: 100%" >Dê uma nota de 0 a 10</div>
                                                        <div class="range-slider-wrap ">
                                                            <input type="text" class="rate-range" name="rating" data-min="0" data-max="10"  name="rgcl"  data-step="1" value="5">
                                                        </div>
                                                    </div>
                                                    <!-- review-range-item end -->
                                                </div>
                                            </div>
                                            <div class="list-single-main-item_content fl-wrap">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label><i class="fal fa-user"></i></label>
                                                        <input type="text" placeholder="Nome *" name="name" value="" required />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label><i class="fa fa-message"></i></label>
                                                        <input type="text" placeholder="Título *" name="title" value="" required />
                                                    </div>
                                                </div>
                                                <textarea cols="40" rows="3" name="message" placeholder="Avaliação:"></textarea>
                                                <div class="clearfix"></div>
                                                <div class="clearfix"></div>
                                                <button type="submit" class="btn color2-bg float-btn">Enviar Avaliação <i class="fal fa-paper-plane"></i></button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                                <!-- Add Review Box / End -->
                            </div>
                            <!-- list-single-main-item end -->
                        </div>
                    </div>
                    <!-- list-single-main-wrapper-col end -->
                    <!-- list-single-sidebar -->
                    <div class="col-md-4">
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>Contato rápido</h3>
                            </div>
                            <div class="box-widget">
                                <div class="box-widget-author fl-wrap">
                                    <div class="box-widget-author-title">
                                        <div class="box-widget-author-title_content">
                                            <a href="#">Fale conosco!</a>
                                        </div>
                                        <div class="box-widget-author-title_opt">
                                            <a href="https://wa.me/{{ preg_replace("/[^0-9]/", "", $company->phone) }}" class="tolt green-bg" data-microtip-position="top" data-tooltip="{{ $company->phone }}" style="background: #25D366">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>Localização e Contato</h3>
                            </div>
                            <div class="box-widget">
                                <div class="box-widget-content bwc-nopad">
                                    <div class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                                        <ul class="no-list-style">
                                            <li><span><i class="fal fa-map-marker"></i> Endereço :</span> <a target="_blank" href="https://www.google.com/maps/place/{{ $company->full_address }}">{{ $company->full_address }}</a></li>
                                            <li><span><i class="fal fa-phone"></i> Telefone :</span> <a target="_blank" href="tel:{{ preg_replace("/[^0-9]/", "", $company->phone) }}">{{ $company->phone }}</a></li>
                                            @if ($company->phone2)
                                                <li><span><i class="fal fa-phone"></i> Telefone 2 :</span> <a target="_blank" href="tel:{{ preg_replace("/[^0-9]/", "", $company->phone2) }}">{{ $company->phone2 }}</a></li>
                                            @endif
                                            @if ($company->whatsapp)
                                                <li><span><i class="fab fa-whatsapp"></i> Whatsapp :</span> <a target="_blank" href="https://wa.me/+55{{ preg_replace("/[^0-9]/", "", $company->whatsapp) }}">{{ $company->whatsapp }}</a></li>
                                            @endif
                                            @if ($company->whatsapp2)
                                                <li><span><i class="fab fa-whatsapp"></i> Whatsapp 2 :</span> <a target="_blank" href="https://wa.me/+55{{ preg_replace("/[^0-9]/", "", $company->whatsapp2) }}">{{ $company->whatsapp2 }}</a></li>
                                            @endif
                                            <li><span><i class="fal fa-envelope"></i> E-mail :</span> <a target="_blank" href="mailto:{{ $company->email }}">{{ $company->email }}</a></li>
                                            <li><span><i class="fal fa-browser"></i> Site :</span> <a target="_blank" href="{{ $company->site }}">{{ $company->site }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="list-widget-social bottom-bcw-box  fl-wrap">
                                        <ul class="no-list-style">
                                            @if ($company->facebook)
                                                <li><a href="{{ $company->facebook }}" target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
                                            @endif
                                            @if ($company->instagram)
                                                <li><a href="{{ $company->instagram }}" target="_blank" ><i class="fab fa-instagram"></i></a></li>
                                            @endif
                                            @if ($company->youtube)
                                                <li><a href="{{ $company->youtube }}" target="_blank" ><i class="fab fa-youtube"></i></a></li>
                                            @endif
                                            @if ($company->google_my_business)
                                                <li><a href="{{ $company->google_my_business }}" target="_blank" ><i class="fab fa-google"></i></a></li>
                                            @endif
                                        </ul>
                                        <div class="bottom-bcw-box_link">
                                            <a href="mailto:{{ $company->email }}" class="show-single-contactform tolt" data-microtip-position="top" data-tooltip="Enviar e-mail">
                                                <i class="fal fa-envelope"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>Contato</h3>
                            </div>
                            <div class="box-widget">
                                <div class="box-widget-content">
                                    <form class="custom-form" method="post" action="{{ route('company.contact', ['company' => $company->slug]) }}">
                                        @csrf
                                        <fieldset>
                                            <label><i class="fal fa-user"></i></label>
                                            <input type="text" name="name" placeholder="Nome *" value="" required />
                                            <div class="clearfix"></div>
                                            <label><i class="fal fa-envelope"></i>  </label>
                                            <input type="email" name="email" placeholder="E-mail *" value="" required />
                                            <label><i class="fab fa-whatsapp"></i>  </label>
                                            <input type="text" name="whatsapp" placeholder="Whatsapp *" value="" required />
                                            <textarea cols="40" rows="3" name="message" placeholder="Mensagem"></textarea>
                                        </fieldset>
                                        <button type="submit" class="btn color2-bg  float-btn">Enviar <i class="fa fa-paper-plane"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>Horário de atendimento</h3>
                            </div>
                            <div class="box-widget opening-hours fl-wrap">
                                <div class="box-widget-content">
                                    {!! nl2br(e($company->opening_hours)) !!}
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>Tags</h3>
                            </div>
                            <div class="box-widget opening-hours fl-wrap">
                                <div class="box-widget-content">
                                    <div class="list-single-tags tags-stylwrap">
                                        @foreach ($company->tags as $tag)
                                            <a href="#">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->

                        <!-- list-single-main-item -->
                        <div class="list-single-main-item fl-wrap block_box hidden-desktop" id="sec5">
                            <div class="list-single-main-item-title">
                                <h3><span>{{ $company->reviews()->count() }}</span> Avaliações</h3>
                            </div>
                            <!--reviews-score-wrap-->
                            <div class="reviews-score-wrap fl-wrap" style="height: 130px">
                                <div class="review-score-total">
                                    <span class="review-score-total-item">
                                        {{ number_format($company->rating, 1) }}
                                    </span>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ number_format($company->rating / 2, 1) }}"></div>
                                </div>
                            </div>
                            @if ($company->reviews)
                                @foreach($company->reviews as $review)
                                    <!-- reviews-score-wrap end -->
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="reviews-comments-wrap" style="width: 100%">
                                            <!-- reviews-comments-item -->
                                            <div class="reviews-comments-item" style="padding: 0">
                                                <div class="reviews-comments-item-text fl-wrap">
                                                    <div class="reviews-comments-header fl-wrap">
                                                        <h4 style="margin-top: 20px">
                                                            <a href="#">
                                                                {{ $review->title }}
                                                            </a>
                                                        </h4>
                                                        <small style="float: left; margin-top: 5px">{{ $review->name }}</small>
                                                        <div class="review-score-user">
                                                            <span class="review-score-user_item" style="margin-left: 40px">{{ number_format($review->rating, 1) }}</span>
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ number_format($review->rating / 2, 1) }}"></div>
                                                        </div>
                                                    </div>
                                                    <p>" {{ $review->message }} "</p>
                                                </div>
                                            </div>
                                            <!--reviews-comments-item end-->
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="list-single-main-item_content fl-wrap">
                                    <div class="reviews-comments-wrap">
                                        <div class="reviews-comments-item">
                                            <div class="reviews-comments-item-text fl-wrap">
                                                <p>Nenhuma avaliação encontrada.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!-- list-single-main-item end -->
                        <!-- list-single-main-item -->
                        <div class="list-single-main-item fl-wrap block_box hidden-desktop" id="sec6">
                            <div class="list-single-main-item-title fl-wrap">
                                <h3>Deixe sua avaliação</h3>
                            </div>
                            <!-- Add Review Box -->
                            <div id="add-review" class="add-review-box">
                                <!-- Review Comment -->
                                <form id="add-comment" class="add-comment custom-form" name="rangeCalc" method="post" action={{ route('company.review.store', ['company' => $company->slug]) }}>
                                    @csrf
                                    <fieldset>
                                        <div class="review-score-form fl-wrap">
                                            <div class="review-range-container">
                                                <!-- review-range-item-->
                                                <div class="review-range-item">
                                                    <div class="range-slider-title" style="width: 100%" >Dê uma nota de 0 a 10</div>
                                                    <div class="range-slider-wrap ">
                                                        <input type="text" class="rate-range" name="rating" data-min="0" data-max="10"  name="rgcl"  data-step="1" value="5">
                                                    </div>
                                                </div>
                                                <!-- review-range-item end -->
                                            </div>
                                        </div>
                                        <div class="list-single-main-item_content fl-wrap">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label><i class="fal fa-user"></i></label>
                                                    <input type="text" placeholder="Nome *" name="name" value="" required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label><i class="fa fa-message"></i></label>
                                                    <input type="text" placeholder="Título *" name="title" value="" required />
                                                </div>
                                            </div>
                                            <textarea cols="40" rows="3" name="message" placeholder="Avaliação:"></textarea>
                                            <div class="clearfix"></div>
                                            <div class="clearfix"></div>
                                            <button type="submit" class="btn color2-bg float-btn">Enviar Avaliação <i class="fal fa-paper-plane"></i></button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                            <!-- Add Review Box / End -->
                        </div>
                        <!-- list-single-main-item end -->
                    </div>
                    <!-- list-single-sidebar end -->
                </div>
            </div>
        </section>
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--content end-->
@endsection
