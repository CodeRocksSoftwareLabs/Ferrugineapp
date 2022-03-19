@include('includes.head')

<header class="app-header-pages">
    <div class="app-header-pages__main">
        <h1 class="app-header-title">Clientes</h1>
        <a href="{{ route('clientes.novo') }}" class="btn btn-icon-link"><i class="fas fa-user-plus"></i></a>
    </div>
    <div class="app-header-pages__main">
        <div class="input-group input-group--border-rounded">
            <div class="input-group-prepend">
                <span class="input-group-text" id="search_client"><i class="fas fa-search"></i></span>
            </div>
            <input type="text" class="form-control" name="pesquisar" placeholder="Pesquisar..." aria-label="Pesquisar..." aria-describedby="search_client">
        </div>
    </div>
</header>

<div class="app-main">

    @if($mensagem)
    <div class="alert alert-success" role="alert" style="">Cliente excluído com sucesso!</div>
    @endif

    <section class="client-list">

        @foreach($lista_clientes as $letra => $clientes)

        <div class="client-list__group">
            <span class="client-list__letter">{{ $letra }}</span>
            <div class="client-list__order">

                @foreach($clientes as $cliente)

                <a href="{{ route('clientes.carregar', $cliente->id) }}" class="client-list__item" data-nome="{{ strtolower($cliente->ds_nome) }}" data-telefone="{{ str_replace(['(', ')', '-', ' '], ['','','',''], $cliente->ds_telefone) }}">
                    <span class="client-list__name">
                        {{ $cliente->ds_nome }}

                        @if (InterfaceHelper::isNewClient($cliente))
                        <span class="badge bg-success">Novo</span>
                        @endif
                    </span>
                    <span class="client-list__phone">{{ $cliente->ds_telefone }}</span>
                </a>

                @endforeach

            </div>
        </div>

        @endforeach

    </section>
</div>


@include('includes.footer-menu')
