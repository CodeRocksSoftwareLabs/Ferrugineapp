<?php

namespace App\Helpers;

use App\Http\Controllers\ConversaController;
use App\Usuario;
use App\LogAtividade;
use App\Conversa;
use App\Ambiente;

class DesempenhoHelper
{
    public static function professorOuTutor($id)
    {
        $usuario = new Usuario();
        $usuario = $usuario->find($id);
        if($usuario->grupo->ds_nome != 'Professores')
            return '<span class="btn btn-label-info btn-pill btn-sm">Tutor</span>';
        return '<span class="btn btn-label-primary btn-pill btn-sm">Professor</span>';
    }

    public static function linkDisciplina($ambienteId, $moodleId)
    {
        $ambiente = new Ambiente();
        $ambiente = $ambiente->find($ambienteId);

        return $ambiente->ds_url . '/course/view.php?id=' . $moodleId;
    }

    public static function aplicabilidadeAssign($usuarioId, $referenciaId, $turmaId)
    {
        $log = new LogAtividade();
        $log = $log->where('referencia_id', '=', $referenciaId)->where('usuario_id', '=', $usuarioId)->where('fl_tipo', '=', 'assign')->where('turma_id', '=', $turmaId)->first();
        #dd($log);

        if(!empty($log) && ($log->qt_enviados > 0))
            return true;
        return false;
    }

    public static function qtAssign($usuarioId, $referenciaId, $turmaId)
    {
        $log = new LogAtividade();
        $log = $log->where('referencia_id', '=', $referenciaId)->where('usuario_id', '=', $usuarioId)->where('fl_tipo', '=', 'assign')->where('turma_id', '=', $turmaId)->first();
        #dd($log);

        if(!empty($log))
            return $log->qt_enviados . '/' . $log->qt_corrigidos;
        return '--- não se aplica ---';
    }

    public static function porcentagemAssign($usuarioId, $referenciaId, $turmaId)
    {
        $log = new LogAtividade();
        $log = $log->where('referencia_id', '=', $referenciaId)->where('usuario_id', '=', $usuarioId)->where('fl_tipo', '=', 'assign')->where('turma_id', '=', $turmaId)->first();
        #dd($log);

        if(!empty($log) && ($log->qt_enviados > 0) && ($log->qt_corrigidos > 0)) {
            $valor = (($log->qt_corrigidos * 100) / $log->qt_enviados);

            if($valor < 100)
                return number_format($valor, 0);
            return 100;
        }

        return 0;
    }

    public static function corPorcentagemAssign($usuarioId, $referenciaId, $turmaId)
    {
        $log = new LogAtividade();
        $log = $log->where('referencia_id', '=', $referenciaId)->where('usuario_id', '=', $usuarioId)->where('fl_tipo', '=', 'assign')->where('turma_id', '=', $turmaId)->first();
        #dd($log);

        if(!empty($log) && ($log->qt_enviados > 0) && ($log->qt_corrigidos > 0)) {
            $valor = (($log->qt_corrigidos * 100) / $log->qt_enviados);

            if($valor > 69)
                return 'm--bg-success';
            if($valor < 30)
                return 'm--bg-danger';
                
            return 'm--bg-warning';
        }
            
        return 'm--bg-success';
    }

    public static function aplicabilidadeForum($usuarioId, $referenciaId, $turmaId)
    {
        $log = new LogAtividade();
        $log = $log->where('referencia_id', '=', $referenciaId)->where('usuario_id', '=', $usuarioId)->where('fl_tipo', '=', 'forum')->where('turma_id', '=', $turmaId)->first();
        #dd($log);

        if(!empty($log) && ($log->qt_enviados > 0))
            return true;
        return false;
    }

    public static function qtForum($usuarioId, $referenciaId, $turmaId)
    {
        $log = new LogAtividade();
        $log = $log->where('referencia_id', '=', $referenciaId)->where('usuario_id', '=', $usuarioId)->where('fl_tipo', '=', 'forum')->where('turma_id', '=', $turmaId)->first();
        #dd($log);

        if(!empty($log))
            return $log->qt_enviados . '/' . $log->qt_corrigidos;
        return '--- não se aplica ---';
    }

    public static function porcentagemForum($usuarioId, $referenciaId, $turmaId)
    {
        $log = new LogAtividade();
        $log = $log->where('referencia_id', '=', $referenciaId)->where('usuario_id', '=', $usuarioId)->where('fl_tipo', '=', 'forum')->where('turma_id', '=', $turmaId)->first();
        #dd($log);

        if(!empty($log) && ($log->qt_enviados > 0) && ($log->qt_corrigidos > 0)) {
            $valor = (($log->qt_corrigidos * 100) / $log->qt_enviados);

            if($valor < 100)
                return number_format($valor, 0);
            return 100;
        }
            
        return 0;
    }

