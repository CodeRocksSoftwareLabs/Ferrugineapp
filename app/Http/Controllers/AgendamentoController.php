<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agendamento;
use Session;

class AgendamentoController extends Controller
{
    protected $agendamento;

    function __construct(Agendamento $agendamento)
    {
        $this->agendamento = $agendamento;
    }

    public function listar()
    {
        if (Session::get('usuario')->fl_admin) {
            return $this->adminAgendamentos();
        } else {
            return $this->defaultAgendamentos();
        }
    }

    private function adminAgendamentos()
    {
        $agendamentos = $this->agendamento->where('dt_agendamento', '>', date('Y-m-d'))->orderBy('dt_agendamento', 'asc')->get();
        $diasAgendados = $this->diasAgendados($agendamentos);
        $options = $this->mesesAgendados();

        return view('schedule-list', compact('diasAgendados', 'options'));
    }

    private function defaultAgendamentos()
    {
        $agendamentos = Session::get('usuario')->agendamentos()->whereIn('status_id', [1,2])->where('dt_agendamento', '>', date('Y-m-d'))->orderBy('dt_agendamento', 'asc')->get();
        $diasAgendados = $this->diasAgendados($agendamentos);
        $options = $this->mesesAgendados();

        return view('schedule-list', compact('diasAgendados', 'options'));
    }

    private function diasAgendados($agendamentos)
    {
        $diasAgendados = [];
        foreach ($agendamentos as $agendamento) {
            if (!array_key_exists($agendamento->dt_agendamento, $diasAgendados)) {
                $diasAgendados[$agendamento->dt_agendamento][] = $agendamento;
            }
        }
        return $diasAgendados;
    }

    private function mesesAgendados()
    {
        $meses = [];
        $meses[1] = '<option value="01">Janeiro</option>';
        $meses[2] = '<option value="02">Fevereiro</option>';
        $meses[3] = '<option value="03">Março</option>';
        $meses[4] = '<option value="04">Abril</option>';
        $meses[5] = '<option value="05">Maio</option>';
        $meses[6] = '<option value="06">Junho</option>';
        $meses[7] = '<option value="07">Julho</option>';
        $meses[8] = '<option value="08">Agosto</option>';
        $meses[9] = '<option value="09">Setembro</option>';
        $meses[10] = '<option value="10">Outubro</option>';
        $meses[11] = '<option value="11">Novembro</option>';
        $meses[12] = '<option value="12">Dezembro</option>';

        $mes = date('m');

        $options = [];
        for ($i=1; $i<=count($meses); $i++) {

            if ($i >= $mes) {
                $options[] = $meses[$i];
            }
        }

        return $options;
    }
}
