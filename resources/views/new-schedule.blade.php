@include('includes.head')

<header class="app-header-pages">
    <div class="app-header-pages__main">
        <h1 class="app-header-title"><a href="{{ route('agendamentos.listar') }}" class="btn btn-icon-link mr-3"><i class="fas fa-arrow-left"></i></a>@if(empty($agendamento)) Novo Agendamento @else Alterar Agendamento @endif</h1>
    </div>
</header>

<div class="app-main app-main--grey">
    <form action="@if(empty($agendamento)){{ route('agendamentos.criar') }}@else{{ route('agendamentos.alterar', $agendamento->id) }}@endif" method="POST">
        @csrf

        @if(!empty($mensagem))
            <div class="alert alert-danger" role="alert" style="">{{ $mensagem }}</div>
        @endif

        @if(!empty($agendamento))

        <h3 class="title-form-label mt-3">Status</h3>
        <div class="section-full">
            <div class="form-group">
                <label for="status">Escolha o status</label>
                <select name="status" id="status" class="form-control">

                    @foreach($status as $stat)

                        <option value="{{ $stat->id }}" @if($stat->id == $agendamento->status->id){{ "selected='selected'" }}@endif>{{ $stat->ds_status }}</option>

                    @endforeach

                </select>
            </div>
        </div>

        @endif

        @if(empty($cliente))

        <h3 class="title-form-label mt-3">Cliente</h3>
        <input type="hidden" name="cliente_id" id="cliente_id" value="@if(!empty($agendamento->cliente->id)){{ $agendamento->cliente->id }}@endif"/>
        <div class="section-full">
            <div class="form-group">
                <label for="cliente_nome">Nome</label>
                <input class="typeahead form-control" name='cliente_nome' id="cliente_nome" type="text"
                       placeholder="Digite para buscar" autocomplete="off" spellcheck="false" dir="auto" value="@if(!empty($agendamento->cliente->ds_nome)){{ $agendamento->cliente->ds_nome }}@endif">
            </div>

            <div class="app-card card-client" id="cliente_target" style="display: none;">
                <a class="card-client__content" href="javascript:;">
                </a>
            </div>
        </div>

        @else

        <h3 class="title-form-label mt-3">Cliente</h3>
        <input type="hidden" name="cliente_id" id="cliente_id" value="{{ $cliente->id }}"/>
        <div class="section-full">
            <div class="form-group">
                <label for="cliente_nome">Nome</label>
                <input class="typeahead form-control" name='cliente_nome' id="cliente_nome" type="text"
                       placeholder="Digite para buscar" autocomplete="off" spellcheck="false" dir="auto" value="{{ $cliente->ds_nome }}">
            </div>

            <div class="app-card card-client" id="cliente_target">
                <a class="card-client__content" href="javascript:;">
                    <strong class="title-form-label">Selecionado:</strong>
                    <span class="card-client__name">{{ $cliente->ds_nome }}</span>
                    <span class="card-client__phone">{{ $cliente->ds_telefone }}</span>
                </a>
            </div>
        </div>

        @endif

        <h3 class="title-form-label mt-3">Dados do agendamento</h3>
        <div class="section-full">
            <div class="form-group">
                <label for="">Data</label>
                <input class="form-control" name="data" type="date" placeholder="DD/MM/AAAA" value="@if(!empty($agendamento->dt_agendamento)){{ $agendamento->dt_agendamento }}@endif">
            </div>
            <div class="form-group">
                <label for="">Hora</label>
                <input class="form-control hora" name="hora" type="text" placeholder="08:00" value="@if(!empty($agendamento->hr_agendamento)){{ $agendamento->hr_agendamento }}@endif">
            </div>
            <div class="form-group">
                <label for="">Duração</label>
                <input class="form-control hora" name="duracao" type="text" placeholder="01:00" value="@if(!empty($agendamento->hr_duracao)){{ $agendamento->hr_duracao }}@endif">
            </div>
        </div>

        <h3 class="title-form-label mt-3">Vendedor</h3>
        <div class="section-full">
            <div class="form-group">
                <label for="usuario">Escolha o vendedor</label>
                <select name="usuario" id="usuario" class="form-control">

                    @foreach($usuarios as $usuario)

                    <option value="{{ $usuario->id }}" @if($usuario->id == Session::get('usuario')->id){{ "selected='selected'" }}@endif>{{ $usuario->ds_nome }}</option>

                    @endforeach

                </select>
            </div>
        </div>

        <h3 class="title-form-label mt-3">Mais detalhes</h3>
        <div class="section-full">
            <div class="form-group">
                <label for="nota">Nota</label>
                <textarea name="nota" id="nota" cols="30" rows="5" class="form-control">@if(!empty($agendamento->ds_agendamento)){{ $agendamento->ds_agendamento }}@endif</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block rounded-pill mt-4">@if(empty($agendamento)) AGENDAR @else SALVAR @endif</button>
    </form>
</div>

<script>
    var clientes_nomes = [
        @foreach($clientes as $cliente)
            "{{ $cliente->ds_nome }}",
        @endforeach
    ];
</script>

@include('includes.footer')
