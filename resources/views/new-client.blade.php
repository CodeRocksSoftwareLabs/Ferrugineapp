@include('includes.head')

<header class="app-header-pages">
    <div class="app-header-pages__main">
        <h1 class="app-header-title"><a href="{{ route('clientes.listar') }}" class="btn btn-icon-link mr-3"><i class="fas fa-arrow-left"></i></a>Novo Cliente</h1>
    </div>
</header>
<div class="app-main app-main--grey">
    <h3 class="title-form-label mt-3">Dados</h3>

    <form method="POST" action="@if(empty($cliente)){{ route('clientes.criar') }}@else{{ route('clientes.alterar', $cliente->id) }}@endif">
        @csrf

        @if(!empty($mensagem))
            <div class="alert alert-danger" role="alert" style="">{{ $mensagem }}</div>
        @endif

        <div class="section-full">
            <div class="form-group">
                <label for="">Nome</label>
                <input class="form-control" name="nome" type="text" placeholder="" required="required" value="@if(!empty($cliente->ds_nome)){{ $cliente->ds_nome }}@endif">
            </div>
            <div class="form-group">
                <label for="">E-mail</label>
                <input class="form-control" name="email" type="email" placeholder="" value="@if(!empty($cliente->ds_email)){{ $cliente->ds_email }}@endif">
            </div>
            <div class="form-group">
                <label for="">Telefone</label>
                <input class="form-control telefone" name="telefone" type="text" placeholder="" required="required" value="@if(!empty($cliente->ds_telefone)){{ $cliente->ds_telefone }}@endif">
            </div>
            <div class="form-group">
                <label for="">Telefone 2</label>
                <input class="form-control telefone" name="telefone2" type="text" placeholder="" value="@if(!empty($cliente->ds_telefone2)){{ $cliente->ds_telefone2 }}@endif">
            </div>
            <div class="form-group">
                <label for="">CEP</label>
                <input class="form-control cep" name="cep" type="text" placeholder="" value="@if(!empty($cliente->ds_cep)){{ $cliente->ds_cep }}@endif">
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
                <input class="form-control" name="cidade" type="text" placeholder="" value="@if(!empty($cliente->ds_cidade)){{ $cliente->ds_cidade }}@endif">
            </div>
            <div class="form-group">
                <label for="">Bairro</label>
                <input class="form-control" name="bairro" type="text" placeholder="" value="@if(!empty($cliente->ds_bairro)){{ $cliente->ds_bairro }}@endif">
            </div>
            <div class="form-group">
                <label for="">Endereço</label>
                <input class="form-control" name="endereco" type="text" placeholder="" value="@if(!empty($cliente->ds_endereco)){{ $cliente->ds_endereco }}@endif">
            </div>
            <div class="form-group">
                <label for="">Número</label>
                <input class="form-control" name="numero" type="text" placeholder="" value="@if(!empty($cliente->ds_numero)){{ $cliente->ds_numero }}@endif">
            </div>
            <div class="form-group">
                <label for="">Complemento</label>
                <input class="form-control" name="complemento" type="text" placeholder="" value="@if(!empty($cliente->ds_complemento)){{ $cliente->ds_complemento }}@endif">
            </div>
            <div class="form-group">
                <label for="">Observação</label>
                <textarea name="obs" id="" cols="30" rows="5" class="form-control" placeholder="">@if(!empty($cliente->ds_obs)){{ $cliente->ds_obs }}@endif</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill text-center d-block mt-4">SALVAR</button>
    </form>
</div>

@include('includes.footer')
