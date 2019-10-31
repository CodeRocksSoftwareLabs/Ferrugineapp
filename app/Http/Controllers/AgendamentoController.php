<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agendamento;
use App\Cliente;
use App\Usuario;
use App\Status;
use Session;

class AgendamentoController extends Controller
{
    protected $agendamento;
    protected $cliente;
    protected $usuario;
    protected $status;

    function __construct(Agendamento $agendamento, Cliente $cliente, Usuario $usuario, Status $status)
    {
        $this->agendamento = $agendamento;
        $this->cliente = $cliente;
        $this->usuario = $usuario;
        $this->status = $status;
    }

    public function listar(string $mensagem = null)
    {
        if (Session::get('usuario')->fl_admin) {
            return $this->adminAgendamentos($mensagem);
        } else {
            return $this->defaultAgendamentos($mensagem);
        }
    }

    public function novo($id = null)
    {
        if (!empty($id)) {
            $cliente = $this->cliente->find($id);
        }

        $status = $this->status->get();
        $usuarios = $this->getUsuariosForSelect();
        $clientes = $this->getClientesDesempedidos();

        return view('new-schedule', compact(['usuarios', 'clientes', 'cliente', 'status']));
    }

    public function editar(int $id)
    {
        $agendamento = $this->agendamento->find($id);
        $cliente = $agendamento->cliente;
        $clientes = $this->getClientesDesempedidos($cliente);
        $status = $this->status->get();
        $usuarios = $this->getUsuariosForSelect();

        return view('new-schedule', compact(['usuarios', 'agendamento', 'clientes', 'cliente', 'status']));
    }

    public function criar(Request $request)
    {
        $agendamento = $this->preencheAgendamento($request);
        $agendamento->status_id = 1; # Agendado
        $agendamento->save();

        return $this->carregar($agendamento->id, true);
    }

    public function alterar(int $id, Request $request)
    {
        $agendamento = $this->agendamento->find($id);
        $agendamento = $this->preencheAgendamento($request, $agendamento);
        $agendamento->save();

        return $this->carregar($id, true);
    }

    public function carregar(int $id, bool $mensagem = false)
    {
        $agendamento = $this->agendamento->find($id);

        return view('schedule-item', compact(['agendamento', 'mensagem']));
    }

    public function excluir(int $id)
    {
        $agendamento = $this->agendamento->find($id);
        $agendamento->status_id = 3; #cancelado
        $agendamento->save();
        $agendamento->delete();

        return $this->listar(true);
    }

    private function preencheAgendamento(Request $request, Agendamento $agendamento = null)
    {
        if (empty($agendamento)) {
            $agendamento = new Agendamento();
        }

        $agendamento->cliente_id = $request->cliente_id;

        if (!empty(Session::get('usuario')->fl_admin)) {
            $agendamento->usuario_id = $request->usuario;
        } else {
            $agendamento->usuario_id = Session::get('usuario')->id;
        }

        $agendamento->dt_agendamento = $request->data;
        $agendamento->hr_agendamento = $request->hora;
        $agendamento->hr_duracao = $request->duracao;
        $agendamento->ds_agendamento = $request->nota;
        $agendamento->status_id = $request->status;

        return $agendamento;
    }


    private function adminAgendamentos(string $mensagem = null)
    {
        $agendamentos = $this->agendamento->where('dt_agendamento', '>=', date('Y-m-d'))->whereIn('status_id', [1,2])->orderBy('dt_agendamento', 'asc')->get();
        $diasAgendados = $this->diasAgendados($agendamentos);
        $options = $this->mesesAgendados();

        return view('schedule-list', compact('diasAgendados', 'options', 'mensagem'));
    }

    private function defaultAgendamentos(string $mensagem = null)
    {
        $agendamentos = Session::get('usuario')->agendamentos()->whereIn('status_id', [1,2])->where('dt_agendamento', '>=', date('Y-m-d'))->orderBy('dt_agendamento', 'asc')->get();
        $diasAgendados = $this->diasAgendados($agendamentos);
        $options = $this->mesesAgendados();

        return view('schedule-list', compact('diasAgendados', 'options', 'mensagem'));
    }

    private function diasAgendados($agendamentos)
    {
        $diasAgendados = [];
        foreach ($agendamentos as $agendamento) {
            //if (!array_key_exists($agendamento->dt_agendamento, $diasAgendados)) {
                $diasAgendados[$agendamento->dt_agendamento][] = $agendamento;
            //}
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

    private function getClientesDesempedidos(Cliente $clienteAtual = null)
    {
        $clientes = $this->cliente->get();
        $arrClientes = [];

        foreach ($clientes as $cliente) {
            $agendamentoDoCliente = $cliente->agendamentos()->whereIn('status_id', [1,2,4])->first();

            if (empty($agendamentoDoCliente)) {
                $arrClientes[] = $cliente;
            }
        }

        if (!empty($clienteAtual)) {
            $arrClientes[] = $clienteAtual;
        }

        return $arrClientes;
    }

    private function getUsuariosForSelect()
    {
        if (!empty(Session::get('usuario')->fl_admin)) {
            return $this->usuario->orderBy('ds_nome', 'asc')->get();
        }
        return $this->usuario->where('id', Session::get('usuario')->id)->orderBy('ds_nome', 'asc')->get();

    }
}
