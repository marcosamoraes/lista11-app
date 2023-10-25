@extends('layouts.app')

@section('title', 'Destacando sua empresa na internet.')

@section('content')
    <!-- content-->
    <div class="content">
        <!--section  -->
        <section>
            <div class="section-title">
                <h2>SOBRE NÓS</h2>
                <div class="section-subtitle">SOBRE NÓS</div>
            </div>
            <div class="container" style="margin-top: 80px">
                <div class="row">
                    <div class="col-md-6" style="text-align: left">
                        <h2 style="font-size: 38px; color: #4285F4; font-weight: 600">Uma Plataforma Dedicada em Expor sua Empresa em Destaque no Google.</h2>
                        <p class="pb-3" style="font-size: 28px; margin-bottom: 40px">
                            Não perca tempo, conheça nossos planos para anúncios voltados para a propaganda e divulgação da sua empresa ou negócio. Buscamos mostrar sua empresa em destaque nas pesquisas do Google, além de diversificar ou ampliar suas vendas, de uma maneira rápida e eficiente.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <img src="images/sobre1.webp" class="img-fluid" style="width: 100%" alt="Marketing Digital - Destacando sua empresa na internet." title="Marketing Digital - Destacando sua empresa na internet.">
                    </div>
                </div>
                <div class="row" style="margin-top: 100px">
                    <div class="col-md-6">
                        <img src="images/sobre2.webp" class="img-fluid" style="width: 100%" alt="Marketing Digital - Destacando sua empresa na internet." title="Marketing Digital - Destacando sua empresa na internet.">
                    </div>
                    <div class="col-md-6" style="text-align: left">
                        <h2 style="font-size: 38px; color: #4285F4; font-weight: 600">Mais comodidade e praticidade, a qualquer hora e em qualquer lugar!</h2>
                        <p class="pb-3" style="font-size: 28px; margin-bottom: 40px">
                            Com isso, estamos interligando pessoas, cidades e produtos. Nosso objetivo é proporcionar para pequenas e médias empresas a oportunidade de se posicionar digitalmente atravez do maior buscador mundial e principais redes sociais.
                        </p>
                    </div>
                </div>
                <div class="row" style="margin-top: 100px">
                    <a href="https://lista11.com.br/anunciar" target="_blank" class="btn  dec_btn  color2-bg">Anuncie seu negócio<i class="fal fa-arrow-alt-right"></i></a>
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
