<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/teste-de-email', function () {
    Mail::raw('Estou testando o envio de e-mails, este funcionou!', function($message)
    {
        $message->subject('Teste de e-mail');
        $message->to('victorfrossard00@gmail.com', 'Victor Frossard');
    });
});

Route::prefix('/clientes')->group(function () {
    Route::get('/listar', 'ClienteController@listar')->name('clientes.listar');

    Route::get('/novo', 'ClienteController@novo')->name('clientes.novo');
    Route::get('/{id}', 'ClienteController@carregar')->name('clientes.carregar');

    Route::get('/cliente', 'ClienteController@create');
    Route::get('/cliente/{id}', 'ClienteController@delete');
});

Route::prefix('/agendamentos')->group(function () {
    Route::get('/listar', 'AgendamentoController@listar')->name('agendamentos.listar');
});


Route::prefix('/dashboard')->group(function () {});
Route::prefix('/notificacoes')->group(function () {});
Route::prefix('/perfil')->group(function () {});
