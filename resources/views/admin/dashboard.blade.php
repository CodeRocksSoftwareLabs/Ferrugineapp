@include('includes.head')

<div class="menu-bar">
    <h3 class="menu-bar__user">{{ Session::get('usuario')->ds_nome }}</h3>
    <div class="menu-bar__item"><a href="{{ route('usuarios.listar') }}" class="menu-bar__link"><i class="fas fa-user-tie mr-2"></i>Vendedores</a></div>
    <div class="menu-bar__item"><a href="{{ route('relatorios') }}" class="menu-bar__link"><i class="fas fa-chart-pie mr-2"></i>Relatórios</a></div>
    <!--div class="menu-bar__item menu-bar__item--pos-bottom"><a href="config.html" class="menu-bar__link"><i class="fas fa-cog mr-2"></i>Configurações</a></div-->
</div>
<div class="menu-bar__close"></div>

<header class="app-header">
    <div class="logged-user">
        <span>Bem-vindo</span>
        <h2>{{ Session::get('usuario')->ds_nome }}</h2>
    </div>
    <a href="javascript:void(0)" class="btn btn-icon-primary menu-bar__button"><i class="fas fa-bars"></i></a>
</header>
<div class="app-main app-main--grey">
    <section class="module-swiper mt-4">
        <h3 class="title">Dados deste mês</h3>
        <div class="module-swiper-content">
            <div class="module-swiper__wrapper">
                <div class="module-swiper__item">
                    <div href="schedule-item.html" class="app-card card-report">
                        <span class="card-report__data">{{ InterfaceHelper::qtNovosClientesMes() }}</span>
                        <span class="card-report__name">Novos clientes</span>
                    </div>
                </div>
                <div class="module-swiper__item">
                    <div href="schedule-item.html" class="app-card card-report">
                        <span class="card-report__data">{{ InterfaceHelper::qtAgendamentosMes() }}</span>
                        <span class="card-report__name">Agendamentos</span>
                    </div>
                </div>
                <div class="module-swiper__item">
                    <div href="schedule-item.html" class="app-card card-report">
                        <span class="card-report__data">{{ InterfaceHelper::qtAgendamentosFinalizadosMes() }}</span>
                        <span class="card-report__name">Agendamentos finalizados</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-default">

        <h3 class="title">Vendedores</h3>

        @foreach($usuarios as $usuario)

        <div class="app-card card-collaborator">
            <a class="card-collaborator__content" href="{{ route('usuarios.carregar', ['id' => $usuario->id]) }}">
                <span class="card-collaborator__name">{{ $usuario->ds_nome }}</span>
                <span class="card-collaborator__cod">{{ str_pad($usuario->id, 4, '0', STR_PAD_LEFT) }}</span>
                <span class="card-collaborator__schedule-count"><i class="fas fa-calendar-alt mr-1"></i>{{ InterfaceHelper::qtAgendamentos($usuario) }}</span>
            </a>
            <div class="dropdown">
                <a class="btn btn-icon-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('usuarios.carregar', ['id' => $usuario->id]) }}">Ver detalhes</a>
                    <a class="dropdown-item" href="{{ route('usuarios.editar', ['id' => $usuario->id]) }}">Editar</a>
                    <a class="dropdown-item excluir" href="{{ route('usuarios.excluir', ['id' => $usuario->id]) }}">Excluir vendedor</a>
                </div>
            </div>
        </div>

        @endforeach

    </section>
</div>

@include('includes.footer-menu')
