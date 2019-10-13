@include('includes.head')

<header class="app-header-pages">
    <div class="app-header-pages__main">
        <h1 class="app-header-title"><a href="{{ route('clientes.listar') }}" class="btn btn-icon-link mr-3"><i class="fas fa-arrow-left"></i></a>Novo Cliente</h1>
    </div>
</header>
<div class="app-main app-main--grey">
    <h3 class="title-form-label mt-3">Dados</h3>
    <form method="post" action="">
        <div class="section-full">
            <div class="form-group">
                <label for="">Nome</label>
                <input class="form-control" type="text" placeholder="" required="required">
            </div>
            <div class="form-group">
                <label for="">E-mail</label>
                <input class="form-control" type="email" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Telefone</label>
                <input class="form-control telefone" type="text" placeholder="" required="required">
            </div>
            <div class="form-group">
                <label for="">CEP</label>
                <input class="form-control cep" type="text" placeholder="">
            </div>
            <div class="form-group">
                <label for="">UF</label>
                <select name="estado" class="form-control">
                    <option value="">Selecione...</option>

                    @foreach($estados as $estado)

                        <option value="{{ $estado->id }}"
                            @if($estado->id == 8)
                            {{  "selected='selected'" }}
                            @endif >{{ $estado->ds_estado }}</option>

                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="">Cidade</label>
                <input class="form-control" type="text" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Endereço</label>
                <input class="form-control" type="text" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Observação</label>
                <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder=""></textarea>
            </div>
        </div>
        <a href="#" class="btn btn-primary rounded-pill text-center d-block mt-4">SALVAR</a>
    </form>
</div>

@include('includes.footer')
