@include('includes.head')

<header class="app-header-pages">
    <div class="app-header-pages__main">
        <h1 class="app-header-title"><a href="dashboard.html" class="btn btn-icon-link mr-3"><i class="fas fa-arrow-left"></i></a>Detalhe agendamento</h1>
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
    <form action="">
        <h3 class="title-form-label mt-4">Dados do agendamento</h3>
        <div class="section-full">
            <div class="form-group">
                <label for="">Data</label>
                <span class="value-input">20/08/2019</span>
            </div>
            <div class="form-group">
                <label for="">Hora</label>
                <span class="value-input">08:00</span>
            </div>
            <div class="form-group">
                <label for="">Duração</label>
                <span class="value-input">01:00</span>
            </div>
            <div class="form-group">
                <label for="">Observação</label>
                <span class="value-input">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin mattis, sapien eu rutrum fermentum, dui ex suscipit odio, vel facilisis nunc massa luctus quam.</span>
            </div>
        </div>
        <h3 class="title-form-label mt-4">Vendedor</h3>
        <div class="section-full">
            <div class="form-group">
                <label for="">Nome</label>
                <span class="value-input">Carlos Ribeiro</span>
            </div>
            <div class="form-group">
                <label for="">Código</label>
                <span class="value-input">44145</span>
            </div>
        </div>
        <h3 class="title-form-label mt-4">Cliente</h3>
        <div class="section-full">
            <div class="form-group">
                <label for="">Nome</label>
                <span class="value-input">Allan Ferreira Silva</span>
            </div>
            <div class="form-group">
                <label for="">E-mail</label>
                <span class="value-input">Allan.silva@gmail.com</span>
            </div>
            <div class="form-group">
                <label for="">Telefone</label>
                <span class="value-input">(27) 9 9999-9999</span>
            </div>
            <div class="form-group">
                <label for="">CEP</label>
                <span class="value-input">29102-312</span>
            </div>
            <div class="form-group">
                <label for="">UF</label>
                <span class="value-input">ES</span>
            </div>
            <div class="form-group">
                <label for="">Cidade</label>
                <span class="value-input">Vila Velha</span>
            </div>
            <div class="form-group">
                <label for="">Endereço</label>
                <span class="value-input">Rua Rodrigo Romeiro, 1868</span>
            </div>
        </div>

    </form>
</div>

@include('includes.footer')
