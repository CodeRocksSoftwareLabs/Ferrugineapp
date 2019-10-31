<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agendamento;
use App\Cliente;
use App\Usuario;
use Session;

class DashboardController extends Controller
{
    protected $agendamento;
    protected $cliente;
    protected $usuario;

    function __construct(Agendamento $agendamento, Cliente $cliente, Usuario $usuario)
    {
        $this->agendamento = $agendamento;
        $this->cliente = $cliente;
        $this->usuario = $usuario;
    }

    public function dashboard()
    {
        if (Session::get('usuario')->fl_admin) {
            return $this->adminDashboard();
        } else {
            return $this->defaultDashboard();
        }

    }

    public function adminDashboard()
    {
        $usuarios = $this->usuario->whereNull('fl_admin')->orderBy('ds_nome', 'asc')->get();
        return view('admin.dashboard', compact('usuarios'));
    }

    public function defaultDashboard()
    {
        $agendamentos = Session::get('usuario')->agendamentos()->whereIn('status_id', [1,2])->where('dt_agendamento', '>=', date('Y-m-d'))->orderBy('dt_agendamento', 'asc')->get();
        $clientes = $this->cliente->orderBy('created_at', 'asc')->take(10)->get();
        return view('dashboard', compact('agendamentos', 'clientes'));
    }
}
