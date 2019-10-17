@include('includes.head')

<header class="app-header-pages">
    <div class="app-header-pages__main">
        <h1 class="app-header-title">Perfil</h1>
        <div class="dropdown">
            <a class="btn btn-icon-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Sair</a>
            </div>
        </div>
    </div>
</header>
<div class="app-main app-main--grey">
    <div class="profile">
        <img src="dist/img/img-profile.png" alt="" class="profile__img">
        <h1>Carlos Ribeiro</h1>
        <span>carlos.filho@ferrugine.com.br</span>
    </div>
    <hr class="line-full"/>
    <h3 class="title-form-label">Estatísticas</h3>
    <div class="module-swiper">
        <div class="module-swiper-content">
            <div class="module-swiper__wrapper">
                <div class="module-swiper__item">
                    <div href="schedule-item.html" class="app-card card-report">
                        <span class="card-report__data">32</span>
                        <span class="card-report__name">Novos clientes este mês</span>
                    </div>
                </div>
                <div class="module-swiper__item">
                    <div href="schedule-item.html" class="app-card card-report">
                        <span class="card-report__data">13</span>
                        <span class="card-report__name">Agendamentos este mês</span>
                    </div>
                </div>
                <div class="module-swiper__item">
                    <div href="schedule-item.html" class="app-card card-report">
                        <span class="card-report__data">18</span>
                        <span class="card-report__name">Conversões em venda</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h3 class="title-form-label mt-4">Dados</h3>
    <div class="section-full">
        <div class="form-group">
            <label for="">Nome</label>
            <span class="value-input">Carlos Ribeiro</span>
        </div>
        <div class="form-group">
            <label for="">E-mail</label>
            <span class="value-input">carlos.filho@ferrugine.com.br</span>
        </div>
        <div class="form-group">
            <label for="">Telefone</label>
            <span class="value-input">(27) 9 9999-9999</span>
        </div>
        <div class="form-group">
            <label for="">Loja</label>
            <span class="value-input">Filial Camburi</span>
        </div>
    </div>
</div>

@include('includes.footer-menu')
