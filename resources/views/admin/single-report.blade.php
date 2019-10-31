@include('includes.head')

<div class="menu-bar">
    <h3 class="menu-bar__user">{{ Session::get('usuario')->ds_nome }}</h3>
    <div class="menu-bar__item"><a href="{{ route('usuarios.listar') }}" class="menu-bar__link"><i class="fas fa-user-tie mr-2"></i>Vendedores</a></div>
    <div class="menu-bar__item"><a href="{{ route('relatorios') }}" class="menu-bar__link"><i class="fas fa-chart-pie mr-2"></i>Relatórios</a></div>
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
    <h1 class="title-master text-center mt-4">Relatórios</h1>
    <div class="card card-fluid mb-3">
        <div class="card-header">
            <h6 class="mb-0">Clientes cadastrados no período</h6>
        </div>
        <div class="card-body">

            @foreach($data as $usuario)

            <div class="row mb-3">
                <div class="col-9">
                    <div class="progress-wrapper">
                        <span class="progress-label text-muted text-sm">{{ $usuario['usuario']->ds_nome }}</span>
                        <div class="progress mt-1" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ InterfaceHelper::getPercent($qtClientesCadastrados, $usuario['qtClientesCadastradosUsuario']) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ InterfaceHelper::getPercent($qtClientesCadastrados, $usuario['qtClientesCadastradosUsuario']) }}%;"></div>
                        </div>
                        <span class="count-client">{{ $usuario['qtClientesCadastradosUsuario'] }} clientes</span>
                    </div>
                </div>
                <div class="col-3 align-self-center text-right">
                    <span class="h6 mb-0">{{ InterfaceHelper::getPercent($qtClientesCadastrados, $usuario['qtClientesCadastradosUsuario']) }}%</span>
                </div>
            </div>

            @endforeach

        </div>
    </div>
    <div class="card card-fluid mb-3">
        <div class="card-header">
            <h6 class="mb-0">Agendamentos do período</h6>
        </div>
        <div class="card-body">

            @foreach($data as $usuario)

            <div class="row mb-3">
                <div class="col-9">
                    <div class="progress-wrapper">
                        <span class="progress-label text-muted text-sm">{{ $usuario['usuario']->ds_nome }}</span>
                        <div class="progress mt-1" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ InterfaceHelper::getPercent($qtAgendamentosCadastrados, $usuario['qtAgendamentosCadastradosUsuario']) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ InterfaceHelper::getPercent($qtAgendamentosCadastrados, $usuario['qtAgendamentosCadastradosUsuario']) }}%;"></div>
                        </div>
                        <span class="count-client">{{ $usuario['qtAgendamentosCadastradosUsuario'] }} agendamentos</span>
                    </div>
                </div>
                <div class="col-3 align-self-center text-right">
                    <span class="h6 mb-0">{{ InterfaceHelper::getPercent($qtAgendamentosCadastrados, $usuario['qtAgendamentosCadastradosUsuario']) }}%</span>
                </div>
            </div>

            @endforeach

        </div>
    </div>
    <a href="javascript:window.print();" class="btn btn-primary rounded-pill text-center d-block mt-4 mb-4">IMPRIMIR RELATÓRIO</a>
</div>

@include('includes.footer-menu')
