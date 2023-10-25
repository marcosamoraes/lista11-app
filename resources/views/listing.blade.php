@extends('layouts.app')

@section('title', '...')

@section('content')
    <!-- content-->
    <div class="content">
        <!--  section  -->
        <section class="parallax-section single-par" data-scrollax-parent="true">
            <div class="bg par-elem "  data-bg="images/bg/banner1.webp" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay op7"></div>
            <div class="container">
                <div class="section-title center-align big-title">
                    <h2><span>Locais</span></h2>
                    <span class="section-separator"></span>
                </div>
            </div>
            <div class="header-sec-link">
                <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
            </div>
        </section>
        <!--  section  end-->
        <section class="gray-bg small-padding no-top-padding-sec" id="sec1">
            <div class="container">
                <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
                    <a href="{{ route('index') }}">Home</a>
                    <span>Locais</span>
                </div>
                <div class="mob-nav-content-btn  color2-bg show-list-wrap-search ntm fl-wrap"><i class="fal fa-filter"></i>  Filtros</div>
                <div class="fl-wrap">
                    <div class="row">
                        <div class="col-md-4">
                            <div class=" fl-wrap lws_mobile   tabs-act block_box">
                                <div class="scrl-content filter-sidebar    fs-viscon" style="margin-top: 20px">
                                    <!--tabs -->
                                    <div class="tabs-container fl-wrap">
                                        <!--tab -->
                                        <div class="tab">
                                            <form>
                                                <div id="filters-search" class="tab-content  first-tab ">
                                                    <!-- listsearch-input-item-->
                                                    <div class="listsearch-input-item">
                                                        <span class="iconn-dec"><i class="far fa-bookmark"></i></span>
                                                        <input type="text" name="search" value="{{ request()->search }}" placeholder="O que você está procurando?" value=""/>
                                                    </div>
                                                    <!-- listsearch-input-item end-->
                                                    <!-- listsearch-input-item-->
                                                    <div class="listsearch-input-item">
                                                        <select data-placeholder="Categories" name="cat" class="chosen-select no-search-select" >
                                                            <option>Todas Categorias</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}" {{ $category->id == request()->cat ? 'selected' : '' }}>
                                                                    {{ $category->name }} ({{ $category->companies_count }})
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!-- listsearch-input-item end-->
                                                    <!-- listsearch-input-item-->
                                                    <div class="listsearch-input-item location autocomplete-container">
                                                        <span class="iconn-dec"><i class="fa fa-map-marker"></i></span>
                                                        <input type="text" placeholder="Localização" name="city" value="{{ request()->city }}" class="autocomplete-input" id="autocompleteid3" value=""/>
                                                    </div>
                                                    <!-- listsearch-input-item end-->
                                                    <!-- listsearch-input-item-->
                                                    <div class="listsearch-input-item">
                                                        <button type="submit" class="header-search-button color-bg"><i class="fa fa-search"></i><span>Buscar</span></button>
                                                    </div>
                                                    <!-- listsearch-input-item end-->
                                                    <a href="{{ route('listing') }}">
                                                        <div class="clear-filter-btn"><i class="fa fa-redo"></i> Resetar Filtros</div>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                        <!--tab end-->
                                    </div>
                                    <!--tabs end-->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <!-- listing-item-container -->
                            <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic">
                                @if ($companies->count() > 0)
                                    @foreach ($companies as $company)
                                        <!-- listing-item  -->
                                        <div class="listing-item">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img">
                                                    <a href="{{ route('listing.view', ['city' => $company->city, 'company' => $company->slug]) }}" class="geodir-category-img-wrap fl-wrap">
                                                    <img src="{{ $company->image ? env('ADMIN_URL') . '/storage/' . $company->image : '/logo.webp' }}" alt="">
                                                    </a>
                                                    <div class="geodir-category-opt">
                                                        <div class="listing-rating-count-wrap">
                                                            <div class="review-score">{{ number_format($company->rating, 1) }}</div>
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ number_format($company->rating / 2, 1) }}"></div>
                                                            <br>
                                                            <div class="reviews-count">{{ $company->reviews()->count() }} Avaliações</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-content fl-wrap title-sin_item">
                                                    <div class="geodir-category-content-title fl-wrap">
                                                        <div class="geodir-category-content-title-item">
                                                            <h3 class="title-sin_map">
                                                                <a href="{{ route('listing.view', ['city' => $company->city, 'company' => $company->slug]) }}">
                                                                    {{ $company->name }}
                                                                </a>
                                                                <span class="verified-badge"><i class="fal fa-check"></i></span>
                                                            </h3>
                                                            <div class="geodir-category-location fl-wrap"><a target="_blank" href="https://www.google.com/maps/place/{{ $company->full_address }}"><i class="fas fa-map-marker-alt"></i> {{ $company->full_address }}</a></div>
                                                        </div>
                                                    </div>
                                                    <div class="geodir-category-text fl-wrap">
                                                        <p class="small-text">{{ $company->description }}</p>
                                                    </div>
                                                    <div class="geodir-category-footer fl-wrap">
                                                        <a class="listing-item-category-wrap" href="#">
                                                            <div class="listing-item-category" style="width:0"></div>
                                                            <span>{{ $company->categories[0]->name }}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <!-- listing-item end -->
                                    @endforeach
                                @else
                                    <div class="alert alert-warning" role="alert">
                                        Nenhuma empresa foi encontrada nesta pesquisa.
                                    </div>
                                @endif
                                <div class="pagination fwmpag">
                                    @if ($companies->currentPage() > 1)
                                        <a href="{{ $companies->previousPageUrl() }}" class="prevposts-link"><i class="fas fa-caret-left"></i><span>Prev</span></a>
                                    @endif

                                    @for ($i = $companies->currentPage() >= 3 ? $companies->currentPage() - 2 : $companies->currentPage(); $i <= ($companies->lastPage() <= $companies->currentPage() + 2 ? $companies->lastPage() : $companies->currentPage() + 2); $i++)
                                        <a href="{{ $companies->url($i) }}" class="{{ $companies->currentPage() == $i ? 'current-page' : '' }}">{{ $i }}</a>
                                    @endfor

                                    @if ($companies->currentPage() < $companies->lastPage())
                                        <a href="{{ $companies->nextPageUrl() }}" class="nextposts-link"><span>Next</span><i class="fas fa-caret-right"></i></a>
                                    @endif
                                </div>
                            </div>
                            <!-- listing-item-container end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--content end-->
@endsection
