@include('includes.head')

<div class="section-login">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{ asset('ferrugine/dist/img/logo.png') }}" srcset="{{ asset('ferrugine/dist/img/logo@2x.png 2x') }}" alt="" />
                <h1>Entrar</h1>


                <form method="POST" action="{{ route('login.authenticate') }}">
                    @csrf

                    @if(!empty($mensagem))
                        <div class="alert alert-danger" role="alert" style="">{{ $mensagem }}</div>
                    @endif

                    <div class="form-group">
                        <div class="input-group input-group--border-rounded">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="login_id_username"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control" placeholder="Usuário" aria-label="Usuário" aria-describedby="login_id_username" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group input-group--border-rounded">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="login_id_pass"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Senha" aria-label="Senha" aria-describedby="login_id_pass" required="required">
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="#" class="section-login__forgot">Esqueceu a senha?</a>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block rounded-pill">ENTRAR</button>
                </form>


            </div>
        </div>
    </div>
</div>

@include('includes.footer')
