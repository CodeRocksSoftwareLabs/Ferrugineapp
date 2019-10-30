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

        $to = date("Y-m-t", strtotime($from));

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

        $to = date("Y-m-t", strtotime($from));

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

        $to = date("Y-m-t", strtotime($from));

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

        $to = date("Y-m-t", strtotime($from));

        if (empty($usuario)) {
            return Agendamento::whereBetween('dt_agendamento', [$from, $to])->count();
        } else {
            return Agendamento::whereBetween('dt_agendamento', [$from, $to])->where('usuario_id', '=', $usuario->id)->count();
        }
    }

    public static function hasAgendamentoUsuario($cliente)
    {
        $agendamento = $cliente->agendamentos()->whereIn('status_id', [1,2])->where('dt_agendamento', '>=', date('Y-m-d'))->orderBy('id', 'desc')->first();
        if (!empty($agendamento)) {
            return '<span class="card-client__salesman"><i class="fas fa-user-tag"></i> '. $agendamento->usuario->ds_nome .'</span>';
        }
        return '<span class="card-client__salesman card-client__salesman--none"><i class="fas fa-user-tag"></i> Sem vendedor</span>';
    }

    public static function formataData($data)
    {
        return self::traduzMes(date('d F Y', strtotime($data)));
    }

    public static function formataDia($data)
    {
        return self::traduzirDia(date('l', strtotime($data)));
    }

    public static function formataLocal($cliente)
    {
        $local = "";
        if(!empty($cliente->ds_bairro))
            $local .= $cliente->ds_bairro . ", ";

        if(!empty($cliente->ds_cidade))
            $local .= $cliente->ds_cidade;

        return $local;
    }

    public static function sumTime ($oldPlayTime, $PlayTimeToAdd)
    {
        $old=explode(":",$oldPlayTime);
        $play=explode(":",$PlayTimeToAdd);

        $hours=$old[0]+$play[0];
        $minutes=$old[1]+$play[1];

        if($minutes > 59){
            $minutes=$minutes-60;
            $hours++;
        }

        if($minutes < 10){
            $minutes = "0".$minutes;
        }

        if($minutes == 0){
            $minutes = "00";
        }

        $sum=$hours.":".$minutes;
        return $sum;
    }

    public static function formataDiaSigla($data)
    {
        return mb_substr(strtoupper(self::traduzirDia(date('l', strtotime($data)))), 0, 3);
    }

    private static function traduzMes($data)
    {
        $meses_ingles = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $meses_portugues = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        return str_replace($meses_ingles, $meses_portugues, $data);
    }

    public static function traduzirDia($data)
    {
        $dias_ingles = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $dias_portugues = ['Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo'];
        return str_replace($dias_ingles, $dias_portugues, $data);
    }
}
