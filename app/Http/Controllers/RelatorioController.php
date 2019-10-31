<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Cliente;
use App\Agendamento;

class RelatorioController extends Controller
{
    public function relatorios()
    {
        $usuarios = Usuario::orderBy('ds_nome', 'asc')->get();

        return view('admin.reports', compact('usuarios'));
    }

    public function gerarRelatorio(Request $request)
    {
        if($request->usuario != "todos") {
            $usuario = Usuario::find($request->usuario);
            $usuarios[] = $usuario;
        } else {
            $usuarios = Usuario::orderBy('ds_nome', 'asc')->get();
        }

        $data = $this->relatorioPorUsuario($usuarios, $request->data_inicial, $request->data_final);

        $qtClientesCadastrados = Cliente::whereBetween('created_at', [$request->data_inicial, $request->data_final])->count();
        $qtAgendamentosCadastrados = Agendamento::whereBetween('dt_agendamento', [$request->data_inicial, $request->data_final])->count();

        return view('admin.single-report', compact('data', 'qtClientesCadastrados', 'qtAgendamentosCadastrados'));
    }

    private function relatorioPorUsuario($usuarios, $data_inicio, $data_fim)
    {
        foreach ($usuarios as $usuario) {
            $qtClientesCadastradosUsuario = Cliente::where('usuario_id', $usuario->id)->whereBetween('created_at', [$data_inicio, $data_fim])->count();
            $qtAgendamentosCadastradosUsuario = Agendamento::where('usuario_id', $usuario->id)->whereBetween('dt_agendamento', [$data_inicio, $data_fim])->count();

            $data[$usuario->id]['usuario'] = $usuario;
            $data[$usuario->id]['qtClientesCadastradosUsuario'] = $qtClientesCadastradosUsuario;
            $data[$usuario->id]['qtAgendamentosCadastradosUsuario'] = $qtAgendamentosCadastradosUsuario;
        }

        return $data;
    }
}
