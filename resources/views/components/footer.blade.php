<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_1">Guia de Empresas</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_1">
                    <ul>
                        @foreach ($footerCompanies as $footerCompany)
                            <li><a href="/empresa/{{ str()->slug($footerCompany->city) }}/{{ $footerCompany->slug }}">{{ $footerCompany->name }}</a></li>
                        @endforeach
                        <li><a href="/empresas"><b>Ver mais</b></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_2">Cidades Atendidas</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_2">
                    <ul>
                        @foreach ($footerCities as $footerCity)
                            <li><a href="/empresas?city={{ $footerCity }}">{{ $footerCity }}</a></li>
                        @endforeach
                        <li><a href="/empresas"><b>Ver mais</b></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_2">Google Partner</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_2">
                    <img src="/img/google-partner.webp" height="100" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_3">Contato</h3>
                <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                    <ul>
                        <li><i class="icon_mobile"></i>(16) 98193-8181</li>
                        <li><i class="icon_mail_alt"></i><a href="#0">contato@achei16.com.br</a></li>
                    </ul>
                    <img src="/img/site-seguro.webp" height="100" alt="">
                </div>
            </div>
        </div>
        <!-- /row-->
    </div>
</footer>
