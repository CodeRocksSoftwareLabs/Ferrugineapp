@include('includes.head')

<header class="app-header-pages">
    <div class="app-header-pages__main">
        <h1 class="app-header-title">Agenda</h1>
        <a href="{{ route('agendamentos.novo') }}" class="btn btn-icon-link"><i class="fas fa-calendar-plus"></i></a>
    </div>
    <div class="app-header-pages__main">
        <div class="app-header-select">
            <label for="select-month"><i class="fas fa-angle-down"></i></label>
            <select name="mes" class="form-control" id="select-month">
                <option value="">Todos</option>
                @foreach($options as $option)
                    {!! $option !!}
                @endforeach
            </select>
        </div>
    </div>
</header>
<div class="app-main app-main--grey">

    @if($mensagem)
        <div class="alert alert-success" role="alert" style="">Agendamento excluído com sucesso!</div>
    @endif

    <section class="schedule-list">

        @foreach($diasAgendados as $dia => $agendamentos)

        <div class="schedule-list__group dias" data-mes="{{ date('m', strtotime($dia)) }}">
            <span class="schedule-list__day">
                <span>{{ InterfaceHelper::formataDiaSigla($dia) }}</span>
                <span>{{ date('d', strtotime($dia)) }}</span>
            </span>
            <div class="schedule-list__order">

                @foreach($agendamentos as $agendamento)

                <a href="{{ route('agendamentos.carregar', $agendamento->id) }}" class="app-card card-schedule">
                    <span class="card-schedule__hour">{{ $agendamento->hr_agendamento }} - {{ InterfaceHelper::sumTime($agendamento->hr_agendamento, $agendamento->hr_duracao) }}</span>
                    <span class="card-schedule__name">
                        <span>Cliente</span>
                        {{ $agendamento->cliente->ds_nome }}
                    </span>

                    @if(!empty(InterfaceHelper::formataLocal($agendamento->cliente)))

                        <span class="card-schedule__address">
                            <i class="fas fa-map-marker-alt"></i>{{ InterfaceHelper::formataLocal($agendamento->cliente) }}
                        </span>

                    @else

                        <span class="card-schedule__address">
                            Endereço não cadastrado
                        </span>

                    @endif
                </a>

                @endforeach

            </div>
        </div>

        @endforeach

    </section>
</div>

@include('includes.footer-menu')
