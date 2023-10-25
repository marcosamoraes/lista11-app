@extends('layouts.app')

@section('title', '...')

@section('content')
    <!-- content-->
    <div class="content">
        <!--section  -->
        <section class="hero-section" data-scrollax-parent="true">
            <div class="bg-tabs-wrap">
                <div class="bg-parallax-wrap" data-scrollax="properties: { translateY: '200px' }">
                    <div class="bg bg_tabs"  data-bg="images/bg/banner1.png"></div>
                    <div class="overlay op7"></div>
                </div>
            </div>
            <div class="container small-container">
                <div class="intro-item fl-wrap">
                    <span class="section-separator"></span>
                    <div class="bubbles">
                        <h1>Descubra ótimos lugares na sua cidade</h1>
                    </div>
                    <h3>Explore os melhores locais de restaurantes, bares, lojas e etc.</h3>
                </div>
                <!-- main-search-input-tabs-->
                <div class="main-search-input-tabs  tabs-act fl-wrap">
                    <!--tabs -->
                    <div class="tabs-container fl-wrap  ">
                        <!--tab -->
                        <div class="tab">
                            <div id="tab-inpt1" class="tab-content first-tab">
                                <div class="main-search-input-wrap fl-wrap">
                                    <div class="main-search-input fl-wrap">
                                        <form action="{{ route('listing') }}">
                                            <div class="main-search-input-item">
                                                <label><i class="fal fa-keyboard"></i></label>
                                                <input type="text" name="search" placeholder="O que você está procurando?" value=""/>
                                            </div>
                                            <div class="main-search-input-item location autocomplete-container">
                                                <label><i class="fal fa-map-marker-check"></i></label>
                                                <input type="text" name="city" placeholder="Localização" class="autocomplete-input" id="autocompleteid" value=""/>
                                            </div>
                                            <div class="main-search-input-item">
                                                <select data-placeholder="Categorias" name="cat" class="chosen-select" >
                                                    <option value="">Categorias</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button class="main-search-button color2-bg">Buscar <i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--tab end-->
                    </div>
                    <!--tabs end-->
                </div>
            </div>
            <div class="header-sec-link">
                <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
            </div>
        </section>
        <!--section end-->
        <!--section  -->
        <section class="slw-sec" id="sec1">

            @if ($banners)
                <div class="container" style="display: flex; gap-5; margin-bottom: 70px">
                    @foreach($banners as $banner)
                        <div>
                            <a href="{{ $banner->link }}" target="_blank">
                                <img src="{{ env('ADMIN_URL') . '/storage/' . $banner->image }}" alt="" style="width: 90%">
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="section-title">
                <h2>LOCAIS EM DESTAQUE</h2>
                <div class="section-subtitle">LOCAIS EM DESTAQUE</div>
            </div>
            <div class="listing-slider-wrap fl-wrap">
                <div class="listing-slider fl-wrap">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <!--  swiper-slide  -->
                            <div class="swiper-slide">
                                <div class="listing-slider-item fl-wrap">
                                    @foreach($featuredCompanies as $featuredCompany)
                                        <!-- listing-item  -->
                                        <div class="listing-item listing_carditem">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img">
                                                    <a href="{{ route('listing.view', ['city' => $featuredCompany->city, 'company' => $featuredCompany->slug]) }}" class="geodir-category-img-wrap fl-wrap">
                                                        <img src="{{ env('ADMIN_URL') . '/storage/' . $featuredCompany->image }}" alt="">
                                                    </a>
                                                    <div class="geodir-category-opt">
                                                        <div class="geodir-category-opt_title" style="max-width: 50%">
                                                            <h4><a href="{{ route('listing.view', ['city' => $featuredCompany->city, 'company' => $featuredCompany->slug]) }}">{{ $featuredCompany->name }}</a></h4>
                                                            <div class="geodir-category-location">
                                                                <a target="_blank" href="https://www.google.com/maps/place/{{ $featuredCompany->full_address }}">
                                                                    <i class="fas fa-map-marker-alt"></i> {{ $featuredCompany->full_address }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="listing-rating-count-wrap">
                                                            <div class="review-score">{{ number_format($featuredCompany->rating, 1) }}</div>
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ number_format($featuredCompany->rating / 2, 1) }}"></div>
                                                            <br>
                                                            <div class="reviews-count">{{ $featuredCompany->reviews()->count() }} Avaliações</div>
                                                        </div>
                                                        <div class="listing_carditem_footer fl-wrap">
                                                            <a class="listing-item-category-wrap" href="#">
                                                                <div class="listing-item-category" style="width:0"></div>
                                                                <span>{{ $featuredCompany->categories[0]->name }}</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <!-- listing-item end -->
                                    @endforeach
                                </div>
                            </div>
                            <!--  swiper-slide end  -->
                        </div>
                    </div>
                    <div class="listing-carousel-button listing-carousel-button-next2"><i class="fas fa-caret-right"></i></div>
                    <div class="listing-carousel-button listing-carousel-button-prev2"><i class="fas fa-caret-left"></i></div>
                </div>
                <div class="tc-pagination_wrap">
                    <div class="tc-pagination2"></div>
                </div>
            </div>
        </section>
        <!--section end-->
        <div class="sec-circle fl-wrap"></div>
        <!--section end-->
        <section class="parallax-section small-par" data-scrollax-parent="true">
            <div class="bg par-elem "  data-bg="images/bg/banner2.png" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay  op7"></div>
            <div class="container">
                <div class=" single-facts single-facts_2 fl-wrap">
                    <!-- inline-facts -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <h6>Mais de</h6>
                                    <div class="num" data-content="0" data-num="786000">786000</div>
                                </div>
                            </div>
                            <h6>Empresas cadastradas</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                    <!-- inline-facts  -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <h6>Mais de</h6>
                                    <div class="num" data-content="0" data-num="932000">932000</div>
                                </div>
                            </div>
                            <h6>Visitas por mês</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                    <!-- inline-facts  -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <h6>Mais de</h6>
                                    <div class="num" data-content="0" data-num="5000000">5000000</div>
                                </div>
                            </div>
                            <h6>Pedidos de orçamentos</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                </div>
            </div>
        </section>
        <!--section end-->
        <!--section  -->
        <section>
            <div class="container big-container">
                <div class="section-title">
                    <h2><span>ÚLTIMOS LUGARES CADASTRADOS</span></h2>
                    <div class="section-subtitle">ÚLTIMOS LUGARES CADASTRADOS</div>
                </div>
                <div class="grid-item-holder gallery-items fl-wrap">
                    <!--  gallery-item-->
                    <div class="gallery-item restaurant events">
                        @foreach($newCompanies as $newCompany)
                            <!-- listing-item  -->
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img">
                                        <a href="{{ route('listing.view', ['city' => $newCompany->city, 'company' => $newCompany->slug]) }}" class="geodir-category-img-wrap fl-wrap">
                                        <img src="{{ env('ADMIN_URL') . '/storage/' . $newCompany->image }}" alt="">
                                        </a>
                                        <div class="geodir-category-opt">
                                            <div class="listing-rating-count-wrap">
                                                <div class="review-score">{{ number_format($newCompany->rating, 1) }}</div>
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ number_format($newCompany->rating / 2, 1) }}"></div>
                                                <br>
                                                <div class="reviews-count">{{ $newCompany->reviews()->count() }} Avaliações</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap title-sin_item">
                                        <div class="geodir-category-content-title fl-wrap">
                                            <div class="geodir-category-content-title-item">
                                                <h3 class="title-sin_map">
                                                    <a href="{{ route('listing.view', ['city' => $newCompany->city, 'company' => $newCompany->slug]) }}">{{ $newCompany->name }}</a>
                                                    <span class="verified-badge"><i class="fal fa-check"></i></span>
                                                </h3>
                                                <div class="geodir-category-location fl-wrap"><a target="_blank" href="https://www.google.com/maps/place/{{ $newCompany->full_address }}"><i class="fas fa-map-marker-alt"></i> {{ $newCompany->full_address }}</a></div>
                                            </div>
                                        </div>
                                        <div class="geodir-category-text fl-wrap">
                                            <p class="small-text">{{ $newCompany->description }}</p>
                                        </div>
                                        <div class="geodir-category-footer fl-wrap">
                                            <a class="listing-item-category-wrap" href="#">
                                                <div class="listing-item-category" style="width:0"></div>
                                                <span>{{ $featuredCompany->categories[0]->name }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end -->
                        @endforeach
                    </div>
                    <!-- gallery-item  end-->
                </div>
                <a href="{{ route('listing') }}" class="btn  dec_btn  color2-bg">Ver todos os locais<i class="fal fa-arrow-alt-right"></i></a>
            </div>
        </section>
        <!--section end-->
        <!--section  -->
        <section class="parallax-section" data-scrollax-parent="true">
            <div class="bg par-elem "  data-bg="images/bg/banner3.png" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay op7"></div>
            <!--container-->
            <div class="container">
                <div class="video_section-title fl-wrap">
                    <h4>Conheça o programa Trusted do Google.</h4>
                    <h2>Google Street View</h2>
                </div>
                <a href="https://www.youtube.com/watch?v=nFt3wnWM2S4" class="promo-link big_prom image-popup"><i class="fal fa-play"></i><span>Ver vídeo</span></a>
            </div>
        </section>
        <!--section end-->
        <!--section  -->
        <section      data-scrollax-parent="true">
            <div class="container">
                <div class="section-title">
                    <h2>DESCUBRA LUGARES INCRÍVEIS</h2>
                    <div class="section-subtitle">DESCUBRA LUGARES INCRÍVEIS</div>
                </div>
                <div class="process-wrap fl-wrap">
                    <ul class="no-list-style">
                        <li>
                            <div class="process-item">
                                <span class="process-count">01 </span>
                                <div class="time-line-icon"><i class="fal fa-map-marker-alt"></i></div>
                                <h4> Escolha uma cidade</h4>
                                <p>Selecione a cidade que pretende buscar um estabelecimento</p>
                            </div>
                            <span class="pr-dec"></span>
                        </li>
                        <li>
                            <div class="process-item">
                                <span class="process-count">02</span>
                                <div class="time-line-icon"><i class="fal fa-mail-bulk"></i></div>
                                <h4> Faça sua busca</h4>
                                <p>Digite o nome ou local desejado no campo de busca</p>
                            </div>
                            <span class="pr-dec"></span>
                        </li>
                        <li>
                            <div class="process-item">
                                <span class="process-count">03</span>
                                <div class="time-line-icon"><i class="fal fa-layer-plus"></i></div>
                                <h4> Encontre tudo</h4>
                                <p>Encontre vários estabelecimentos em um só lugar</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--section end-->
        <!--section  -->
        <section class="gradient-bg hidden-section" data-scrollax-parent="true">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="colomn-text  pad-top-column-text fl-wrap">
                            <div class="colomn-text-title">
                                <h3>Aplicativo Lista 11</h3>
                                <p>Agora você pode ter o Lista 11 baixado em seu dispositivo móvel, receba as melhores ofertas próxima de você. Tenha acesso agora exclusivo a cupons de descontos!</p>
                                <a href="#" class=" down-btn color3-bg"><i class="fab fa-apple"></i>  Apple Store </a>
                                <a href="#" class=" down-btn color3-bg"><i class="fab fa-android"></i>  Google Play </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="collage-image">
                            <img src="images/api.png" class="main-collage-image" alt="">
                            <div class="images-collage-title color2-bg icdec"> <img src="logo.webp"   alt=""></div>
                            <div class="images-collage_icon green-bg" style="right:-20px; top:120px;"><i class="fal fa-thumbs-up"></i></div>
                            <div class="collage-image-min cim_1"><img src="favicon.png" alt="" style="background: white"></div>
                            <div class="collage-image-min cim_2"><img src="favicon.png" alt="" style="background: white"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gradient-bg-figure" style="right:-30px;top:10px;"></div>
            <div class="gradient-bg-figure" style="left:-20px;bottom:30px;"></div>
            <div class="circle-wrap" style="left:270px;top:120px;" data-scrollax="properties: { translateY: '-200px' }">
                <div class="circle_bg-bal circle_bg-bal_small"></div>
            </div>
            <div class="circle-wrap" style="right:420px;bottom:-70px;" data-scrollax="properties: { translateY: '150px' }">
                <div class="circle_bg-bal circle_bg-bal_big"></div>
            </div>
            <div class="circle-wrap" style="left:420px;top:-70px;" data-scrollax="properties: { translateY: '100px' }">
                <div class="circle_bg-bal circle_bg-bal_big"></div>
            </div>
            <div class="circle-wrap" style="left:40%;bottom:-70px;"  >
                <div class="circle_bg-bal circle_bg-bal_middle"></div>
            </div>
            <div class="circle-wrap" style="right:40%;top:-10px;"  >
                <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
            </div>
            <div class="circle-wrap" style="right:55%;top:90px;"  >
                <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
            </div>
        </section>
        <!--section end-->
        <!--section  -->
        <section>
            <div class="section-title">
                <h2>AGÊNCIA STORM WEB</h2>
                <div class="section-subtitle">AGÊNCIA STORM WEB</div>
            </div>
            <div style="max-width: 800px;margin:auto;position:relative">
                <img src="images/video_home.webp" alt="" style="width: 100%">
                <img src="images/flutuantes_video_home.webp" alt="" style="position: absolute; left: -150px; right: 0;">
            </div>
            <div style="margin-top: 50px">
                <a href="https://stormweb.com.br" target="_blank" class="btn  dec_btn  color2-bg">Ir para o site<i class="fal fa-arrow-alt-right"></i></a>
            </div>
            <div class="container" style="margin-top: 80px">
                <div class="row">
                    <div class="col-md-6">
                        <img src="images/marketing-digital.webp" class="img-fluid" alt="Marketing Digital - Destacando sua empresa na internet." title="Marketing Digital - Destacando sua empresa na internet.">
                    </div>
                    <div class="col-md-6" style="text-align: left">
                        <h2 style="font-size: 38px">Marketing Digital</h2>
                        <p class="pb-3" style="font-size: 28px; margin-bottom: 40px">
                            O Poder do Marketing Digital pode transformar seu negócio! Nós da agência lista11 vamos te ajudar a construir estratégias eficazes que vão atrair novos clientes como também a forma de fazer com que o seu produto e serviço alcance mais pessoas.
                        </p>
                        <a href="https://www.lista11.com.br/fale-conosco" target="_blank" class="btn  dec_btn  color2-bg">Saiba mais<i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <img src="/images/traco1.webp" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="text-align: left">
                        <h2 style="font-size: 38px">Experiência 360º Street View</h2>
                        <p class="pb-3" style="font-size: 28px; margin-bottom: 40px">
                            O Street View do Google Maps é uma representação virtual do ambiente que nos cerca composta de milhões de imagens panorâmicas, disponível no Google Maps. O conteúdo do Street View tem duas origens: o Google e colaboradores.
                        </p>
                        <a href="https://www.lista11.com.br/empresa-confianca-google-programa-trusted" target="_blank" class="btn  dec_btn  color2-bg">Saiba mais<i class="fas fa-plus"></i></a>
                    </div>
                    <div class="col-md-6">
                        <img src="images/experiencia_360_street_view.webp" class="img-fluid" alt="Marketing Digital - Destacando sua empresa na internet." title="Marketing Digital - Destacando sua empresa na internet.">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <img src="/images/traco2.webp" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="images/criacao_de_sites.webp" class="img-fluid" alt="Marketing Digital - Destacando sua empresa na internet." title="Marketing Digital - Destacando sua empresa na internet.">
                    </div>
                    <div class="col-md-6" style="text-align: left">
                        <h2 style="font-size: 38px">Criação de Sites</h2>
                        <p class="pb-3" style="font-size: 28px; margin-bottom: 40px">
                            Quer atrair novos clientes com um site fantástico e personalizado e por um preço que cabe no seu bolso? A Agência Lista11 vai te ajudar!
                        </p>
                        <a href="https://www.lista11.com.br/fale-conosco" target="_blank" class="btn  dec_btn  color2-bg">Saiba mais<i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="waveWrapper waveAnimation">
                <div class="waveWrapperInner bgMiddle">
                    <div class="wave-bg-anim waveMiddle" style="background-image: url('images/wave-top.png')"></div>
                </div>
                <div class="waveWrapperInner bgBottom">
                    <div class="wave-bg-anim waveBottom" style="background-image: url('images/wave-top.png')"></div>
                </div>
            </div>
        </section>
        <!--section end-->
    </div>
    <!--content end-->
@endsection
