@extends('layouts.app')

@section('title', 'Ribeirão Preto - Restaurante, hotel, bares, lojas, oficina, som e muito mais...')

@section('content')
    <main>
        <div class="hero_single version_2">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-10">
                            <h1>Guia de empresa na sua cidade</h1>
                            <p>Seu anúncio visível</p>
                            <form action="/empresas">
								<div class="row g-0 custom-search-input">
									<div class="col-lg-6">
										<div class="form-group">
											<input class="form-control" name="city" type="text" id="autocomplete" placeholder="Nome da empresa, endereço ou cidade...">
											<i class="icon_pin_alt"></i>
										</div>
									</div>
									<div class="col-lg-4 custom_select">
										<select class="wide" name="cat">
											<option value='' readonly>Categorias</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
										</select>
									</div>
									<div class="col-lg-2">
										<input type="submit" value="Buscar">
									</div>
								</div>
								<!-- /row -->
							</form>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
        </div>
        <!-- /hero_single -->

        <div class="container margin_60_40">
            @if ($banners)
                <div class="row">
                    @foreach ($banners as $banner)
                        <div class="col-12 col-lg-6">
                            <a href="{{ $banner->link ? str()->startsWith($banner->link, 'http') ? $banner->link : 'https://' . $banner->link : '#' }}" target="_blank">
                                <div class="banner lazy" data-bg="url({{ env('PAINEL_URL') . '/storage/' . $banner->image }})">
                                    <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.2)">
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                    @if ($banners->count() === 1)
                        <div class="col-12 col-lg-6">
                            <div class="banner lazy" data-bg="url(img/banner_bg_desktop.jpg)">
                                <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.2)">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
            <div class="main_title">
                <span><em></em></span>
                <h2>Últimas empresas</h2>
            </div>

            <div class="owl-carousel owl-theme carousel_4">
                @foreach ($newCompanies as $newCompany)
                    <div class="item">
                        <div class="strip">
                            <figure>
                                <img src="img/lazy-placeholder.png" data-src="{{ $newCompany->image ? env('PAINEL_URL') . '/storage/' . $newCompany->image : '/img/logo.webp' }}" class="owl-lazy"
                                    alt="">
                                <a href="/empresa/{{ str()->slug($newCompany->city) }}/{{ $newCompany->slug }}" class="strip_info">
                                    <small>{{ $newCompany->categories[0]->name }}</small>
                                    <div class="item_title">
                                        <h3>{{ $newCompany->name }}</h3>
                                        <small>{{ "{$newCompany->city}/{$newCompany->state}" }}</small>
                                    </div>
                                </a>
                            </figure>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /carousel -->
        </div>
        <!-- /container -->

        <div class="bg_gray">
            <div class="container margin_60_40">
                <div class="main_title center">
                    <span><em></em></span>
                    <h2>Categorias</h2>
                </div>
                <!-- /main_title -->
                <div class="owl-carousel owl-theme categories_carousel">
                    @foreach ($categories as $category)
                    <div class="item">
                        <a href="/empresas?cat={{ $category->id }}">
                            <span>{{ $category->companies_count }}</span>
                            <h3 style="max-height: 20px">{{ $category->name }}</h3>
                        </a>
                    </div>
                    @endforeach
                </div>
                <!-- /carousel -->
            </div>

            <div class="container margin_60_40">

                <div class="row">
                    <div class="col-12">
                        <div class="main_title version_2">
                            <span><em></em></span>
                            <h2>Destaques</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="list_home">
                            <ul>
                                @foreach ($featuredCompanies as $key => $featuredCompany)
                                    @if ($key % 2 != 0)
                                        @continue
                                    @endif
                                    <li>
                                        <a href="/empresa/{{ str()->slug($featuredCompany->city) }}/{{ $featuredCompany->slug }}">
                                            <figure>
                                                <img src="img/lazy-placeholder.png" data-src="{{ $featuredCompany->image ? env('PAINEL_URL') . '/storage/' . $featuredCompany->image : '/img/logo.webp' }}" alt="" class="lazy">
                                            </figure>
                                            <em>{{ $featuredCompany->categories[0]->name }}</em>
                                            <h3>{{ $featuredCompany->name }}</h3>
                                            <small>{{ "{$featuredCompany->city}/{$featuredCompany->state}" }}</small>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="list_home">
                            <ul>
                                @foreach ($featuredCompanies as $key => $featuredCompany)
                                    @if ($key % 2 == 0)
                                        @continue
                                    @endif
                                    <li>
                                        <a href="/empresa/{{ str()->slug($featuredCompany->city) }}/{{ $featuredCompany->slug }}">
                                            <figure>
                                                <img src="img/lazy-placeholder.png" data-src="{{ $featuredCompany->image ? env('PAINEL_URL') . '/storage/' . $featuredCompany->image : '/img/logo.webp' }}" alt="" class="lazy">
                                            </figure>
                                            <em>{{ $featuredCompany->categories[0]->name }}</em>
                                            <h3>{{ $featuredCompany->name }}</h3>
                                            <small>{{ "{$featuredCompany->city}/{$featuredCompany->state}" }}</small>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /container -->

            <div class="call_section lazy" data-bg="url(img/bg_call_section.webp)">
                <div class="container clearfix">
                    <div class="col-lg-5 col-md-6 float-end wow">
                        <div class="box_1">
                            <h3>Quer anunciar sua empresa com a gente?</h3>
                            <p>Se junte a nós para aumentar sua visibilidade na internet.</p>
                            <a href="/cadastro" class="btn_1">Cadastrar</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--/call_section-->
        </div>
        <!-- /bg_gray -->
    </main>
@endsection

@push('scripts')
    <!-- SPECIFIC CSS -->
    <link href="css/home.css" rel="stylesheet">
@endpush
