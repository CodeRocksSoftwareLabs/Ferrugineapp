<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteApiController
{
    const AUTOR_ID = 1;

    public function criar(Request $request) {

        try {
            $cliente = $this->preencherCliente(new Cliente(), $request);
            $cliente->save();

            //TODO: Notificar que um novo cliente foi criado.

            return response(json_encode([
                "erros" => 0,
                "mensagem" => "Sucesso! A sua solicitação foi enviada com sucesso, em breve entraremos em contato."
            ]));

        } catch (\Exception $e) {
            return response(json_encode([
                "erros" => 1,
                "mensagem" => $e->getMessage()
            ]));
        }
    }

    private function preencherCliente(Cliente $cliente, Request $request) {
        $cliente->ds_nome = $request->nome ?? null;
        $cliente->ds_email = $request->email ?? null;
        $cliente->ds_telefone = $request->celular ?? null;
        $cliente->ds_cep = $request->cep ?? null;
        $cliente->ds_endereco = $request->endereco ?? null;
        $cliente->ds_numero = $request->numero ?? null;
        $cliente->ds_complemento = $request->complemento ?? null;
        $cliente->ds_bairro = $request->bairro ?? null;
        $cliente->ds_cidade = $request->cidade ?? null;
        $cliente->estado_id = $request->estado ? intval($request->estado) : null;
        $cliente->ds_obs = $request->comentario ?? null;
        $cliente->usuario_id = self::AUTOR_ID;
        return $cliente;
    }
}
