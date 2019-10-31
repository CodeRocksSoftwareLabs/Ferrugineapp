@include('includes.head')

<header class="app-header">
    <a href="{{ route('agendamentos.novo') }}" class="btn btn-icon-primary"><i class="fas fa-calendar-plus"></i></a>

    <div class="logged-user text-center">
        <span>Bem-vindo</span>
        <h2>{{ Session::get('usuario')->ds_nome }}</h2>
    </div>

    <a href="{{ route('clientes.novo') }}" class="btn btn-icon-primary"><i class="fas fa-user-plus"></i></a>
</header>
<div class="app-main app-main--grey">
    <section class="module-swiper module-swiper--bg-color">
        <h3 class="title">Agenda</h3>
        <div class="module-swiper-content">
            <div class="module-swiper__wrapper">

                @foreach($agendamentos as $agendamento)

                <div class="module-swiper__item">
                    <a href="{{ route('agendamentos.carregar', $agendamento->id) }}" class="app-card card-schedule">
                        <span class="card-schedule__date">{{ InterfaceHelper::formataData($agendamento->dt_agendamento) }}</span>
                        <span class="card-schedule__day">{{ InterfaceHelper::formataDia($agendamento->dt_agendamento) }}</span>
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
                </div>

                @endforeach

            </div>
        </div>
    </section>


    <section class="section-default">
        <h3 class="title">Últimos clientes cadastrados</h3>

        @foreach($clientes as $cliente)

        <div class="app-card card-client">
            <a class="card-client__content" href="{{ route('clientes.carregar', ['id' => $cliente->id]) }}">
                <span class="card-client__name">{{ $cliente->ds_nome }}</span>
                <span class="card-client__phone">{{ $cliente->ds_telefone }}</span>
                {!! InterfaceHelper::hasAgendamentoUsuario($cliente) !!}
            </a>
            <div class="dropdown">
                <a class="btn btn-icon-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('clientes.editar', ['id' => $cliente->id]) }}">Editar</a>
                    <!--a class="dropdown-item" href="#">Alterar vendedor</a-->
                </div>
            </div>
        </div>

        @endforeach

    </section>
</div>

@include('includes.footer-menu')
