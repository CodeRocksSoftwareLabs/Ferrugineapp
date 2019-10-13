<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Estado;

class ClienteController extends Controller
{
    protected $cliente;

    function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function listar()
    {
        $clientes = $this->cliente->orderBy('ds_nome', 'asc')->get();

        // Adequação para exibição em ordem alfabética e por letra
        $lista_clientes = [];
        foreach ($clientes as $cliente) {
            $lista_clientes[$cliente->ds_nome[0]][] = $cliente;
        }

        return view('client-list', compact('lista_clientes'));
    }

    public function novo()
    {
        $estado = new Estado();
        $estados = $estado->orderBy('ds_estado', 'asc')->get();

        return view('new-client', compact('estados'));
    }

    public function carregar($id)
    {
        $estado = new Estado();
        $estados = $estado->orderBy('ds_estado', 'asc')->get();

        $cliente = $this->cliente->find($id);

        return view('single-client', compact(['estados', 'cliente']));
    }

    public function create()
    {
        $this->cliente->ds_nome = 'Ruth Siqueira';
        $this->cliente->ds_email = 'ruth@coderocks.com.br';
        $this->cliente->ds_telefone = '+55 (27) 9 9883-9587';
        $this->cliente->save();

        $this->cliente = new Cliente();

        $this->cliente->ds_nome = 'Jussara Siqueira da Silva';
        $this->cliente->ds_email = 'jussara@coderocks.com.br';
        $this->cliente->ds_telefone = '+55 (27) 9 9988-0666';
        $this->cliente->save();

        $this->cliente = new Cliente();

        $this->cliente->ds_nome = 'Daniel Danied';
        $this->cliente->ds_email = 'daniel@ferrugine.com.br';
        $this->cliente->ds_telefone = '+55 (27) 9 9988-0666';
        $this->cliente->save();

        $this->cliente = new Cliente();

        $this->cliente->ds_nome = 'José Roberto';
        $this->cliente->ds_email = 'jose@ferrugine.com.br';
        $this->cliente->ds_telefone = '+55 (27) 9 9988-0777';
        $this->cliente->save();

        $this->cliente = new Cliente();

        $this->cliente->ds_nome = 'Thiago Ortiz';
        $this->cliente->ds_email = 'thiago@picpay.com.br';
        $this->cliente->ds_telefone = '+55 (27) 9 9322-5544';
        $this->cliente->save();
    }

    public function delete($id)
    {
        $this->cliente->where('id', $id)->delete();
    }
}
