<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notificacao;

class NotificacaoController extends Controller
{
    protected $notificacao;

    function __construct(Notificacao $notificacao)
    {
        $this->notificacao = $notificacao;
    }

    public function notificacoes()
    {
        return view('notifications');
    }
}
