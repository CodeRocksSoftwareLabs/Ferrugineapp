@include('includes.head')

<header class="app-header">
    <a href="new-schedule.html" class="btn btn-icon-primary"><i class="fas fa-calendar-plus"></i></a>

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
                <div class="module-swiper__item">
                    <a href="schedule-item.html" class="app-card card-schedule">
                        <span class="card-schedule__date">15 Agosto 2019</span>
                        <span class="card-schedule__day">Quinta-feira</span>
                        <span class="card-schedule__hour">10:00 - 12:00</span>
                        <span class="card-schedule__name">
                            <span>Cliente</span>
                            Carlos  Augusto Ribeiro Filho
                        </span>
                        <span class="card-schedule__address"><i class="fas fa-map-marker-alt"></i>Itaparica, Vila Velha</span>
                    </a>
                </div>
                <div class="module-swiper__item">
                    <a href="schedule-item.html" class="app-card card-schedule">
                        <span class="card-schedule__date">15 Agosto 2019</span>
                        <span class="card-schedule__day">Quinta-feira</span>
                        <span class="card-schedule__hour">10:00 - 12:00</span>
                        <span class="card-schedule__name">
                            <span>Cliente</span>
                            Carlos  Augusto Ribeiro Filho
                        </span>
                        <span class="card-schedule__address"><i class="fas fa-map-marker-alt"></i>Itaparica, Vila Velha</span>
                    </a>
                </div>
                <div class="module-swiper__item">
                    <a href="schedule-item.html" class="app-card card-schedule">
                        <span class="card-schedule__date">15 Agosto 2019</span>
                        <span class="card-schedule__day">Quinta-feira</span>
                        <span class="card-schedule__hour">10:00 - 12:00</span>
                        <span class="card-schedule__name">
                            <span>Cliente</span>
                            Carlos  Augusto Ribeiro Filho
                        </span>
                        <span class="card-schedule__address"><i class="fas fa-map-marker-alt"></i>Itaparica, Vila Velha</span>
                    </a>
                </div>
                <div class="module-swiper__item">
                    <a href="schedule-item.html" class="app-card card-schedule">
                        <span class="card-schedule__date">15 Agosto 2019</span>
                        <span class="card-schedule__day">Quinta-feira</span>
                        <span class="card-schedule__hour">10:00 - 12:00</span>
                        <span class="card-schedule__name">
                            <span>Cliente</span>
                            Carlos  Augusto Ribeiro Filho
                        </span>
                        <span class="card-schedule__address"><i class="fas fa-map-marker-alt"></i>Itaparica, Vila Velha</span>
                    </a>
                </div>
                <div class="module-swiper__item">
                    <a href="schedule-item.html" class="app-card card-schedule">
                        <span class="card-schedule__date">15 Agosto 2019</span>
                        <span class="card-schedule__day">Quinta-feira</span>
                        <span class="card-schedule__hour">10:00 - 12:00</span>
                        <span class="card-schedule__name">
                            <span>Cliente</span>
                            Carlos  Augusto Ribeiro Filho
                        </span>
                        <span class="card-schedule__address"><i class="fas fa-map-marker-alt"></i>Itaparica, Vila Velha</span>
                    </a>
                </div>
                <div class="module-swiper__item">
                    <a href="schedule-item.html" class="app-card card-schedule">
                        <span class="card-schedule__date">15 Agosto 2019</span>
                        <span class="card-schedule__day">Quinta-feira</span>
                        <span class="card-schedule__hour">10:00 - 12:00</span>
                        <span class="card-schedule__name">
                            <span>Cliente</span>
                            Carlos  Augusto Ribeiro Filho
                        </span>
                        <span class="card-schedule__address"><i class="fas fa-map-marker-alt"></i>Itaparica, Vila Velha</span>
                    </a>
                </div>
                <div class="module-swiper__item">
                    <a href="single-schedule.html" class="app-card card-schedule">
                        <span class="card-schedule__date">15 Agosto 2019</span>
                        <span class="card-schedule__day">Quinta-feira</span>
                        <span class="card-schedule__hour">10:00 - 12:00</span>
                        <span class="card-schedule__name">
                            <span>Cliente</span>
                            Carlos  Augusto Ribeiro Filho
                        </span>
                        <span class="card-schedule__address"><i class="fas fa-map-marker-alt"></i>Itaparica, Vila Velha</span>
                    </a>
                </div>
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
                <span class="card-client__salesman"><i class="fas fa-user-tag"></i> João Felix</span>
            </a>
            <div class="dropdown">
                <a class="btn btn-icon-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('clientes.editar', ['id' => $cliente->id]) }}">Editar</a>
                    <a class="dropdown-item" href="#">Alterar vendedor</a>
                </div>
            </div>
        </div>

        @endforeach

        <div class="app-card card-client">
            <a class="card-client__content" href="single-client.html">
                <span class="card-client__name">Allan Ferreira Silva</span>
                <span class="card-client__phone">+55 (27) 9 9999-9999</span>
                <span class="card-client__salesman card-client__salesman--none"><i class="fas fa-user-tag"></i> Sem vendedor</span>
            </a>
            <div class="dropdown">
                <a class="btn btn-icon-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Editar</a>
                    <a class="dropdown-item" href="#">Pegar cliente</a>
                </div>
            </div>
        </div>
    </section>
</div>

@include('includes.footer-menu')
