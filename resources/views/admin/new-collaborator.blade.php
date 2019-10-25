@include('includes.head')

<header class="app-header-pages">
    <div class="app-header-pages__main">
        <h1 class="app-header-title"><a href="{{ route('usuarios.listar') }}" class="btn btn-icon-link mr-3"><i class="fas fa-arrow-left"></i></a>Novo Cliente</h1>
    </div>
</header>
<div class="app-main app-main--grey">
    <h3 class="title-form-label mt-3">Dados</h3>

    <form method="POST" action="@if(empty($usuario)){{ route('usuarios.criar') }}@else{{ route('usuarios.alterar', $usuario->id) }}@endif">
        @csrf

        @if(!empty($mensagem))
            <div class="alert alert-danger" role="alert" style="">{{ $mensagem }}</div>
        @endif

        <div class="section-full">
            <div class="form-group">
                <label for="nome">Nome completo</label>
                <input class="form-control" name="nome" id="nome" type="text" placeholder="" required="required" value="@if(!empty($usuario->ds_nome)){{ $usuario->ds_nome }}@endif">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="" required="required" value="@if(!empty($usuario->ds_email)){{ $usuario->ds_email }}@endif">
            </div>
            <div class="form-group">
                <label for="username">Usuário de acesso</label>
                <input class="form-control" type="text" name="username" id="username" placeholder="" required="required" value="@if(!empty($usuario->ds_login)){{ $usuario->ds_login }}@endif">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input class="form-control telefone" type="text" name="telefone" id="telefone" placeholder="" required="required" value="@if(!empty($usuario->ds_telefone)){{ $usuario->ds_telefone }}@endif">
            </div>
            <div class="form-group">
                <label for="loja">Loja</label>
                <input class="form-control" type="text" id="loja" name="loja" placeholder="" value="@if(!empty($usuario->ds_loja)){{ $usuario->ds_loja }}@endif">
            </div>
            <div class="form-group ml-4">
                <input type="checkbox" class="form-check-input" name="admin" id="admin" @if(!empty($usuario->fl_admin)){{ 'checked="checked"' }}@endif>
                <label class="form-check-label" for="admin">Usuário administrador?</label>
            </div>

            @if(empty($usuario))

            <div class="form-group ml-4">
                <input type="checkbox" class="form-check-input" name="senha" id="senha" checked="checked" disabled>
                <input type="hidden" name="enviar_senha" value="1"/>
                <label class="form-check-label" for="senha">Enviar senha por e-mail</label>
            </div>

            @endif

        </div>
        <button type="submit" class="btn btn-primary rounded-pill text-center d-block mt-4">SALVAR</button>
    </form>
</div>

@include('includes.footer')
