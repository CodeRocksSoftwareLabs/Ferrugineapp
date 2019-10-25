<?php

namespace App\Helpers;

use Request;
use App\Cliente;
use App\Usuario;
use App\Agendamento;

class InterfaceHelper
{
    public static function qtAgendamentos(Usuario $usuario)
    {
        $qt_agendamentos = $usuario->agendamentos()->whereIn('status_id', [1,2])->count();

        switch ($qt_agendamentos) {
            case 0:
                return "0 agendamentos";
            case 1:
                return "1 agendamento";
            default:
                return $qt_agendamentos . " agendamentos";
        }
    }

    public static function qtAgendamentosFinalizadosComVendaMes(Usuario $usuario = null)
    {
        $from = strval(date('Y-m-'));
        $from = date($from . '01');

        $to = date('Y-m-d');

        if (empty($usuario)) {
            return Agendamento::whereBetween('created_at', [$from, $to])->whereIn('status_id', [4])->count();
        } else {
            return Agendamento::whereBetween('created_at', [$from, $to])->where('usuario_id', '=', $usuario->id)->whereIn('status_id', [4])->count();
        }
    }

    public static function qtAgendamentosFinalizadosMes(Usuario $usuario = null)
    {
        $from = strval(date('Y-m-'));
        $from = date($from . '01');

        $to = date('Y-m-d');

        if (empty($usuario)) {
            return Agendamento::whereBetween('created_at', [$from, $to])->whereIn('status_id', [4, 5])->count();
        } else {
            return Agendamento::whereBetween('created_at', [$from, $to])->where('usuario_id', '=', $usuario->id)->whereIn('status_id', [4])->count();
        }
    }

    public static function qtNovosClientesMes(Usuario $usuario = null)
    {
        $from = strval(date('Y-m-'));
        $from = date($from . '01');

        $to = date('Y-m-d');

        if (empty($usuario)) {
            return Cliente::whereBetween('created_at', [$from, $to])->count();
        } else {
            return Cliente::whereBetween('created_at', [$from, $to])->where('usuario_id', '=', $usuario->id)->count();
        }
    }

    public static function qtAgendamentosMes(Usuario $usuario = null)
    {
        $from = strval(date('Y-m-'));
        $from = date($from . '01');

        $to = date('Y-m-d');

        if (empty($usuario)) {
            return Agendamento::whereBetween('created_at', [$from, $to])->count();
        } else {
            return Agendamento::whereBetween('created_at', [$from, $to])->where('usuario_id', '=', $usuario->id)->count();
        }
    }
}
