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

Route::get('/login', 'UsuarioController@login')->name('login');
Route::post('/login', 'UsuarioController@authenticate')->name('login.authenticate');
Route::get('/logout', 'UsuarioController@logout')->name('logout');


Route::get('/teste-de-email', function () {
    Mail::raw('Estou testando o envio de e-mails, este funcionou!', function($message)
    {
        $message->subject('Teste de e-mail');
        $message->to('victorfrossard00@gmail.com', 'Victor Frossard');
    });
});

Route::group(['middleware' => 'autenticacao'], function () {

    Route::prefix('/clientes')->group(function () {
        Route::get('/listar', 'ClienteController@listar')->name('clientes.listar');

        Route::get('/novo', 'ClienteController@novo')->name('clientes.novo');
        Route::post('/criar', 'ClienteController@criar')->name('clientes.criar');
        Route::get('/{id}', 'ClienteController@carregar')->name('clientes.carregar');
        Route::get('/editar/{id}', 'ClienteController@editar')->name('clientes.editar');
        Route::post('/{id}', 'ClienteController@alterar')->name('clientes.alterar');

        Route::get('/cliente', 'ClienteController@create');
        Route::get('/cliente/{id}', 'ClienteController@delete');
    });

    Route::prefix('/agendamentos')->group(function () {
        Route::get('/listar', 'AgendamentoController@listar')->name('agendamentos.listar');
    });


    Route::prefix('/dashboard')->group(function () {
        Route::get('/', 'DashboardController@dashboard')->name('dashboard');
    });

    Route::prefix('/notificacoes')->group(function () {
        Route::get('/', 'NotificacaoController@notificacoes')->name('notificacoes.listar');
    });

    Route::prefix('/perfil')->group(function () {
        Route::get('/', 'UsuarioController@perfil')->name('perfil');
    });

    Route::group(['middleware' => 'admin'], function () {

        Route::prefix('/usuarios')->group(function () {
            Route::get('/', 'UsuarioController@usuariosList')->name('usuarios.listar');
            Route::get('/novo', 'UsuarioController@newUsuario')->name('usuarios.novo');
            Route::get('/visualizar/{id}', 'UsuarioController@viewUsuario')->name('usuarios.visualizar');
            Route::post('/criar', 'UsuarioController@createUsuario')->name('usuarios.criar');
        });

        Route::prefix('/relatorios')->group(function () {
            Route::get('/', 'UsuarioController@usuariosList')->name('relatorios.listar');
        });
    });

});
