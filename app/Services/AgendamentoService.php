<?php


namespace App\Services;
use App\Agendamento;


class AgendamentoService
{
    protected $agendamento;

    public function __construct()
    {
        $this->agendamento = new Agendamento();
    }

    public function cancelarAgendamentosPassados()
    {
        $agendamentos = $this->agendamento->whereIn('status_id', [1,2])->where('dt_agendamento', '<', date('Y-m-d'))->orderBy('dt_agendamento', 'asc')->get();

        foreach ($agendamentos as $agendamento) {
            $agendamento->status_id = 3; #cancelado
            $agendamento->save();
        }
    }
}
