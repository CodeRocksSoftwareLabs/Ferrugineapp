<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Session;

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

    public function usuariosList()
    {
        $usuarios = $this->usuario->where('id', '<>', Session::get('usuario')->id)->orderBy('ds_nome', 'asc')->get();

        return view('admin.collaborator-list', compact('usuarios'));
    }

    public function newUsuario()
    {
        return view('admin.new-collaborator');
    }

    public function viewUsuario($id)
    {
        $usuario = $this->usuario->find($id);

        return view('admin.single-collaborator', compact('usuario'));
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }

    private function authenticateUser($usuario)
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

}
