@extends('layouts.app')

@section('title', 'Ribeirão Preto - Restaurante, hotel, bares, lojas, oficina, som e muito mais...')

@section('content')
    <main>
        <div class="page_header element_to_stick">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="/">Início</a></li>
                                <li>Empresas</li>
                            </ul>
                        </div>
                        <h1>{{ $companies->count() }} empresas</h1>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-5">
                        <form>
                            @foreach (request()->all() as $key => $value)
                                @if ($key != 'city')
                                    @foreach ((array) $value as $v)
                                        <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                                    @endforeach
                                @endif
                            @endforeach
                            <div class="search_bar_list">
                                <input type="text" class="form-control" name="city" placeholder="Nome da empresa, endereço ou cidade..." value="{{ request()->city }}">
                                <input type="submit" value="Busca">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>
        <!-- /page_header -->
        <div class="container margin_30_40">
            <div class="row">
                <aside class="col-lg-3" id="sidebar_fixed">
                    <div class="filter_col">
                        <div class="inner_bt"><a href="#" class="open_filters"><i class="icon_close"></i></a></div>
                        <form>
                            <input type="hidden" name="city" value="{{ request()->city }}">
                            <div class="filter_type">
                                <h4><a href="#filter_1" data-bs-toggle="collapse" class="opened">Categorias</a></h4>
                                <div class="collapse show" id="filter_1">
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li>
                                                <label class="container_check">{{ $category->name }} <small>{{ $category->companies_count }}</small>
                                                    <input type="checkbox" name="cat[]" value="{{ $category->id }}" {{ in_array($category->id, (array) request()->cat) ? 'checked' : '' }}>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- /filter_type -->
                            </div>
                            <!-- /filter_type -->
                            <div class="buttons">
                                <button type="submit" class="btn_1 full-width">Filtrar</button>
                            </div>
                        </form>
                    </div>
                </aside>

                <div class="col-lg-9">
                    <div class="row">
                        @if ($companies->count() > 0)
                            @foreach ($companies as $company)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="strip">
                                        <figure>
                                            <img src="img/lazy-placeholder.png" data-src="{{ $company->image ? env('PAINEL_URL') . '/storage/' . $company->image : '/img/logo.webp' }}" class="img-fluid lazy"
                                                alt="">
                                            <a href="/empresa/{{ str()->slug($company->city) }}/{{ $company->slug }}" class="strip_info">
                                                <small>{{ $company->categories[0]->name }}</small>
                                                <div class="item_title">
                                                <h3>{{ $company->name }}</h3>
                                                <small>{{ "{$company->city}/{$company->state}" }}</small>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-warning" role="alert">
                                Nenhuma empresa foi encontrada nesta pesquisa.
                            </div>
                        @endif
                    </div>
                    <!-- /row -->
                    @if ($companies->lastPage() > 1)
                        <div class="pagination_fg">
                            @if ($companies->currentPage() > 1)
                                <a href="{{ $companies->previousPageUrl() }}">&laquo;</a>
                            @endif

                            @for ($i = 1; $i <= $companies->lastPage(); $i++)
                                <a href="{{ $companies->url($i) }}" class="{{ $companies->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                            @endfor

                            @if ($companies->currentPage() < $companies->lastPage())
                                <a href="{{ $companies->nextPageUrl() }}">&raquo;</a>
                            @endif
                        </div>
                    @endif
                </div>
                <!-- /col -->
            </div>
        </div>
        <!-- /container -->
    </main>
@endsection

@push('scripts')
    <!-- SPECIFIC CSS -->
    <link href="css/listing.css" rel="stylesheet">

    <!-- SPECIFIC SCRIPTS -->
    <script src="js/sticky_sidebar.min.js"></script>
    <script src="js/specific_listing.js"></script>
@endpush
