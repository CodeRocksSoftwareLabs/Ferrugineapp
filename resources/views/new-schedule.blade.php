@include('includes.head')

<header class="app-header-pages">
    <div class="app-header-pages__main">
        <h1 class="app-header-title"><a href="{{ route('agendamentos.listar') }}" class="btn btn-icon-link mr-3"><i class="fas fa-arrow-left"></i></a>Novo Agendamento</h1>
    </div>
</header>

<div class="app-main app-main--grey">
    <form action="@if(empty($agendamento)){{ route('agendamentos.criar') }}@else{{ route('agendamentos.alterar', $agendamento->id) }}@endif" method="POST">
        @csrf

        @if(!empty($mensagem))
            <div class="alert alert-danger" role="alert" style="">{{ $mensagem }}</div>
        @endif

        <h3 class="title-form-label mt-3">Dados do agendamento</h3>
        <div class="section-full">
            <div class="form-group">
                <label for="">Data</label>
                <input class="form-control" type="date" placeholder="DD/MM/AAAA" value="@if(!empty($agendamento->dt_agendamento)){{ $agendamento->dt_agendamento }}@endif">
            </div>
            <div class="form-group">
                <label for="">Hora</label>
                <input class="form-control hora" type="text" placeholder="08:00" value="@if(!empty($agendamento->hr_agendamento)){{ $agendamento->hr_agendamento }}@endif">
            </div>
            <div class="form-group">
                <label for="">Duração</label>
                <input class="form-control hora" type="text" placeholder="01:00" value="@if(!empty($agendamento->hr_duracao)){{ $agendamento->hr_duracao }}@endif">
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
        <h3 class="title-form-label mt-3">Cliente</h3>
        <div class="section-full">
            <div class="form-group">
                <label for="cliente_nome">Nome</label>
                <input class="typeahead form-control" name='cliente_nome' id="cliente_nome" type="text"
                       placeholder="Digite para buscar" autocomplete="off" spellcheck="false" dir="auto" value="@if(!empty($agendamento->cliente->ds_nome)){{ $agendamento->cliente->ds_nome }}@endif">
            </div>
        </div>
        <h3 class="title-form-label mt-3">Mais detalhes</h3>
        <div class="section-full">
            <div class="form-group">
                <label for="nota">Nota</label>
                <textarea name="nota" id="nota" cols="30" rows="5" class="form-control">@if(!empty($agendamento->ds_agendamento)){{ $agendamento->ds_agendamento }}@endif</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block rounded-pill mt-4">AGENDAR</button>
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
