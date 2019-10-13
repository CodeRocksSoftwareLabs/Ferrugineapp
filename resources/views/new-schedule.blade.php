@include('includes.head')

<header class="app-header-pages">
    <div class="app-header-pages__main">
        <h1 class="app-header-title"><a href="dashboard.html" class="btn btn-icon-link mr-3"><i class="fas fa-arrow-left"></i></a>Novo Agendamento</h1>
    </div>
</header>

<div class="app-main app-main--grey">
    <form action="">
        <h3 class="title-form-label mt-3">Dados do agendamento</h3>
        <div class="section-full">
            <div class="form-group">
                <label for="">Data</label>
                <input class="form-control" type="date" placeholder="DD/MM/AAAA">
            </div>
            <div class="form-group">
                <label for="">Hora</label>
                <input class="form-control" type="text" placeholder="08:00">
            </div>
            <div class="form-group">
                <label for="">Duração</label>
                <input class="form-control" type="text" placeholder="01:00">
            </div>
        </div>
        <h3 class="title-form-label mt-3">Vendedor</h3>
        <div class="section-full">
            <div class="form-group">
                <label for="">Escolha o vendedor</label>
                <select name="" id="" class="form-control">
                    <option value="">Maria José</option>
                    <option value="" selected>Carlos Ribeiro</option>
                    <option value="">Victor Frossard</option>
                    <option value="">João Felix</option>
                    <option value="">Mario Afonso</option>
                </select>
            </div>
        </div>
        <h3 class="title-form-label mt-3">Cliente</h3>
        <div class="section-full">
            <div class="form-group">
                <label for="">Nome</label>
                <input class="form-control" type="text" placeholder="Carlos Ribeiro">
            </div>
            <div class="form-group">
                <label for="">E-mail</label>
                <input class="form-control" type="email" placeholder="ferrugine@gmail.com">
            </div>
            <div class="form-group">
                <label for="">Telefone</label>
                <input class="form-control" type="tel" placeholder="(27) 9 9999-9999">
            </div>
        </div>
        <h3 class="title-form-label mt-3">Mais detalhes</h3>
        <div class="section-full">
            <div class="form-group">
                <label for="">Nota</label>
                <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Digite alguma observação aqui"></textarea>
            </div>
        </div>
        <a href="#" class="btn btn-primary rounded-pill text-center d-block mt-4">AGENDAR</a>
    </form>
</div>

@include('includes.footer')
