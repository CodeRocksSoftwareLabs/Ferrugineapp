<?php

namespace App\Helpers;

use App\Http\Controllers\ConversaController;

class ConversaHelper
{
    public static function tempoEspera($id, $dashboard = false)
    {
        $conversaController = new ConversaController();
        $tempo = $conversaController->tempoDeEspera($id);
        
        if(is_numeric($tempo)) {
            if($dashboard)
                return '-';
            return '------';
        }

        if(!$tempo)
            return 'Não encontrado';
        
        if(!empty($tempo->m) && ($tempo->m > 0))
            return ($tempo->m < 2) ? $tempo->m . ' mês' : $tempo->m . ' meses';

        if(!empty($tempo->d) && ($tempo->d > 0))
            return ($tempo->d < 2) ? $tempo->d . ' dia' : $tempo->d . ' dias';
        
        $retorno = '';
        
        if(!empty($tempo->h) && ($tempo->h > 0))
            $retorno .= ($tempo->h < 2) ? $tempo->h . ' hora' : $tempo->h . ' horas';

        if(!empty($tempo->h) && !empty($tempo->i) && ($tempo->h > 0))
            $retorno .= ' e ';

        if(!empty($tempo->i) && ($tempo->i > 0))
            $retorno .= (($tempo->i < 2) ? $tempo->i . ' minuto' : $tempo->i . ' minutos');

        return $retorno;
    }

    public static function ultimaInteracao($id)
    {
        $conversaController = new ConversaController();
        $data = $conversaController->dataUltimaInteracao($id);
        
        if(!$data)
            return 'Não encontrado';

        return $data;
    }

    public static function linkDisciplina($turma)
    {
        $url = $turma->disciplina->ambiente->ds_url . "/course/view.php?id=" . $turma->disciplina->moodle_id;
        return $url;
    }
}