    public static function corPorcentagemForum($usuarioId, $referenciaId, $turmaId)
    {
        $log = new LogAtividade();
        $log = $log->where('referencia_id', '=', $referenciaId)->where('usuario_id', '=', $usuarioId)->where('fl_tipo', '=', 'forum')->where('turma_id', '=', $turmaId)->first();
        #dd($log);

        if(!empty($log) && ($log->qt_enviados > 0) && ($log->qt_corrigidos > 0)) {
            $valor = (($log->qt_corrigidos * 100) / $log->qt_enviados);

            if($valor > 69)
                return 'm--bg-success';
            if($valor < 30)
                return 'm--bg-danger';

            return 'm--bg-warning';
        }
            
        return 'm--bg-success';
    } 

    public static function aplicabilidadeConversas($usuarioId, $turmaId)
    {
        $recebidas = DesempenhoHelper::totalConversasRecebidas($usuarioId, $turmaId);

        if(!empty($recebidas) && ($recebidas > 0))
            return true;
        return false;
    }

    public static function totalConversasRecebidas($usuarioId, $turmaId)
    {
        $usuario = new Usuario();
        $usuario = $usuario->find($usuarioId);

        $conversa = new Conversa();
        $total = $conversa->select(
            'conversas.id',
            'conversas.fl_status',
            'conversas.categoria_id',
            'conversas.turma_id',
            'conversas.semestre_id'
        )
        #1) O usuário só enxerga as mensagens das categorias que ele tem acesso
        ->join('categorias', 'conversas.categoria_id', '=', 'categorias.id')
        ->join('agrupamentos', 'categorias.id', '=', 'agrupamentos.categorias_id')
        ->join('grupos', 'agrupamentos.grupos_id', '=', 'grupos.id')

        #2) O usuário só enxerga as mensagens das turmas que ele tem acesso
        ->join('turmas', 'conversas.turma_id', '=', 'turmas.id')
        ->join('ofertas', 'turmas.id', '=', 'ofertas.turmas_id')
        ->join('usuarios', 'ofertas.usuarios_id', '=', 'usuarios.id')

        #1) O usuário só enxerga as mensagens das categorias que ele tem acesso
        ->where('grupos.id', '=', $usuario->grupo->id)

        #2) O usuário só enxerga as mensagens das turmas que ele tem acesso
        ->where('usuarios.id', '=', $usuario->id)
        ->where('turmas.id', '=', $turmaId) # Somente da turma da linha

        ->whereNull('conversas.fl_excluido')

        # Não conta notificações
        ->whereNotIn('conversas.categoria_id', [6])
        ->count();

        #dd($total);

        return $total;
    }

    public static function totalConversasFinalizadas($usuarioId, $turmaId)
    {
        $usuario = new Usuario();
        $usuario = $usuario->find($usuarioId);

        $conversa = new Conversa();
        $total = $conversa->select(
            'conversas.id',
            'conversas.fl_status',
            'conversas.categoria_id',
            'conversas.turma_id',
            'conversas.semestre_id'
        )
        #1) O usuário só enxerga as mensagens das categorias que ele tem acesso
        ->join('categorias', 'conversas.categoria_id', '=', 'categorias.id')
        ->join('agrupamentos', 'categorias.id', '=', 'agrupamentos.categorias_id')
        ->join('grupos', 'agrupamentos.grupos_id', '=', 'grupos.id')

        #2) O usuário só enxerga as mensagens das turmas que ele tem acesso
        ->join('turmas', 'conversas.turma_id', '=', 'turmas.id')
        ->join('ofertas', 'turmas.id', '=', 'ofertas.turmas_id')
        ->join('usuarios', 'ofertas.usuarios_id', '=', 'usuarios.id')

        #1) O usuário só enxerga as mensagens das categorias que ele tem acesso
        ->where('grupos.id', '=', $usuario->grupo->id)

        #2) O usuário só enxerga as mensagens das turmas que ele tem acesso
        ->where('usuarios.id', '=', $usuario->id)
        ->where('turmas.id', '=', $turmaId) # Somente da turma da linha

        ->whereNull('conversas.fl_excluido')

        # Quero somente as arquivadas
        ->where('conversas.fl_arquivada', '=', 1)

        # Não conta notificações
        ->whereNotIn('conversas.categoria_id', [6])
        ->count();

        #dd($total);

        return $total;
    }

    public static function porcentagemConversas($usuarioId, $turmaId)
    {
        $recebidas = DesempenhoHelper::totalConversasRecebidas($usuarioId, $turmaId);
        $finalizadas = DesempenhoHelper::totalConversasFinalizadas($usuarioId, $turmaId);

        if (($recebidas > 0) && ($finalizadas > 0)) {
            $valor = (($finalizadas * 100) / $recebidas);

            if($valor < 100)
                return number_format($valor, 0);
            return 100;
        }

        return 0;
    }

