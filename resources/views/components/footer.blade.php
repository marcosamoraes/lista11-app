<!--footer -->
<footer class="main-footer fl-wrap">
    <!--footer-inner-->
    <div class="footer-inner   fl-wrap">
        <div class="container">
            <div class="row">
                <!-- footer-widget-->
                <div class="col-md-4">
                    <div class="footer-widget fl-wrap">
                        <div class="footer-logo"><a href="{{ route('index') }}"><img src="/logo.webp" alt=""></a></div>
                        <div class="footer-contacts-widget fl-wrap">
                            <p>Não perca tempo, conheça nossos planos para anúncios voltados para a propaganda e divulgação da sua empresa ou negócio.<br />
                                Buscamos mostrar sua empresa em destaque nas pesquisas do Google, além de diversificar ou ampliar suas vendas, de uma maneira rápida e eficiente.</p>
                            <div class="footer-social">
                                <span>Nos siga: </span>
                                <ul class="no-list-style">
                                    <li><a href="https://www.facebook.com/lista11sitedebusca" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.instagram.com/agencialista11/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://www.tiktok.com/@agencialista11" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer-widget end-->
                <!-- footer-widget-->
                <div class="col-md-4">
                    @if ($footerPosts)
                        <div class="footer-widget fl-wrap">
                            <h3>Blog</h3>
                            <div class="footer-widget-posts fl-wrap">
                                <ul class="no-list-style">
                                    @foreach ($footerPosts as $post)
                                        <li class="clearfix">
                                            <a href="/blog" class="widget-posts-img"><img src="{{ env('ADMIN_URL') . '/storage/' . $post->image }}" class="respimg" alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="/blog" title="">{{ $post->title }}</a>
                                                <span class="widget-posts-date"><i class="fal fa-calendar"></i> {{ $post->created_at->format('d/m/Y H:i'); }} </span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="/blog" class="footer-link">Ver todos <i class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- footer-widget end-->
                <!-- footer-widget  -->
                <div class="col-md-4">
                    <div class="footer-widget fl-wrap ">
                        <h3>Links</h3>
                            <ul class="footer-list fl-wrap">
                                <li><a href="/sobre">Sobre nós</a></li>
                                <li><a href="/tour360">Tour360</a></li>
                                <li><a href="/blog">Blog</a></li>
                                <li><a href="/contato">Contato</a></li>
                            </ul>
                            <a href="#" class=" down-btn color3-bg fl-wrap"><i class="fab fa-apple"></i>  Apple Store </a>
                            <a href="#" class=" down-btn color3-bg fl-wrap"><i class="fab fa-android"></i>  Google Play </a>
                    </div>
                </div>
                <!-- footer-widget end-->
            </div>
        </div>
        <!-- footer bg-->
        <div class="footer-bg" data-ran="4"></div>
        <div class="footer-wave">
            <svg viewbox="0 0 100 25">
                <path fill="#fff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z" />
            </svg>
        </div>
        <!-- footer bg  end-->
    </div>
    <!--footer-inner end -->
    <!--sub-footer-->
    <div class="sub-footer  fl-wrap">
        <div class="container">
            <div class="copyright"> &#169; Grupo Lista 11 - Todos os direitos reservados.</div>
            <a href="{{ route('register') }}" class="add-list color-bg" style="top: 0; left: 20px">Apareça no Google</a>
            <div class="subfooter-nav">
                <ul class="no-list-style">
                    <li><a href="{{ route('register') }}">Quer sua empresa aqui? Anuncie já!</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--sub-footer end -->
</footer>
<!--footer end -->
