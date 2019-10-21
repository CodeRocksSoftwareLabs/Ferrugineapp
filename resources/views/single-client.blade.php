@include('includes.head')

<header class="app-header-pages">
    <div class="app-header-pages__main">
        <h1 class="app-header-title"><a href="{{ route('clientes.listar') }}" class="btn btn-icon-link mr-3"><i class="fas fa-arrow-left"></i></a>Detalhe Cliente</h1>
        <div class="dropdown">
            <a class="btn btn-icon-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{ route('clientes.editar', $cliente->id) }}">Editar</a>
                <a class="dropdown-item" href="#">Excluir</a>
            </div>
        </div>
    </div>
</header>

<div class="app-main app-main--grey">
    <form action="">
        <h3 class="title-form-label mt-4">Agendamentos</h3>
        <div class="section-full">
            <span class="text-center d-block"><small>O cliente não possui nenhum agendamento cadastrado</small></span>
            <a href="new-schedule.html" class="btn btn-primary rounded-pill text-center d-block mt-4">NOVO AGENDAMENTO</a>
        </div>

        <h3 class="title-form-label mt-4">Dados</h3>

        @if($mensagem)
            <div class="alert alert-success" role="alert" style="">Cliente salvo com sucesso!</div>
        @endif

        <div class="section-full">

            <div class="form-group">
                <label for="">Nome</label>
                <span class="value-input">{{ $cliente->ds_nome }}</span>
            </div>

            @if(!empty($cliente->ds_email))

            <div class="form-group">
                <label for="">E-mail</label>
                <span class="value-input">{{ $cliente->ds_email }}</span>
            </div>

            @endif

            <div class="form-group">
                <label for="">Telefone</label>
                <span class="value-input">{{ $cliente->ds_telefone }}</span>
            </div>

            @if(!empty($cliente->ds_telefone2))

                <div class="form-group">
                    <label for="">Telefone 2</label>
                    <span class="value-input">{{ $cliente->ds_telefone2 }}</span>
                </div>

            @endif
            @if(!empty($cliente->ds_cep))

            <div class="form-group">
                <label for="">CEP</label>
                <span class="value-input">{{ $cliente->ds_cep }}</span>
            </div>

            @endif
            @if(!empty($cliente->estado_id))

            <div class="form-group">
                <label for="">UF</label>
                <span class="value-input">{{ $cliente->estado->ds_estado }}</span>
            </div>

            @endif
            @if(!empty($cliente->ds_cidade))

            <div class="form-group">
                <label for="">Cidade</label>
                <span class="value-input">{{ $cliente->ds_cidade }}</span>
            </div>

            @endif
            @if(!empty($cliente->ds_endereco))

            <div class="form-group">
                <label for="">Endereço</label>
                <span class="value-input">{{ $cliente->ds_endereco }}</span>
            </div>

            @endif
            @if(!empty($cliente->ds_numero))

                <div class="form-group">
                    <label for="">Número</label>
                    <span class="value-input">{{ $cliente->ds_numero }}</span>
                </div>

            @endif
            @if(!empty($cliente->ds_complemento))

                <div class="form-group">
                    <label for="">Complemento</label>
                    <span class="value-input">{{ $cliente->ds_complemento }}</span>
                </div>

            @endif
            @if(!empty($cliente->ds_obs))

                <div class="form-group">
                    <label for="">Observação</label>
                    <span class="value-input">{{ $cliente->ds_obs }}</span>
                </div>

            @endif
            @if(!empty($cliente->usuario_id))

                <div class="form-group">
                    <label for="">Quem cadastrou?</label>
                    <span class="value-input">{{ $cliente->usuario->ds_nome }}</span>
                </div>

            @endif
        </div>

    </form>
</div>

@include('includes.footer')