    public static function corPorcentagemConversas($usuarioId, $turmaId)
    {
        $recebidas = DesempenhoHelper::totalConversasRecebidas($usuarioId, $turmaId);
        $finalizadas = DesempenhoHelper::totalConversasFinalizadas($usuarioId, $turmaId);

        if (($recebidas > 0) && ($finalizadas > 0)) {
            $valor = (($finalizadas * 100) / $recebidas);

            if($valor > 69)
                return 'm--bg-success';
            if($valor < 30)
                return 'm--bg-danger';

            return 'm--bg-warning';
        }
        
        return 'm--bg-success';
    }

    public static function tempoMedioResposta($usuarioId, $turmaId)
    {
        $conversas = DesempenhoHelper::todasAsConversas($usuarioId, $turmaId);
        $qt = count($conversas);
        $total = 0;

        foreach ($conversas as $conversa) {
            $tempo = DesempenhoHelper::tempoDeEspera($conversa);
            
            if($tempo) {
                if($tempo->m > 0){ # meses
                    $dias = $tempo->m * 30;
                    $total += $dias * 1440; # Em minutos
                }
                if($tempo->d > 0){ # dias
                    $total += $tempo->d * 1440;
                }
                if($tempo->h > 0){ # minutos
                    $total += $tempo->h * 60;
                }
                if($tempo->i > 0){ # minutos
                    $total += $tempo->i;
                }                 
            }
        }

        $total = $total / $qt;

        if($total > 0) 
        {
            if($total < 60) { # total é menor que uma hora
                return number_format($total, 0) . ' min';
            }
            if(($total >= 60) && ($total < 1440)) { # total é maior que 1 hora e menor que um dia
                return number_format(($total/60), 0) . ' h';
            }
            if($total >= 1440) { # total é maior que 1 dia
                return number_format(($total/1440), 0) . ' d';
            }
        }
        return '< 1 min';
        
    }

    public static function todasAsConversas($usuarioId, $turmaId)
    {
        $usuario = new Usuario();
        $usuario = $usuario->find($usuarioId);

        $conversa = new Conversa();
        $conversas = $conversa->select(
            'conversas.id',
            'conversas.fl_status',
            'conversas.categoria_id',
            'conversas.turma_id',
            'conversas.semestre_id'
        )
        #1) O usuário só enxerga as mensagens das categorias que ele tem acesso
        ->join('categorias', 'conversas.categoria_id', '=', 'categorias.id')
        ->join('agrupamentos', 'categorias.id', '=', 'agrupamentos.categorias_id')
        ->join('grupos', 'agrupamentos.grupos_id', '=', 'grupos.id')

        #2) O usuário só enxerga as mensagens das turmas que ele tem acesso
        ->join('turmas', 'conversas.turma_id', '=', 'turmas.id')
        ->join('ofertas', 'turmas.id', '=', 'ofertas.turmas_id')
        ->join('usuarios', 'ofertas.usuarios_id', '=', 'usuarios.id')

        #1) O usuário só enxerga as mensagens das categorias que ele tem acesso
        ->where('grupos.id', '=', $usuario->grupo->id)

        #2) O usuário só enxerga as mensagens das turmas que ele tem acesso
        ->where('usuarios.id', '=', $usuario->id)
        ->where('turmas.id', '=', $turmaId) # Somente da turma da linha

        ->whereNull('conversas.fl_excluido')

        # Não conta notificações
        ->whereNotIn('conversas.categoria_id', [6])
        ->get();

        return $conversas;
    }

    public static function tempoDeEspera($conversa)
    {
        if(!empty($conversa->mensagens->count() > 0)) 
        {
            $primeiraMensagem = $conversa->mensagens()->whereNull('fl_excluido')->orderBy('id', 'asc')->first();
            $resposta = $conversa->mensagens()->where('id', '<>', $primeiraMensagem->id)->orderBy('id', 'asc')->first();
            $dataInteracaoPrimeira = \DateTime::createFromFormat('d/m/Y H:i', $primeiraMensagem->created_at);

            if(!empty($resposta)) {
                $dataInteracaoResposta = \DateTime::createFromFormat('d/m/Y H:i', $resposta->created_at);
                $tempo = $dataInteracaoPrimeira->diff($dataInteracaoResposta);
                
                return $tempo;
            }
            else {
                # A resposta deve ter o datetime atual para o calculo
                $dataAtual = (string)date("d/m/Y H:i");
                $dataAtual = \DateTime::createFromFormat('d/m/Y H:i', $dataAtual);
                $tempo = $dataInteracaoPrimeira->diff($dataAtual); 
                
                return $tempo;
            }
        }
        return false;
    }

    public static function ajustaTempo($tempo)
    {
        $texto = '';
        $horas = $tempo/3600;
        if($horas>1) {
            $horas = number_format($horas, 0);
            $texto .= $horas . 'h ';
        }
        $min = $tempo - (3600 * $horas);
        $min = $min/60;
        if($min>1){
            $min = number_format($min, 0);
            $texto .= $min . 'min ';
        }

        if(empty($texto))
            return '<small>-- não se aplica --</small>';
        return $texto;
    }
}