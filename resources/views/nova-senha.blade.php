@include('includes.head')

<div class="section-login">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{ asset('ferrugine/dist/img/logo.png') }}" srcset="{{ asset('ferrugine/dist/img/logo@2x.png 2x') }}" alt="" />
                <h1>Primeiro acesso</h1>
                <p>Digite a senha desejada abaixo.</p>

                <form method="POST" action="{{ route('usuarios.criar-senha') }}">
                    @csrf

                    <div class="alert alert-danger" role="alert" style="display: none;"></div>

                    <input type="hidden" name="token" value="{{$token}}"/>
                    <div class="form-group">
                        <div class="input-group input-group--border-rounded">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="login_id_pass"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Senha" aria-label="Senha" aria-describedby="login_id_pass" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group input-group--border-rounded">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="login_id_pass"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="cpassword" class="form-control" placeholder="Confirmação de senha" aria-label="Confirmação de senha" aria-describedby="login_id_pass" required="required">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block rounded-pill">CRIAR SENHA</button>
                </form>


            </div>
        </div>
    </div>
</div>

@include('includes.footer')
