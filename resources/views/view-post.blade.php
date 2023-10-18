@extends('layouts.app')

@section('title', "{$company->name} - {$company->city}/{$company->state} - {$company->categories[0]->name}")

@section('image', $company->image ? env('PAINEL_URL') . '/storage/' . $company->image : '/img/logo.webp')
@section('description', $company->description)
@section('abstract', $company->tags->pluck('name')->implode(','))
@section('keywords', $company->tags->pluck('name')->implode(','))

@section('content')
    <!-- content-->
    <div class="content">
        <section class="gray-bg no-top-padding-sec" id="sec1">
            <div class="container">
                <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
                    <a href="#">Home</a><a href="#">Blog</a> <span>Blog Single</span>
                    <div class="showshare brd-show-share color2-bg"> <i class="fas fa-share"></i> Share </div>
                </div>
                <div class="share-holder hid-share sing-page-share top_sing-page-share">
                    <div class="share-container  isShare"></div>
                </div>
                <div class="post-container fl-wrap">
                    <div class="row">
                        <!-- blog content-->
                        <div class="col-md-8">
                            <!-- article> -->
                            <article class="post-article single-post-article">
                                <div class="list-single-main-media fl-wrap">
                                    <div class="single-slider-wrap">
                                        <div class="single-slider fl-wrap">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper lightgallery">
                                                    <div class="swiper-slide hov_zoom"><img src="images/all/1.jpg"
                                                            alt=""><a href="images/all/1.jpg"
                                                            class="box-media-zoom   popup-image"><i
                                                                class="fal fa-search"></i></a></div>
                                                    <div class="swiper-slide hov_zoom"><img src="images/all/1.jpg"
                                                            alt=""><a href="images/all/1.jpg"
                                                            class="box-media-zoom   popup-image"><i
                                                                class="fal fa-search"></i></a></div>
                                                    <div class="swiper-slide hov_zoom"><img src="images/all/1.jpg"
                                                            alt=""><a href="images/all/1.jpg"
                                                            class="box-media-zoom   popup-image"><i
                                                                class="fal fa-search"></i></a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="listing-carousel_pagination">
                                            <div class="listing-carousel_pagination-wrap">
                                                <div class="ss-slider-pagination"></div>
                                            </div>
                                        </div>
                                        <div class="ss-slider-cont ss-slider-cont-prev color2-bg"><i
                                                class="fal fa-long-arrow-left"></i></div>
                                        <div class="ss-slider-cont ss-slider-cont-next color2-bg"><i
                                                class="fal fa-long-arrow-right"></i></div>
                                    </div>
                                </div>
                                <div class="list-single-main-item fl-wrap block_box">
                                    <h2 class="post-opt-title"><a href="blog-single.html">Here’s What People Are Saying
                                            About Us.</a></h2>
                                    <div class="post-author"><a href="#"><img src="images/avatar/1.jpg"
                                                alt=""><span>By , Alisa Noory</span></a></div>
                                    <div class="post-opt">
                                        <ul class="no-list-style">
                                            <li><i class="fal fa-calendar"></i> <span>25 April 2018</span></li>
                                            <li><i class="fal fa-eye"></i> <span>264</span></li>
                                            <li><i class="fal fa-tags"></i> <a href="#">Photography</a> , <a
                                                    href="#">Design</a> </li>
                                        </ul>
                                    </div>
                                    <span class="fw-separator"></span>
                                    <div class="clearfix"></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed
                                        sollicitudin. Donec non odio neque. Aliquam hendrerit sollicitudin purus, quis
                                        rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci
                                        congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is
                                        a text link libero tempus congue.</p>
                                    <p>Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed
                                        mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus
                                        urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes,
                                        nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum
                                        metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa
                                        magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at
                                        interdum mauris sollicitudin et</p>
                                    <blockquote>
                                        <p>Vestibulum id ligula porta felis euismod semper. Sed posuere consectetur est at
                                            lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis
                                            vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula,
                                            eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor
                                            fringilla. Vestibulum id ligula porta felis euismod semper.</p>
                                    </blockquote>
                                    <p>Ut nec hinc dolor possim. An eros argumentum vel, elit diceret duo eu, quo et aliquid
                                        ornatus delicatissimi. Cu nam tale ferri utroque, eu habemus albucius mel, cu vidit
                                        possit ornatus eum. Eu ius postulant salutatus definitionem, an e trud erroribus
                                        explicari. Graeci viderer qui ut, at habeo facer solet usu. Pri choro pertinax
                                        indoctum ne, ad partiendo persecuti forensibus est.</p>
                                    <span class="fw-separator"></span>
                                    <div class="list-single-tags tags-stylwrap">
                                        <span class="tags-title"><i class="fas fa-tag"></i> Tags : </span>
                                        <a href="#">Hotel</a>
                                        <a href="#">Hostel</a>
                                        <a href="#">Room</a>
                                        <a href="#">Spa</a>
                                        <a href="#">Restourant</a>
                                        <a href="#">Parking</a>
                                    </div>
                                </div>
                            </article>
                            <!-- article end -->
                            <!-- post nav -->
                            <div class="post-nav-wrap fl-wrap">
                                <a class="post-nav post-nav-prev" href="blog-single.html"><span class="post-nav-img"><img
                                            src="images/all/1.jpg" alt=""></span><span
                                        class="post-nav-text"><strong>Prev Post</strong> <br>How to choose the right
                                        store</span></a>
                                <a class="post-nav post-nav-next" href="blog-single.html"><span class="post-nav-img"><img
                                            src="images/all/1.jpg" alt=""></span><span
                                        class="post-nav-text"><strong>Next Post</strong><br>Best Hotel to Your
                                        Family</span></a>
                            </div>
                            <!-- post nav end -->
                            <!-- list-single-main-item -->
                            <div class="list-single-main-item fl-wrap block_box">
                                <div class="list-single-main-item-title">
                                    <h3>Post Comments - <span> 2 </span></h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <div class="reviews-comments-wrap">
                                        <!-- reviews-comments-item -->
                                        <div class="reviews-comments-item only-comments">
                                            <div class="review-comments-avatar">
                                                <img src="images/avatar/1.jpg" alt="">
                                            </div>
                                            <div class="reviews-comments-item-text fl-wrap">
                                                <div class="reviews-comments-header fl-wrap">
                                                    <h4><a href="#">Liza Rose</a></h4>
                                                </div>
                                                <p>" Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.
                                                    Nulla consequat massa quis enim. Donec pede justo, fringilla vel,
                                                    aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet
                                                    a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. "
                                                </p>
                                                <div class="reviews-comments-item-footer fl-wrap">
                                                    <div class="reviews-comments-item-date"><span><i
                                                                class="far fa-calendar-check"></i>12 April 2018</span></div>
                                                    <a href="#" class="reply-item">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--reviews-comments-item end-->
                                        <!-- reviews-comments-item -->
                                        <div class="reviews-comments-item only-comments">
                                            <div class="review-comments-avatar">
                                                <img src="images/avatar/1.jpg" alt="">
                                            </div>
                                            <div class="reviews-comments-item-text fl-wrap">
                                                <div class="reviews-comments-header fl-wrap">
                                                    <h4><a href="#">Adam Koncy</a></h4>
                                                </div>
                                                <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere
                                                    convallis purus non cursus. Cras metus neque, gravida sodales massa ut.
                                                    "</p>
                                                <div class="reviews-comments-item-footer fl-wrap">
                                                    <div class="reviews-comments-item-date"><span><i
                                                                class="far fa-calendar-check"></i>03 December 2017</span>
                                                    </div>
                                                    <a href="#" class="reply-item">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--reviews-comments-item end-->
                                    </div>
                                </div>
                            </div>
                            <!-- list-single-main-item end -->
                            <!-- list-single-main-item -->
                            <div class="list-single-main-item fl-wrap block_box" id="sec6">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>Add Comment</h3>
                                </div>
                                <!-- Add Review Box -->
                                <div id="add-review" class="add-review-box">
                                    <!-- Review Comment -->
                                    <form id="add-comment" class="add-comment  custom-form" name="rangeCalc">
                                        <fieldset>
                                            <div class="list-single-main-item_content fl-wrap">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label><i class="fal fa-user"></i></label>
                                                        <input type="text" placeholder="Your Name *" value="" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label><i class="fal fa-envelope"></i> </label>
                                                        <input type="text" placeholder="Email Address*"
                                                            value="" />
                                                    </div>
                                                </div>
                                                <textarea cols="40" rows="3" placeholder="Your comment:"></textarea>
                                                <div class="clearfix"></div>
                                                <button class="btn  color2-bg  float-btn" style="margin-top:30px;">Submit
                                                    Comment <i class="fal fa-paper-plane"></i></button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                                <!-- Add Review Box / End -->
                            </div>
                            <!-- list-single-main-item end -->
                        </div>
                        <!-- blog conten end-->
                        <!-- blog sidebar -->
                        <div class="col-md-4">
                            <div class="box-widget-wrap fl-wrap fixed-bar">
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap block_box">
                                    <div class="box-widget-item-header">
                                        <h3>Search In Blog</h3>
                                    </div>
                                    <div class="box-widget fl-wrap">
                                        <div class="box-widget-content">
                                            <div class="search-widget">
                                                <form action="#" class="fl-wrap">
                                                    <input name="se" id="se" type="text" class="search"
                                                        placeholder="Search.." value="" />
                                                    <button class="search-submit color2-bg" id="submit_btn"><i
                                                            class="fal fa-search"></i> </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap block_box">
                                    <div class="box-widget-item-header">
                                        <h3>Popular Posts</h3>
                                    </div>
                                    <div class="box-widget  fl-wrap">
                                        <div class="box-widget-content">
                                            <!--widget-posts-->
                                            <div class="widget-posts  fl-wrap">
                                                <ul class="no-list-style">
                                                    <li>
                                                        <div class="widget-posts-img"><a href="blog-single.html"><img
                                                                    src="images/gallery/thumbnail/1.png"
                                                                    alt=""></a></div>
                                                        <div class="widget-posts-descr">
                                                            <h4><a href="listing-single.html">Nullam dictum felis</a></h4>
                                                            <div class="geodir-category-location fl-wrap"><a
                                                                    href="#"><i class="fal fa-calendar"></i> 27 Mar
                                                                    2019</a></div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="widget-posts-img"><a href="blog-single.html"><img
                                                                    src="images/gallery/thumbnail/1.png"
                                                                    alt=""></a></div>
                                                        <div class="widget-posts-descr">
                                                            <h4><a href="listing-single.html">Scrambled it to mak</a></h4>
                                                            <div class="geodir-category-location fl-wrap"><a
                                                                    href="#"><i class="fal fa-calendar"></i> 12 May
                                                                    2018</a></div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="widget-posts-img"><a href="blog-single.html"><img
                                                                    src="images/gallery/thumbnail/1.png"
                                                                    alt=""></a> </div>
                                                        <div class="widget-posts-descr">
                                                            <h4><a href="listing-single.html">Fermentum nis type</a></h4>
                                                            <div class="geodir-category-location fl-wrap"><a
                                                                    href="#"><i class="fal fa-calendar"></i>22 Feb
                                                                    2018</a></div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="widget-posts-img"><a href="blog-single.html"><img
                                                                    src="images/gallery/thumbnail/1.png"
                                                                    alt=""></a> </div>
                                                        <div class="widget-posts-descr">
                                                            <h4><a href="listing-single.html">Rutrum elementum</a></h4>
                                                            <div class="geodir-category-location fl-wrap"><a
                                                                    href="#"><i class="fal fa-calendar"></i> 7 Mar
                                                                    2017</a></div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- widget-posts end-->
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap">
                                    <div class="banner-wdget fl-wrap">
                                        <div class="overlay"></div>
                                        <div class="bg" data-bg="images/bg/1.jpg"></div>
                                        <div class="banner-wdget-content fl-wrap">
                                            <h4>Whant to be notified about new post and news ? Subscribe For a Newsletter.
                                            </h4>
                                            <a href="#subscribe" class="custom-scroll-link color-bg"> Sign up</a>
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap block_box">
                                    <div class="box-widget-item-header">
                                        <h3>Popular Tags</h3>
                                    </div>
                                    <div class="box-widget fl-wrap">
                                        <div class="box-widget-content">
                                            <div class="list-single-tags tags-stylwrap">
                                                <a href="#">Hotel</a>
                                                <a href="#">Hostel</a>
                                                <a href="#">Room</a>
                                                <a href="#">Spa</a>
                                                <a href="#">Restourant</a>
                                                <a href="#">Parking</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap block_box">
                                    <div class="box-widget-item-header">
                                        <h3>Popular Categories</h3>
                                    </div>
                                    <div class="box-widget fl-wrap">
                                        <div class="box-widget-content">
                                            <ul class="cat-item no-list-style">
                                                <li><a href="#">Standard</a> <span>3</span></li>
                                                <li><a href="#">Video</a> <span>6 </span></li>
                                                <li><a href="#">Gallery</a> <span>12 </span></li>
                                                <li><a href="#">Quotes</a> <span>4</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->
                            </div>
                        </div>
                        <!-- blog sidebar end -->
                    </div>
                </div>
            </div>
        </section>
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--content end-->
@endsection
