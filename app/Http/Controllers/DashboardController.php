<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agendamento;
use App\Cliente;

class DashboardController extends Controller
{
    protected $agendamento;
    protected $cliente;

    function __construct(Agendamento $agendamento, Cliente $cliente)
    {
        $this->agendamento = $agendamento;
        $this->cliente = $cliente;
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
