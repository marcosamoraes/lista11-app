<header
    class="clearfix {{ !request()->route()->named('listing') &&!request()->route()->named('listing.view') &&!request()->route()->named('register')? 'header element_to_stick': 'header_in' }}">
    <div class="container">
        <div id="logo">
            <a href="/">
                <img src="/img/logo.webp" height="50" alt="" class="logo_normal">
                @if (
                    !request()->route()->named('listing') &&
                        !request()->route()->named('listing.view') &&
                        !request()->route()->named('register'))
                    <img src="/img/logo.webp" height="50" alt="" class="logo_sticky">
                @endif
                <img src="/img/google-partner-sm.webp" height="50" alt="">
            </a>
        </div>
        <!-- /top_menu -->
        <a href="#0" class="open_close" style="color: black">
            <i class="icon_menu"></i><span>Menu</span>
        </a>
        <nav class="main-menu">
            <div id="header_menu">
                <a href="#" class="open_close">
                    <i class="icon_close" style="color: black"></i><span>Menu</span>
                </a>
                <a href="/"><img src="/img/logo.webp" height="50" alt=""></a>
            </div>
            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/empresas">Empresas</a>
                </li>
                <li>
                    <a href="/cadastro">Cadastre sua empresa</a>
                </li>
                <li>
                    <a href="/contato">Contato</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
