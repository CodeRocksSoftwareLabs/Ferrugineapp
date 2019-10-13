<?php

namespace App\Helpers;

use App\Usuario;
use App\Disciplina;

class DisciplinaHelper
{
    public static function qtAlunos($id)
    {
        $usuario = new Usuario();
        $usuario = $usuario->find($id);

        $alunos = 0;
        foreach($usuario->ofertas as $oferta) {
            $alunos += $oferta->qt_alunos;
        }

        if($alunos == 1)
            return $alunos . ' Aluno';
        return $alunos . ' Alunos';
    }

    public static function qtDisciplinas($id)
    {
        $usuario = new Usuario();
        $usuario = $usuario->find($id);

        $dcps = [];
        foreach($usuario->ofertas as $oferta) {
            if(!in_array($oferta->disciplina_id, $dcps))
                $dcps[] = $oferta->disciplina_id; 
        }

        $dcs = count($dcps);

        if($dcs ==  1)
            return $dcs . ' Disciplina';
        return $dcs .  ' Disciplinas';
    }

    public static function qtTurmas($id)
    {
        $usuario = new Usuario();
        $usuario = $usuario->find($id);

        $turs = $usuario->ofertas->count();

        if($turs ==  1)
            return $turs . ' Turma';
        return $turs .  ' Turmas';
    }

}