@extends('layouts.app')

@section('title', 'Destacando sua empresa na internet.')

@section('content')
    @php
        $captcha1 = rand(1, 9);
        $captcha2 = rand(1, 9);
        $captcha = $captcha1 + $captcha2;
    @endphp

    <!-- content-->
    <div class="content">
        <!--  section  -->
        <section class="parallax-section single-par" data-scrollax-parent="true">
            <div class="bg par-elem "  data-bg="images/bg/banner1.webp" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay op7"></div>
            <div class="container">
                <div class="section-title center-align big-title">
                    <h2><span>Contato</span></h2>
                    <span class="section-separator"></span>
                    <div class="breadcrumbs fl-wrap"><a href="{{ route('index') }}">Home</a><span>Contato</span></div>
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
                        <div class="col-md-12">
                            <div class="ab_text">
                                <div class="ab_text-title fl-wrap">
                                    <h3>Deixe sua mensagem</h3>
                                    <span class="section-separator fl-sec-sep"></span>
                                </div>
                                <div id="contact-form">
                                    <div id="message"></div>
                                    <form class="custom-form" method="post">
                                        @csrf
                                        <fieldset>
                                            <label><i class="fal fa-user"></i></label>
                                            <input type="text" name="name" id="name" placeholder="Nome *" value="" required />
                                            <div class="clearfix"></div>
                                            <label><i class="fal fa-envelope"></i>  </label>
                                            <input type="text" name="email" id="email" placeholder="E-mail *" value="" required />
                                            <div class="clearfix"></div>
                                            <label><i class="fab fa-whatsapp"></i>  </label>
                                            <input type="text" name="whatsapp" id="whatsapp" placeholder="Whatsapp *" value="" required />
                                            <div class="clearfix"></div>
                                            <label for="captcha"><i class="fal fa-shield-check"></i></label>
                                            <input type="text" name="captcha" id="captcha" placeholder="Quanto é {{ $captcha1 }} + {{ $captcha2 }}? *" value="" required />
                                            <textarea name="comments"  id="comments" cols="40" rows="3" placeholder="Mensagem:"></textarea>
                                        </fieldset>
                                        <button type="submit" class="btn float-btn color2-bg">Enviar<i class="fal fa-paper-plane"></i></button>
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
        <section class="no-padding-section">
            <div class="map-container">
                <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781" data-mapTitle="Our Location"></div>
            </div>
        </section>
    </div>
    <!--content end-->
@endsection

@push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                var captcha = document.querySelector('#captcha').value;

                if (parseInt(captcha) !== {{ $captcha }}) {
                    alert('Captcha inválido!');
                    return;
                }

                e.currentTarget.submit();
            });
        });
    </script>
@endpush
