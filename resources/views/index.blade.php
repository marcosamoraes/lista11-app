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
                                                <input type="text" placeholder="O que você está procurando?" value=""/>
                                            </div>
                                            <div class="main-search-input-item location autocomplete-container">
                                                <label><i class="fal fa-map-marker-check"></i></label>
                                                <input type="text" placeholder="Localização" class="autocomplete-input" id="autocompleteid" value=""/>
                                                <a href="#"><i class="fa fa-dot-circle-o"></i></a>
                                            </div>
                                            <div class="main-search-input-item">
                                                <select data-placeholder="Categorias"  class="chosen-select" >
                                                    <option>Categorias</option>
                                                    @foreach($categories as $category)
                                                        <option>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button class="main-search-button color2-bg">Buscar <i class="far fa-search"></i></button>
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
                <a href="https://vimeo.com/70851162" class="promo-link big_prom   image-popup"><i class="fal fa-play"></i><span>Ver vídeo</span></a>
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
                    <div class="process-end"><i class="fal fa-check"></i></div>
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
                            <div class="collage-image-min cim_1"><img src="images/api/1.jpg" alt=""></div>
                            <div class="collage-image-min cim_2"><img src="images/api/1.jpg" alt=""></div>
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
            <div class="container">
                <div class="section-title">
                    <h2> Testimonilas</h2>
                    <div class="section-subtitle">Clients Reviews</div>
                    <span class="section-separator"></span>
                    <p>Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.</p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="testimonilas-carousel-wrap fl-wrap">
                <div class="listing-carousel-button listing-carousel-button-next"><i class="fas fa-caret-right"></i></div>
                <div class="listing-carousel-button listing-carousel-button-prev"><i class="fas fa-caret-left"></i></div>
                <div class="testimonilas-carousel">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <!--testi-item-->
                            <div class="swiper-slide">
                                <div class="testi-item fl-wrap">
                                    <div class="testi-avatar"><img src="images/avatar/1.jpg" alt=""></div>
                                    <div class="testimonilas-text fl-wrap">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                        <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                        <a href="#" class="testi-link" target="_blank">Via Facebook</a>
                                        <div class="testimonilas-avatar fl-wrap">
                                            <h3>Andy Dimasky</h3>
                                            <h4>Restaurant Owner</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--testi-item end-->
                            <!--testi-item-->
                            <div class="swiper-slide">
                                <div class="testi-item fl-wrap">
                                    <div class="testi-avatar"><img src="images/avatar/1.jpg" alt=""></div>
                                    <div class="testimonilas-text fl-wrap">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                        <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                        <a href="#" class="testi-link" target="_blank">Via Twitter</a>
                                        <div class="testimonilas-avatar fl-wrap">
                                            <h3>Frank Dellov</h3>
                                            <h4>Hotel Owner</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--testi-item end-->
                            <!--testi-item-->
                            <div class="swiper-slide">
                                <div class="testi-item fl-wrap">
                                    <div class="testi-avatar"><img src="images/avatar/1.jpg" alt=""></div>
                                    <div class="testimonilas-text fl-wrap">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                        <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                        <a href="#" class="testi-link" target="_blank">Via Facebook</a>
                                        <div class="testimonilas-avatar fl-wrap">
                                            <h3>Centa Simpson</h3>
                                            <h4>Restaurant Owner</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--testi-item end-->
                            <!--testi-item-->
                            <div class="swiper-slide">
                                <div class="testi-item fl-wrap">
                                    <div class="testi-avatar"><img src="images/avatar/1.jpg" alt=""></div>
                                    <div class="testimonilas-text fl-wrap">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                        <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                        <a href="#" class="testi-link" target="_blank">Via Instagram</a>
                                        <div class="testimonilas-avatar fl-wrap">
                                            <h3>Linda Svensky</h3>
                                            <h4>Shop Owner</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--testi-item end-->
                        </div>
                    </div>
                </div>
                <div class="tc-pagination"></div>
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
        <!--section  -->
        <section class="gray-bg">
            <div class="container">
                <div class="clients-carousel-wrap fl-wrap">
                    <div class="cc-btn   cc-prev"><i class="fal fa-angle-left"></i></div>
                    <div class="cc-btn cc-next"><i class="fal fa-angle-right"></i></div>
                    <div class="clients-carousel">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <!--client-item-->
                                <div class="swiper-slide">
                                    <a href="#" class="client-item"><img src="images/clients/1.png" alt=""></a>
                                </div>
                                <!--client-item end-->
                                <!--client-item-->
                                <div class="swiper-slide">
                                    <a href="#" class="client-item"><img src="images/clients/1.png" alt=""></a>
                                </div>
                                <!--client-item end-->
                                <!--client-item-->
                                <div class="swiper-slide">
                                    <a href="#" class="client-item"><img src="images/clients/1.png" alt=""></a>
                                </div>
                                <!--client-item end-->
                                <!--client-item-->
                                <div class="swiper-slide">
                                    <a href="#" class="client-item"><img src="images/clients/1.png" alt=""></a>
                                </div>
                                <!--client-item end-->
                                <!--client-item-->
                                <div class="swiper-slide">
                                    <a href="#" class="client-item"><img src="images/clients/1.png" alt=""></a>
                                </div>
                                <!--client-item end-->
                                <!--client-item-->
                                <div class="swiper-slide">
                                    <a href="#" class="client-item"><img src="images/clients/1.png" alt=""></a>
                                </div>
                                <!--client-item end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--section end-->
    </div>
    <!--content end-->
@endsection
