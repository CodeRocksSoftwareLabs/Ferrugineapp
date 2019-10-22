<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Session;
use Mail;

class UsuarioController extends Controller
{
    protected $usuario;

    function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function login()
    {
        return view('index');
    }

    public function authenticate(Request $request)
    {
        $login = addslashes($request->username);
        $senha = MD5(addslashes($request->password));

        $usuario = $this->usuario->where('ds_login', '=', $login)->where('ds_senha', '=', $senha)->first();

        return $this->authenticateUser($usuario);
    }

    public function perfil()
    {
        return view('profile');
    }

    public function listar()
    {
        $usuarios = $this->usuario->where('id', '<>', Session::get('usuario')->id)->orderBy('ds_nome', 'asc')->get();

        return view('admin.collaborator-list', compact('usuarios'));
    }

    public function novo()
    {
        return view('admin.new-collaborator');
    }

    public function criar(Request $request)
    {
        $usuario = $this->preencherUsuario(new Usuario(), $request);
        $usuario->save();

        $this->criarToken($usuario);
        $this->notificarNovoUsuario($usuario);

        return $this->carregar($usuario->id, false);
    }

    public function alterar(int $id, Request $request)
    {
        $usuario = $this->usuario->find($id);

        $usuario = $this->preencherUsuario($usuario, $request);
        $usuario->save();

        return $this->carregar($usuario->id, true);
    }

    public function carregar(int $id, bool $mensagem = false)
    {
        $usuario = $this->usuario->find($id);

        return view('admin.single-collaborator', compact('usuario', 'mensagem'));
    }

    public function novaSenha(string $token)
    {
        if (!$token)
            die('Acesso negado!');

        return view('nova-senha', compact('token'));
    }

    public function criarSenha(Request $request)
    {
        $usuario = $this->usuario->where('token', '=', $request->token)->first();
        $usuario->ds_senha = MD5($request->password);
        $usuario->save();

        return redirect()->route('login');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }

    private function authenticateUser(Usuario $usuario)
    {
        if(!empty($usuario))
        {
            Session::put('usuario', $usuario);

            return redirect()->route('dashboard');
        }
        else{
            $mensagem = 'Nenhum usuário foi encontrado com essas credenciais.';
            return view('index', compact('mensagem'));
        }
    }

    private function preencherUsuario(Usuario $usuario, Request $request)
    {
        $usuario->ds_nome = $request->nome;
        $usuario->ds_email = $request->email;
        $usuario->ds_telefone = $request->telefone;
        $usuario->ds_login = $request->username;
        $usuario->ds_foto = $request->foto;
        $usuario->ds_loja = $request->loja;
        $usuario->fl_admin = $request->admin;

        return $usuario;
    }

    private function criarToken(Usuario $usuario)
    {
        $token = rand();
        $usuario->token = MD5($token . $usuario->ds_telefone);
        $usuario->save();

        return $usuario->token;
    }

    private function notificarNovoUsuario(Usuario $usuario)
    {
        if(env('APP_ENV', 'production') == 'production')
        {
            $nome = explode(' ', $usuario->ds_nome);
            $subject = "Meu primeiro acesso";
            $message = [
                "Você recebeu este e-mail porque foi cadastrado no ferrugineapp. Para criar o seu acesso ao sistema acesse link abaixo e crie a sua senha.",
                "<a href='" . route('usuarios.senha', ['token' => $usuario->token]) . "'>" . route('usuarios.senha', ['token' => $usuario->token]) . "</a>",
                "Caso você não tenha soliciado este acesso ou recebido este e-mail por engano apenas ignore esta mensagem."
            ];
            Mail::send('templates.new-collaborator-mail', ['mensagem' => $message, 'subject' => $subject, 'usuario' => $nome[0]], function ($m) use ($usuario, $subject) {
                $m->to($usuario->ds_email, $usuario->ds_nome)->subject($subject . ' - Ferrugine App');
            });
        }
    }
}
