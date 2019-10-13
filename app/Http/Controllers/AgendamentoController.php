<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agendamento;

class AgendamentoController extends Controller
{
    protected $agendamento;

    function __construct(Agendamento $agendamento)
    {
        $this->agendamento = $agendamento;
    }

    public function listar()
    {
        // Verificar se o usuário logado é admin, se for exibe de todos, caso contrário exibe apenas os agendamentos do usuário
        $agendamentos = $this->agendamento->orderBy('dt_agendamento', 'asc')->get();

        return view('schedule-list', compact('agendamentos'));
    }
}
