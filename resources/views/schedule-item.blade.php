@include('includes.head')

<header class="app-header-pages">
    <div class="app-header-pages__main">
        <h1 class="app-header-title"><a href="{{ route('agendamentos.listar') }}" class="btn btn-icon-link mr-3"><i class="fas fa-arrow-left"></i></a>Detalhe agendamento</h1>

        @if (!empty(Session::get('usuario')->fl_admin) || (Session::get('usuario')->id == $agendamento->usuario->id))

        <div class="dropdown">
            <a class="btn btn-icon-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{ route('agendamentos.editar.status', $agendamento->id) }}">Alterar Status</a>
                <a class="dropdown-item" href="{{ route('agendamentos.editar', $agendamento->id) }}">Editar</a>
                <a class="dropdown-item" href="{{ route('agendamentos.excluir', $agendamento->id) }}">Excluir</a>
            </div>
        </div>

        @endif
    </div>
</header>
<div class="app-main app-main--grey">

    <h3 class="title-form-label mt-4">Dados do agendamento</h3>
    <div class="section-full">
        <div class="form-group">
            <label for="">Data</label>
            <span class="value-input">{{ date('d/m/Y', strtotime($agendamento->dt_agendamento)) }}</span>
        </div>
        <div class="form-group">
            <label for="">Hora</label>
            <span class="value-input">{{ $agendamento->hr_agendamento }}</span>
        </div>
        <div class="form-group">
            <label for="">Duração</label>
            <span class="value-input">{{ $agendamento->hr_duracao }}</span>
        </div>
        <div class="form-group">
            <label for="">Observação</label>
            <span class="value-input">{{ $agendamento->ds_agendamento }}</span>
        </div>
    </div>
    <h3 class="title-form-label mt-4">Vendedor</h3>
    <div class="section-full">
        <div class="form-group">
            <label for="">Nome</label>
            <span class="value-input">{{ $agendamento->usuario->ds_nome }}</span>
        </div>
        <div class="form-group">
            <label for="">Código</label>
            <span class="value-input">{{ str_pad($agendamento->usuario_id, 4, '0', STR_PAD_LEFT) }}</span>
        </div>
    </div>
    <h3 class="title-form-label mt-4">Cliente</h3>
    <div class="section-full">
        <div class="form-group">
            <label for="">Nome</label>
            <span class="value-input">{{ $agendamento->cliente->ds_nome }}</span>
        </div>

        @if(!empty($agendamento->cliente->ds_email))

        <div class="form-group">
            <label for="">E-mail</label>
            <span class="value-input">{{ $agendamento->cliente->ds_email }}</span>
        </div>

        @endif

        <div class="form-group">
            <label for="">Telefone</label>
            <span class="value-input">{{ $agendamento->cliente->ds_telefone }}</span>
        </div>

        @if(!empty($agendamento->cliente->ds_telefone2))

        <div class="form-group">
            <label for="">Telefone complementar</label>
            <span class="value-input">{{ $agendamento->cliente->ds_telefone2 }}</span>
        </div>

        @endif
        @if(!empty($agendamento->cliente->ds_cep))

        <div class="form-group">
            <label for="">CEP</label>
            <span class="value-input">{{ $agendamento->cliente->ds_cep }}</span>
        </div>

        @endif
        @if(!empty($agendamento->cliente->estado->ds_estado))

        <div class="form-group">
            <label for="">UF</label>
            <span class="value-input">{{ $agendamento->cliente->estado->ds_estado }}</span>
        </div>

        @endif
        @if(!empty($agendamento->cliente->ds_cidade))

        <div class="form-group">
            <label for="">Cidade</label>
            <span class="value-input">{{ $agendamento->cliente->ds_cidade }}</span>
        </div>

        @endif
        @if(!empty($agendamento->cliente->ds_endereco))

        <div class="form-group">
            <label for="">Endereço</label>
            <span class="value-input">{{ $agendamento->cliente->ds_endereco }}, {{ $agendamento->cliente->ds_numero }}, {{$agendamento->cliente->ds_complemento}}</span>
        </div>

        @endif
    </div>

</div>

@include('includes.footer')
