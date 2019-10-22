@include('includes.head')

<header class="app-header-pages">
    <div class="app-header-pages__main">
        <h1 class="app-header-title"><a href="{{ route('usuarios.listar') }}" class="btn btn-icon-link mr-3"><i class="fas fa-arrow-left"></i></a>Detalhe colaborador</h1>
        <div class="dropdown">
            <a class="btn btn-icon-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Editar</a>
                <a class="dropdown-item" href="#">Excluir</a>
            </div>
        </div>
    </div>
</header>
<div class="app-main app-main--grey">

    <h3 class="title-form-label mt-4">Agendamentos</h3>
    <div class="section-full">
        <span class="text-center d-block"><small>O colaborador não possui nenhum agendamento cadastrado</small></span>
    </div>
    <h3 class="title-form-label mt-4">Dados do colaborador</h3>
    <div class="section-full">
        <div class="form-group">
            <label for="">Nome</label>
            <span class="value-input">{{ $usuario->ds_nome }}</span>
        </div>
        <div class="form-group">
            <label for="">E-mail</label>
            <span class="value-input">{{ $usuario->ds_email }}</span>
        </div>
        <div class="form-group">
            <label for="">Código</label>
            <span class="value-input">{{ str_pad($usuario->id, 4, '0', STR_PAD_LEFT) }}</span>
        </div>
        <div class="form-group">
            <label for="">Filial</label>
            <span class="value-input">{{ $usuario->ds_loja }}</span>
        </div>
    </div>
    <h3 class="title-form-label mt-4">Estatísticas</h3>

    <div href="schedule-item.html" class="app-card card-report mb-4">
        <span class="card-report__data">XX</span>
        <span class="card-report__name">Novos clientes cadastrados este mês</span>
    </div>
    <div href="schedule-item.html" class="app-card card-report mb-4">
        <span class="card-report__data">XX</span>
        <span class="card-report__name">Novos Agendamentos este mês</span>
    </div>
</div>

@include('includes.footer')
