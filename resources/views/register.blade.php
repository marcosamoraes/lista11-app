@extends('layouts.app')

@section('title', 'Destacando sua empresa na internet.')

@section('content')
<!-- content-->
<div class="content">
    <!--  section  -->
    <section class="parallax-section single-par" data-scrollax-parent="true">
        <div class="bg par-elem "  data-bg="images/bg/banner1.webp" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay op7"></div>
        <div class="container">
            <div class="section-title center-align big-title">
                <h2><span>Cadastre sua empresa</span></h2>
                <span class="section-separator"></span>
                <div class="breadcrumbs fl-wrap"><a href="{{ route('index') }}">Home</a><span>Cadastre sua empresa</span></div>
            </div>
        </div>
        <div class="header-sec-link">
            <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
        </div>
    </section>
    <!--  section  end-->
    <!--  section  -->
    <section   id="sec1" data-scrollax-parent="true">
        <div class="container">
            <!--about-wrap -->
            <div class="about-wrap">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="ab_text">
                            <div id="contact-form">
                                <div id="message"></div>
                                <form method="POST" action="{{ route('contact.store') }}" class="custom-form">
                                    @csrf
                                    <fieldset>
                                        <label><i class="fal fa-user"></i></label>
                                        <input type="text" name="name" id="name" placeholder="Nome Completo *" value=""/>
                                        <div class="clearfix"></div>
                                        <label><i class="fal fa-envelope"></i>  </label>
                                        <input type="email"  name="email" id="email" placeholder="E-mail *" value=""/>
                                        <label><i class="fab fa-whatsapp"></i>  </label>
                                        <input type="text"  name="whatsapp" id="whatsapp" placeholder="Whatsapp *" value=""/>
                                        <label><i class="fa fa-map-marker"></i>  </label>
                                        <input type="text"  name="city" id="city" placeholder="Cidade *" value=""/>
                                    </fieldset>
                                    <button class="btn float-btn color2-bg" id="submit">Cadastrar<i class="fal fa-paper-plane"></i></button>
                                </form>
                            </div>
                            <!-- contact form  end-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- about-wrap end  -->
        </div>
    </section>
</div>
<!--content end-->
@endsection
