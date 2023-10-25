@extends('layouts.app')

@section('title', 'Destacando sua empresa na internet.')

@section('content')
    <!-- content-->
    <div class="content">
        <!--  section  -->
        <section class="parallax-section single-par" data-scrollax-parent="true">
            <div class="bg par-elem " data-bg="images/bg/banner1.webp" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay op7"></div>
            <div class="container">
                <div class="section-title center-align big-title">
                    <h2><span>Blog</span></h2>
                    <span class="section-separator"></span>
                </div>
            </div>
            <div class="header-sec-link">
                <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
            </div>
        </section>
        <!--  section  end-->
        <section class="gray-bg no-top-padding-sec" id="sec1">
            <div class="container">
                <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
                    <a href="{{ route('index') }}">Home</a> <span>Blog</span>
                    <div class="showshare brd-show-share color2-bg"> <i class="fas fa-share"></i> Compartilhar </div>
                </div>
                <div class="share-holder hid-share sing-page-share top_sing-page-share">
                    <div class="share-container  isShare"></div>
                </div>
                <div class="post-container fl-wrap">
                    <div class="row">
                        <!-- blog content-->
                        <div class="col-md-8 col-md-offset-2">
                            @if ($posts)
                                @foreach ($posts as $post)
                                    <!-- article> -->
                                    <article class="post-article">
                                        <div class="list-single-main-media fl-wrap">
                                            <div class="single-slider-wrap">
                                                <div class="single-slider fl-wrap">
                                                    <div class="swiper-container">
                                                        <div class="lightgallery">
                                                            <div class="hov_zoom">
                                                                <img src="{{ $post->image ? env('ADMIN_URL') . '/storage/' . $post->image : '/logo.webp' }}" alt="">
                                                                <a href="{{ $post->image ? env('ADMIN_URL') . '/storage/' . $post->image : '/logo.webp' }}" class="box-media-zoom popup-image">
                                                                    <i class="fal fa-search"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-single-main-item fl-wrap block_box">
                                            <h2 class="post-opt-title">{{ $post->title }}</h2>
                                            <p>{!! $post->content !!}</p>
                                            <span class="fw-separator"></span>
                                            <div class="post-opt">
                                                <ul class="no-list-style">
                                                    <li><i class="fal fa-calendar"></i> <span>{{ $post->created_at->format('d/m/Y') }}</span></li>
                                                    <li><i class="fal fa-eye"></i> <span>{{ $post->visits }}</span></li>
                                                    @if ($post->tags)
                                                        <li><i class="fal fa-tags"></i> {{ $post->tags->pluck('name')->join(', ') }} </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </article>
                                    <!-- article end -->
                                @endforeach
                                <div class="pagination">
                                    @if ($posts->currentPage() > 1)
                                        <a href="{{ $posts->previousPageUrl() }}" class="prevposts-link"><i class="fas fa-caret-left"></i><span>Prev</span></a>
                                    @endif

                                    @for ($i = $posts->currentPage() >= 3 ? $posts->currentPage() - 2 : $posts->currentPage(); $i <= ($posts->lastPage() <= $posts->currentPage() + 2 ? $posts->lastPage() : $posts->currentPage() + 2); $i++)
                                        <a href="{{ $posts->url($i) }}" class="{{ $posts->currentPage() == $i ? 'current-page' : '' }}">{{ $i }}</a>
                                    @endfor

                                    @if ($posts->currentPage() < $posts->lastPage())
                                        <a href="{{ $posts->nextPageUrl() }}" class="nextposts-link"><span>Next</span><i class="fas fa-caret-right"></i></a>
                                    @endif
                                </div>
                            @else
                                <div class="alert alert-warning" role="alert">
                                    Nenhum post encontrado!
                                </div>
                            @endif
                        </div>
                        <!-- blog conten end-->
                    </div>
                </div>
            </div>
        </section>
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--content end-->
@endsection
