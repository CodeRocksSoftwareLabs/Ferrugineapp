<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Cliente;
use App\Estado;
use Session;

class ClienteController extends Controller
{
    protected $cliente;

    function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function listar(bool $mensagem = false)
    {
        $clientes = $this->cliente->orderBy('ds_nome', 'asc')->get();

        // Adequação para exibição em ordem alfabética e por letra
        $lista_clientes = [];
        foreach ($clientes as $cliente) {
            $lista_clientes[$cliente->ds_nome[0]][] = $cliente;
        }

        return view('client-list', compact('lista_clientes', 'mensagem'));
    }

    public function novo()
    {
        $estado = new Estado();
        $estados = $estado->orderBy('ds_estado', 'asc')->get();

        return view('new-client', compact('estados'));
    }

    public function criar(Request $request)
    {
        $cliente = $this->preencherCliente(new Cliente(), $request);
        $cliente->save();

        return $this->carregar($cliente->id, false);
    }

    public function alterar(int $id, Request $request)
    {
        $cliente = $this->cliente->find($id);

        $cliente = $this->preencherCliente($cliente, $request);
        $cliente->save();

        return $this->carregar($cliente->id, true);
    }

    public function carregar(int $id, bool $mensagem = false)
    {
        $estado = new Estado();
        $estados = $estado->orderBy('ds_estado', 'asc')->get();

        $cliente = $this->cliente->find($id);

        return view('single-client', compact(['estados', 'cliente', 'mensagem']));
    }

    public function editar(int $id)
    {
        $estado = new Estado();
        $estados = $estado->orderBy('ds_estado', 'asc')->get();

        $cliente = $this->cliente->find($id);

        return view('new-client', compact('estados', 'cliente'));
    }

    public function excluir(int $id)
    {
        $this->cliente->where('id', $id)->delete();

        return $this->listar(true);
    }

    public function buscarCliente(string $q)
    {
        $cliente = $this->cliente->where('ds_nome', '=', $q)->first();

        if(!$cliente)
            return response()->json(['message' => 'Cliente não encontrado.'], 404);

        return response()->json($cliente, 200);
    }

    private function preencherCliente(Cliente $cliente, Request $request)
    {
        $cliente->ds_nome = $request->nome;
        $cliente->ds_email = $request->email;
        $cliente->ds_telefone = $request->telefone;
        $cliente->ds_telefone2 = $request->telefone2;
        $cliente->ds_cep = $request->cep;
        $cliente->estado_id = intval($request->estado);
        $cliente->ds_endereco = $request->endereco;
        $cliente->ds_numero = $request->numero;
        $cliente->ds_bairro = $request->bairro;
        $cliente->ds_cidade = $request->cidade;
        $cliente->ds_complemento = $request->complemento;
        $cliente->ds_obs = $request->obs;
        $cliente->usuario_id = Session::get('usuario')->id;

        return $cliente;
    }
}
