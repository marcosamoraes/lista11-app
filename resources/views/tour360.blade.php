@extends('layouts.app')

@section('title', '...')

@section('content')
    <!-- content-->
    <div class="content">
        <!--section  -->
        <section>
            <div class="section-title">
                <h2>TOUR 360</h2>
                <div class="section-subtitle">TOUR 360</div>
            </div>
            <div class="container" style="margin-top: 80px">
                <div class="row">
                    <div class="col-md-6" style="text-align: left">
                        <h2 style="font-size: 32px; color: #4285F4; font-weight: 600">Google Street View</h2>
                        <h3 style="font-size: 28px; margin: 15px 0px">Conheça o Programa Trusted do Google.</h3>
                        <p class="pb-3" style="font-size: 20px; margin-bottom: 40px">
                            Escolher o restaurante, café ou hotel certo não é uma tarefa muito fácil. Estabeleça confiança com um tour virtual de alta qualidade que permita às pessoas viver a experiência de estar no seu estabelecimento antes mesmo de chegar lá.
                        </p>
                    </div>
                    <div class="col-md-6" style="display: relative">
                        <div class="embed-responsive" style="position: relative;display: block;width: 100%;padding-top: 56.25%;overflow: hidden;">
                            <iframe class="embed-responsive-item" src="images/video-lista11.mp4" style="position: absolute;left: 0; right: 0; width: 100%; bottom: 0; top: 0; height: 100%"></iframe>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 100px">
                    <div class="col-md-6">
                        <img src="images/tour360.png" class="img-fluid" style="width: 100%" alt="Marketing Digital - Destacando sua empresa na internet." title="Marketing Digital - Destacando sua empresa na internet.">
                    </div>
                    <div class="col-md-6" style="text-align: left">
                        <h2 style="font-size: 32px; color: #4285F4; font-weight: 600">Contrate um profissional do Programa Trusted</h2>
                        <h3 style="font-size: 28px; margin: 15px 0px">Impulsione sua visibilidade com profissionais credenciados.</h3>
                        <p class="pb-3" style="font-size: 20px; margin-bottom: 40px">
                            Essas experiências virtuais imersivas inspiram mais confiança entre os hóspedes e clientes em potencial, permitindo uma aproximação com seu cliente, impulsionando sua visibilidade com profissionais credenciados, tendo uma visão digital de qualidade.
                        </p>
                    </div>
                </div>
                <div class="row" style="margin-top: 100px">
                    <div class="col-12" style="text-align: center">
                        <h3 style="font-size: 28px">Por quê?</h3>
                    </div>
                    <div class="col-md-6" style="text-align: right">
                        <h2 style="font-size: 32px; color: #4285F4; font-weight: 600">Fichas com fotos e um tour virtual têm o dobro de probabilidade de gerar interesse.</h2>
                        <h3 style="font-size: 28px; margin: 15px 0px">Impulsione sua visibilidade com profissionais credenciados.</h3>
                    </div>
                    <div class="col-md-6" style="text-align: left">
                        <h2 style="font-size: 32px; color: #4285F4; font-weight: 600">Em média, 41% dessas pesquisas de lugar resultam em uma visita ao local.</h2>
                        <h3 style="font-size: 28px; margin: 15px 0px">Tenha uma visão digital de qualidade.</h3>
                    </div>
                </div>
                <div class="row" style="margin-top: 100px">
                    <a href="https://www.google.com/intl/pt-BR/streetview/business/trusted/#photographers" target="_blank" class="btn  dec_btn  color2-bg">Somos uma plataforma credenciada<i class="fal fa-arrow-alt-right"></i></a>
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
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--content end-->
@endsection
