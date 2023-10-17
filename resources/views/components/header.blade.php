<!-- header -->
<header class="main-header">
    <!-- logo-->
    <a href="index.html" class="logo-holder"><img src="/logo.webp" alt=""></a>
    <!-- logo end-->
    <!-- header opt -->
    <a href="{{ route('register') }}" class="add-list color-bg">Apareça no Google</a>
    <a href="{{ env('ADMIN_URL') }}">
        <div class="show-reg-form avatar-img" data-srcav="images/avatar/3.jpg"><i class="fal fa-user"></i>Entrar</div>
    </a>
    <!-- header opt end-->
    <!-- nav-button-wrap-->
    <div class="nav-button-wrap color-bg">
        <div class="nav-button">
            <span></span><span></span><span></span>
        </div>
    </div>
    <!-- nav-button-wrap end-->
    <!--  navigation -->
    <div class="nav-holder main-menu">
        <nav>
            <ul class="no-list-style">
                <li>
                    <a href="{{ route('index') }}" class="act-link">Home</a>
                </li>
                <li>
                    <a href="{{ route('listing') }}" class="act-link">Locais</a>
                </li>
                <li>
                    <a href="#" class="act-link">Tour360º</a>
                </li>
                <li>
                    <a href="#" class="act-link">Blog</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="act-link">Contato</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- navigation  end -->
</header>
<!-- header end-->
