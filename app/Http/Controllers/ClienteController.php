<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    protected $cliente;

    function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function create()
    {
        $this->cliente->ds_nome = 'Victor Frossard';
        $this->cliente->save();
    }

    public function delete($id)
    {
        $this->cliente->where('id', $id)->delete();
    }
}
