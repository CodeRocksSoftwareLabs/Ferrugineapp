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

    <form method="post" action="{{ route('relatorios.gerar') }}">
        @csrf

        @if(!empty($mensagem))
            <div class="alert alert-danger" role="alert" style="">{{ $mensagem }}</div>
        @endif

        <h3 class="title-form-label mt-3">Período</h3>
        <div class="section-full">
            <div class="form-group">
                <label for="data_inicial">De</label>
                <input name="data_inicial" id="data_inicial"  class="form-control" type="date" placeholder="DD/MM/AAAA" required="required">
            </div>
            <div class="form-group">
                <label for="data_final">Até</label>
                <input name="data_final" id="data_final" class="form-control" type="date" placeholder="DD/MM/AAAA" required="required">
            </div>
        </div>
        <h3 class="title-form-label mt-3">Vendedor</h3>
        <div class="section-full">
            <div class="form-group">
                <label for="usuario">Escolha o vendedor</label>
                <select name="usuario" id="usuario" class="form-control">
                    <option value="todos" selected>Todos</option>

                    @foreach($usuarios as $usuario)

                        <option value="{{ $usuario->id }}">{{ $usuario->ds_nome }}</option>

                    @endforeach

                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill text-center d-block mt-4 mb-4">GERAR RELATÓRIO</button>

    </form>
</div>

@include('includes.footer-menu')
